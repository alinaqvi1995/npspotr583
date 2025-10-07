<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderForm;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\DB;

class OrderFormController extends Controller
{
    public function index()
    {
        $orderForms = OrderForm::with(['quote.pickupLocation', 'quote.deliveryLocation'])->latest()->get();

        return view('dashboard.orderForm.index', compact('orderForms'));
    }

    public function show(OrderForm $orderForm)
    {
        $orderForm->load(['quote.pickupLocation', 'quote.deliveryLocation']);

        return view('dashboard.orderForm.show', compact('orderForm'));
    }

    // public function download(OrderForm $orderForm)
    // {
    //     $orderForm->load(['quote.pickupLocation', 'quote.deliveryLocation']);

    //     $pdf = \PDF::loadView('dashboard.orderForms.pdf', compact('orderForm'));

    //     return $pdf->download("order_form_{$orderForm->id}.pdf");
    // }

    public function sendOrderForm(Request $request)
    {
        // ✅ Validate upfront
        $validated = $request->validate([
            'quote_id' => 'required|exists:quotes,id',
            'email'    => 'required|email',
            'amount_to_pay'    => 'required',
        ]);

        try {
            // ✅ Fetch the quote safely
            $quote = Quote::findOrFail($validated['quote_id']);
            $quote->amount_to_pay = $validated['amount_to_pay'];
            $quote->save();

            // ✅ Send mail (with catch for failures)
            try {
                Mail::send('emails.orderForm', ['quote' => $quote], function ($message) use ($validated, $quote) {
                    $message->to($validated['email'])
                        ->subject('Order Form for Quote #' . $quote->id);

                    // Attach/embed logo if exists
                    $logoPath = public_path('web-assets/images/logo/1-logo.png');
                    if (file_exists($logoPath)) {
                        $message->embed($logoPath, 'logo');
                    }
                });

                $mailStatus = 'success';
                $mailError  = null;
            } catch (\Exception $e) {
                // If email sending fails, don’t crash
                $mailStatus = 'failed';
                $mailError  = $e->getMessage();
            }

            // ✅ Log the attempt regardless of outcome
            Activity::create([
                'log_name'     => 'Send_OrderForm',
                'description'  => "Order form for Quote #{$quote->id} sent to {$validated['email']} ({$mailStatus})",
                'causer_type'  => Auth::check() ? get_class(Auth::user()) : null,
                'causer_id'    => Auth::id(),
                'subject_type' => Quote::class,
                'subject_id'   => $quote->id,
                'properties'   => [
                    'to_email'   => $validated['email'],
                    'sender_ip'  => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'status'     => $mailStatus,
                    'error'      => $mailError,
                ],
            ]);

            // ✅ User feedback
            if ($mailStatus === 'success') {
                return back()->with('success', 'Order form email sent successfully.');
            }

            return back()->withErrors(['email' => 'Could not send order form email. Please try again later.']);
        } catch (\Exception $e) {
            return back()->withErrors([
                'general' => 'Something went wrong while processing your request. Please try again later.'
            ]);
        }
    }

    public function orderForm($encrypted)
    {
        try {
            $quoteId = decrypt($encrypted);
            $quote = Quote::findOrFail($quoteId);
        } catch (\Exception $e) {
            abort(404);
        }

        if ($quote->orderForm()->exists()) {
            // ⚠️ Optionally redirect to a “thank you” page instead of back
            return redirect()
                ->route('home')
                ->with('success', 'This order form has already been submitted.');
        }

        return view('site.quote.orderForm', compact('quote', 'encrypted'));
    }

