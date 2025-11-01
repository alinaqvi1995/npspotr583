<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details - Order #{{ $quote->id }}</title>
    <link rel="icon" href="{{ asset('web-assets/images/logo/1-logo.png') }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .veh-img {
            width: 65px !important;
            height: 65px !important;
        }

        @media print {

            /* Hide buttons and navigation elements */
            .no-print,
            .btn,
            a[href]:not([href="#"]) {
                display: none !important;
            }

            /* Make everything visible */
            body * {
                visibility: visible !important;
                overflow: visible !important;
            }

            /* Layout fix for full width */
            body {
                background: white !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            /* .container,
            .row,
            .col-md-6,
            .col-md-4,
            .col-md-8 {
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            } */

            /* Prevent page breaks inside cards */
            .card {
                page-break-inside: avoid;
            }

            /* Avoid link underlines for cleaner print */
            a[href]:after {
                content: "";
            }

            /* .veh-img {
                width: 50px !important;
                height: 50px !important;
            } */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-bar d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div class="d-flex align-items-center">
                <img src="{{ asset('web-assets/images/logo/logo_001.png') }}" alt="Logo" class="company-logo me-3">
                <h4 class="mb-0 text-uppercase fw-bold">Order Details</h4>
            </div>
            <button class="btn btn-outline-primary no-print" onclick="window.print()">
                🖨️ Print Quote
            </button>
        </div>
        <hr>

        {{-- =========================== CUSTOMER + QUOTE INFO ============================ --}}
        <div class="row">
            {{-- Customer Info --}}
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white"><strong>Customer</strong></div>
                    <div class="card-body">
                        @foreach (['customer_name' => 'Name', 'customer_email' => 'Email', 'customer_phone' => 'Phone'] as $field => $label)
                            @if ($quote->$field)
                                <p><strong>{{ $label }}:</strong> {{ $quote->$field }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Quote Info --}}
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white"><strong>Quote Info</strong></div>
                    <div class="card-body row">
                        <div class="col-sm-6">
                            @if ($quote->categoryName())
                                <p><strong>Category:</strong> {{ $quote->categoryName() }}</p>
                            @endif
                            @if ($quote->subcategoryName())
                                <p><strong>Subcategory:</strong> {{ $quote->subcategoryName() }}</p>
                            @endif
                            @if ($quote->vehicle_type)
                                <p><strong>Vehicle Type:</strong> {{ $quote->vehicle_type }}</p>
                            @endif
                            @if ($quote->status_label)
                                <p><strong>Status:</strong> {!! $quote->status_label !!}</p>
                            @endif
                            @if ($quote->user)
                                <p><strong>Created By:</strong> {{ $quote->user->name }}</p>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if ($quote->pickup_location)
                                <p><strong>Pickup:</strong> {{ $quote->pickup_location }}</p>
                            @endif
                            @if ($quote->pickup_date_formatted)
                                <p><strong>Pickup Date:</strong> {{ $quote->pickup_date_formatted }}</p>
                            @endif
                            @if ($quote->delivery_location)
                                <p><strong>Delivery:</strong> {{ $quote->delivery_location }}</p>
                            @endif
                            @if ($quote->delivery_date_formatted)
                                <p><strong>Delivery Date:</strong> {{ $quote->delivery_date_formatted }}</p>
                            @endif
                            <p><strong>Created At:</strong> {{ $quote->created_at_formatted }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- =========================== PRICING ============================ --}}
        @if ($quote->amount_to_pay || $quote->cop_cod || $quote->balance)
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white"><strong>Pricing</strong></div>
                <div class="card-body">
                    @if ($quote->amount_to_pay)
                        <p><strong>Amount to Pay:</strong> ${{ number_format($quote->amount_to_pay, 2) }}</p>
                    @endif
                    @if ($quote->cop_cod)
                        <p><strong>COD:</strong> {{ $quote->cop_cod }}</p>
                    @endif
                    @if ($quote->cop_cod_amount)
                        <p><strong>COD Amount:</strong> ${{ number_format($quote->cop_cod_amount, 2) }}</p>
                    @endif
                    @if ($quote->balance)
                        <p><strong>Balance:</strong> {{ $quote->balance }}</p>
                    @endif
                    @if ($quote->balance_amount)
                        <p><strong>Balance Amount:</strong> ${{ number_format($quote->balance_amount, 2) }}</p>
                    @endif
                    @if ($quote->discounted_price)
                        <p><strong>Discounted Price:</strong> ${{ number_format($quote->discounted_price, 2) }}</p>
                    @endif
                </div>
            </div>
        @endif

        {{-- =========================== PICKUP + DELIVERY ============================ --}}
        <div class="row mb-3">
            {{-- Pickup --}}
            @if ($quote->pickupLocation)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white"><strong>Pickup Details</strong></div>
                        <div class="card-body">
                            @php $pickup = $quote->pickupLocation; @endphp

                            @if ($pickup->address1 || $pickup->address2)
                                <p><strong>Address:</strong> {{ $pickup->address1 }} {{ $pickup->address2 }}</p>
                            @endif

                            @if ($pickup->city || $pickup->state)
                                <p><strong>City/State/Zip:</strong> {{ $pickup->city }}, {{ $pickup->state }}
                                    {{ $pickup->zip }}</p>
                            @endif

                            @if ($pickup->contact_name)
                                <p><strong>Contact:</strong> {{ $pickup->contact_name }}</p>
                            @endif

                            @if ($pickup->contact_email)
                                <p><strong>Email:</strong> {{ $pickup->contact_email }}</p>
                            @endif

                            @if ($quote->pickupPhones && $quote->pickupPhones->count())
                                <p><strong>Phone(s):</strong></p>
                                <ul class="mb-0">
                                    @foreach ($quote->pickupPhones as $phone)
                                        <li>{{ $phone->phone }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (!is_null($pickup->twic))
                                <p><strong>TWIC:</strong> {{ $pickup->twic ? 'Yes' : 'No' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            {{-- Delivery --}}
            @if ($quote->deliveryLocation)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white"><strong>Delivery Details</strong></div>
                        <div class="card-body">
                            @php $delivery = $quote->deliveryLocation; @endphp

                            @if ($delivery->address1 || $delivery->address2)
                                <p><strong>Address:</strong> {{ $delivery->address1 }} {{ $delivery->address2 }}</p>
                            @endif

                            @if ($delivery->city || $delivery->state)
                                <p><strong>City/State/Zip:</strong> {{ $delivery->city }}, {{ $delivery->state }}
                                    {{ $delivery->zip }}</p>
                            @endif

                            @if ($delivery->contact_name)
                                <p><strong>Contact:</strong> {{ $delivery->contact_name }}</p>
                            @endif

                            @if ($delivery->contact_email)
                                <p><strong>Email:</strong> {{ $delivery->contact_email }}</p>
                            @endif

                            @if ($quote->deliveryPhones && $quote->deliveryPhones->count())
                                <p><strong>Phone(s):</strong></p>
                                <ul class="mb-0">
                                    @foreach ($quote->deliveryPhones as $phone)
                                        <li>{{ $phone->phone }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (!is_null($delivery->twic))
                                <p><strong>TWIC:</strong> {{ $delivery->twic ? 'Yes' : 'No' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if ($quote->load_id || $quote->pre_dispatch_notes || $quote->load_specific_terms)
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white"><strong>Additional Info</strong></div>
                <div class="card-body">
                    @if ($quote->load_id)
                        <p><strong>Load ID:</strong> {{ $quote->load_id }}</p>
                    @endif
                    @if ($quote->pre_dispatch_notes)
                        <p><strong>Pre-Dispatch Notes:</strong> {{ $quote->pre_dispatch_notes }}</p>
                    @endif
                    @if ($quote->transport_special_instructions)
                        <p><strong>Special Instructions:</strong> {{ $quote->transport_special_instructions }}</p>
                    @endif
                    @if ($quote->load_specific_terms)
                        <p><strong>Load Terms:</strong> {{ $quote->load_specific_terms }}</p>
                    @endif
                </div>
            </div>
        @endif

        {{-- =========================== VEHICLES + HISTORIES (ROW 9-3) =========================== --}}
        @if ($quote->vehicles->count() || $quote->histories->count())
            <div class="row mb-3">

                {{-- VEHICLES (9 columns) --}}
                @if ($quote->vehicles->count())
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white py-2">
                                <strong>Vehicles ({{ $quote->vehicles->count() }})</strong>
                            </div>
                            <div class="card-body p-2">
                                <div class="accordion" id="vehicleAccordion">
                                    @foreach ($quote->vehicles as $i => $v)
                                        <div class="card mb-2 border shadow-sm">
                                            <div class="card-header py-2 bg-light">
                                                <strong>{{ $v->year }} {{ $v->make }}
                                                    {{ $v->model }}</strong>
                                            </div>
                                            <div class="card-body py-2 px-3">
                                                <div class="row small mb-1">
                                                    <div class="col-md-3"><strong>Type:</strong> {{ $v->type ?? '—' }}
                                                    </div>
                                                    <div class="col-md-3"><strong>Condition:</strong>
                                                        {!! $v->condition_label !!}</div>
                                                    <div class="col-md-3"><strong>Trailer:</strong>
                                                        {!! $v->trailer_type_label !!}</div>
                                                    <div class="col-md-3"><strong>Modified:</strong>
                                                        {{ $v->modified ? 'Yes' : 'No' }}</div>
                                                </div>

                                                @if ($v->modified_info)
                                                    <div class="small mb-2"><strong>Modified Info:</strong>
                                                        {{ $v->modified_info }}</div>
                                                @endif

                                                {{-- Dimensions --}}
                                                @if (in_array($v->type, ['Boat-Transport', 'Heavy-Equipment', 'RV-Transport']))
                                                    <div class="row small mb-1 border-top pt-1 mt-1">
                                                        @foreach (['length_ft' => 'Length (ft)', 'width_ft' => 'Width (ft)', 'height_ft' => 'Height (ft)', 'weight' => 'Weight (lbs)'] as $field => $label)
                                                            @if ($v->$field)
                                                                <div class="col-md-3">
                                                                    <strong>{{ $label }}:</strong>
                                                                    {{ $v->$field }}
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif

                                                {{-- Auction --}}
                                                <div class="row small border-top pt-1 mt-1">
                                                    <div class="col-md-3"><strong>At Auction:</strong>
                                                        {{ $v->available_at_auction ? 'Yes' : 'No' }}</div>
                                                    @if ($v->available_at_auction)
                                                        @if ($v->available_link)
                                                            <div class="col-md-5 text-truncate">
                                                                <strong>Link:</strong>
                                                                <a href="{{ $v->available_link }}"
                                                                    target="_blank">{{ $v->available_link }}</a>
                                                            </div>
                                                        @endif
                                                        @if ($v->buyer)
                                                            <div class="col-md-2"><strong>Buyer:</strong>
                                                                {{ $v->buyer }}</div>
                                                        @endif
                                                        @if ($v->lot)
                                                            <div class="col-md-2"><strong>Lot:</strong>
                                                                {{ $v->lot }}</div>
                                                        @endif
                                                        @if ($v->gatepin)
                                                            <div class="col-md-2"><strong>Gate PIN:</strong>
                                                                {{ $v->gatepin }}</div>
                                                        @endif
                                                    @endif
                                                </div>

                                                {{-- Images --}}
                                                @if ($v->images->count())
                                                    <div class="border-top pt-2 mt-2">
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach ($v->images as $img)
                                                                <img src="{{ asset($img->image_path) }}"
                                                                    class="rounded border" width="80" height="80"
                                                                    style="object-fit:cover;">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- HISTORIES (3 columns) --}}
                <div class="col-md-4">
                    {{-- QUOTE HISTORY --}}
                    @php
                        $statusHistories = $quote->histories->filter(fn($h) => $h->status !== $h->old_status);
                    @endphp

                    @if ($statusHistories->count())
                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white py-2">
                                <strong>Quote History ({{ $statusHistories->count() }})</strong>
                            </div>
                            <div class="card-body p-2">
                                <div class="table-responsive" style="max-height:300px; overflow-y:auto;">
                                    <table class="table table-bordered table-striped table-sm align-middle mb-0">
                                        <thead class="table-light text-center small">
                                            <tr>
                                                <th>#</th>
                                                <th>Status</th>
                                                <th>Old</th>
                                                <th>By</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($statusHistories as $index => $h)
                                                <tr class="small text-center">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{!! $h->status ? '<span class="badge bg-primary">' . e($h->status) . '</span>' : '—' !!}</td>
                                                    <td>{!! $h->old_status ? '<span class="badge bg-secondary">' . e($h->old_status) . '</span>' : '—' !!}</td>
                                                    <td>{{ $h->user->name ?? 'System' }}</td>
                                                    <td>{{ $h->created_at?->format('M d, Y h:ia') ?? '—' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- AGENT HISTORY --}}
                    @if ($quote->agentHistories->count())
                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white py-2">
                                <strong>Agent History ({{ $quote->agentHistories->count() }})</strong>
                            </div>
                            <div class="card-body p-2">
                                <div class="table-responsive" style="max-height:300px; overflow-y:auto;">
                                    <table class="table table-bordered table-striped table-sm align-middle mb-0">
                                        <thead class="table-light text-center small">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>By</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quote->agentHistories as $index => $a)
                                                <tr class="small text-center">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $a->title ?? '—' }}</td>
                                                    <td>{{ $a->description ?? '—' }}</td>
                                                    <td>{{ $a->user->name ?? 'System' }}</td>
                                                    <td>{{ $a->created_at?->format('M d, Y h:ia') ?? '—' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if ($quote->OrderForm)
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white"><strong>Order Form</strong></div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <p><strong>Customer Name:</strong> {{ $quote->OrderForm->customer_name }}</p>
                        <p><strong>Email:</strong> {{ $quote->OrderForm->customer_email }}</p>
                        <p><strong>Phone:</strong> {{ $quote->OrderForm->customer_phone }}</p>
                        <p><strong>Pickup Date:</strong> {{ $quote->OrderForm->pickup_date_formatted }}</p>
                        <p><strong>Delivery Date:</strong> {{ $quote->OrderForm->delivery_date_formatted }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Pickup Address:</strong> {{ $quote->OrderForm->pickup_address1 }}</p>
                        <p><strong>Delivery Address:</strong> {{ $quote->OrderForm->delivery_address1 }}</p>
                        @if ($quote->OrderForm->special_instructions)
                            <p><strong>Special Instructions:</strong> {{ $quote->OrderForm->special_instructions }}</p>
                        @endif
                        @if ($quote->OrderForm->payment_option)
                            <p><strong>Payment Option:</strong> {{ ucfirst($quote->OrderForm->payment_option) }}</p>
                        @endif
                        @if ($quote->OrderForm->signature_name)
                            <p><strong>Signed By:</strong> {{ $quote->OrderForm->signature_name }}</p>
                            <p><strong>Signature Date:</strong>
                                {{ $quote->OrderForm->signature_date?->format('M d, Y') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Bootstrap Bundle (JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
