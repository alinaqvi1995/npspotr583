<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Form - Quote #{{ $quote->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('web-assets/images/logo/logo_001.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #fff;
            color: #000;
        }

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
</head>

<body>
    <div class="letterhead">
        <!-- Company Letterhead Header -->
        <div class="letterhead-header">
            <img src="{{ asset('web-assets/images/logo/logo_001.png') }}" alt="Company Logo">
            <div class="company-info">
                <h1>Bridgeway Logistics</h1>
                <p>123 Main Street, Suite 100, City, State, ZIP</p>
                <p>Email: sales@bridgewaylogisticsllc.com | Phone: +1 (123) 456-7890</p>
            </div>
        </div>

        <!-- Form Body -->
        <h2 class="text-center">Order Form - Quote #{{ $quote->id }}</h2>

        {{-- Summary --}}
        <div class="mb-4 border rounded p-3">
            <h5 class="mb-3">Summary</h5>
            <div class="row">
                <div class="col-md-6">
                    <strong>Pickup:</strong> {{ $quote->pickupLocation?->full_location ?? '-' }} <br>
                    <strong>Delivery:</strong> {{ $quote->deliveryLocation?->full_location ?? '-' }}
                </div>
                <div class="col-md-6 text-end">
                    <strong>Amount:</strong> ${{ $quote->amount_to_pay ?? 0 }} <br>
                    <strong>Balance:</strong> ${{ $quote->balance_amount ?? 0 }}
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="order-form" action="{{ route('site.quote.submitOrderForm', $encrypted) }}" method="POST">
            @csrf
            <input type="hidden" name="quote_id" value="{{ $encrypted }}">

            {{-- Step 1: Customer Info --}}
            <div class="mb-4">
                <div class="stepContainer"><span>1</span><strong>Customer Information</strong></div>
                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="customer_name"
                            value="{{ old('customer_name', $quote->customer_name) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="customer_email"
                            value="{{ old('customer_email', $quote->customer_email) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="customer_phone"
                            value="{{ old('customer_phone', $quote->customer_phone) }}" required>
                    </div>
                </div>
            </div>

            {{-- Step 2: Vehicle Info --}}
            <div class="mb-4">
                <div class="stepContainer"><span>2</span><strong>Vehicle Information</strong></div>
                @foreach ($quote->vehicles as $vehicle)
                    <div class="border p-3 rounded mb-3">
                        <strong>{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</strong>

                        <div class="row mt-2">
                            @if ($vehicle->vin)
                                <div class="col-md-3 mb-2 d-flex">
                                    <label class="form-label me-2 mb-0">VIN:</label>
                                    <span>{{ $vehicle->vin }}</span>
                                </div>
                            @endif

                            @if ($vehicle->color)
                                <div class="col-md-3 mb-2 d-flex">
                                    <label class="form-label me-2 mb-0">Color:</label>
                                    <span>{{ $vehicle->color }}</span>
                                </div>
                            @endif

                            <div class="col-md-3 mb-2 d-flex">
                                <label class="form-label me-2 mb-0">Condition:</label>
                                <span>{{ $vehicle->condition ?? '-' }}</span>
                            </div>

                            <div class="col-md-3 mb-2 d-flex">
                                <label class="form-label me-2 mb-0">Trailer:</label>
                                <span>{{ $vehicle->trailer_type ?? '-' }}</span>
                            </div>
                        </div>

                        @if ($vehicle->images->count())
                            <div class="vehicle-images d-flex flex-wrap mt-2">
                                @foreach ($vehicle->images as $img)
                                    <div class="image-preview-container">
                                        <div class="position-relative d-inline-block"
                                            style="width:80px;height:80px; margin:5px;">
                                            <img src="{{ asset($img->image_path) }}" alt="Vehicle Image"
                                                class="img-thumbnail" style="width:100%;height:100%;object-fit:cover;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Step 3: Pickup & Delivery --}}
            <div class="mb-4">
                <div class="stepContainer"><span>3</span><strong>Location Details</strong></div>
                <div class="row mt-3">
                    {{-- Pickup --}}
                    <div class="col-md-6 mb-3">
                        <div class="card-header">Pickup Information</div>
                        <div class="p-3 border">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control mb-2" name="pickup_address1"
                                value="{{ old('pickup_address1', $quote->pickup_address1) }}" required>

                            <label class="form-label">City, State, Zip</label>
                            <input type="text" class="form-control mb-2"
                                value="{{ optional($quote->pickupLocation)->full_location }}" readonly>

                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control mb-2" name="pickup_contact_name"
                                value="{{ old('pickup_contact_name', $quote->pickup_contact_name) }}">
                            <input type="email" class="form-control mb-2" name="pickup_contact_email"
                                value="{{ old('pickup_contact_email', $quote->pickup_contact_email) }}">

                            @if (optional($quote->pickupLocation)->phones->count())
                                @foreach ($quote->pickupLocation->phones as $phone)
                                    <input type="text" class="form-control mb-2" value="{{ $phone->phone }}"
                                        readonly>
                                @endforeach
                            @endif

                            <label class="form-label">Pickup Date</label>
                            <input type="datetime-local" class="form-control" name="pickup_date"
                                value="{{ old('pickup_date', $quote->pickup_date ? $quote->pickup_date->format('Y-m-d\TH:i') : '') }}">
                        </div>
                    </div>

                    {{-- Delivery --}}
                    <div class="col-md-6 mb-3">
                        <div class="card-header">Delivery Information</div>
                        <div class="p-3 border">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control mb-2" name="delivery_address1"
                                value="{{ old('delivery_address1', $quote->delivery_address1) }}" required>

                            <label class="form-label">City, State, Zip</label>
                            <input type="text" class="form-control mb-2"
                                value="{{ optional($quote->deliveryLocation)->full_location }}" readonly>

                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control mb-2" name="delivery_contact_name"
                                value="{{ old('delivery_contact_name', $quote->delivery_contact_name) }}">
                            <input type="email" class="form-control mb-2" name="delivery_contact_email"
                                value="{{ old('delivery_contact_email', $quote->delivery_contact_email) }}">

                            @if (optional($quote->deliveryLocation)->phones->count())
                                @foreach ($quote->deliveryLocation->phones as $phone)
                                    <input type="text" class="form-control mb-2" value="{{ $phone->phone }}"
                                        readonly>
                                @endforeach
                            @endif

                            <label class="form-label">Delivery Date</label>
                            <input type="datetime-local" class="form-control" name="delivery_date"
                                value="{{ old('delivery_date', $quote->delivery_date ? $quote->delivery_date->format('Y-m-d\TH:i') : '') }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Step 4: Special Instructions --}}
            <div class="mb-4">
                <div class="stepContainer"><span>4</span><strong>Special Instructions</strong></div>
                <textarea class="form-control mt-3" name="special_instructions" rows="4">{{ old('special_instructions', trim($quote->pre_dispatch_notes . ' ' . $quote->transport_special_instructions . ' ' . $quote->load_specific_terms)) }}</textarea>
            </div>

            {{-- Step 5: Confirm Order --}}
            <div class="mb-4">
                <div class="stepContainer"><span>5</span><strong>Confirm Order & Payment</strong></div>

                {{-- Terms --}}
                <div class="border p-3 mb-3">
                    <button type="button" class="btn btn-link p-0" data-bs-toggle="collapse"
                        data-bs-target="#terms">
                        [+] Terms & Conditions
                    </button>
                    <div id="terms" class="collapse mt-2">
                        <p class="small text-muted">Your transport will follow standard industry terms. Carrier is not
                            liable for
                            delays, mechanical failures, or contents inside vehicles. By signing you accept these terms.
                        </p>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="confirm_terms" name="confirm_terms"
                            {{ old('confirm_terms') ? 'checked' : '' }} required>
                        <label for="confirm_terms" class="form-check-label">I have read and accept the Terms &
                            Conditions</label>
                    </div>
                </div>

                {{-- Payment --}}
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

                {{-- Signature --}}
                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Signature Name</label>
                        <input type="text" class="form-control" name="signature_name"
                            value="{{ old('signature_name') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="signature_date"
                            value="{{ old('signature_date', date('Y-m-d')) }}" required>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Submit Order Form</button>
            </div>
        </form>

        <!-- Letterhead Footer -->
        <div class="letterhead-footer">
            © {{ date('Y') }} Bridgeway Logistics. All rights reserved.
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
