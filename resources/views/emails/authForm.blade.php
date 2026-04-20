@extends('emails.layouts.app')

@section('title', 'Authorization Form - Bridgeway Logistics LLC')
@section('header', 'Authorization Form')

@section('content')
    <div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
        <h2 style="color: #0d6efd; text-align: center;">Credit Card Authorization Form</h2>

        <p>Dear Customer,</p>

        <p>Thank you for choosing <strong>Bridgeway Logistics LLC</strong>. To proceed with your order for Quote
            #{{ $quote->id }}, please complete the secure Credit Card Authorization Form by clicking the button
            below.</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('authorization.show', encrypt(['id' => $quote->id, 'amount' => $invoiceAmount])) }}"
                style="background-color: #0d6efd; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                Complete Authorization Form
            </a>
        </div>

        <p>If the button above does not work, please copy and paste the following link into your browser:</p>
        <p style="word-break: break-all;">
            <a href="{{ route('authorization.show', encrypt(['id' => $quote->id, 'amount' => $invoiceAmount])) }}">
                {{ route('authorization.show', encrypt(['id' => $quote->id, 'amount' => $invoiceAmount])) }}
            </a>
        </p>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <p style="font-size: 13px; color: #777; text-align: center;">
            Please do not reply to this automated email. For any assistance, feel free to contact us.
        </p>
    </div>
@endsection

