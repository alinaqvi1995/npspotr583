@extends('emails.layouts.app')

@section('title', "Discounted Price - Quote #{$quote->id}")
@section('header', 'Your Quote Price Has Been Updated')

@section('content')
    <!-- Greeting -->
    <p style="font-size:16px; color:#333; margin-bottom:15px;">
        Hello <strong>{{ $quote->customer_name }}</strong>,
    </p>

    <!-- Discount Update -->
    <p style="font-size:15px; color:#555; line-height:22px; margin-bottom:20px;">
        We’re excited to let you know that we’ve applied a
        <strong style="color:#28a745;">new discounted price</strong>
        to your quote <strong>#{{ $quote->id }}</strong>.
    </p>

    <!-- Highlight New Discounted Price -->
    <p
        style="font-size:15px; margin:20px 0; padding:14px 20px; background:#f0fff4; 
              border-left:4px solid #28a745; color:#333; border-radius:4px;">
        <strong>New Discounted Price:</strong>
        <span style="font-size:18px; font-weight:700; color:#28a745;">
            ${{ number_format($newPrice, 2) }}
        </span>
    </p>

    <p style="font-size:14px; color:#555; line-height:22px; margin-bottom:20px;">
        We hope this updated price makes your shipping experience even better. 🚚💨
    </p>

    <hr style="border:none; border-top:1px solid #e5e5e5; margin:35px 0;">

    <!-- Quote Summary -->
    <h3 style="margin-bottom:12px; font-size:18px; font-weight:600; color:#1a73e8;">
        Quote Summary
    </h3>
    <p style="font-size:14px; color:#444; margin-bottom:20px; line-height:22px;">
        <strong>Email:</strong> {{ $quote->customer_email }}<br>
        <strong>Phone:</strong> {{ $quote->customer_phone }}
    </p>

    <!-- Vehicles -->
    <h4 style="margin:20px 0 10px; font-size:16px; font-weight:600; color:#333;">
        Vehicles
    </h4>
    <ul style="margin:0; padding-left:20px; font-size:14px; color:#555; line-height:22px;">
        @foreach ($quote->vehicles as $vehicle)
            <li>{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</li>
        @endforeach
    </ul>

    <!-- Pickup -->
    <h4 style="margin:25px 0 10px; font-size:16px; font-weight:600; color:#333;">
        Pickup
    </h4>
    <p style="font-size:14px; color:#555; margin:0; line-height:22px;">
        {{ $quote->pickupLocation->full_location }} <br>
        <span style="color:#1a73e8;">{{ $quote->pickup_date_formatted }}</span>
    </p>

    <!-- Delivery -->
    <h4 style="margin:25px 0 10px; font-size:16px; font-weight:600; color:#333;">
        Delivery
    </h4>
    <p style="font-size:14px; color:#555; margin:0; line-height:22px;">
        {{ $quote->deliveryLocation->full_location }} <br>
        <span style="color:#1a73e8;">{{ $quote->delivery_date_formatted }}</span>
    </p>

    <!-- Footer Note -->
    <p style="margin-top:35px; font-size:13px; color:#777; line-height:20px; text-align:center;">
        If you have any questions, just reply to this email or call our support team. <br>
        We’re here to help anytime! 🤝
    </p>
@endsection
