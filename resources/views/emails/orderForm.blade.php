<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Order Form - Quote #{{ $quote->id }}</title>
</head>

<body style="margin:0; padding:0; font-family: 'Segoe UI', Arial, sans-serif; background-color:#f4f5f7; color:#333;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
        <tr>
            <td align="center">
                <table width="650" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.1);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background:#1a73e8; padding:20px;">
                            <img src="{{ asset('web-assets/images/logo/logo_001.png') }}" alt="Logo"
                                style="max-height:60px; display:block; margin-bottom:10px;">
                            <h2 style="color:#ffffff; margin:0; font-weight:500;">Order Form</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:25px; font-size:15px; line-height:1.6;">
                            <p>Hello {{ $quote->customer_name }},</p>
                            <p>Please review your order form for Quote #<strong>{{ $quote->id }}</strong> by clicking
                                the link below:</p>

                            <p style="text-align:center; margin:30px 0;">
                                @php
                                    $encryptedId = encrypt($quote->id);
                                @endphp

                                <a href="{{ route('quotes.orderForm', ['encrypted' => $encryptedId]) }}"
                                    style="display:inline-block; background:#1a73e8; color:#ffffff; text-decoration:none; 
                                        padding:12px 25px; border-radius:5px; font-weight:500;">
                                    View Order Form
                                </a>
                            </p>

                            <hr style="border:none; border-top:1px solid #eee; margin:30px 0;">

                            <h3 style="margin-bottom:10px; font-weight:500;">Quote Details</h3>
                            <p>
                                <strong>Customer Email:</strong> {{ $quote->customer_email }}<br>
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
                            <p>{{ $quote->deliveryLocation->full_location }} <br>{{ $quote->delivery_date_formatted }}
                            </p>

                            <p style="margin-top:30px; font-size:13px; color:#777;">If you have any questions, please
                                contact us directly.</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background:#f4f5f7; padding:15px; font-size:12px; color:#999;">
                            &copy; {{ date('Y') }} Your Company. All rights reserved.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
