<!DOCTYPE html>
<html>

<head>
    <title>Authorization Form</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="color: #0d6efd; text-align: center;">Credit Card Authorization Form</h2>

        <p>Dear Customer,</p>

        <p>Thank you for choosing <strong>Bridgeway Logistics LLC</strong>. To proceed with your order for Quote
            #{{ $quote->id }}, please complete the secure Credit Card Authorization Form by clicking the button
            below.</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('authorization.show', encrypt(['id' => $quote->id, 'amount' => $invoiceAmount])) }}"
                style="background-color: #0d6efd; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                Complete Authorization Form
            </a>
        </div>

        <p>If the button above does not work, please copy and paste the following link into your browser:</p>
        <p><a
                href="{{ route('authorization.show', encrypt(['id' => $quote->id, 'amount' => $invoiceAmount])) }}">{{ route('authorization.show', encrypt(['id' => $quote->id, 'amount' => $invoiceAmount])) }}</a>
        </p>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <p style="font-size: 12px; color: #777; text-align: center;">
            &copy; {{ date('Y') }} Bridgeway Logistics LLC. All rights reserved.<br>
            Please do not reply to this automated email.
        </p>
    </div>

</body>

</html>
