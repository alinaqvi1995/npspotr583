<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Authorization Form | Bridgeway Logistics LLC</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('invoice-assets/css/bootstrap.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('invoice-assets/css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .auth-container {
            max-width: 900px;
            margin: 40px auto;
        }

        /* Read-only styles to match form look */
        .form-control:disabled,
        .form-control[readonly] {
            background-color: #f8f9fa;
            /* slightly darker than white */
            opacity: 1;
            border: 1px solid #dee2e6;
            color: #212529;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container auth-container">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    {{-- <img src="{{ asset('web-assets/images/logo/1-logo.png') }}" alt="Logo" width="150" class="mb-3"> --}}
                    <h3 class="fw-bold text-primary">Credit Card Authorization Form</h3>
                    <p class="text-muted">Submitted on
                        {{ \Carbon\Carbon::parse($authForm->created_at)->format('F j, Y, g:i a') }}</p>
                </div>

                <form>
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="text" class="form-control" value="{{ $authForm->auth_date }}" readonly>
                        </div>

                        {{-- <div class="col-md-12">
                            <div class="alert alert-success border-success">
                                <i class="material-icons-outlined align-middle me-1">check_circle</i>
                                This form was successfully submitted and authorized for <strong>Bridgeway Logistics
                                    LLC</strong>.
                            </div>
                        </div> --}}

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">This form is for the purchase of</label>
                            <input type="text" class="form-control" value="{{ $authForm->purchase_for }}" readonly>
                            <small class="text-muted">Vehicle information from Quote #{{ $authForm->quote_id }}</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Company Name</label>
                            <input type="text" class="form-control" value="{{ $authForm->company_name ?? '-' }}"
                                readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Cardholder's Name (As on Card)</label>
                            <input type="text" class="form-control" value="{{ $authForm->cardholder_name }}"
                                readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Billing Address</label>
                            <input type="text" class="form-control" value="{{ $authForm->billing_address }}"
                                readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">City</label>
                            <input type="text" class="form-control" value="{{ $authForm->city }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">State</label>
                            <input type="text" class="form-control" value="{{ $authForm->state }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Zip Code</label>
                            <input type="text" class="form-control" value="{{ $authForm->zip }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="text" class="form-control" value="{{ $authForm->phone }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">IP Address</label>
                            <input type="text" class="form-control" value="{{ $authForm->ip_address }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Card Type</label>
                            <input type="text" class="form-control" value="{{ $authForm->card_type }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Card Number</label>
                            <input type="text" class="form-control"
                                value="**** **** **** {{ substr($authForm->card_number, -4) }}" readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Expiration Date</label>
                            <input type="text" class="form-control" value="{{ $authForm->expiry_date }}" readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Security Code (CVV)</label>
                            <input type="text" class="form-control" value="{{ $authForm->cvv }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Issuing Bank</label>
                            <input type="text" class="form-control" value="{{ $authForm->issuing_bank ?? '-' }}"
                                readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Bank Phone Number</label>
                            <input type="text" class="form-control" value="{{ $authForm->bank_number ?? '-' }}"
                                readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Invoice Amount ($)</label>
                            <input type="text" class="form-control fw-bold text-success fs-5"
                                value="${{ number_format($authForm->invoice_amount, 2) }}" readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Attachments (ID/Card)</label>
                            <div class="d-flex flex-wrap gap-3 p-3 border rounded bg-light">
                                @if (is_array($authForm->attachments) && count($authForm->attachments) > 0)
                                    @foreach ($authForm->attachments as $path)
                                        <a href="{{ asset($path) }}" target="_blank"
                                            class="d-inline-block border rounded overflow-hidden shadow-sm"
                                            style="width: 120px; height: 120px;">

                                            <img src="{{ asset($path) }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </a>
                                    @endforeach
                                @else
                                    <span class="text-muted fst-italic">No attachments found.</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Cardholder’s Signature</label>

                            <div class="border rounded p-2 bg-white" style="width:100%; max-width:400px;">
                                <img src="{{ $authForm->signature_image }}" alt="Signature" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-3 small">&copy; {{ date('Y') }} Bridgeway Logistics LLC. All rights
            reserved.</p>
    </div>
        <!-- Jquery -->
        <script src="{{ asset('invoice-assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('invoice-assets/js/bootstrap.min.js') }}"></script>
        <!-- PDF Generator -->
        <script src="{{ asset('invoice-assets/js/jspdf.min.js') }}"></script>
        <script src="{{ asset('invoice-assets/js/html2canvas.min.js') }}"></script>
        <!-- Main Js File -->
        <script src="{{ asset('invoice-assets/js/main.js') }}"></script>
</body>

</html>