    public function submitOrderForm(Request $request, $encrypted)
    {
        try {
            $quoteId = decrypt($encrypted);
            $quote   = Quote::findOrFail($quoteId);
        } catch (\Exception $e) {
            abort(404);
        }

        if ($quote->orderForm()->exists()) {
            return redirect()
                ->route('thankyou')
                ->with('info', 'This order form has already been submitted.');
        }

        $validated = $request->validate([
            'customer_name'          => 'required|string|max:255',
            'customer_email'         => 'required|email',
            'customer_phone'         => 'nullable|string|max:50',
            'pickup_address1'        => 'required|string|max:255',
            'pickup_contact_name'    => 'required|string|max:255',
            'pickup_contact_email'   => 'nullable|email',
            'pickup_date'            => 'required|date',
            'delivery_address1'      => 'required|string|max:255',
            'delivery_contact_name'  => 'required|string|max:255',
            'delivery_contact_email' => 'nullable|email',
            'delivery_date'          => 'required|date',
            'special_instructions'   => 'nullable|string',
            'payment_option'         => 'required|string|in:now,later',
            'signature_name'         => 'required|string|max:255',
            'signature_date'         => 'required|date',
            'stripeToken'            => 'nullable|string',
        ]);

        $validated['quote_id'] = $quote->id;

        // ✅ transaction so either everything succeeds or nothing is saved
        DB::beginTransaction();

        try {
            if ($validated['payment_option'] === 'later') {
                // just create order without charging
                $orderForm = OrderForm::create($validated);
                $quote->status = 'Payment Missing';
            } else {
                // Stripe payment first
                \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
                $amount = round($quote->amount * 0.10 * 100);

                $charge = \Stripe\Charge::create([
                    'amount' => $amount,
                    'currency' => 'usd',
                    'source' => $validated['stripeToken'],
                    'description' => '10% deposit for Quote #' . $quote->id,
                    'receipt_email' => $validated['customer_email'],
                ]);

                // only create orderForm if charge succeeded
                $orderForm = OrderForm::create($validated + [
                    'stripe_charge_id' => $charge->id,
                    'paid_amount'      => $amount / 100,
                ]);

                $quote->status = 'Booked';
            }
            
            $quote->pickup_address1 = $validated['pickup_address1'];
            $quote->delivery_address1 = $validated['delivery_address1'];
            $quote->save();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'payment' => 'Something went wrong: ' . $e->getMessage()
            ])->withInput();
        }

        return redirect()
            ->route('home')
            ->with('success', 'Your order has been submitted successfully.');
    }

    // public function submitOrderForm(Request $request, $encrypted)
    // {
    //     try {
    //         $quoteId = decrypt($encrypted);
    //         $quote   = Quote::findOrFail($quoteId);
    //     } catch (\Exception $e) {
    //         abort(404);
    //     }

    //     if ($quote->orderForm()->exists()) {
    //         return redirect()
    //             ->route('thankyou')
    //             ->with('info', 'This order form has already been submitted.');
    //     }

    //     $validated = $request->validate([
    //         'customer_name'          => 'required|string|max:255',
    //         'customer_email'         => 'required|email',
    //         'customer_phone'         => 'nullable|string|max:50',
    //         'pickup_address1'        => 'required|string|max:255',
    //         'pickup_contact_name'    => 'required|string|max:255',
    //         'pickup_contact_email'   => 'nullable|email',
    //         'pickup_date'            => 'required|date',
    //         'delivery_address1'      => 'required|string|max:255',
    //         'delivery_contact_name'  => 'required|string|max:255',
    //         'delivery_contact_email' => 'nullable|email',
    //         'delivery_date'          => 'required|date',
    //         'special_instructions'   => 'nullable|string',
    //         'payment_option'         => 'required|string|in:now,later',
    //         'signature_name'         => 'required|string|max:255',
    //         'signature_date'         => 'required|date',
    //     ]);

    //     $validated['quote_id'] = $quote->id;

    //     try {
    //         OrderForm::create($validated);

    //         if ($validated['payment_option'] === 'later') {
    //             $quote->status = 'Payment Missing';
    //         } else {
    //             $quote->status = 'Booked';
    //         }

    //         $quote->save();
    //     } catch (\Exception $e) {
    //         return back()->withErrors([
    //             'db' => 'Could not save order form: ' . $e->getMessage()
    //         ])->withInput();
    //     }

    //     return redirect()
    //         ->route('home')
    //         ->with('success', 'Your order has been submitted successfully.');
    // }
}
