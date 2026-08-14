@extends('emails.layouts.app')

@section('title', 'New Contact Enquiry - Bridgeway Logistics LLC')
@section('header', 'New Contact Enquiry')

@section('content')
    <div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
        <h2 style="color: #0d6efd; text-align: center;">New Contact Enquiry</h2>

        <p>You have received a new message from the website contact form.</p>

        <p><strong>Name:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
        <p><strong>SMS Consent:</strong> {{ $data['sms_consent'] ? 'Yes' : 'No' }}</p>
        <p><strong>Submitted At:</strong> {{ now()->format('M d, Y h:i A') }}</p>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <p><strong>Message:</strong></p>
        <p style="white-space: pre-line;">{{ $data['message'] }}</p>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <p style="font-size: 13px; color: #777; text-align: center;">
            This is an automated notification from the website contact form.
        </p>
    </div>
@endsection
