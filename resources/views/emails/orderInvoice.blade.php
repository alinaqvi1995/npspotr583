@extends('emails.layouts.app')

@section('title', "Order Form - Quote #{$quote->id}")
@section('header', 'Order Form')

@section('content')
    <p style="font-size:16px; color:#333; margin-bottom:15px;">
        Hello <strong>{{ $quote->customer_name }}</strong>,
    </p>

    <p style="font-size:15px; color:#555; line-height:22px; margin-bottom:25px;">
        Please review your order form for Quote 
        <strong style="color:#1a73e8;">#{{ $quote->id }}</strong> 
        by clicking the button below:
    </p>

    <p style="text-align:center; margin:30px 0;">
        @php $encryptedId = encrypt($quote->id); @endphp

        <a href="{{ route('quotes.orderForm', ['encrypted' => $encryptedId]) }}"
            style="display:inline-block; background:#1a73e8; color:#ffffff; text-decoration:none; 
                   padding:14px 28px; border-radius:6px; font-weight:600; 
                   font-size:15px; letter-spacing:0.3px;">
            🔗 View Order Form
        </a>
    </p>

    <hr style="border:none; border-top:1px solid #e5e5e5; margin:35px 0;">

    <!-- Quote Details -->
    <h3 style="margin-bottom:12px; font-size:18px; font-weight:600; color:#1a73e8;">
        Quote Details
    </h3>
    <p style="font-size:14px; color:#444; margin-bottom:20px; line-height:22px;">
        <strong>Customer Email:</strong> {{ $quote->customer_email }} <br>
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
        If you have any questions, please contact us directly. <br>
        We’re always happy to help! 💬
    </p>
@endsection