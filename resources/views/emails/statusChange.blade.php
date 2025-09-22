@extends('emails.layouts.app')

@section('title', "Quote Update - Quote #{$quote->id}")
@section('header', 'Your Quote Has Been Updated')

@section('content')
    <p>Hello {{ $quote->customer_name }},</p>

    <p>
        We wanted to let you know that your quote <strong>#{{ $quote->id }}</strong> has been updated.
    </p>

    <p>
        <strong>Current Status:</strong> {{ $quote->status }}
    </p>

    @if (in_array($quote->status, ['Booked', 'Dispatch', 'Pickup', 'Delivery']))
        <p>
            Our team will keep you informed as your order progresses.
        </p>
    @elseif($quote->status === 'Completed')
        <p>
            Thank you for choosing us! Your order has been successfully completed.
        </p>
    @elseif($quote->status === 'Cancelled')
        <p>
            Your order has been cancelled. If this is unexpected, please contact us immediately.
        </p>
    @else
        <p>
            We’ll keep you updated on the next steps.
        </p>
    @endif

    <hr style="border:none; border-top:1px solid #eee; margin:30px 0;">

    <h3 style="margin-bottom:10px; font-weight:500;">Quote Summary</h3>
    <p>
        <strong>Email:</strong> {{ $quote->customer_email }}<br>
        <strong>Phone:</strong> {{ $quote->customer_phone }}
    </p>

    <h4 style="margin-bottom:10px; font-weight:500;">Vehicles</h4>
    <ul style="margin:0; padding-left:20px;">
        @foreach ($quote->vehicles as $vehicle)
            <li>{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</li>
        @endforeach
    </ul>

    <h4 style="margin-top:20px; font-weight:500;">Pickup</h4>
    <p>{{ $quote->pickupLocation->full_location }} <br>{{ $quote->pickup_date_formatted }}</p>

    <h4 style="margin-top:20px; font-weight:500;">Delivery</h4>
    <p>{{ $quote->deliveryLocation->full_location }} <br>{{ $quote->delivery_date_formatted }}</p>

    <p style="margin-top:30px; font-size:13px; color:#777;">
        If you have any questions, just reply to this email or call our support team.
    </p>
@endsection
