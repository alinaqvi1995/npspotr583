<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Form - Quote #{{ $quote->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f5f7;
            color: #333;
        }

        .order-form-container {
            max-width: 1000px;
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2,
        .section-title,
        .stepContainer span,
        .card-header,
        .btn-success {
            background-color: #427ece !important;
            color: #fff !important;
        }

        .stepContainer span {
            background: #427ece !important;
        }

        .btn-success {
            border-color: #427ece !important;
        }


        .stepContainer span {
            font-size: 20px;
            width: 36px;
            height: 36px;
            background: #427ece;
            border-radius: 50%;
            display: inline-block;
            line-height: 36px;
            color: white;
            font-weight: 600;
            text-align: center;
            margin-right: 10px;
        }

        .section-title {
            margin-top: 25px;
            margin-bottom: 15px;
            font-weight: 500;
            color: #1a73e8;
        }

        .vehicle-images img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            margin: 3px;
        }

        #card-element {
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        #card-errors {
            color: red;
            margin-top: 10px;
        }

        .card-header {
            background-color: #427ece !important;
            color: #fff !important;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="order-form-container">
        <h2 class="text-center">Book Order #{{ $quote->id }}</h2>

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

        <form id="order-form" action="{{ route('site.quote.submitOrderForm', $quote->id) }}" method="POST">
            @csrf

            {{-- Step 1: Customer Info --}}
            <div class="mb-4">
                <div class="stepContainer"><span>1</span><strong>Customer Information</strong></div>
                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="customer_name"
                            value="{{ $quote->customer_name }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="customer_email"
                            value="{{ $quote->customer_email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="customer_phone"
                            value="{{ $quote->customer_phone }}" required>
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
                                    <img src="{{ asset($img->image_path) }}" alt="Vehicle Image">
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
                                value="{{ $quote->pickup_address1 }}" required>

                            <label class="form-label">City, State, Zip</label>
                            <input type="text" class="form-control mb-2"
                                value="{{ $quote->pickupLocation->full_location }}"
                                readonly>

                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control mb-2" name="pickup_contact_name"
                                value="{{ $quote->pickup_contact_name }}">
                            <input type="email" class="form-control mb-2" name="pickup_contact_email"
                                value="{{ $quote->pickup_contact_email }}">

                            @if (optional($quote->pickupLocation)->phones->count())
                                @foreach ($quote->pickupLocation->phones as $phone)
                                    <input type="text" class="form-control mb-2" value="{{ $phone->phone }}"
                                        readonly>
                                @endforeach
                            @endif

                            <label class="form-label">Pickup Date</label>
                            <input type="datetime-local" class="form-control" name="pickup_date"
                                value="{{ $quote->pickup_date ? $quote->pickup_date->format('Y-m-d\TH:i') : '' }}">
                        </div>
                    </div>

                    {{-- Delivery --}}
                    <div class="col-md-6 mb-3">
                        <div class="card-header">Delivery Information</div>
                        <div class="p-3 border">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control mb-2" name="delivery_address1"
                                value="{{ $quote->delivery_address1 }}" required>

                            <label class="form-label">City, State, Zip</label>
                            <input type="text" class="form-control mb-2"
                                value="{{ $quote->deliveryLocation->full_location }}"
                                readonly>

                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control mb-2" name="delivery_contact_name"
                                value="{{ $quote->delivery_contact_name }}">
                            <input type="email" class="form-control mb-2" name="delivery_contact_email"
                                value="{{ $quote->delivery_contact_email }}">

                            @if (optional($quote->deliveryLocation)->phones->count())
                                @foreach ($quote->deliveryLocation->phones as $phone)
                                    <input type="text" class="form-control mb-2" value="{{ $phone->phone }}"
                                        readonly>
                                @endforeach
                            @endif

                            <label class="form-label">Delivery Date</label>
                            <input type="datetime-local" class="form-control" name="delivery_date"
                                value="{{ $quote->delivery_date ? $quote->delivery_date->format('Y-m-d\TH:i') : '' }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Step 4: Special Instructions --}}
            <div class="mb-4">
                <div class="stepContainer"><span>4</span><strong>Special Instructions</strong></div>
                <textarea class="form-control mt-3" name="special_instructions" rows="4">{{ $quote->pre_dispatch_notes }} {{ $quote->transport_special_instructions }} {{ $quote->load_specific_terms }}</textarea>
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
                            liable for delays, mechanical failures, or contents inside vehicles. By signing you accept
                            these terms.</p>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="confirm_terms" required>
                        <label for="confirm_terms" class="form-check-label">I have read and accept the Terms &
                            Conditions</label>
                    </div>
                </div>

                {{-- Payment --}}
                <div class="mb-3">
                    <label class="form-label">Payment Option</label>
                    <select name="payment_option" id="payment_option" class="form-select" required>
                        <option value="">Select Payment Option</option>
                        <option value="now">Pay Now</option>
                        <option value="later">Pay Later</option>
                    </select>
                </div>
                <div id="card-element" style="display:none;"></div>
                <div id="card-errors" role="alert"></div>

                {{-- Signature --}}
                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Signature Name</label>
                        <input type="text" class="form-control" name="signature_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="signature_date"
                            value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Submit Order Form</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            const stripe = Stripe('{{ config('services.stripe.key') }}');
            const elements = stripe.elements();
            const card = elements.create('card', {
                hidePostalCode: true
            });
            card.mount('#card-element');

            $('#payment_option').on('change', function() {
                if ($(this).val() === 'now') {
                    $('#card-element').show();
                } else {
                    $('#card-element').hide();
                    $('#card-errors').text('');
                }
            });

            $('#order-form').on('submit', async function(e) {
                if ($('#payment_option').val() === 'now') {
                    e.preventDefault();
                    const {
                        token,
                        error
                    } = await stripe.createToken(card);
                    if (error) {
                        $('#card-errors').text(error.message);
                    } else {
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'stripeToken',
                            value: token.id
                        }).appendTo('#order-form');
                        this.submit();
                    }
                }
            });
        });
    </script>
</body>

</html>
