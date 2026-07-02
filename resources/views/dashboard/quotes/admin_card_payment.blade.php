@extends('dashboard.includes.partial.base')

@section('title', 'Admin Card Payment')

@section('content')
    <style>
        .card-section {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
            padding: 28px 32px;
            margin-bottom: 28px;
        }

        .step-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #0d6efd;
            color: #fff;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            font-size: 0.9rem;
            font-weight: 700;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .step-title {
            display: flex;
            align-items: center;
            font-size: 1.05rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 18px;
        }

        #StripeCardElement {
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #fafafa;
            min-height: 44px;
        }

        .amount-badge {
            display: inline-block;
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            border-radius: 8px;
            padding: 6px 18px;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .quote-lookup-wrap {
            max-width: 420px;
        }

        #quoteInfo {
            display: none;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 18px 22px;
            margin-top: 14px;
        }

        #quoteInfo .info-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 6px;
        }

        #quoteInfo .info-item {
            flex: 1;
            min-width: 180px;
        }

        #quoteInfo .info-label {
            font-size: 0.78rem;
            text-transform: uppercase;
            color: #6b7280;
            font-weight: 600;
        }

        #quoteInfo .info-value {
            font-size: 0.95rem;
            font-weight: 700;
            color: #111827;
        }

        .charge-summary {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            border-radius: 10px;
            color: #fff;
            padding: 18px 24px;
            margin-bottom: 20px;
        }

        .charge-summary .label {
            font-size: 0.82rem;
            opacity: 0.8;
        }

        .charge-summary .value {
            font-size: 1.1rem;
            font-weight: 700;
        }

        #adminPayForm {
            display: none;
        }

        .btn-charge {
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 36px;
            font-size: 1rem;
            font-weight: 700;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-charge:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-charge:disabled {
            opacity: 0.6;
            transform: none;
            cursor: not-allowed;
        }

        .vehicle-pill {
            display: inline-block;
            background: #e0e7ff;
            color: #3730a3;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 0.82rem;
            font-weight: 600;
            margin: 2px;
        }
    </style>

    <h6 class="mb-0 text-uppercase">Admin Card Payment</h6>
    <hr>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="material-icons-outlined me-2 align-middle">check_circle</i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="material-icons-outlined me-2 align-middle">error</i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- STEP 1: Quote Lookup --}}
    <div class="card-section">
        <div class="step-title">
            <span class="step-badge">1</span> Look Up Quote
        </div>
        <div class="quote-lookup-wrap">
            <label class="form-label fw-semibold">Enter Quote Number</label>
            <div class="input-group">
                <input type="number" id="quoteNumberInput" class="form-control" placeholder="e.g. 142" min="1">
                <button class="btn btn-primary" id="lookupQuoteBtn" type="button">
                    <i class="material-icons-outlined align-middle" style="font-size:1rem">search</i> Lookup
                </button>
            </div>
            <div id="lookupError" class="text-danger small mt-1" style="display:none;"></div>
        </div>

        <div id="quoteInfo">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h6 class="mb-0 fw-bold text-success">
                    <i class="material-icons-outlined align-middle me-1" style="font-size:1.1rem">check_circle</i>
                    Quote #<span id="qi_id"></span> Found
                </h6>
                <span class="amount-badge">$<span id="qi_amount">0.00</span></span>
            </div>
            <div class="info-row">
                <div class="info-item">
                    <div class="info-label">Customer</div>
                    <div class="info-value" id="qi_customer">—</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Status</div>
                    <div class="info-value" id="qi_status">—</div>
                </div>
            </div>
            <div class="info-row">
                <div class="info-item">
                    <div class="info-label">Pickup</div>
                    <div class="info-value" id="qi_pickup">—</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Delivery</div>
                    <div class="info-value" id="qi_delivery">—</div>
                </div>
            </div>
            <div class="mt-2" id="qi_vehicles_wrap" style="display:none;">
                <div class="info-label mb-1">Vehicles</div>
                <div id="qi_vehicles"></div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary btn-sm" id="fillFormBtn" type="button">
                    <i class="material-icons-outlined align-middle me-1" style="font-size:0.95rem">edit_note</i>
                    Open Payment Form for this Quote
                </button>
            </div>
        </div>
    </div>

    {{-- STEP 2: Admin Payment Form (hidden until quote loaded) --}}
    <div id="adminPayForm">
        <form id="adminCardForm" method="POST" action="{{ route('admin.quotes.cardPayment.charge') }}">
            @csrf
            <input type="hidden" name="quote_id" id="formQuoteId">

            {{-- Quote Summary --}}
            <div class="charge-summary">
                <div class="row g-3">
                    <div class="col-sm-3">
                        <div class="label">Quote #</div>
                        <div class="value" id="cs_id">—</div>
                    </div>
                    <div class="col-sm-4">
                        <div class="label">Customer</div>
                        <div class="value" id="cs_customer">—</div>
                    </div>
                    <div class="col-sm-3">
                        <div class="label">Amount to Pay</div>
                        <div class="value">$<span id="cs_amount">0.00</span></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="label">+ 4% fee</div>
                        <div class="value text-warning">$<span id="cs_fee">0.00</span></div>
                    </div>
                </div>
            </div>

            {{-- Step 2a: Customer Info --}}
            <div class="card-section">
                <div class="step-title">
                    <span class="step-badge">2</span> Customer Information
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="customer_name" id="f_customer_name" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="customer_email" id="f_customer_email" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Phone</label>
                        <input type="text" class="form-control" name="customer_phone" id="f_customer_phone">
                    </div>
                </div>
            </div>

            {{-- Step 2b: Location Details --}}
            <div class="card-section">
                <div class="step-title">
                    <span class="step-badge">3</span> Location Details
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold text-primary mb-3">
                            <i class="material-icons-outlined align-middle me-1" style="font-size:1rem">place</i>
                            Pickup
                        </h6>
                        <div class="mb-3">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pickup_address1"
                                value="{{ old('pickup_address1', $quote->pickupLocation->address1) }}"
                                id="f_pickup_address" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City, State, Zip <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pickup_address1"
                                value="{{ old('pickup_address1', $quote->pickupLocation->full_location) }}"
                                id="f_pickup_zip" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pickup_contact_name"
                                value="{{ old('pickup_contact_name', $quote->pickupLocation->contact_name) }}"
                                id="f_pickup_contact_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" class="form-control" name="pickup_contact_email"
                                value="{{ old('pickup_contact_email', $quote->pickupLocation->contact_email) }}"
                                id="f_pickup_contact_email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pickup Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="pickup_date" id="f_pickup_date"
                                value="{{ old('pickup_date', $quote->pickup_date ? $quote->pickup_date->format('Y-m-d\TH:i') : '') }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold text-primary mb-3">
                            <i class="material-icons-outlined align-middle me-1" style="font-size:1rem">local_shipping</i>
                            Delivery
                        </h6>
                        <div class="mb-3">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="delivery_address1"
                                value="{{ old('delivery_address1', $quote->deliveryLocation->address1) }}"
                                id="f_delivery_address" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City, State, Zip <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="delivery_address1"
                                value="{{ optional($quote->deliveryLocation)->full_location }}" id="f_delivery_zip"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="delivery_contact_name"
                                value="{{ old('delivery_contact_name', $quote->deliveryLocation->contact_name) }}"
                                id="f_delivery_contact_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" class="form-control" name="delivery_contact_email"
                                value="{{ old('delivery_contact_email', $quote->deliveryLocation->contact_email) }}"
                                id="f_delivery_contact_email">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Step 2c: Payment --}}
            <div class="card-section">
                <div class="step-title">
                    <span class="step-badge">4</span> Payment Amount & Card Details
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Amount to Charge ($) <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control fw-bold" name="charge_amount"
                                id="f_charge_amount" placeholder="0.00" required min="1">
                        </div>
                        <div class="form-text text-muted">
                            4% Stripe fee will be added → Total: $<span id="f_total_display">0.00</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Payment Type</label>
                        <select class="form-select" name="pay_amount_option" id="f_pay_type">
                            <option value="full">Full Payment</option>
                            <option value="initial">Initial / Deposit</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Notes</label>
                        <input type="text" class="form-control" name="notes" placeholder="Admin notes (optional)">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="material-icons-outlined align-middle me-1" style="font-size:1rem">credit_card</i>
                        Card Details <span class="text-danger">*</span>
                    </label>
                    <div id="StripeCardElement"></div>
                    <div id="StripeCardErrors" class="text-danger small mt-1"></div>
                    <input type="hidden" name="stripeToken" id="StripeToken">
                </div>

                {{-- Signature --}}
                <div class="row g-3 mt-2">
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">Authorized By (Name) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="signature_name" id="f_signature_name" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="signature_date" id="f_signature_date"
                            value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="text-center pb-4">
                <button type="submit" class="btn-charge" id="chargeBtn">
                    <i class="material-icons-outlined align-middle me-1" style="font-size:1.1rem">credit_card</i>
                    Charge Card &amp; Book Quote
                </button>
                <div class="text-muted small mt-2">
                    <i class="material-icons-outlined align-middle me-1" style="font-size:0.9rem">lock</i>
                    Secured by Stripe. Card details are never stored on our servers.
                </div>
            </div>
        </form>
    </div>
