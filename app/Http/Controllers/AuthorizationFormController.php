<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\AuthorizationForm;
use App\Models\Quote;
use App\Models\QuotePayment;
use App\Models\User;
use App\Models\Zipcode;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthorizationFormController extends Controller
{
    /** Card brands the form accepts, keyed by the label stored on the record. */
    private const CARD_BRANDS = ['Visa', 'Mastercard', 'American Express', 'Discover'];

    private const ATTACHMENT_DIRECTORY = 'quote/authorization_attachments';

    private const SIGNATURE_DIRECTORY = 'quote/authorization_signatures';

    private const MAX_ATTACHMENTS = 6;

    // ─────────────────────────────────────────────────────────────────────────
    // ADMIN — send the form link to a customer
    // ─────────────────────────────────────────────────────────────────────────

    public function sendAuthForm(Request $request)
    {
        $validated = $request->validate([
            'quote_id' => 'required|exists:quotes,id',
            'email' => 'required|email:rfc|max:255',
            'invoice_amount' => 'nullable|numeric|min:0.01|max:999999.99',
        ], [
            'email.email' => 'Please enter a valid email address.',
            'invoice_amount.min' => 'The invoice amount must be greater than zero.',
        ]);

        $quote = Quote::with('vehicles')->findOrFail($validated['quote_id']);

        if ($quote->authorizationForm()->exists()) {
            return back()->withErrors([
                'email' => 'An authorization form has already been submitted for this quote.',
            ]);
        }

        $email = $validated['email'];
        $invoiceAmount = round((float) ($validated['invoice_amount'] ?? $quote->amount_to_pay), 2);

        if ($invoiceAmount <= 0) {
            return back()->withErrors([
                'invoice_amount' => 'This quote has no payable amount yet. Set an amount before sending the form.',
            ]);
        }

        try {
            Mail::send(
                'emails.authForm',
                ['quote' => $quote, 'invoiceAmount' => $invoiceAmount],
                function ($message) use ($email, $quote) {
                    $message->to($email)->subject('Authorization Form for Quote #'.$quote->id);

                    $logoPath = public_path('web-assets/images/logo/1-logo.png');
                    if (file_exists($logoPath)) {
                        $message->embed($logoPath, 'logo');
                    }
                }
            );

            $mailStatus = 'success';
            $mailError = null;
        } catch (\Throwable $e) {
            $mailStatus = 'failed';
            $mailError = $e->getMessage();

            Log::error('Authorization form email failed', [
                'quote_id' => $quote->id,
                'to' => $email,
                'error' => $e->getMessage(),
            ]);
        }

        $this->logActivity(
            'Send_AuthForm',
            "Authorization form for Quote #{$quote->id} sent to {$email} ({$mailStatus})",
            $quote,
            [
                'to_email' => $email,
                'invoice_amount' => $invoiceAmount,
                'status' => $mailStatus,
                'error' => $mailError,
                'sender_ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]
        );

        if ($mailStatus === 'success') {
            return back()->with('success', 'Authorization form sent successfully to '.$email.'.');
        }

        return back()->withErrors([
            'email' => 'Could not send the authorization form email. Please try again in a moment.',
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PUBLIC — the customer-facing form
    // ─────────────────────────────────────────────────────────────────────────

    public function show(string $encrypted)
    {
        [$quote, $invoiceAmount] = $this->resolveQuoteFromToken($encrypted);

        if ($quote->authorizationForm()->exists()) {
            return redirect()
                ->route('frontend.thankyou')
                ->with('success', 'An authorization form has already been submitted for this order.');
        }

        // The link carries the amount the admin quoted, so the page always shows
        // that figure even if the quote total has moved on since.
        $quote->amount_to_pay = $invoiceAmount;

        return view('dashboard.quotes.authForm', [
            'quote' => $quote,
            'encrypted' => $encrypted,
            'invoiceAmount' => $invoiceAmount,
            'purchaseFor' => $this->purchaseDescription($quote),
        ]);
    }

    public function store(Request $request, string $encrypted)
    {
        [$quote, $invoiceAmount] = $this->resolveQuoteFromToken($encrypted);

        if ($quote->authorizationForm()->exists()) {
            return redirect()
                ->route('frontend.thankyou')
                ->with('success', 'An authorization form has already been submitted for this order.');
        }

        $validated = $this->validateSubmission($request);

        // City/state/zip are resolved against the zipcodes table rather than
        // trusted from the post body, matching how the quote forms work.
        $location = $this->resolveLocation($validated['zip'], $validated['city'], $validated['state']);

        $cardNumber = preg_replace('/\D/', '', $validated['card_number']);
        $cardType = $this->detectCardBrand($cardNumber) ?? $validated['card_type'];

        $this->assertCvvMatchesBrand($validated['cvv'], $cardType);

        $storedFiles = [];

        try {
            $attachments = $this->storeAttachments($request);
            $storedFiles = $attachments;

            $signaturePath = $this->storeSignature($validated['signature_image'], $quote->id);
            $storedFiles[] = $signaturePath;

            DB::transaction(function () use (
                $request, $quote, $validated, $location, $cardNumber,
                $cardType, $attachments, $signaturePath, $invoiceAmount
            ) {
                // Re-check inside the transaction so two racing submits can't
                // both get through; the unique index on quote_id is the backstop.
                $alreadySubmitted = AuthorizationForm::where('quote_id', $quote->id)
                    ->lockForUpdate()
                    ->exists();

                if ($alreadySubmitted) {
                    throw new \RuntimeException('DUPLICATE_SUBMISSION');
                }

                AuthorizationForm::create([
                    'quote_id' => $quote->id,
                    'auth_date' => now()->toDateString(),
                    // Derived from the quote, never from the (readonly, tamperable) input.
                    'purchase_for' => $this->purchaseDescription($quote),
                    'company_name' => $validated['company_name'] ?? null,
                    'cardholder_name' => $validated['cardholder_name'],
                    'billing_address' => $validated['billing_address'],
                    'city' => $location['city'],
                    'state' => $location['state'],
                    'zip' => $location['zip'],
                    'phone' => $this->normalisePhone($validated['phone']),
                    'card_type' => $cardType,
                    'card_last_four' => substr($cardNumber, -4),
                    'card_number' => $cardNumber,
                    'expiry_date' => $validated['expiry_date'],
                    'cvv' => $validated['cvv'],
                    'issuing_bank' => $validated['issuing_bank'] ?? null,
                    'bank_number' => $validated['bank_number'] ?? null,
                    // Authoritative amount comes from the signed link, not the form.
                    'invoice_amount' => $invoiceAmount,
                    'signature_image' => $signaturePath,
                    'attachments' => $attachments,
                    'ip_address' => $request->ip(),
                    'user_agent' => substr((string) $request->userAgent(), 0, 512),
                    'submitted_at' => now(),
                ]);

                QuotePayment::create([
                    'quote_id' => $quote->id,
                    'amount' => $invoiceAmount,
                    'channel' => 'Card Authorization',
                    'status' => 'Authorized',
                    'notes' => 'Automated entry from Authorization Form',
                ]);
            });
        } catch (\RuntimeException $e) {
            $this->deleteFiles($storedFiles);

            if ($e->getMessage() === 'DUPLICATE_SUBMISSION') {
                return redirect()
                    ->route('frontend.thankyou')
                    ->with('success', 'An authorization form has already been submitted for this order.');
            }

            Log::error('Authorization form submission failed', [
                'quote_id' => $quote->id,
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withErrors(['error' => 'We could not save your authorization. Please try again.'])
                ->withInput($request->except($this->sensitiveFields()));
        } catch (QueryException $e) {
            $this->deleteFiles($storedFiles);

            // 23000 = integrity constraint violation, i.e. the unique index on
            // quote_id caught a second submit that slipped past the checks above.
            if ($e->getCode() === '23000') {
                return redirect()
                    ->route('frontend.thankyou')
                    ->with('success', 'An authorization form has already been submitted for this order.');
            }

            Log::error('Authorization form submission failed', [
                'quote_id' => $quote->id,
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withErrors(['error' => 'We could not save your authorization. Please try again.'])
                ->withInput($request->except($this->sensitiveFields()));
        } catch (\Throwable $e) {
            $this->deleteFiles($storedFiles);

            Log::error('Authorization form submission failed', [
                'quote_id' => $quote->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['error' => 'We could not save your authorization. Please try again.'])
                ->withInput($request->except($this->sensitiveFields()));
        }

        $this->logActivity(
            'Submit_AuthForm',
            "Authorization form submitted for Quote #{$quote->id}",
            $quote,
            [
                'invoice_amount' => $invoiceAmount,
                'card_type' => $cardType,
                'card_last_four' => substr($cardNumber, -4),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]
        );

        $this->notifyAdmin($quote);

        return redirect()
            ->route('frontend.thankyou')
            ->with('success', 'Authorization form submitted successfully. Thank you!');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // ADMIN — read a submitted form
    // ─────────────────────────────────────────────────────────────────────────

    public function view($id)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user || ! $user->isAdmin()) {
            abort(403, 'Unauthorized access.');
        }

        $authForm = AuthorizationForm::with('quote')->findOrFail($id);

        $this->logActivity(
            'View_AuthForm',
            "Authorization form #{$authForm->id} viewed for Quote #{$authForm->quote_id}",
            $authForm->quote,
            ['authorization_form_id' => $authForm->id, 'viewer_ip' => request()->ip()]
        );

        return view('dashboard.quotes.view_auth_form', compact('authForm'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Internals
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Unwraps the signed link. Payload is `['id' => …, 'amount' => …]`; the bare
     * quote id form is still accepted so links mailed before that change work.
     *
     * @return array{0: Quote, 1: float}
     */
    private function resolveQuoteFromToken(string $encrypted): array
    {
        try {
            $payload = decrypt($encrypted);
        } catch (DecryptException) {
            abort(404);
        }

        $quoteId = is_array($payload) ? ($payload['id'] ?? null) : $payload;
        $amount = is_array($payload) ? ($payload['amount'] ?? null) : null;

        if (! is_numeric($quoteId)) {
            abort(404);
        }

        $quote = Quote::with('vehicles')->find($quoteId);

        if (! $quote) {
            abort(404);
        }

        $invoiceAmount = round((float) (is_numeric($amount) ? $amount : $quote->amount_to_pay), 2);

        if ($invoiceAmount <= 0) {
            abort(410, 'This authorization link is no longer valid. Please contact us for an updated link.');
        }

        return [$quote, $invoiceAmount];
    }

    private function validateSubmission(Request $request): array
    {
        return $request->validate([
            'company_name' => 'nullable|string|max:255',
            'cardholder_name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z\s.\-\']+$/'],
            'billing_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|size:2|alpha',
            'zip' => ['required', 'regex:/^\d{5}$/'],
            'phone' => ['required', 'regex:/^\(?\d{3}\)?[\s.\-]?\d{3}[\s.\-]?\d{4}$/'],
            'card_type' => ['required', 'in:'.implode(',', self::CARD_BRANDS)],
            'card_number' => [
                'required',
                'string',
                'max:23',
                function ($attribute, $value, $fail) {
                    if (! $this->isValidCardNumber($value)) {
                        $fail('Please enter a valid card number.');
                    }
                },
            ],
            'expiry_date' => [
                'required',
                'regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
                function ($attribute, $value, $fail) {
                    if (! $this->isCardNotExpired($value)) {
                        $fail('The card expiration date is invalid or has already passed.');
                    }
                },
            ],
            'cvv' => ['required', 'regex:/^\d{3,4}$/'],
            'issuing_bank' => 'nullable|string|max:255',
            'bank_number' => 'nullable|string|max:20',
            'signature_image' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (! $this->decodeSignature($value)) {
                        $fail('Please sign in the signature box before submitting.');
                    }
                },
            ],
            'attachments' => 'required|array|min:1|max:'.self::MAX_ATTACHMENTS,
            'attachments.*' => 'image|mimes:jpeg,jpg,png,webp|max:4096',
        ], [
            'cardholder_name.regex' => 'The cardholder name may only contain letters, spaces, periods, hyphens and apostrophes.',
            'state.size' => 'Please select your city and state from the suggestion list.',
            'zip.regex' => 'Please select your city, state and ZIP from the suggestion list.',
            'phone.regex' => 'Please enter a valid US phone number, e.g. (123) 456-7890.',
            'cvv.regex' => 'The security code must be 3 or 4 digits.',
            'attachments.required' => 'Please upload photos of your card and driving license.',
            'attachments.max' => 'You may upload at most '.self::MAX_ATTACHMENTS.' images.',
            'attachments.*.max' => 'Each image must be 4 MB or smaller.',
            'attachments.*.mimes' => 'Only JPG, PNG and WEBP images are accepted.',
        ]);
    }

    /**
     * Matches the submitted ZIP against the zipcodes table and returns the
     * canonical city/state for it, preferring the city the customer picked when
     * a ZIP maps to more than one.
     *
     * @return array{city: string, state: string, zip: string}
     */
    private function resolveLocation(string $zip, string $city, string $state): array
    {
        $matches = Zipcode::where('zipcode', $zip)->get(['city', 'state', 'zipcode']);

        if ($matches->isEmpty()) {
            throw ValidationException::withMessages([
                'zip' => 'We could not find that ZIP code. Please pick your location from the suggestion list.',
            ]);
        }

        $exact = $matches->first(
            fn ($row) => strcasecmp($row->city, $city) === 0 && strcasecmp($row->state, $state) === 0
        );

        $row = $exact ?? $matches->first();

        return [
            'city' => $row->city,
            'state' => strtoupper($row->state),
            'zip' => str_pad((string) $row->zipcode, 5, '0', STR_PAD_LEFT),
        ];
    }

    /**
     * @return string[] Public-relative paths of the stored images.
     */
    private function storeAttachments(Request $request): array
    {
        $destination = public_path(self::ATTACHMENT_DIRECTORY);

        if (! is_dir($destination) && ! mkdir($destination, 0755, true) && ! is_dir($destination)) {
            throw new \RuntimeException('Unable to create the attachment directory.');
        }

        $paths = [];

        foreach ($request->file('attachments', []) as $file) {
            $extension = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: 'jpg');

            if (! in_array($extension, ['jpeg', 'jpg', 'png', 'webp'], true)) {
                $extension = 'jpg';
            }

            $fileName = bin2hex(random_bytes(16)).'.'.$extension;
            $file->move($destination, $fileName);

            $paths[] = self::ATTACHMENT_DIRECTORY.'/'.$fileName;
        }

        return $paths;
    }

    /**
     * Writes the signature canvas out as a PNG file instead of parking a base64
     * blob in the database.
     */
    private function storeSignature(string $dataUri, int $quoteId): string
    {
        $binary = $this->decodeSignature($dataUri);

        if ($binary === null) {
            throw new \RuntimeException('The signature could not be read.');
        }

        $destination = public_path(self::SIGNATURE_DIRECTORY);

        if (! is_dir($destination) && ! mkdir($destination, 0755, true) && ! is_dir($destination)) {
            throw new \RuntimeException('Unable to create the signature directory.');
        }

        $fileName = 'quote-'.$quoteId.'-'.bin2hex(random_bytes(8)).'.png';

        if (file_put_contents($destination.DIRECTORY_SEPARATOR.$fileName, $binary) === false) {
            throw new \RuntimeException('Unable to write the signature file.');
        }

        return self::SIGNATURE_DIRECTORY.'/'.$fileName;
    }

    /**
     * Decodes a "data:image/png;base64,…" signature, rejecting anything that is
     * not a real PNG or is too small to be an actual scribble.
     */
    private function decodeSignature(string $dataUri): ?string
    {
        if (! preg_match('#^data:image/(png|jpeg);base64,([A-Za-z0-9+/=\s]+)$#', trim($dataUri), $matches)) {
            return null;
        }

        $binary = base64_decode(preg_replace('/\s+/', '', $matches[2]), true);

        // An untouched 400x200 canvas exports to roughly 1 KB; real signatures
        // land well above that.
        if ($binary === false || strlen($binary) < 1500 || strlen($binary) > 2 * 1024 * 1024) {
            return null;
        }

        // Confirm the bytes really are an image when GD is available; without the
        // extension the size and data-URI checks above are the guard.
        if (function_exists('imagecreatefromstring') && @imagecreatefromstring($binary) === false) {
            return null;
        }

        return $binary;
    }

    private function deleteFiles(array $paths): void
    {
        foreach ($paths as $path) {
            $full = public_path($path);

            if (is_file($full)) {
                @unlink($full);
            }
        }
    }

    private function notifyAdmin(Quote $quote): void
    {
        $recipient = config('mail.admin_address');

        if (empty($recipient)) {
            return;
        }

        try {
            // Deliberately carries no form data and no link — just a nudge to log in.
            Mail::send('emails.authFormNotification', ['quote' => $quote], function ($message) use ($recipient, $quote) {
                $message->to($recipient)
                    ->subject('Authorization Form Filled for Order #'.$quote->id);
            });
        } catch (\Throwable $e) {
            Log::error('Auth form notification email failed', [
                'quote_id' => $quote->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function purchaseDescription(Quote $quote): string
    {
        $description = $quote->vehicles
            ->map(fn ($v) => trim(implode(' ', array_filter([$v->year, $v->make, $v->model, $v->vin]))))
            ->filter()
            ->implode(', ');

        return $description !== '' ? $description : 'Vehicle transport services (Quote #'.$quote->id.')';
    }

    private function logActivity(string $logName, string $description, ?Quote $quote, array $properties = []): void
    {
        try {
            Activity::create([
                'log_name' => $logName,
                'description' => $description,
                'causer_type' => Auth::check() ? get_class(Auth::user()) : null,
                'causer_id' => Auth::id(),
                'subject_type' => Quote::class,
                'subject_id' => $quote?->id,
                'properties' => $properties,
            ]);
        } catch (\Throwable $e) {
            // Never let audit logging take down the request it is describing.
            Log::warning('Activity log write failed', ['log_name' => $logName, 'error' => $e->getMessage()]);
        }
    }

    /** Fields that must never survive into the session via withInput(). */
    private function sensitiveFields(): array
    {
        return ['card_number', 'cvv', 'expiry_date', 'signature_image', 'attachments'];
    }

    private function normalisePhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone);

        if (strlen($digits) === 11 && str_starts_with($digits, '1')) {
            $digits = substr($digits, 1);
        }

        return strlen($digits) === 10
            ? sprintf('(%s) %s-%s', substr($digits, 0, 3), substr($digits, 3, 3), substr($digits, 6))
            : $phone;
    }

    /**
     * Identifies the brand from the card's IIN range so the stored card_type
     * always agrees with the stored number.
     */
    private function detectCardBrand(string $digits): ?string
    {
        return match (true) {
            (bool) preg_match('/^4\d{12}(\d{3})?(\d{3})?$/', $digits) => 'Visa',
            (bool) preg_match('/^(5[1-5]\d{4}|222[1-9]\d{2}|22[3-9]\d{3}|2[3-6]\d{4}|27[01]\d{3}|2720\d{2})\d{10}$/', $digits) => 'Mastercard',
            (bool) preg_match('/^3[47]\d{13}$/', $digits) => 'American Express',
            (bool) preg_match('/^(6011\d{12}|65\d{14}|64[4-9]\d{13}|622(12[6-9]|1[3-9]\d|[2-8]\d{2}|9[01]\d|92[0-5])\d{10})$/', $digits) => 'Discover',
            default => null,
        };
    }

    private function assertCvvMatchesBrand(string $cvv, string $brand): void
    {
        $expected = $brand === 'American Express' ? 4 : 3;

        if (strlen($cvv) !== $expected) {
            throw ValidationException::withMessages([
                'cvv' => $brand === 'American Express'
                    ? 'American Express security codes are 4 digits.'
                    : 'The security code must be 3 digits for this card type.',
            ]);
        }
    }

    /**
     * Luhn check, after stripping any spaces left by the input mask.
     */
    private function isValidCardNumber(string $number): bool
    {
        $digits = preg_replace('/\D/', '', $number);

        if (strlen($digits) < 13 || strlen($digits) > 19) {
            return false;
        }

        $sum = 0;
        $alternate = false;

        for ($i = strlen($digits) - 1; $i >= 0; $i--) {
            $n = (int) $digits[$i];

            if ($alternate) {
                $n *= 2;
                if ($n > 9) {
                    $n -= 9;
                }
            }

            $sum += $n;
            $alternate = ! $alternate;
        }

        return $sum % 10 === 0;
    }

    /**
     * Confirms an "MM/YY" expiry string is a real month, is not already in the
     * past, and is not implausibly far in the future.
     */
    private function isCardNotExpired(string $expiry): bool
    {
        if (! preg_match('/^(0[1-9]|1[0-2])\/(\d{2})$/', $expiry, $matches)) {
            return false;
        }

        $month = (int) $matches[1];
        $year = 2000 + (int) $matches[2];

        $expiryDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        return $expiryDate->isFuture() && $expiryDate->lessThan(now()->addYears(20));
    }
}
