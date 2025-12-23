<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\AuthorizationForm;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            'auth_date' => 'required',
            'purchase_for' => 'required',
            'company_name' => 'nullable',
            'cardholder_name' => 'required',
            'billing_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'card_type' => 'required',
            'card_number' => 'required',
            'expiry_date' => 'required',
            'cvv' => 'required',
            'issuing_bank' => 'nullable',
            'bank_number' => 'nullable',
            'invoice_amount' => 'required|numeric',
            'signature_image' => 'required',
            'attachments' => 'required|array',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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

            return redirect()->route('frontend.thankyou')->with('success', 'Authorization form submitted successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Submission failed: '.$e->getMessage()])->withInput();
        }
    }

    public function view($id)
    {
        $authForm = AuthorizationForm::with('quote')->findOrFail($id);

        return view('dashboard.quotes.view_auth_form', compact('authForm'));
    }
}
