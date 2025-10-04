<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Form - Quote #{{ $quote->id }}</title>
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
                color: #1e3a8a; /* logiland’s blue shade */
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
            .form-control, .form-select {
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
        h1, h2, h3, h4, h5, h6 {
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
        background-color: var(--tj-primary-color3); /* darker shade */
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
                    <span class="sub-title active-shape"> Order Process </span>
                    <h2 class="title">Complete Your Order Form</h2>
                    <p class="mt-2 text-muted">
                        Please review your details carefully and fill out the required information to confirm your transport booking.
                    </p>
                </div>
            </div>
        </div>
    </section>
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
                                                        alt="Company Logo" 
                                                        class="img-fluid" 
                                                        style="max-height:70px;">
                                                </div>

                                                <!-- Company Info -->
                                                <div class="col text-md-end">
                                                    <h1 class="h4 fw-bold text-primary mb-1">Bridgeway Logistics LLC</h1>
                                                    <p class="mb-0 small text-muted">
                                                        5402 Renwick Dr Apt 902, Houston, TX 77081
                                                    </p>
                                                    <p class="mb-0 small text-muted">
                                                        Email: sales@bridgewaylogisticsllc.com | Phone: +1 713-470-6157
                                                    </p>
                                                </div>
                                            </div>


                                            <!-- Form Title -->
                                            <h2 class="text-center fw-semibold mb-4">Order Form - Quote #{{ $quote->id }}</h2>

                                            <!-- Summary -->
                                            <div class="card shadow-sm mb-4">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary">Summary</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1"><strong>Pickup:</strong> {{ $quote->pickupLocation?->full_location ?? '-' }}</p>
                                                            <p class="mb-0"><strong>Delivery:</strong> {{ $quote->deliveryLocation?->full_location ?? '-' }}</p>
                                                            <p class="mb-0"><strong>Created At:</strong> {{ $quote->created_at_formatted ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-md-6 text-md-end">
                                                            <p class="mb-1"><strong>Amount:</strong> ${{ $quote->amount_to_pay ?? 0 }}</p>
                                                            {{-- <p class="mb-0"><strong>Balance:</strong> ${{ $quote->balance_amount ?? 0 }}</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Errors -->
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="mb-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <!-- Order Form -->
                                            <form id="order-form" action="{{ route('site.quote.submitOrderForm', $encrypted) }}" method="POST" class="needs-validation">
                                                @csrf
                                                <input type="hidden" name="quote_id" value="{{ $encrypted }}">

                                                <!-- Step 1 -->
                                                <div class="mb-4">
                                                    <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">1</span> Customer Information</h6>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name', $quote->customer_name) }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="customer_email" value="{{ old('customer_email', $quote->customer_email) }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Phone</label>
                                                            <input type="text" class="form-control" name="customer_phone" value="{{ old('customer_phone', $quote->customer_phone) }}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Step 2 -->
                                                <div class="mb-4">
                                                    <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">2</span> Vehicle Information</h6>
                                                    @foreach ($quote->vehicles as $vehicle)
                                                        <div class="card border mb-3">
                                                            <div class="card-body">
                                                                <h6 class="fw-semibold">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</h6>
                                                                <div class="row g-2 small text-muted">
                                                                    @if ($vehicle->vin)
                                                                        <div class="col-md-3"><strong>VIN:</strong> {{ $vehicle->vin }}</div>
                                                                    @endif
                                                                    @if ($vehicle->color)
                                                                        <div class="col-md-3"><strong>Color:</strong> {{ $vehicle->color }}</div>
                                                                    @endif
                                                                    <div class="col-md-3"><strong>Condition:</strong> {{ $vehicle->condition ?? '-' }}</div>
                                                                    <div class="col-md-3"><strong>Trailer:</strong> {{ $vehicle->trailer_type ?? '-' }}</div>
                                                                </div>
                                                                @if ($vehicle->images->count())
                                                                    <div class="d-flex flex-wrap mt-3">
                                                                        @foreach ($vehicle->images as $img)
                                                                            <img src="{{ asset($img->image_path) }}" class="img-thumbnail me-2 mb-2" style="width:80px;height:80px;object-fit:cover;">
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Step 3 -->
                                                <div class="mb-4">
                                                    <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">3</span> Location Details</h6>
                                                    <div class="row g-4">
                                                        <div class="col-md-6">
                                                            <div class="card shadow-sm h-100">
                                                                <div class="card-header fw-semibold">Pickup Information</div>
                                                                <div class="card-body">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" class="form-control mb-2" name="pickup_address1" value="{{ old('pickup_address1', $quote->pickup_address1) }}" required>
                                                                    <label class="form-label">City, State, Zip</label>
                                                                    <input type="text" class="form-control mb-2" value="{{ optional($quote->pickupLocation)->full_location }}" readonly>
                                                                    <label class="form-label">Contact</label>
                                                                    <input type="text" class="form-control mb-2" name="pickup_contact_name" value="{{ old('pickup_contact_name', $quote->pickup_contact_name) }}">
                                                                    <input type="email" class="form-control mb-2" name="pickup_contact_email" value="{{ old('pickup_contact_email', $quote->pickup_contact_email) }}">
                                                                    @if (optional($quote->pickupLocation)->phones->count())
                                                                        @foreach ($quote->pickupLocation->phones as $phone)
                                                                            <input type="text" class="form-control mb-2" value="{{ $phone->phone }}" readonly>
                                                                        @endforeach
                                                                    @endif
                                                                    <label class="form-label">Pickup Date</label>
                                                                    <input type="datetime-local" class="form-control" name="pickup_date" value="{{ old('pickup_date', $quote->pickup_date ? $quote->pickup_date->format('Y-m-d\TH:i') : '') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card shadow-sm h-100">
                                                                <div class="card-header fw-semibold">Delivery Information</div>
                                                                <div class="card-body">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" class="form-control mb-2" name="delivery_address1" value="{{ old('delivery_address1', $quote->delivery_address1) }}" required>
                                                                    <label class="form-label">City, State, Zip</label>
                                                                    <input type="text" class="form-control mb-2" value="{{ optional($quote->deliveryLocation)->full_location }}" readonly>
                                                                    <label class="form-label">Contact</label>
                                                                    <input type="text" class="form-control mb-2" name="delivery_contact_name" value="{{ old('delivery_contact_name', $quote->delivery_contact_name) }}">
                                                                    <input type="email" class="form-control mb-2" name="delivery_contact_email" value="{{ old('delivery_contact_email', $quote->delivery_contact_email) }}">
                                                                    @if (optional($quote->deliveryLocation)->phones->count())
                                                                        @foreach ($quote->deliveryLocation->phones as $phone)
                                                                            <input type="text" class="form-control mb-2" value="{{ $phone->phone }}" readonly>
                                                                        @endforeach
                                                                    @endif
                                                                    <label class="form-label">Delivery Date</label>
                                                                    <input type="datetime-local" class="form-control" name="delivery_date" value="{{ old('delivery_date', $quote->delivery_date ? $quote->delivery_date->format('Y-m-d\TH:i') : '') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Step 4 -->
                                                <div class="mb-4">
                                                    <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">4</span> Special Instructions</h6>
                                                    <textarea class="form-control" name="special_instructions" rows="4">{{ old('special_instructions', trim($quote->pre_dispatch_notes . ' ' . $quote->transport_special_instructions . ' ' . $quote->load_specific_terms)) }}</textarea>
                                                </div>

                                                <!-- Step 5 -->
                                                <div class="mb-4">
                                                    <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">5</span> Confirm Order & Payment</h6>
                                                    
                                                    <!-- Terms -->
                                                    <div class="card border mb-3">
                                                        <div class="card-body">
                                                            <p class="small text-muted mb-2">
                                                                Your transport will follow standard industry terms. Please make sure you read all guidelines carefully before booking...
                                                            </p>
                                                            <a href="{{ route('trems') }}" class="btn btn-link p-0">View Full Terms & Conditions</a>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" id="confirm_terms" name="confirm_terms" {{ old('confirm_terms') ? 'checked' : '' }} required>
                                                                <label for="confirm_terms" class="form-check-label">I accept the Terms & Conditions</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Payment -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Payment Option</label>
                                                        <select name="payment_option" id="payment_option" class="form-select" required>
                                                            <option value="">Select Payment Option</option>
                                                            <option value="now" {{ old('payment_option') === 'now' ? 'selected' : '' }}>Pay Now
                                                            </option>
                                                            <option value="later" {{ old('payment_option') === 'later' ? 'selected' : '' }}>Pay Later
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <!-- Custom Card Form -->
                                                    <div id="custom-card-fields" class="border p-3 mb-3" style="display:none;">
                                                        <div class="row">
                                                            <!-- Card Number -->
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Card Number</label>
                                                                <input type="text" class="form-control" id="card_number" maxlength="19"
                                                                    value="{{ old('card_number') }}" placeholder="1234 5678 9012 3456">
                                                            </div>

                                                            <!-- Expiry -->
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label">Expiry</label>
                                                                <div class="d-flex align-items-center">
                                                                    <input type="text" class="form-control text-center me-1" id="exp_month"
                                                                        maxlength="2" placeholder="MM" style="width:60px;"
                                                                        value="{{ old('exp_month') }}">
                                                                    <span class="mx-1">/</span>
                                                                    <input type="text" class="form-control text-center ms-1" id="exp_year"
                                                                        maxlength="2" placeholder="YY" style="width:60px;"
                                                                        value="{{ old('exp_year') }}">
                                                                </div>
                                                            </div>

                                                            <!-- CVC -->
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label">CVC</label>
                                                                <input type="text" class="form-control" id="cvc" maxlength="4"
                                                                    value="{{ old('cvc') }}" placeholder="123">
                                                            </div>
                                                        </div>
                                                        <div id="card-errors" class="text-danger mt-2"></div>
                                                    </div>

                                                    <!-- Signature -->
                                                    <div class="row g-3 mt-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Signature Name</label>
                                                            <input type="text" class="form-control" name="signature_name" value="{{ old('signature_name') }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Date</label>
                                                            <input type="date" class="form-control" name="signature_date" value="{{ old('signature_date', date('Y-m-d')) }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Submit -->
                                                <div class="tj-theme-button text-center mt-3">
                                                    <button type="submit" class="tj-primary-btn">Submit Order Form <i class="flaticon-right-1"></i></button>
                                                </div>
                                            </form>

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
    <!-- jQuery.min JS -->
    <script src="{{ asset('web-assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>

    <!-- Bootstrap.min JS -->
    <script src="{{ asset('web-assets/js/bootstrap.min.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('web-assets/js/meanmenu.js') }}"></script>
    <!-- Imagesloaded JS -->
    <script src="{{ asset('web-assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope JS -->
    <script src="{{ asset('web-assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Magnific JS -->
    <script src="{{ asset('web-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Swiper.min JS -->
    <script src="{{ asset('web-assets/js/swiper.min.js') }}"></script>
    <!-- Owl.min JS -->
    <script src="{{ asset('web-assets/js/owl.carousel.js') }}"></script>
    <!-- Appear JS -->
    <script src="{{ asset('web-assets/js/jquery.appear.min.js') }}"></script>
    <!-- Odometer JS -->
    <script src="{{ asset('web-assets/js/odometer.min.js') }}"></script>
    <!-- Sal JS -->
    <script src="{{ asset('web-assets/js/sal.js') }}"></script>
    <!-- Nice JS -->
    <script src="{{ asset('web-assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('web-assets/js/main.js') }}"></script>
    <script src="{{ asset('web-assets/js/extra.js') }}"></script>

    <script>
        $(document).ready(function() {
            // const stripe = Stripe('{{ config('services.stripe.key') }}');

            // Auto format card number (4242 4242 4242 4242)
            $('#card_number').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                value = value.substring(0, 16); // max 16 digits
                let formatted = value.replace(/(.{4})/g, '$1 ').trim();
                $(this).val(formatted);
            });

            // Expiry MM/YY auto-format (slash always visible)
            $('#exp_month').on('input', function() {
                let val = this.value.replace(/\D/g, '').substring(0, 2);
                if (val.length === 2) {
                    let month = parseInt(val, 10);
                    if (month < 1) month = 1;
                    if (month > 12) month = 12;
                    val = month.toString().padStart(2, '0');
                    $('#exp_year').focus(); // jump to year
                }
                this.value = val;
            });

            $('#cvc').on('input', function() {
                this.value = this.value.replace(/\D/g, '').substring(0, 4);
            });

            // Show/Hide card fields
            $('#payment_option').on('change', function() {
                if ($(this).val() === 'now') {
                    $('#custom-card-fields').show();
                } else {
                    $('#custom-card-fields').hide();
                    $('#card-errors').text('');
                }
            });

            // Handle form submit
            // $('#order-form').on('submit', async function(e) {
            //     if ($('#payment_option').val() === 'now') {
            //         e.preventDefault();

            //         const cardData = {
            //             number: $('#card_number').val().replace(/\s+/g, ''),
            //             exp_month: $('#exp_month').val(),
            //             exp_year: $('#exp_year').val(),
            //             cvc: $('#cvc').val(),
            //         };

            //         // Create token
            //         const {
            //             token,
            //             error
            //         } = await stripe.createToken('card', cardData);

            //         if (error) {
            //             $('#card-errors').text(error.message);
            //         } else {
            //             // Append token to form and submit
            //             $('<input>').attr({
            //                 type: 'hidden',
            //                 name: 'stripeToken',
            //                 value: token.id
            //             }).appendTo('#order-form');
            //             $('#card-errors').text('');
            //             this.submit();
            //         }
            //     }
            // });
        });
    </script>
</body>

</html>
