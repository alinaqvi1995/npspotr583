@extends('dashboard.includes.partial.base')

@section('title', 'Quotes')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/photoswipe@5/dist/photoswipe.css">

    <style>
        .pagination {
            margin: 0;
            display: flex;
            gap: 4px;
        }

        .pagination .page-item .page-link {
            border-radius: 50% !important;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            padding: 0;
            font-size: 0.9rem;
            margin: 0;
            color: #495057;
            border: 1px solid #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
    <h6 class="mb-0 text-uppercase">All Quotes</h6>
    <hr>
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <h5 class="mb-0">Recent Quotes</h5>
                </div>
                <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Export</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Download</a></li>
                    </ul>
                </div>
            </div>

            <div class="d-flex mb-3">
                <select id="columnFilter" class="form-select w-auto me-2">
                    <option value="" {{ request('column') == '' ? 'selected' : '' }}>All Columns</option>
                    <option value="order" {{ request('column', 'order') == 'order' ? 'selected' : 'selected' }}>Order#
                    </option>
                    <option value="customer" {{ request('column') == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="customer_phone" {{ request('column') == 'customer_phone' ? 'selected' : '' }}>Customer
                        Phone</option>
                    <option value="vehicles" {{ request('column') == 'vehicles' ? 'selected' : '' }}>Vehicles</option>
                    <option value="pickup" {{ request('column') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                    <option value="delivery" {{ request('column') == 'delivery' ? 'selected' : '' }}>Delivery</option>
                </select>

                <input class="form-control rounded-5 px-3 me-2" type="text" placeholder="Search..." id="quoteSearch"
                    value="{{ request('search') }}">

                <!-- Search Button -->
                <button id="searchBtn" class="btn btn-sm btn-primary me-2" title="Search">
                    <i class="material-icons-outlined">search</i>
                </button>

                <!-- Reset Button -->
                <button id="resetBtn" class="btn btn-sm btn-secondary" title="Reset">
                    <i class="material-icons-outlined">refresh</i>
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-center" id="quoteTable">
                    <thead>
                        <tr>
                            <th>Sr#.</th>
                            <th>Quote#.</th>
                            <th>Customer</th>
                            <th>Vehicles</th>
                            <th>Pickup / Delivery</th>
                            {{-- <th>Status</th> --}}
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quotes as $quote)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $quote->id }}<br>
                                </td>
                                <td>
                                    @if ($quote->customer_name == optional($quote->pickupLocation)->contact_name)
                                        {{-- Case: Normal == Pickup → show Delivery --}}
                                        {{ optional($quote->deliveryLocation)->contact_name }}<br>
                                        <small>{{ optional($quote->deliveryLocation)->contact_email }}</small><br>
                                        <small>{{ optional($quote->deliveryPhones->first())->phone }}</small>
                                    @elseif ($quote->customer_name || $quote->customer_email || $quote->customer_phone)
                                        {{-- Case: Normal (customer) exists → show Customer --}}
                                        {{ $quote->customer_name ?? optional($quote->deliveryLocation)->contact_name }}<br>
                                        <small>{{ $quote->customer_email ?? optional($quote->deliveryLocation)->contact_email }}</small><br>
                                        <small>{{ $quote->customer_phone ?? optional($quote->deliveryPhones->first())->phone }}</small>
                                    @else
                                        {{-- Fallback → Delivery --}}
                                        {{ optional($quote->deliveryLocation)->contact_name }}<br>
                                        <small>{{ optional($quote->deliveryLocation)->contact_email }}</small><br>
                                        <small>{{ optional($quote->deliveryPhones->first())->phone }}</small>
                                    @endif
                                </td>
                                <td>
                                    @foreach ($quote->vehicles as $vehicle)
                                        <div class="mb-2 border-bottom pb-2">
                                            {{-- Prominent YMM --}}
                                            <p class="mb-1 fw-bold fs-6">
                                                {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                            </p>

                                            {{-- Smaller condition --}}
                                            @if ($vehicle->condition)
                                                <div class="small text-muted">
                                                    Condition: {!! $vehicle->condition_label !!}
                                                </div>
                                            @endif

                                            {{-- Smaller trailer type --}}
                                            @if ($vehicle->trailer_type)
                                                <div class="small text-muted">
                                                    Trailer: {!! $vehicle->trailer_type_label !!}
                                                </div>
                                            @endif

                                            {{-- Vehicle images --}}
                                            @if ($vehicle->images->count())
                                                {{-- <div class="d-flex flex-wrap justify-content-center mt-1">
                                                    @foreach ($vehicle->images as $img)
                                                        <img src="{{ asset($img->image_path) }}"
                                                            alt="{{ $vehicle->make }} {{ $vehicle->model }}"
                                                            width="50" height="50"
                                                            class="rounded-circle me-1 mb-1 border">
                                                    @endforeach
                                                </div> --}}
                                                <div class="d-flex flex-wrap justify-content-center mt-1"
                                                    id="vehicle-gallery">
                                                    @foreach ($vehicle->images as $img)
                                                        <a href="{{ asset($img->image_path) }}" data-pswp-width="1200"
                                                            data-pswp-height="800" target="_blank" class="me-1 mb-1">
                                                            <img src="{{ asset($img->image_path) }}"
                                                                alt="{{ $vehicle->make }} {{ $vehicle->model }}"
                                                                width="50" height="50" class="rounded-circle border">
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    <strong>Pickup:</strong><br>
                                    <a href="https://www.google.com/maps/search/{{ urlencode($quote->pickupLocation->full_location) }}"
                                        target="_blank">{{ $quote->pickupLocation->full_location }}</a><br>
                                    <span>{{ $quote->pickup_date_formatted }}</span><br>
                                    <strong>Delivery:</strong><br>
                                    <a href="https://www.google.com/maps/search/{{ urlencode($quote->deliveryLocation->full_location) }}"
                                        target="_blank">{{ $quote->deliveryLocation->full_location }}</a><br>
                                    <span>{{ $quote->delivery_date_formatted }}</span>
                                </td>
                                {{-- <td>{!! $quote->status_label !!}</td> --}}
                                <td>{{ $quote->created_at_formatted }}</td>
                                <td>
                                    {!! $quote->status_label !!}
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light border dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            @can('edit-quotes')
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard.quotes.edit', $quote->id) }}">
                                                        <i class="material-icons-outlined fs-6 me-1">edit</i> Edit Quote
                                                    </a>
                                                </li>
                                            @endcan
                                            <li>
                                                @if ($quote->orderForm()->exists())
                                                    <a class="dropdown-item view-order-form"
                                                        href="{{ route('dashboard.orderForms.show', $quote->orderForm->id) }}"
                                                        target="_blank" data-id="{{ $quote->id }}">
                                                        <i class="material-icons-outlined fs-6 me-1">send</i> View Order
                                                        Form
                                                    </a>
                                                @else
                                                    <a class="dropdown-item send-order-form" href="javascript:;"
                                                        data-id="{{ $quote->id }}"
                                                        data-price="{{ $quote->amount_to_pay }}">
                                                        <i class="material-icons-outlined fs-6 me-1">send</i> Send Order
                                                        Form
                                                    </a>
                                                @endif
                                            </li>
                                            <li>
                                                <a class="dropdown-item view-logs" href="javascript:;"
                                                    data-id="{{ $quote->id }}">
                                                    <i class="material-icons-outlined fs-6 me-1">receipt_long</i> View Logs
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item agent-history" href="javascript:;"
                                                    data-id="{{ $quote->id }}">
                                                    <i class="material-icons-outlined fs-6 me-1">history</i> Agent History
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item change-status" href="javascript:;"
                                                    data-id="{{ $quote->id }}" data-status="{{ $quote->status }}">
                                                    <i class="material-icons-outlined fs-6 me-1">swap_horiz</i> Change
                                                    Status
                                                </a>
                                            </li>
                                            {{-- @if ($quote->listed_price && in_array($quote->status, ['Listed', 'Completed'])) --}}
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.quotes.details', $quote->id) }}">
                                                    <i class="material-icons-outlined fs-6 me-1">edit</i> View Order
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item payment" href="javascript:;"
                                                    data-id="{{ $quote->id }}" data-order-id="{{ $quote->id }}"
                                                    data-vehicles="{{ $quote->vehicles->map(fn($v) => $v->year . ' ' . $v->make . ' ' . $v->model)->implode(' | ') }}"
                                                    data-pickup-zip="{{ $quote->pickupLocation->full_location }}"
                                                    data-delivery-zip="{{ $quote->deliveryLocation->full_location }}"
                                                    data-book-price="{{ $quote->amount_to_pay }}"
                                                    data-listed-price="{{ $quote->listed_price }}"
                                                    data-profit="{{ $quote->amount_to_pay - $quote->listed_price }}"
                                                    data-status="{{ $quote->status }}">
                                                    <i class="material-icons-outlined fs-6 me-1">wallet</i> Payment
                                                </a>
                                            </li>
                                            {{-- @endif --}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Pagination controls --}}
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="small text-muted">
                    {{-- Showing {{ $quotes->firstItem() }} to {{ $quotes->lastItem() }} of {{ $quotes->total() }} entries --}}
                </div>
                <div>
                    {{ $quotes->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Send Order Form Modal -->
    <div class="modal fade" id="sendOrderFormModal" tabindex="-1" aria-labelledby="sendOrderFormLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title d-flex align-items-center" id="sendOrderFormLabel">
                        <i class="material-icons-outlined me-2">send</i> Send Order Form
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('dashboard.quotes.sendOrderForm') }}">
                    @csrf
                    <input type="hidden" name="quote_id" id="orderFormQuoteId">

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Recipient Email</label>
                            <input type="email" name="email" class="form-control rounded-3"
                                placeholder="Enter recipient email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Initial Amount</label>
                            <input type="number" step="0.01" name="initial_amount" id="initialAmount"
                                class="form-control rounded-3" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Amount to Pay</label>
                            <input type="number" step="0.01" name="amount_to_pay" id="orderFormQuoteAmount"
                                class="form-control rounded-3" placeholder="" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control rounded-3" rows="4" placeholder="Write your message..." required></textarea>
                        </div> --}}
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-sm btn-secondary rounded-3 px-4"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary rounded-3 px-4">
                            <i class="material-icons-outlined me-1 fs-6">send</i> Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- paymentModal --}}
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title d-flex align-items-center" id="paymentModalLabel">
                        <i class="material-icons-outlined me-2">payments</i> Payment Summary
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="">
                    @csrf
                    <input type="hidden" name="quote_id" id="paymentQuoteId">

                    <div class="modal-body p-4">

                        {{-- SUMMARY SECTION --}}
                        <div class="bg-light border rounded-4 p-3 mb-4">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="fw-semibold text-muted">Order ID</label>
                                    <div class="fw-bold fs-6" id="paymentOrderId"></div>
                                </div>

                                <div class="col-md-8">
                                    <label class="fw-semibold text-muted">Vehicles</label>
                                    <div id="paymentVehiclesList" class="fw-bold text-dark"
                                        style="max-height: 90px; overflow-y: auto;">
                                        <span class="text-muted fst-italic">No vehicles</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-semibold text-muted">Pickup ZIP</label>
                                    <div class="fw-bold text-dark" id="paymentPickupZip"></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-semibold text-muted">Delivery ZIP</label>
                                    <div class="fw-bold text-dark" id="paymentDeliveryZip"></div>
                                </div>

                                <div class="col-md-4">
                                    <label class="fw-semibold text-success">Book Price</label>
                                    <div class="fw-bold text-success fs-6" id="paymentBookPrice"></div>
                                </div>

                                <div class="col-md-4">
                                    <label class="fw-semibold text-danger">Listed Price</label>
                                    <div class="fw-bold text-danger fs-6" id="paymentListedPrice"></div>
                                </div>

                                <div class="col-md-4">
                                    <label class="fw-semibold text-primary">Profit</label>
                                    <div class="fw-bold text-primary fs-6" id="paymentProfit"></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-semibold text-muted">Status</label>
                                    <div class="fw-bold text-dark" id="paymentStatus"></div>
                                </div>

                            </div>
                        </div>

                        {{-- ACTION SECTION --}}
                        <div class="border-top pt-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Pay From</label>
                                    <select id="paymentFrom" name="pay_from" class="form-select form-select-sm rounded-3"
                                        required>
                                        <option value="">-- Select Payment Method --</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Zelle">Zelle</option>
                                        <option value="Cash App">Cash App</option>
                                        <option value="Venmo">Venmo</option>
                                        <option value="Paypal">Paypal</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Description / Notes</label>
                                    <textarea name="payment_Description" id="paymentDescription" class="form-control form-control-sm rounded-3"
                                        placeholder="Enter payment notes..." rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer bg-light border-top">
                        <button type="button" class="btn btn-sm btn-secondary rounded-3 px-4" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-sm btn-success rounded-3 px-4">
                            <i class="material-icons-outlined me-1 fs-6">check_circle</i> Confirm Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title d-flex align-items-center" id="paymentModalLabel">
                        <i class="material-icons-outlined me-2">payments</i> Payment Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="">
                    @csrf
                    <input type="hidden" name="quote_id" id="paymentQuoteId">

                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Order ID</label>
                                <div class="form-control form-control-sm bg-light" id="paymentOrderId"></div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Vehicles</label>
                                <div id="paymentVehiclesList" class="border rounded-3 p-2 bg-light"
                                    style="min-height: 38px; max-height: 90px; overflow-y: auto;">
                                    <span class="text-muted fst-italic">No vehicles</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pickup ZIP</label>
                                <div class="form-control form-control-sm bg-light" id="paymentPickupZip"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Delivery ZIP</label>
                                <div class="form-control form-control-sm bg-light" id="paymentDeliveryZip"></div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-success">Book Price ($)</label>
                                <div class="form-control form-control-sm bg-light text-success fw-bold"
                                    id="paymentBookPrice"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-danger">Listed Price ($)</label>
                                <div class="form-control form-control-sm bg-light text-danger fw-bold"
                                    id="paymentListedPrice"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-primary">Profit ($)</label>
                                <div class="form-control form-control-sm bg-light text-primary fw-bold"
                                    id="paymentProfit"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status</label>
                                <div class="form-control form-control-sm bg-light" id="paymentStatus"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pay From</label>
                                <select id="paymentFrom" name="pay_from" class="form-select form-select-sm rounded-3"
                                    required>
                                    <option value="">-- Select Payment Method --</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Zelle">Zelle</option>
                                    <option value="Cash App">Cash App</option>
                                    <option value="Venmo">Venmo</option>
                                    <option value="Paypal">Paypal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-sm btn-secondary rounded-3 px-4" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-sm btn-success rounded-3 px-4">
                            <i class="material-icons-outlined me-1 fs-6">check_circle</i> Confirm Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Log Modal -->
    <div class="modal fade" id="historyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">Quote History Log</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Change Type</th>
                                <th>Old → New</th>
                                <th>Changed By</th>
                                <th>When</th>
                            </tr>
                        </thead>
                        <tbody id="historyTableBody">
                            <tr>
                                <td colspan="5" class="text-center">Loading...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Agent History Modal -->
    <div class="modal fade" id="agentHistoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow border-0 rounded-3">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="material-icons-outlined me-2">history</i> Agent History</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="agentHistoryTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="add-tab" data-bs-toggle="tab"
                                data-bs-target="#addHistory" type="button">Add History</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewHistory"
                                type="button">View History</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3">
                        <!-- Add History -->
                        <div class="tab-pane fade show active" id="addHistory">
                            <form method="POST" action="{{ route('dashboard.quotes.agentHistory.store') }}">
                                @csrf
                                <input type="hidden" name="quote_id" id="agentHistoryQuoteId">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control rounded-3" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control rounded-3" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </form>
                        </div>

                        <!-- View History -->
                        <div class="tab-pane fade" id="viewHistory">
                            <div id="historyContent">Loading history...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="statusForm" method="POST" action="">
                @csrf
                @method('PATCH')
                <input type="hidden" name="quote_id" id="statusQuoteId">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" id="statusSelect" class="form-select">
                            @foreach ($statusToChange as $status => $details)
                                <option value="{{ $details }}">{{ $details }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-body" id="listedPriceContainer" style="display: none;">
                        <label class="form-label fw-semibold">Listed Price ($)</label>
                        <input type="number" step="0.01" name="listed_price" id="listedPrice"
                            class="form-control rounded-3" placeholder="Enter listed price">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('extra_js')
    <script src="https://unpkg.com/photoswipe@5/dist/photoswipe-lightbox.esm.js" type="module"></script>

    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                function doSearch() {
                    let search = $('#quoteSearch').val();
                    let column = $('#columnFilter').val() || 'order'; // default to order

                    let url = new URL(window.location.href);
                    url.searchParams.set('search', search);
                    url.searchParams.set('column', column);
                    url.searchParams.delete('page'); // reset pagination

                    window.location.href = url.toString();
                }

                // Search on button click
                $('#searchBtn').on('click', function() {
                    doSearch();
                });

                // Search on Enter key
                $('#quoteSearch').on('keypress', function(e) {
                    if (e.which === 13) { // Enter key
                        e.preventDefault();
                        doSearch();
                    }
                });

                // Reset button clears filters and search
                $('#resetBtn').on('click', function() {
                    let url = new URL(window.location.href);
                    url.searchParams.delete('search');
                    url.searchParams.delete('column');
                    url.searchParams.delete('page'); // reset pagination
                    window.location.href = url.toString();
                });
            });

            // ✅ Send Order Form
            $(document).on('click', '.send-order-form', function() {
                let quoteId = $(this).data('id');
                let quoteAmount = $(this).data('price');
                $('#orderFormQuoteId').val(quoteId);
                $('#orderFormQuoteAmount').val(quoteAmount);
                $('#sendOrderFormModal').modal('show');
            });

            // ✅ View Logs (Quote History Log)
            $(document).on('click', '.view-logs', function() {
                let quoteId = $(this).data('id');
                $('#historyModal').modal('show'); // correct modal ID
                loadHistories(quoteId); // call loader
            });

            $(document).on('click', '.payment', function() {
                let q = $(this).data();

                $('#paymentQuoteId').val(q.id);
                $('#paymentOrderId').text(q.orderId || '—');

                let vehiclesData = q.vehicles;
                if (vehiclesData && vehiclesData.length > 0) {
                    let vehicleList = vehiclesData.split('|');
                    $('#paymentVehiclesList').html(
                        vehicleList.map(v =>
                            `<span class="badge bg-secondary me-1 mb-1">${v.trim()}</span>`).join('')
                    );
                } else {
                    $('#paymentVehiclesList').html(
                        '<span class="text-muted fst-italic">No vehicles</span>');
                }

                $('#paymentPickupZip').text(q.pickupZip || '—');
                $('#paymentDeliveryZip').text(q.deliveryZip || '—');
                $('#paymentBookPrice').text(q.bookPrice || '—');
                $('#paymentListedPrice').text(q.listedPrice || '—');

                let profit = parseFloat(q.bookPrice || 0) - parseFloat(q.listedPrice || 0);
                $('#paymentProfit').text(profit.toFixed(2));

                $('#paymentStatus').text(q.status || '—');
                $('#paymentFrom').val('');

                $('#paymentModal').modal('show');
            });

            // ✅ Agent History (custom notes per agent)
            $(document).on('click', '.agent-history', function() {
                let quoteId = $(this).data('id');
                $('#agentHistoryQuoteId').val(quoteId);
                $('#agentHistoryModal').modal('show');

                // Load history tab content
                $('#historyContent').html('Loading...');
                let agentUrl = "{{ route('dashboard.quotes.agentHistory', ':id') }}";
                agentUrl = agentUrl.replace(':id', quoteId);

                $.get(agentUrl, function(data) {
                    $('#historyContent').html(data);
                });
            });

            // ✅ AJAX loader for Quote History Log
            function loadHistories(quoteId) {
                $('#historyTableBody').html('<tr><td colspan="5" class="text-center">Loading...</td></tr>');

                let url = "{{ route('dashboard.quotes.histories', ':id') }}";
                url = url.replace(':id', quoteId);

                $.get(url, function(response) {
                    let rows = '';
                    if (response.histories.length === 0) {
                        rows = '<tr><td colspan="5" class="text-center">No history found.</td></tr>';
                    } else {
                        response.histories.forEach((h, i) => {
                            let changes = '';
                            if (h.data) {
                                for (const [key, val] of Object.entries(h.data)) {
                                    let oldVal = h.old_status && key === 'status' ? h.old_status :
                                        '-';
                                    changes += `<div><b>${key}</b>: ${oldVal} → ${val}</div>`;
                                }
                            } else {
                                changes = `${h.old_status ?? '-'} → ${h.new_status}`;
                            }

                            rows += `
                            <tr>
                            <td>${i+1}</td>
                                <td>${h.change_type}</td>
                                <td>${changes}</td>
                                <td>${h.changed_by}</td>
                                <td>${h.created_at}</td>
                            </tr>`;
                        });
                    }
                    $('#historyTableBody').html(rows);
                });
            }

            $(document).on('click', '.change-status', function() {
                let id = $(this).data('id');
                let current = $(this).data('status');
                console.log(current);

                let updateUrl = "{{ route('dashboard.quotes.updateStatus', ':id') }}".replace(':id', id);
                let allowedUrl = "{{ route('dashboard.quotes.allowedStatuses', ':id') }}".replace(':id',
                    id);

                $.get(allowedUrl, {
                    quoteID: id
                }, function(response) {
                    let options = '';
                    Object.keys(response.allowed).forEach(function(status) {
                        options += `<option value="${status}">${status}</option>`;
                    });
                    $('#statusSelect').html(options);
                    $('#statusSelect').val(response.current);
                });

                $('#statusForm').attr('action', updateUrl);
                $('#statusQuoteId').val(id);
                $('#statusModal').modal('show');
            });

            //listed price
            $(document).on('change', '#statusSelect', function() {
                let selectedStatus = $(this).val();

                if (selectedStatus === 'Listed') {
                    $('#listedPriceContainer').show();
                    $('#listedPrice').attr('required', true);
                } else {
                    $('#listedPriceContainer').hide();
                    $('#listedPrice').removeAttr('required');
                    $('#listedPrice').val('');
                }
            });
        });
    </script>
    <script type="module">
        import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe@5/dist/photoswipe-lightbox.esm.js';

        const lightbox = new PhotoSwipeLightbox({
            gallery: '#vehicle-gallery',
            children: 'a',
            pswpModule: () => import('https://unpkg.com/photoswipe@5/dist/photoswipe.esm.js')
        });
        lightbox.init();
    </script>
@endsection
