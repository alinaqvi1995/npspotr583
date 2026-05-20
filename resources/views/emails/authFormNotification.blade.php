@extends('emails.layouts.app')

@section('title', 'Authorization Form Submitted - Bridgeway Logistics LLC')
@section('header', 'Authorization Form Notification')

@section('content')
    <div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
        <h2 style="color: #0d6efd; text-align: center;">Authorization Form Submitted</h2>

        <p>Hello,</p>

        <p>An authorization form has been filled and submitted for <strong>Order #{{ $quote->id }}</strong>.</p>

        <p><strong>Customer Name:</strong> {{ $quote->customer_name ?? 'N/A' }}</p>
        <p><strong>Submitted At:</strong> {{ now()->format('M d, Y h:i A') }}</p>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <p style="font-size: 13px; color: #777; text-align: center;">
            This is an automated notification. Please log in to the dashboard to review the details.
        </p>
    </div>
@endsection
