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
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #1a73e8;
            margin-bottom: 25px;
        }

        .section-title {
            margin-top: 25px;
            margin-bottom: 15px;
            color: #1a73e8;
            font-weight: 500;
        }

        .vehicle-images img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 5px;
            margin-bottom: 5px;
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
    </style>
</head>

<body>
    <div class="order-form-container">
        <h2 class="text-center">Order Form - Quote #{{ $quote->id }}</h2>

        <form id="order-form" action="{{ route('site.quote.submitOrderForm', $quote->id) }}" method="POST">
            @csrf

            <!-- Customer Details -->
            <div class="section-title">Customer Details</div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="customer_name" value="{{ $quote->customer_name }}"
                        {{ $quote->customer_name ? 'readonly' : '' }} required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="customer_email"
                        value="{{ $quote->customer_email }}" {{ $quote->customer_email ? 'readonly' : '' }} required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="customer_phone"
                        value="{{ $quote->customer_phone }}" {{ $quote->customer_phone ? 'readonly' : '' }} required>
                </div>
            </div>

            <!-- Pickup Information -->
            <div class="section-title">Pickup Information</div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="pickup_address1"
                        value="{{ $quote->pickupLocation->address1 }}"
                        {{ $quote->pickupLocation->address1 ? 'readonly' : '' }} required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">City / State / ZIP</label>
                    <input type="text" class="form-control" name="pickup_city"
                        value="{{ $quote->pickupLocation->city }}, {{ $quote->pickupLocation->state }}, {{ $quote->pickupLocation->zip }}"
                        {{ $quote->pickupLocation->city && $quote->pickupLocation->state && $quote->pickupLocation->zip ? 'readonly' : '' }}
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Buyer Reference</label>
                    <input type="text" class="form-control" name="pickup_buyer_ref"
                        value="{{ $quote->pickupLocation->buyer_ref }}"
                        {{ $quote->pickupLocation->buyer_ref ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Name</label>
                    <input type="text" class="form-control" name="pickup_contact_name"
                        value="{{ $quote->pickupLocation->contact_name }}"
                        {{ $quote->pickupLocation->contact_name ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Email</label>
                    <input type="email" class="form-control" name="pickup_contact_email"
                        value="{{ $quote->pickupLocation->contact_email }}"
                        {{ $quote->pickupLocation->contact_email ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Phone</label>
                    <input type="text" class="form-control"
                        value="{{ $quote->pickupLocation->phones->pluck('phone')->implode(', ') }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">TWIC</label>
                    <select name="pickup_twic" class="form-select"
                        {{ $quote->pickupLocation->twic !== null ? 'disabled' : '' }}>
                        <option value="">Select</option>
                        <option value="1" {{ $quote->pickupLocation->twic ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $quote->pickupLocation->twic === false ? 'selected' : '' }}>No
                        </option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pickup Date</label>
                    <input type="datetime-local" class="form-control" name="pickup_date"
                        value="{{ $quote->pickup_date ? $quote->pickup_date->format('Y-m-d\TH:i') : '' }}"
                        {{ $quote->pickup_date ? 'readonly' : '' }} required>
                </div>
            </div>

            <!-- Delivery Information -->
            <div class="section-title">Delivery Information</div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="delivery_address1"
                        value="{{ $quote->deliveryLocation->address1 }}"
                        {{ $quote->deliveryLocation->address1 ? 'readonly' : '' }} required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">City / State / ZIP</label>
                    <input type="text" class="form-control" name="delivery_city"
                        value="{{ $quote->deliveryLocation->city }}, {{ $quote->deliveryLocation->state }}, {{ $quote->deliveryLocation->zip }}"
                        {{ $quote->deliveryLocation->city && $quote->deliveryLocation->state && $quote->deliveryLocation->zip ? 'readonly' : '' }}
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Buyer Reference</label>
                    <input type="text" class="form-control" name="delivery_buyer_ref"
                        value="{{ $quote->deliveryLocation->buyer_ref }}"
                        {{ $quote->deliveryLocation->buyer_ref ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Name</label>
                    <input type="text" class="form-control" name="delivery_contact_name"
                        value="{{ $quote->deliveryLocation->contact_name }}"
                        {{ $quote->deliveryLocation->contact_name ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Email</label>
                    <input type="email" class="form-control" name="delivery_contact_email"
                        value="{{ $quote->deliveryLocation->contact_email }}"
                        {{ $quote->deliveryLocation->contact_email ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Phone</label>
                    <input type="text" class="form-control"
                        value="{{ $quote->deliveryLocation->phones->pluck('phone')->implode(', ') }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">TWIC</label>
                    <select name="delivery_twic" class="form-select"
                        {{ $quote->deliveryLocation->twic !== null ? 'disabled' : '' }}>
                        <option value="">Select</option>
                        <option value="1" {{ $quote->deliveryLocation->twic ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $quote->deliveryLocation->twic === false ? 'selected' : '' }}>No
                        </option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Delivery Date</label>
                    <input type="datetime-local" class="form-control" name="delivery_date"
                        value="{{ $quote->delivery_date ? $quote->delivery_date->format('Y-m-d\TH:i') : '' }}"
                        {{ $quote->delivery_date ? 'readonly' : '' }} required>
                </div>
            </div>

            <!-- Vehicles -->
            <div class="section-title">Vehicles</div>
            @foreach ($quote->vehicles as $vehicle)
                <div class="mb-3 border p-3 rounded">
                    <strong>{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</strong>
                    <p>VIN: <input type="text" class="form-control d-inline w-auto"
                            name="vehicles[{{ $vehicle->id }}][vin]" value="{{ $vehicle->vin ?? '' }}"
                            {{ $vehicle->vin ? 'readonly' : '' }}>
                        | Color: <input type="text" class="form-control d-inline w-auto"
                            name="vehicles[{{ $vehicle->id }}][color]" value="{{ $vehicle->color ?? '' }}"
                            {{ $vehicle->color ? 'readonly' : '' }}>
                        | Condition: <input type="text" class="form-control d-inline w-auto"
                            name="vehicles[{{ $vehicle->id }}][condition]" value="{{ $vehicle->condition ?? '' }}"
                            {{ $vehicle->condition ? 'readonly' : '' }}></p>
                    @if ($vehicle->images->count())
                        <div class="vehicle-images d-flex flex-wrap">
                            @foreach ($vehicle->images as $img)
                                <img src="{{ asset($img->image_path) }}" alt="Vehicle Image">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach

            <!-- Special Instructions -->
            <div class="section-title">Special Instructions</div>
            <textarea class="form-control" name="special_instructions" rows="4">{{ $quote->pre_dispatch_notes }} {{ $quote->transport_special_instructions }} {{ $quote->load_specific_terms }}</textarea>

            <!-- Payment Options -->
            <div class="section-title">Payment Options</div>
            <select name="payment_option" id="payment_option" class="form-select mb-3" required>
                <option value="">Select Payment Option</option>
                <option value="now">Pay Now</option>
                <option value="later">Pay Later</option>
            </select>
            <div id="card-element" style="display:none;"></div>
            <div id="card-errors" role="alert"></div>

            <!-- Digital Signature -->
            <div class="section-title">Digital Signature</div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="signature_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="signature_date" value="{{ date('Y-m-d') }}"
                        required>
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

            // Toggle card element display
            $('#payment_option').on('change', function() {
                if ($(this).val() === 'now') {
                    $('#card-element').show();
                } else {
                    $('#card-element').hide();
                    $('#card-errors').text('');
                }
            });

            // Form submission
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
