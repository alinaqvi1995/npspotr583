<?php

namespace App\Observers;

use App\Models\Quote;
use Illuminate\Support\Facades\Mail;

class QuoteObserver
{
    /**
     * Handle the Quote "updated" event.
     */
    public function updated(Quote $quote): void
    {
        // Only act if the status actually changed
        if ($quote->isDirty('status')) {
            $newStatus = $quote->status;

            if (!empty($quote->customer_email)) {
                Mail::send('emails.statusChange', ['quote' => $quote], function ($message) use ($quote, $newStatus) {
                    $message->to($quote->customer_email)
                        ->subject("Update on Your Quote #{$quote->id} - Status: {$newStatus}");
                });
            }
        }

        if ($quote->isDirty('discounted_price')) {
            $newPrice = $quote->discounted_price;

            if (!empty($quote->customer_email)) {
                Mail::send('emails.discountedPrice', ['quote' => $quote, 'newPrice' => $newPrice], function ($message) use ($quote, $newPrice) {
                    $message->to($quote->customer_email)
                        ->subject("Good News! Your Quote #{$quote->id} Has a New Discounted Price");
                });
            }
        }
    }
}
