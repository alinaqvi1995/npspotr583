@extends('dashboard.includes.partial.base')

@section('title', 'Order Forms')

@section('content')
    <h6 class="mb-0 text-uppercase">All Order Forms</h6>
    <hr>
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <h5 class="mb-0">Recent Order Forms</h5>
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
                    <option value="2">Pickup / Delivery</option>
                    <option value="3">Payment</option>
                </select>
                <input class="form-control rounded-5 px-3" type="text" placeholder="Search..." id="orderFormSearch">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="orderFormTable">
                    <thead>
                        <tr>
                            <th>Sr#.</th>
                            <th>Quote#.</th>
                            <th>Customer</th>
                            <th>Pickup / Delivery</th>
                            <th>Payment</th>
                            <th>Submitted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orderForms as $form)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $form->quote->id . ' / ' . $form->quote->load_id }}</td>
                                <td>
                                    {{ $form->customer_name }}<br>
                                    <small>{{ $form->customer_email }}</small><br>
                                    <small>{{ $form->customer_phone }}</small>
                                </td>
                                <td>
                                    <strong>Pickup:</strong><br>
                                    <a href="https://www.google.com/maps/search/{{ urlencode($form->quote->pickupLocation->full_location) }}"
                                        target="_blank">{{ $form->quote->pickupLocation->full_location }}</a><br>
                                    <span>{{ $form->quote->pickup_date_formatted }}</span><br>
                                    <strong>Delivery:</strong><br>
                                    <a href="https://www.google.com/maps/search/{{ urlencode($form->quote->deliveryLocation->full_location) }}"
                                        target="_blank">{{ $form->quote->deliveryLocation->full_location }}</a><br>
                                    <span>{{ $form->quote->delivery_date_formatted }}</span>
                                </td>
                                <td>
                                    <strong>Payment Option:</strong> {{ ucfirst($form->payment_option) }}<br>
                                    <strong>Signature:</strong> {{ $form->signature_name }}<br>
                                    <strong>Date:</strong> {{ $form->signature_date->format('M d, Y') }}
                                </td>
                                <td>{{ $form->created_at->format('M d, Y h:ia') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light border dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.orderForms.show', $form->id) }}">
                                                    <i class="material-icons-outlined fs-6 me-1">visibility</i> View
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.orderForms.download', $form->id) }}">
                                                    <i class="material-icons-outlined fs-6 me-1">download</i> Download PDF
                                                </a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No order forms found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            // DataTable
            var table = $('#orderFormTable').DataTable({
                pageLength: 10,
                autoWidth: false,
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [1, 2, 3, 5]
                }]
            });

            // Column filter
            $('#orderFormSearch').on('keyup', function() {
                var colIndex = $('#columnFilter').val();
                if (colIndex === '') {
                    table.search(this.value).draw();
                } else {
                    table.column(colIndex).search(this.value).draw();
                }
            });
        });
    </script>
@endsection
