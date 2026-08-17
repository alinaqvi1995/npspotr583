<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\AuthorizationForm;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\QuotePayment;

class AuthorizationFormController extends Controller
{
    public function sendAuthForm(Request $request)
    {
        $validated = $request->validate([
            'quote_id' => 'required|exists:quotes,id',
            'email' => 'required|email',
            'invoice_amount' => 'nullable|numeric|min:0',
        ]);

        try {
            $quote = Quote::findOrFail($validated['quote_id']);
            $email = $validated['email'];
            $invoiceAmount = $validated['invoice_amount'] ?? $quote->amount_to_pay;

            // Send Email
            Mail::send('emails.authForm', ['quote' => $quote, 'invoiceAmount' => $invoiceAmount], function ($message) use ($email, $quote) {
                $message->to($email)
                    ->subject('Authorization Form for Quote #'.$quote->id);
            });

            // Log Activity
            Activity::create([
                'log_name' => 'Send_AuthForm',
                'description' => "Authorization form for Quote #{$quote->id} sent to {$email}",
                'causer_type' => Auth::check() ? get_class(Auth::user()) : null,
                'causer_id' => Auth::id(),
                'subject_type' => Quote::class,
                'subject_id' => $quote->id,
                'properties' => [
                    'to_email' => $email,
                    'invoice_amount' => $validated['invoice_amount'] ?? null,
                ],
            ]);

            return back()->with('success', 'Authorization form sent successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send email: '.$e->getMessage()]);
        }
    }

    public function show($encrypted)
    {
        try {
            $decrypted = decrypt($encrypted);

            if (is_array($decrypted)) {
                $quoteId = $decrypted['id'];
                $amount = $decrypted['amount'] ?? null;
            } else {
                $quoteId = $decrypted; // Old links support
                $amount = null;
            }

            $quote = Quote::findOrFail($quoteId);

            // Override amount_to_pay locally if passed in payload
            if ($amount !== null) {
                $quote->amount_to_pay = $amount;
            }

        } catch (\Exception $e) {
            abort(404);
        }

        if ($quote->authorizationForm()->exists()) {
            return redirect()
                ->route('home')
                ->with('success', 'An authorization form has already been submitted.');
        }

        return view('dashboard.quotes.authForm', compact('quote', 'encrypted'));
    }

    public function store(Request $request, $encrypted)
    {
        try {
            $decrypted = decrypt($encrypted);

            if (is_array($decrypted)) {
                $quoteId = $decrypted['id'];
            } else {
                $quoteId = $decrypted;
            }

            $quote = Quote::findOrFail($quoteId);
        } catch (\Exception $e) {
            abort(404);
        }

        if ($quote->authorizationForm()->exists()) {
            return redirect()
                ->route('home')
                ->with('success', 'An authorization form has already been submitted.');
        }

        $validated = $request->validate([
            'auth_date' => 'required|date',
            'purchase_for' => 'required|string',
            'company_name' => 'nullable|string|max:255',
            'cardholder_name' => 'required|string|max:255|regex:/^[a-zA-Z\s.\-\']+$/',
            'billing_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|regex:/^\d{5}(-\d{4})?$/',
            'phone' => 'required|regex:/^\(?\d{3}\)?[\s.\-]?\d{3}[\s.\-]?\d{4}$/',
            'card_type' => 'required|in:Visa,Mastercard,American Express,Discover',
            'card_number' => [
                'required',
                'regex:/^[\d\s]{12,23}$/',
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
            'cvv' => 'required|regex:/^\d{3,4}$/',
            'issuing_bank' => 'nullable|string|max:255',
            'bank_number' => 'nullable|string|max:20',
            'invoice_amount' => 'required|numeric|min:0.01',
            'signature_image' => 'required',
            'attachments' => 'required|array',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Strip spaces left over from the card-number input mask before persisting
        $validated['card_number'] = preg_replace('/\D/', '', $validated['card_number']);

        try {
            $attachments = [];

            if ($request->hasFile('attachments')) {

                $destinationPath = public_path('quote/authorization_attachments');

                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                foreach ($request->file('attachments') as $file) {
                    $fileName = uniqid().'_'.time().'.'.$file->getClientOriginalExtension();
                    $file->move($destinationPath, $fileName);
                    $path = 'quote/authorization_attachments/'.$fileName;
                    $attachments[] = $path;
                }
            }

            AuthorizationForm::create([
                'quote_id' => $quote->id,
                'auth_date' => now()->toDateString(),
                'purchase_for' => $validated['purchase_for'],
                'company_name' => $validated['company_name'],
                'cardholder_name' => $validated['cardholder_name'],
                'billing_address' => $validated['billing_address'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'zip' => $validated['zip'],
                'phone' => $validated['phone'],
                'card_type' => $validated['card_type'],
                'card_number' => $validated['card_number'],
                'expiry_date' => $validated['expiry_date'],
                'cvv' => $validated['cvv'],
                'issuing_bank' => $validated['issuing_bank'],
                'bank_number' => $validated['bank_number'],
                'invoice_amount' => $validated['invoice_amount'],
                'signature_image' => $validated['signature_image'],
                'attachments' => $attachments,
                'ip_address' => $request->ip(),
            ]);

            QuotePayment::create([
                'quote_id' => $quote->id,
                'amount'   => $validated['invoice_amount'],
                'channel'  => 'Card Authorization',
                'status'   => 'Authorized',
                'notes'    => 'Automated entry from Authorization Form',
            ]);

            // Send notification email to admin (no form data or link shared)
            try {
                Mail::send('emails.authFormNotification', ['quote' => $quote], function ($message) use ($quote) {
                    $message->to('bridgewayuship@gmail.com')
                        ->subject('Authorization Form Filled for Order #' . $quote->id);
                });
            } catch (\Exception $mailException) {
                // Log mail failure but don't block the user's success flow
                \Log::error('Auth form notification email failed: ' . $mailException->getMessage());
            }

            return redirect()->route('frontend.thankyou')->with('success', 'Authorization form submitted successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Submission failed: '.$e->getMessage()])->withInput();
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
     * Confirms an "MM/YY" expiry string is a real month and is not already in the past.
     */
    private function isCardNotExpired(string $expiry): bool
    {
        if (! preg_match('/^(0[1-9]|1[0-2])\/(\d{2})$/', $expiry, $matches)) {
            return false;
        }

        $month = (int) $matches[1];
        $year = 2000 + (int) $matches[2];

        $expiryDate = \Carbon\Carbon::createFromDate($year, $month, 1)->endOfMonth();

        return $expiryDate->isFuture();
    }

    public function view($id)
    {
        /** @var User $user */
        $user = Auth::user();
        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized access.');
        }

        $authForm = AuthorizationForm::with('quote')->findOrFail($id);

        return view('dashboard.quotes.view_auth_form', compact('authForm'));
    }
}
