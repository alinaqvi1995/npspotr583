<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Authorization Form | Bridgeway Logistics LLC</title> --}}
    <title>Authorization Form | Bridgeway Logistics LLC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('web-assets/images/logo/1-logo.png') }}" type="image/png">
    <!-- Bootstrap  v5.1.3 css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/bootstrap.min.css') }}" />
    <!-- Meanmenu  css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/meanmenu.css') }}" />
    <!-- Sal css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/sal.css') }}" />
    <!-- Magnific css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/magnific-popup.css') }}" />
    <!-- Swiper Slider css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/swiper.min.css') }}" />
    <!-- Carousel css file -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/owl.carousel.css') }}" />
    <!-- Icons css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/icons.css') }}" />
    <!-- Odometer css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/odometer.min.css') }}" />
    <!-- Select css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/nice-select.css') }}" />
    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/animate.css') }}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/style.css') }}" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/responsive.css') }}" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .letterhead {
            border: 2px solid #427ece;
            padding: 20px 40px;
            max-width: 1000px;
            margin: 30px auto;
        }

        .letterhead-header {
            border-bottom: 2px solid #427ece;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .letterhead-header img {
            height: 70px;
            margin-right: 20px;
        }

        .company-info {
            flex: 1;
        }

        .company-info h1 {
            margin: 0;
            font-size: 1.8rem;
            color: #427ece;
            font-weight: 700;
        }

        .company-info p {
            margin: 0;
            font-size: 0.9rem;
            color: #555;
        }

        .letterhead-footer {
            border-top: 2px solid #427ece;
            padding-top: 10px;
            margin-top: 30px;
            text-align: center;
            font-size: 0.85rem;
            color: #666;
        }

        .section-title {
            font-weight: 600;
            color: #427ece;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .stepContainer span {
            background: #427ece;
            color: #fff;
            border-radius: 50%;
            padding: 6px 12px;
            font-weight: 600;
            margin-right: 10px;
        }

        .btn-success {
            background-color: #427ece !important;
            border-color: #427ece !important;
        }

        /* location suggestion dropdown — overlays rather than pushing the form */
        .suggestions-box {
            position: absolute;
            top: calc(100% + 2px);
            left: 0;
            right: 0;
            width: 100%;
            height: auto;
            padding: 0;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            max-height: 220px;
            overflow-y: auto;
            z-index: 9999;
            display: none;
        }

        .suggestions-box div {
            padding: 8px 12px;
            cursor: pointer;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .suggestions-box div:hover {
            background: #f0f0f0;
        }

        select option {
            white-space: nowrap;
        }

        /* pickup delivery suggestion end */
    </style>
    <style>
        /* Container */
        .order-form-wrapper {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
            max-width: 1100px;
            margin: 30px auto;
        }

        /* Header */
        .order-form-header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e5eaf2;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .order-form-header img {
            height: 60px;
            margin-right: 15px;
        }

        .order-form-header .company-info h1 {
            font-size: 1.6rem;
            margin: 0;
            font-weight: 700;
            color: #1e3a8a;
            /* logiland’s blue shade */
        }

        .order-form-header .company-info p {
            font-size: 0.9rem;
            margin: 2px 0;
            color: #6b7280;
        }

        /* Step Title */
        .stepContainer {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 1.05rem;
            margin-bottom: 15px;
            color: #1e3a8a;
        }

        .stepContainer span {
            background: #1e3a8a;
            color: #fff;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 0.9rem;
        }

        /* Card-style sections */
        .order-section {
            background: #f9fafb;
            border: 1px solid #e5eaf2;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }

        /* Inputs */
        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #d1d5db;
            padding: 10px 14px;
            font-size: 0.95rem;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 6px;
            color: #374151;
        }

        /* Buttons */
        .btn-success {
            background: #1e3a8a !important;
            border-color: #1e3a8a !important;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-success:hover {
            background: #0f235a !important;
            border-color: #0f235a !important;
        }

        /* Vehicle images */
        .vehicle-images img {
            border-radius: 6px;
            border: 1px solid #e5eaf2;
        }

        /* Footer */
        .order-form-footer {
            border-top: 1px solid #e5eaf2;
            margin-top: 25px;
            padding-top: 12px;
            text-align: center;
            font-size: 0.85rem;
            color: #6b7280;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .order-form-wrapper {
                padding: 20px;
                margin: 15px;
            }

            .order-form-header {
                flex-direction: column;
                text-align: center;
            }

            .order-form-header img {
                margin: 0 0 10px 0;
            }
        }

        /* Typography */
        body {
            font-family: var(--tj-ff-body);
            color: var(--tj-body-color);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--tj-ff-title);
            color: var(--tj-secondary-color);
        }

        /* Map Bootstrap utilities to theme */
        .text-primary {
            color: var(--tj-primary-color) !important;
        }

        .bg-primary {
            background-color: var(--tj-primary-color) !important;
        }

        .border-primary {
            border-color: var(--tj-primary-color) !important;
        }

        /* Muted text */
        .text-muted {
            color: var(--tj-gray-color) !important;
        }

        /* Buttons */
        .tj-primary-btn {
            background-color: var(--tj-primary-color);
            color: var(--tj-white-color);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .tj-primary-btn:hover {
            background-color: var(--tj-primary-color3);
            /* darker shade */
        }

        /* Badges */
        .badge.bg-primary {
            background-color: var(--tj-primary-color) !important;
            color: var(--tj-white-color);
        }

        /* Cards */
        .card {
            border: 1px solid var(--tj-gray-color3);
            border-radius: 10px;
        }

        .card-header {
            background-color: var(--tj-primary-color2);
            color: var(--tj-primary-color3);
            font-weight: 600;
        }

        /* Footer */
        .footer-text {
            color: var(--tj-gray-color7);
        }

        .tabs-box .tab-content-1 {
            position: relative;
            max-width: 1250px;
            border-radius: 30px;
            background: var(--tj-white-color);
            box-shadow: 0px 0px 35px 0px rgba(0, 0, 0, 0.1);
            padding: 50px 45px 60px;
        }
    </style>
</head>

<body>
    <section class="tj-service-section-three pt-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape"> Authorization Form | Bridgeway Logistics LLC </span>
                    <h2 class="title">Complete Your Order Form</h2>
                    <p class="mt-2 text-muted">
                        Please review your details carefully and fill out the required information to confirm your
                        transport booking.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container auth-container">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <img src="{{ asset('web-assets/images/logo/logo_004.jpeg') }}" alt="Logo" width="180" class="mb-3">
                    <h3 class="fw-bold text-primary">Credit Card Authorization Form</h3>
                    <p class="text-muted">Please complete the form below to authorize the transaction.</p>
                </div> --}}
    <section class="tj-cta-section-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-box">
                        <div class="tab-content-1" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="container-sm my-5">
                                            <!-- Company Header -->
                                            <div class="row align-items-center border-bottom pb-3 mb-4">
                                                <!-- Logo -->
                                                <div class="col-12 col-md-auto text-center text-md-start mb-3 mb-md-0">
                                                    <img src="{{ asset('web-assets/images/logo/1-logo.png') }}"
                                                        alt="Company Logo" class="img-fluid" style="max-height:70px;">
                                                </div>

                                                <!-- Company Info -->
                                                <div class="col text-md-end">
                                                    <h1 class="h4 fw-bold text-primary mb-1">Bridgeway Logistics LLC
                                                    </h1>
                                                    <p class="mb-0 small text-muted">
                                                        5402 Renwick Dr Apt 902, Houston, TX 77081
                                                    </p>
                                                    <p class="mb-0 small text-muted">
                                                        Email: sales@bridgewaylogisticsllc.com | Phone: +1 713-470-6157
                                                    </p>
                                                </div>
                                            </div>
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="mb-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <form id="authorizationForm"
                                                action="{{ route('authorization.store', $encrypted) }}" method="POST"
                                                enctype="multipart/form-data" autocomplete="off">
                                                @csrf

                                                <div class="row g-3">

                                                    <div class="col-md-4">
                                                        <label class="form-label fw-semibold">Date</label>
                                                        <input type="text" class="form-control bg-light"
                                                            value="{{ date('Y-m-d') }}" readonly style="cursor: not-allowed;">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="alert alert-light border">
                                                            <i class="material-icons-outlined align-middle me-1">info</i>
                                                            This signed form authorizes <strong>Bridgeway Logistics LLC</strong>
                                                            to charge your credit card for the amount shown.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label fw-semibold">This form is for the purchase of</label>
                                                        <input type="text" class="form-control bg-light"
                                                            value="{{ $purchaseFor }}" readonly style="cursor: not-allowed;">
                                                        <small class="text-muted">Vehicle information from Quote #{{ $quote->id }}</small>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Company Name</label>
                                                        <input type="text" name="company_name" class="form-control"
                                                            value="{{ old('company_name') }}" maxlength="255" autocomplete="organization">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Cardholder's Name (As on Card) <span class="text-danger">*</span></label>
                                                        <input type="text" name="cardholder_name" class="form-control"
                                                            value="{{ old('cardholder_name') }}" maxlength="255"
                                                            autocomplete="cc-name" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label fw-semibold">Billing Address <span class="text-danger">*</span></label>
                                                        <input type="text" name="billing_address" class="form-control"
                                                            value="{{ old('billing_address') }}" maxlength="255"
                                                            autocomplete="billing street-address" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">City, State, Zip <span class="text-danger">*</span></label>
                                                        <div class="input-form single-input-field position-relative">
                                                            <input class="form-control" type="text" id="billing-location"
                                                                placeholder="Enter City or ZipCode" autocomplete="off"
                                                                value="{{ old('city') ? old('city') . ', ' . old('state') . ', ' . old('zip') : '' }}"
                                                                required>
                                                            <div id="billing-suggestions" class="form-control suggestions-box"></div>
                                                        </div>
                                                        <small class="text-muted">Start typing and pick your location from the list.</small>

                                                        <input type="hidden" name="city" id="billing-city" value="{{ old('city') }}">
                                                        <input type="hidden" name="state" id="billing-state" value="{{ old('state') }}">
                                                        <input type="hidden" name="zip" id="billing-zip" value="{{ old('zip') }}">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                                        <input type="text" name="phone" class="form-control phone"
                                                            placeholder="(123) 456-7890" autocomplete="tel"
                                                            value="{{ old('phone', $quote->customer_phone) }}" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Card Type <span class="text-danger">*</span></label>
                                                        <select name="card_type" id="cardType" class="form-select" required>
                                                            <option value="">Select</option>
                                                            <option value="Visa" {{ old('card_type') == 'Visa' ? 'selected' : '' }}>Visa</option>
                                                            <option value="Mastercard" {{ old('card_type') == 'Mastercard' ? 'selected' : '' }}>
                                                                Mastercard</option>
                                                            <option value="American Express"
                                                                {{ old('card_type') == 'American Express' ? 'selected' : '' }}>American Express
                                                            </option>
                                                            <option value="Discover" {{ old('card_type') == 'Discover' ? 'selected' : '' }}>
                                                                Discover</option>
                                                        </select>
                                                        <small class="text-muted" id="cardTypeHint">Detected automatically from your card number.</small>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Card Number <span class="text-danger">*</span></label>
                                                        <input type="text" name="card_number" id="cardNumber" class="form-control card-number-mask"
                                                            inputmode="numeric" autocomplete="cc-number" placeholder="1234 5678 9012 3456"
                                                            value="{{ old('card_number') }}" required>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label fw-semibold">Expiration Date <span class="text-danger">*</span></label>
                                                        <input type="text" name="expiry_date" placeholder="MM/YY" class="form-control expiry-mask"
                                                            inputmode="numeric" autocomplete="cc-exp"
                                                            value="{{ old('expiry_date') }}" required>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label fw-semibold">Security Code (CVV) <span class="text-danger">*</span></label>
                                                        <input type="text" name="cvv" id="cvv" class="form-control cvv-mask"
                                                            inputmode="numeric" autocomplete="cc-csc" value="{{ old('cvv') }}"
                                                            required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Issuing Bank</label>
                                                        <input type="text" name="issuing_bank" class="form-control"
                                                            value="{{ old('issuing_bank') }}" maxlength="255">
                                                    </div>

                                                    <div class="col-md-6" style="display: none;">
                                                        <label class="form-label fw-semibold">Bank Phone Number</label>
                                                        <input type="text" name="bank_number" class="form-control"
                                                            value="{{ old('bank_number') }}" maxlength="20">
                                                    </div>

                                                    {{-- Display only: the amount actually charged is taken from the
                                                         signed link server-side, so nothing here is trusted. --}}
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Invoice Amount ($)</label>
                                                        <input type="text" class="form-control bg-light fw-bold"
                                                            value="{{ number_format($invoiceAmount, 2) }}" readonly
                                                            style="cursor: not-allowed;">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label fw-semibold">Upload Card & Driving License (Front & Back) <span class="text-danger">*</span></label>
                                                        <input type="file" name="attachments[]" id="attachments" class="form-control"
                                                            accept="image/jpeg,image/png,image/webp" multiple required>
                                                        <div id="attachmentPreview" class="mt-3"></div>
                                                        <div id="attachmentError" class="text-danger small mt-1 d-none"></div>
                                                        <small class="text-danger d-block">Upload clear pictures of the front &amp; back of your card and
                                                            driving license. JPG, PNG or WEBP, up to 6 images, 4 MB each.</small>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label fw-semibold">Cardholder’s Signature (Electronic) <span class="text-danger">*</span></label>

                                                        <div class="border rounded p-2 bg-white" style="width:100%; max-width:400px;">
                                                            <canvas id="signaturePad"
                                                                style="width:100%; height:200px; border:1px solid #ccc; touch-action:none;"></canvas>
                                                        </div>

                                                        <button type="button" class="btn btn-sm btn-secondary mt-2"
                                                            id="clearSignature">Clear</button>
                                                        <div id="signatureError" class="text-danger small mt-1 d-none">
                                                            Please sign in the box above before submitting.
                                                        </div>

                                                        <!-- Hidden input to store Base64 signature -->
                                                        <input type="hidden" name="signature_image" id="signatureImage" value="">
                                                    </div>


                                                    <div class="col-md-12 mt-4 text-center">
                                                        <div class="tj-theme-button d-inline-block">
                                                            <button type="submit" id="submitBtn" class="tj-primary-btn">
                                                                <span id="btnText">Submit Authorization</span>
                                                                <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"
                                                                    aria-hidden="true"></span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                    {{-- </div>
                                </div>
                                <p class="text-center text-muted mt-3 small">&copy; {{ date('Y') }} Bridgeway Logistics LLC. All rights
                                    reserved.</p>
                            </div> --}}
                            <!-- Footer -->
                                            <div class="border-top pt-3 mt-4 text-center small text-muted">
                                                © {{ date('Y') }} Bridgeway Logistics LLC. All rights reserved.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modernizr.JS -->
    <script src="{{ asset('web-assets/js/modernizr-2.8.3.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('web-assets/js/jquery.min.js') }}"></script>
    <!-- Input masking -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>
    <!-- Bootstrap.min JS -->
    <script src="{{ asset('web-assets/js/bootstrap.min.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('web-assets/js/meanmenu.js') }}"></script>
    <!-- Sal JS -->
    <script src="{{ asset('web-assets/js/sal.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('web-assets/js/main.js') }}"></script>

    <script>
        $(function () {
            'use strict';

            var MAX_ATTACHMENTS = 6;
            var MAX_ATTACHMENT_BYTES = 4 * 1024 * 1024;
            var ALLOWED_TYPES = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

            var $form = $('#authorizationForm');

            // ─────────────────────────────────────────────────────────────
            // Input masks
            // ─────────────────────────────────────────────────────────────
            $('.card-number-mask').inputmask({ mask: '9999 9999 9999 9999[ 999]', placeholder: ' ' });
            $('.expiry-mask').inputmask({ mask: '99/99', placeholder: 'MM/YY' });
            $('.cvv-mask').inputmask({ mask: '999[9]', placeholder: ' ' });
            $('.phone').inputmask({ mask: '(999) 999-9999' });

            // ─────────────────────────────────────────────────────────────
            // Billing location — city / state / zip from the zipcodes table.
            // Mirrors the picker used on the quote and order forms: the visible
            // field is a search box, the three hidden inputs are what actually post.
            // ─────────────────────────────────────────────────────────────
            (function bindLocationSearch() {
                var $input = $('#billing-location');
                var $box = $('#billing-suggestions');
                var $city = $('#billing-city');
                var $state = $('#billing-state');
                var $zip = $('#billing-zip');
                var request = null;
                var debounce = null;

                if (!$input.length) {
                    return;
                }

                function clearSelection() {
                    $city.val('');
                    $state.val('');
                    $zip.val('');
                }

                function showError(message) {
                    $input.addClass('is-invalid');
                    if (!$input.siblings('.invalid-feedback').length) {
                        $input.after('<div class="invalid-feedback d-block">' + message + '</div>');
                    }
                }

                function clearError() {
                    $input.removeClass('is-invalid');
                    $input.siblings('.invalid-feedback').remove();
                }

                $input.on('input', function () {
                    var query = $.trim($(this).val());

                    clearSelection();
                    clearError();
                    clearTimeout(debounce);

                    if (query.length < 2) {
                        $box.stop(true, true).slideUp(150);
                        return;
                    }

                    debounce = setTimeout(function () {
                        if (request) {
                            request.abort();
                        }

                        request = $.ajax({
                            url: "{{ route('zipcode.searchByLocation') }}",
                            data: { q: query },
                            dataType: 'json'
                        }).done(function (data) {
                            var html = '';

                            if (data && data.length) {
                                $.each(data, function (_, item) {
                                    html += '<div class="suggestion-item"' +
                                        ' data-city="' + item.city + '"' +
                                        ' data-state="' + item.state + '"' +
                                        ' data-zip="' + item.zip + '">' + item.label + '</div>';
                                });
                            } else {
                                html = '<div class="p-2 text-muted">No results found</div>';
                            }

                            $box.html(html).stop(true, true).slideDown(150);
                        }).fail(function (xhr, status) {
                            if (status !== 'abort') {
                                $box.html('<div class="p-2 text-muted">Search unavailable, please try again.</div>')
                                    .stop(true, true).slideDown(150);
                            }
                        });
                    }, 250);
                });

                $(document).on('click', '#billing-suggestions .suggestion-item', function () {
                    var $item = $(this);

                    $input.val($item.text());
                    $city.val($item.data('city'));
                    $state.val($item.data('state'));
                    $zip.val($item.data('zip'));

                    clearError();
                    $box.stop(true, true).slideUp(150);
                });

                $(document).on('click', function (e) {
                    if (!$(e.target).closest('#billing-location, #billing-suggestions').length) {
                        $box.stop(true, true).slideUp(150);
                    }
                });

                // Exposed so the submit handler can reuse the same messaging.
                window.__validateBillingLocation = function () {
                    if (!$city.val() || !$state.val() || !$zip.val()) {
                        showError('Please select your city, state and ZIP from the suggestion list.');
                        $box.stop(true, true).slideDown(150);
                        return false;
                    }
                    return true;
                };
            })();

            // ─────────────────────────────────────────────────────────────
            // Card brand detection — keeps the select in step with the number
            // and switches the CVV length for American Express.
            // ─────────────────────────────────────────────────────────────
            function detectBrand(digits) {
                if (/^4/.test(digits)) return 'Visa';
                if (/^(5[1-5]|222[1-9]|22[3-9]|2[3-6]|27[01]|2720)/.test(digits)) return 'Mastercard';
                if (/^3[47]/.test(digits)) return 'American Express';
                if (/^(6011|65|64[4-9]|622)/.test(digits)) return 'Discover';
                return null;
            }

            $('#cardNumber').on('input', function () {
                var digits = ($(this).val() || '').replace(/\D/g, '');

                if (digits.length < 2) {
                    $('#cardTypeHint').text('Detected automatically from your card number.');
                    return;
                }

                var brand = detectBrand(digits);

                if (brand) {
                    $('#cardType').val(brand);
                    $('#cardTypeHint').text('Detected: ' + brand);
                } else {
                    $('#cardTypeHint').text('Card type not recognised — please select it manually.');
                }

                var amex = brand === 'American Express';
                $('#cardNumber').inputmask(amex
                    ? { mask: '9999 999999 99999', placeholder: ' ' }
                    : { mask: '9999 9999 9999 9999[ 999]', placeholder: ' ' });
                $('#cvv').inputmask(amex ? { mask: '9999' } : { mask: '999' });
            }).trigger('input');

            // ─────────────────────────────────────────────────────────────
            // Attachments — preview, plus client-side count/size/type guards
            // that mirror the server rules.
            // ─────────────────────────────────────────────────────────────
            var fileInput = document.getElementById('attachments');

            function renderAttachmentPreview() {
                var $preview = $('#attachmentPreview').empty();

                Array.prototype.forEach.call(fileInput.files, function (file, index) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $preview.append(
                            '<div class="d-inline-block position-relative m-2" style="width:100px;height:100px;">' +
                            '<img src="' + e.target.result + '" class="img-thumbnail" style="width:100%;height:100%;object-fit:cover;">' +
                            '<button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 removePreview" data-index="' + index + '">&times;</button>' +
                            '</div>'
                        );
                    };

                    reader.readAsDataURL(file);
                });
            }

            function validateAttachments(showMessage) {
                var $error = $('#attachmentError');
                var files = fileInput ? fileInput.files : [];
                var message = null;

                if (!files.length) {
                    message = 'Please upload photos of your card and driving license.';
                } else if (files.length > MAX_ATTACHMENTS) {
                    message = 'You may upload at most ' + MAX_ATTACHMENTS + ' images.';
                } else {
                    Array.prototype.forEach.call(files, function (file) {
                        if (message) return;
                        if (ALLOWED_TYPES.indexOf(file.type) === -1) {
                            message = '"' + file.name + '" is not a JPG, PNG or WEBP image.';
                        } else if (file.size > MAX_ATTACHMENT_BYTES) {
                            message = '"' + file.name + '" is larger than 4 MB.';
                        }
                    });
                }

                if (message && showMessage) {
                    $error.text(message).removeClass('d-none');
                } else if (!message) {
                    $error.addClass('d-none').text('');
                }

                return !message;
            }

            if (fileInput) {
                $(fileInput).on('change', function () {
                    renderAttachmentPreview();
                    validateAttachments(true);
                });

                $(document).on('click', '.removePreview', function () {
                    var index = Number($(this).data('index'));
                    var transfer = new DataTransfer();

                    Array.prototype.forEach.call(fileInput.files, function (file, i) {
                        if (i !== index) transfer.items.add(file);
                    });

                    fileInput.files = transfer.files;
                    renderAttachmentPreview();
                    validateAttachments(true);
                });
            }

            // ─────────────────────────────────────────────────────────────
            // Signature pad
            // ─────────────────────────────────────────────────────────────
            var canvas = document.getElementById('signaturePad');
            var signatureImage = document.getElementById('signatureImage');
            var hasSignature = false;

            if (canvas) {
                var ctx = canvas.getContext('2d');
                var drawing = false;

                (function resizeCanvas() {
                    var ratio = Math.max(window.devicePixelRatio || 1, 1);
                    canvas.width = canvas.offsetWidth * ratio;
                    canvas.height = canvas.offsetHeight * ratio;
                    ctx.scale(ratio, ratio);
                    ctx.lineWidth = 2;
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';
                    ctx.strokeStyle = '#000';
                })();

                function pointerX(e) {
                    var clientX = e.touches && e.touches.length ? e.touches[0].clientX : e.clientX;
                    return clientX - canvas.getBoundingClientRect().left;
                }

                function pointerY(e) {
                    var clientY = e.touches && e.touches.length ? e.touches[0].clientY : e.clientY;
                    return clientY - canvas.getBoundingClientRect().top;
                }

                function startDrawing(e) {
                    drawing = true;
                    ctx.beginPath();
                    ctx.moveTo(pointerX(e), pointerY(e));
                    e.preventDefault();
                }

                function draw(e) {
                    if (!drawing) return;
                    ctx.lineTo(pointerX(e), pointerY(e));
                    ctx.stroke();
                    hasSignature = true;
                    e.preventDefault();
                }

                function stopDrawing() {
                    if (!drawing) return;
                    drawing = false;

                    if (hasSignature) {
                        signatureImage.value = canvas.toDataURL('image/png');
                        $('#signatureError').addClass('d-none');
                    }
                }

                canvas.addEventListener('mousedown', startDrawing);
                canvas.addEventListener('mousemove', draw);
                canvas.addEventListener('mouseup', stopDrawing);
                canvas.addEventListener('mouseleave', stopDrawing);
                canvas.addEventListener('touchstart', startDrawing, { passive: false });
                canvas.addEventListener('touchmove', draw, { passive: false });
                canvas.addEventListener('touchend', stopDrawing);

                $('#clearSignature').on('click', function () {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    signatureImage.value = '';
                    hasSignature = false;
                });
            }

            // ─────────────────────────────────────────────────────────────
            // Submit guard — block the post until everything the server will
            // reject has been fixed, then lock the button against double sends.
            // ─────────────────────────────────────────────────────────────
            var submitting = false;

            $form.on('submit', function (e) {
                if (submitting) {
                    e.preventDefault();
                    return;
                }

                var $firstInvalid = null;

                if (!window.__validateBillingLocation()) {
                    $firstInvalid = $('#billing-location');
                }

                if (!validateAttachments(true) && !$firstInvalid) {
                    $firstInvalid = $('#attachments');
                }

                if (!hasSignature || !signatureImage.value) {
                    $('#signatureError').removeClass('d-none');
                    if (!$firstInvalid) $firstInvalid = $('#signaturePad');
                }

                if ($firstInvalid) {
                    e.preventDefault();
                    $('html, body').animate({ scrollTop: $firstInvalid.offset().top - 120 }, 300);
                    return;
                }

                if (!this.checkValidity()) {
                    return; // let the browser surface its own field messages
                }

                submitting = true;
                $('#submitBtn').prop('disabled', true);
                $('#btnText').text('Submitting...');
                $('#btnSpinner').removeClass('d-none');
            });
        });
    </script>
</body>

</html>