@endsection

@section('extra_js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function() {
            const stripe = Stripe(`{{ config('services.stripe.key') }}`);
            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                style: {
                    base: {
                        fontSize: '15px',
                        color: '#1a1a2e',
                        fontFamily: 'system-ui, sans-serif',
                        '::placeholder': {
                            color: '#9ca3af'
                        }
                    }
                }
            });
            cardElement.mount('#StripeCardElement');

            cardElement.on('change', function(event) {
                const displayError = document.getElementById('StripeCardErrors');
                displayError.textContent = event.error ? event.error.message : '';
            });

            let currentQuote = null;

            // ── Quote Lookup ──────────────────────────────────────────────────────────
            $('#lookupQuoteBtn').on('click', function() {
                const quoteNum = $('#quoteNumberInput').val().trim();
                if (!quoteNum || isNaN(quoteNum)) {
                    showLookupError('Please enter a valid quote number.');
                    return;
                }

                const btn = $(this);
                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');
                $('#lookupError').hide();
                $('#quoteInfo').hide();
                $('#adminPayForm').hide();

                $.get(`{{ url('/admin/quotes') }}/${quoteNum}/card-payment-info`, function(res) {
                    if (res.success) {
                        currentQuote = res.quote;
                        renderQuoteInfo(res.quote);
                        $('#quoteInfo').slideDown(200);
                    } else {
                        showLookupError(res.message || 'Quote not found.');
                    }
                }).fail(function(xhr) {
                    showLookupError(xhr.responseJSON?.message ||
                        'Quote not found or error occurred.');
                }).always(function() {
                    btn.prop('disabled', false).html(
                        '<i class="material-icons-outlined align-middle" style="font-size:1rem">search</i> Lookup'
                    );
                });
            });

            // Allow Enter key on input
            $('#quoteNumberInput').on('keypress', function(e) {
                if (e.which === 13) $('#lookupQuoteBtn').click();
            });

            function showLookupError(msg) {
                $('#lookupError').text(msg).show();
            }

            function renderQuoteInfo(q) {
                $('#qi_id').text(q.id);
                $('#qi_customer').text(q.customer_name || '—');
                $('#qi_status').text(q.status || '—');
                $('#qi_pickup').text(q.pickup || '—');
                $('#qi_delivery').text(q.delivery || '—');
                $('#qi_amount').text(parseFloat(q.amount_to_pay || 0).toFixed(2));

                if (q.vehicles && q.vehicles.length > 0) {
                    $('#qi_vehicles').html(q.vehicles.map(v => `<span class="vehicle-pill">${v}</span>`).join(''));
                    $('#qi_vehicles_wrap').show();
                } else {
                    $('#qi_vehicles_wrap').hide();
                }
            }

            // ── Fill Form ─────────────────────────────────────────────────────────────
            $('#fillFormBtn').on('click', function() {
                if (!currentQuote) return;
                const q = currentQuote;

                // Hidden quote_id
                $('#formQuoteId').val(q.id);

                // Charge summary bar
                $('#cs_id').text(q.id);
                $('#cs_customer').text(q.customer_name || '—');
                const baseAmt = parseFloat(q.amount_to_pay || 0);
                $('#cs_amount').text(baseAmt.toFixed(2));
                $('#cs_fee').text((baseAmt * 0.04).toFixed(2));

                // Customer info
                $('#f_customer_name').val(q.customer_name || '');
                $('#f_customer_email').val(q.customer_email || '');
                $('#f_customer_phone').val(q.customer_phone || '');

                // Locations
                $('#f_pickup_address').val(q.pickup_address1 || '');
                $('#f_pickup_contact_name').val(q.pickup_contact_name || '');
                $('#f_pickup_contact_email').val(q.pickup_contact_email || '');
                $('#f_pickup_date').val(q.pickup_date || '');

                $('#f_delivery_address').val(q.delivery_address1 || '');
                $('#f_delivery_contact_name').val(q.delivery_contact_name || '');
                $('#f_delivery_contact_email').val(q.delivery_contact_email || '');

                // Charge amount pre-fill with base (admin can adjust)
                $('#f_charge_amount').val(baseAmt.toFixed(2));
                updateTotalDisplay();

                // Signature
                $('#f_signature_name').val(q.customer_name || '');

                $('#adminPayForm').slideDown(300);
                $('html, body').animate({
                    scrollTop: $('#adminPayForm').offset().top - 80
                }, 400);
            });

            // ── Live fee display ──────────────────────────────────────────────────────
            $('#f_charge_amount').on('input', updateTotalDisplay);

            function updateTotalDisplay() {
                const base = parseFloat($('#f_charge_amount').val() || 0);
                const total = base + (base * 0.04);
                $('#f_total_display').text(total.toFixed(2));
            }

            // ── Form Submit (tokenize card first) ─────────────────────────────────────
            document.getElementById('adminCardForm').addEventListener('submit', async function(event) {
                event.preventDefault();

                const btn = document.getElementById('chargeBtn');
                btn.disabled = true;
                btn.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

                const {
                    token,
                    error
                } = await stripe.createToken(cardElement);

                if (error) {
                    document.getElementById('StripeCardErrors').textContent = error.message;
                    btn.disabled = false;
                    btn.innerHTML =
                        '<i class="material-icons-outlined align-middle me-1" style="font-size:1.1rem">credit_card</i> Charge Card & Book Quote';
                } else {
                    document.getElementById('StripeToken').value = token.id;
                    this.submit();
                }
            });
        });
    </script>
@endsection
