@extends('dashboard.includes.partial.base')

@section('title', 'Quotes')

@section('content')
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
                    <option value="">All Columns</option>
                    <option value="1">Customer</option>
                    <option value="2">Vehicles</option>
                    <option value="3">Pickup / Delivery</option>
                </select>
                <input class="form-control rounded-5 px-3" type="text" placeholder="Search..." id="quoteSearch">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="quoteTable">
                    <thead>
                        <tr>
                            <th>Sr#.</th>
                            <th>Customer</th>
                            <th>Vehicles</th>
                            <th>Pickup / Delivery</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quotes as $quote)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $quote->customer_name }}<br>
                                    <small>{{ $quote->customer_email }}</small><br>
                                    <small>{{ $quote->customer_phone }}</small>
                                </td>
                                <td>
                                    @foreach ($quote->vehicles as $vehicle)
                                        <p class="mb-1">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                        </p>
                                        @if ($vehicle->images->count())
                                            <div class="d-flex flex-wrap mb-2">
                                                @foreach ($vehicle->images as $img)
                                                    <img src="{{ asset($img->image_path) }}"
                                                        alt="{{ $vehicle->make }} {{ $vehicle->model }}" width="50"
                                                        height="50" class="rounded-circle me-1 mb-1">
                                                @endforeach
                                            </div>
                                        @endif
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
                                <td>{!! $quote->status_label !!}</td>
                                <td>
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
                                                <a class="dropdown-item send-order-form" href="javascript:;"
                                                    data-id="{{ $quote->id }}">
                                                    <i class="material-icons-outlined fs-6 me-1">send</i> Send Order Form
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Send Order Form Modal -->
    <div class="modal fade" id="sendOrderFormModal" tabindex="-1" aria-labelledby="sendOrderFormLabel" aria-hidden="true">
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
                            <label class="form-label fw-semibold">Quote Price</label>
                            <input type="text" name="number" class="form-control rounded-3"
                                placeholder="Enter recipient name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control rounded-3" rows="4" placeholder="Write your message..." required></textarea>
                        </div>
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
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {

            // DataTable
            var table = $('#quoteTable').DataTable({
                pageLength: 10,
                autoWidth: false,
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [1, 4, 5]
                }]
            });

            // Column filter
            $('#quoteSearch').on('keyup', function() {
                var colIndex = $('#columnFilter').val();
                if (colIndex === '') {
                    table.search(this.value).draw();
                } else {
                    table.column(colIndex).search(this.value).draw();
                }
            });

            // Open modal with quote ID
            $(document).on('click', '.send-order-form', function() {
                let quoteId = $(this).data('id');
                $('#orderFormQuoteId').val(quoteId);
                $('#sendOrderFormModal').modal('show'); // ✅ fixed ID
            });
        });
    </script>
@endsection
