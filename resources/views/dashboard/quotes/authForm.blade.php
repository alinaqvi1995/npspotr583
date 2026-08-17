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

        /* pickup delivery suggestion */
        .suggestions-box {
            position: relative;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            z-index: 9999;
            display: none;
        }

        .suggestions-box div {
            padding: 8px 12px;
            cursor: pointer;
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

                                            <form action="{{ route('authorization.store', $encrypted) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="row g-3">

                                                    <div class="col-md-4">
                                                        <label class="form-label fw-semibold">Date</label>
                                                        <input type="text" name="auth_date" class="form-control bg-light"
                                                            value="{{ date('Y-m-d') }}" readonly required style="cursor: not-allowed;">
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
                                                        <input type="text" name="purchase_for" class="form-control"
                                                            value="{{ $quote->vehicles->map(fn($v) => $v->year . ' ' . $v->make . ' ' . $v->model . ' ' . $v->vin)->implode(', ') }}"
                                                            readonly required>
                                                        <small class="text-muted">Vehicle information from Quote #{{ $quote->id }}</small>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Company Name</label>
                                                        <input type="text" name="company_name" class="form-control"
                                                            value="{{ old('company_name') }}">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Cardholder's Name (As on Card)</label>
                                                        <input type="text" name="cardholder_name" class="form-control" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label fw-semibold">Billing Address</label>
                                                        <input type="text" name="billing_address" class="form-control"
                                                            value="{{ old('billing_address') }}" required>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label fw-semibold">City</label>
                                                        <input type="text" name="city" class="form-control" value="{{ old('city') }}"
                                                            required>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label fw-semibold">State</label>
                                                        <input type="text" name="state" class="form-control" value="{{ old('state') }}"
                                                            required>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label fw-semibold">Zip Code</label>
                                                        <input type="text" name="zip" class="form-control" value="{{ old('zip') }}"
                                                            required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Phone Number</label>
                                                        <input type="text" name="phone" class="form-control"
                                                            value="{{ old('phone', $quote->customer_phone) }}" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Card Type</label>
                                                        <select name="card_type" class="form-select" required>
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
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Card Number</label>
                                                        <input type="text" name="card_number" class="form-control"
                                                            value="{{ old('card_number') }}" required>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label fw-semibold">Expiration Date</label>
                                                        <input type="text" name="expiry_date" placeholder="MM/YY" class="form-control"
                                                            value="{{ old('expiry_date') }}" required>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-label fw-semibold">Security Code (CVV)</label>
                                                        <input type="text" name="cvv" class="form-control" value="{{ old('cvv') }}"
                                                            required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Issuing Bank</label>
                                                        <input type="text" name="issuing_bank" class="form-control"
                                                            value="{{ old('issuing_bank') }}">
                                                    </div>

                                                    <div class="col-md-6" style="display: none;">
                                                        <label class="form-label fw-semibold">Bank Phone Number</label>
                                                        <input type="text" name="bank_number" class="form-control"
                                                            value="{{ old('bank_number') }}">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label fw-semibold">Invoice Amount ($)</label>
                                                        <input type="number" step="0.01" name="invoice_amount" class="form-control bg-light"
                                                            value="{{ old('invoice_amount', $quote->amount_to_pay) }}" readonly required style="cursor: not-allowed;">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label fw-semibold">Upload Card & Driving License (Front & Back)</label>
                                                        <input type="file" name="attachments[]" class="form-control" multiple required>
                                                        <div id="attachmentPreview" class="mt-3"></div>
                                                        <small class="text-danger">Upload clear pictures of the front & back of your card and
                                                            driving license.</small>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label fw-semibold">Cardholder’s Signature (Electronic)</label>

                                                        <div class="border rounded p-2 bg-white" style="width:100%; max-width:400px;">
                                                            <canvas id="signaturePad"
                                                                style="width:100%; height:200px; border:1px solid #ccc;"></canvas>
                                                        </div>

                                                        <button type="button" class="btn btn-sm btn-secondary mt-2"
                                                            id="clearSignature">Clear</button>

                                                        <!-- Hidden input to store Base64 signature -->
                                                        <input type="hidden" name="signature_image" id="signatureImage"
                                                            value="{{ old('signature_image') }}" required>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // UX: Disable button and show spinner on submit
            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            if (form) {
                form.addEventListener('submit', function() {
                    // Check validity first (if using browser validation)
                    if (this.checkValidity()) {
                        submitBtn.disabled = true;
                        btnText.textContent = 'Submitting...';
                        btnSpinner.classList.remove('d-none');
                    }
                });
            }

            // ---------------------------------------
            // IMAGE PREVIEW FOR ATTACHMENTS
            // ---------------------------------------
            const fileInput = document.querySelector('input[name="attachments[]"]');

            if (fileInput) {
                fileInput.addEventListener("change", function() {
                    const previewContainer = document.getElementById("attachmentPreview");
                    previewContainer.innerHTML = "";

                    Array.from(this.files).forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement("div");
                            div.classList.add("d-inline-block", "position-relative", "m-2");
                            div.style.width = "100px";
                            div.style.height = "100px";

                            div.innerHTML = `
                            <img src="${e.target.result}" class="img-thumbnail" style="width:100%;height:100%;object-fit:cover;">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 removePreview" data-index="${index}">&times;</button>
                        `;

                            previewContainer.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    });
                });

                document.addEventListener("click", function(e) {
                    if (e.target.classList.contains("removePreview")) {
                        const index = e.target.dataset.index;
                        const dt = new DataTransfer();

                        Array.from(fileInput.files).forEach((file, i) => {
                            if (i !== Number(index)) dt.items.add(file);
                        });

                        fileInput.files = dt.files;
                        e.target.parentElement.remove();
                    }
                });
            }


            // ---------------------------------------
            // SIGNATURE PAD
            // ---------------------------------------
            const canvas = document.getElementById("signaturePad");
            const signatureImage = document.getElementById("signatureImage");
            const clearBtn = document.getElementById("clearSignature");

            const ctx = canvas.getContext("2d");

            // Fix canvas resolution
            function resizeCanvas() {
                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                const width = canvas.offsetWidth;
                const height = canvas.offsetHeight;
                canvas.width = width * ratio;
                canvas.height = height * ratio;
                ctx.scale(ratio, ratio);
            }
            resizeCanvas();
            // window.addEventListener("resize", resizeCanvas); // resizing clears canvas, handle better if needed

            let drawing = false;

            function startDrawing(e) {
                drawing = true;
                ctx.beginPath();
                ctx.moveTo(getX(e), getY(e));
                e.preventDefault(); // prevent scrolling on touch
            }

            function draw(e) {
                if (!drawing) return;
                ctx.lineTo(getX(e), getY(e));
                ctx.strokeStyle = "#000";
                ctx.lineWidth = 2;
                ctx.stroke();
                e.preventDefault();
            }

            function stopDrawing() {
                if (drawing) {
                    drawing = false;
                    // Save signature in hidden input
                    signatureImage.value = canvas.toDataURL("image/png");
                }
            }

            function getX(e) {
                let clientX = e.clientX;
                if (e.touches && e.touches.length > 0) {
                    clientX = e.touches[0].clientX;
                }
                return clientX - canvas.getBoundingClientRect().left;
            }

            function getY(e) {
                let clientY = e.clientY;
                if (e.touches && e.touches.length > 0) {
                    clientY = e.touches[0].clientY;
                }
                return clientY - canvas.getBoundingClientRect().top;
            }

            // Mouse events
            canvas.addEventListener("mousedown", startDrawing);
            canvas.addEventListener("mousemove", draw);
            canvas.addEventListener("mouseup", stopDrawing);
            canvas.addEventListener("mouseleave", stopDrawing);

            // Touch events (mobile)
            canvas.addEventListener("touchstart", startDrawing, {
                passive: false
            });
            canvas.addEventListener("touchmove", draw, {
                passive: false
            });
            canvas.addEventListener("touchend", stopDrawing);

            // Clear signature
            clearBtn.addEventListener("click", function() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                signatureImage.value = "";
            });

        });
    </script>
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
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            const stripe = Stripe(`{{ config('services.stripe.key') }}`);
            const elements = stripe.elements();
            const card = elements.create('card');
            card.mount('#card-element');

            // Toggle card fields when payment option changes
            $('#payment_option').on('change', function() {
                if ($(this).val() === 'now') {
                    $('#custom-card-fields').show();
                    $('#pay-now-options').show();
                } else {
                    $('#custom-card-fields').hide();
                    $('#pay-now-options').hide();
                }
            });

            const form = document.getElementById('order-form');

            form.addEventListener('submit', async function(event) {
                // Only tokenize if paying now
                if ($('#payment_option').val() === 'now') {
                    event.preventDefault();

                    const {
                        token,
                        error
                    } = await stripe.createToken(card);

                    if (error) {
                        document.getElementById('card-errors').textContent = error.message;
                    } else {
                        document.getElementById('stripeToken').value = token.id;
                        form.submit();
                    }
                }
            });

            $(document).on("focus", ".phone", function() {
                if (!$(this).data("inputmask")) {
                    $(this).inputmask({
                        mask: "(999) 999-9999"
                    });
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Custom phone rule
            $.validator.addMethod("phoneUS", function(phone_number, element) {
                return this.optional(element) || /^\(\d{3}\) \d{3}-\d{4}$/.test(phone_number);
            }, "Please enter a valid phone number (e.g. (123) 456-7890)");

            $("#order-form").validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.parent(".input-group").length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid").addClass("is-valid");
                },
                rules: {
                    customer_name: {
                        required: true,
                        minlength: 2
                    },
                    customer_email: {
                        required: true,
                        email: true
                    },
                    customer_phone: {
                        required: true,
                        phoneUS: true
                    },

                    pickup_address1: "required",
                    pickup_contact_name: "required",
                    pickup_contact_email: {
                        email: true
                    },

                    delivery_address1: "required",
                    delivery_contact_name: "required",
                    delivery_contact_email: {
                        email: true
                    },

                    "pickup_phones[]": {
                        phoneUS: true
                    },
                    "delivery_phones[]": {
                        phoneUS: true
                    },

                    confirm_terms: "required",
                    payment_option: "required",
                    signature_name: "required",
                    signature_date: "required"
                },
                messages: {
                    customer_name: "Please enter your name",
                    customer_email: {
                        required: "Please enter your email",
                        email: "Enter a valid email"
                    },
                    customer_phone: "Enter a valid phone number",

                    pickup_address1: "Pickup address is required",
                    pickup_contact_name: "Pickup contact name is required",
                    pickup_contact_email: "Enter a valid email for pickup contact",

                    delivery_address1: "Delivery address is required",
                    delivery_contact_name: "Delivery contact name is required",
                    delivery_contact_email: "Enter a valid email for delivery contact",

                    confirm_terms: "You must accept the Terms & Conditions",
                    payment_option: "Please select a payment option",
                    signature_name: "Signature name is required",
                    signature_date: "Signature date is required"
                }
            });
        });
    </script>
</body>

</html>