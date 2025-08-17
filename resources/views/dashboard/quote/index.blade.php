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
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
            </div>

            <div class="d-flex mb-3">
                <select id="columnFilter" class="form-select w-auto me-2">
                    <option value="">All Columns</option>
                    <option value="0">Customer</option>
                    <option value="1">Vehicles</option>
                    <option value="2">Pickup / Delivery</option>
                    {{-- <option value="3">Status</option> --}}
                </select>
                <input class="form-control rounded-5 px-3" type="text" placeholder="Search..." id="quoteSearch">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="quoteTable">
                    <thead>
                        <tr>
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
                                <td>
                                    {{ $quote->customer_name }}<br>
                                    <small>{{ $quote->customer_email }}</small><br>
                                    <small>{{ $quote->customer_phone }}</small>
                                </td>
                                <td>
                                    <strong>Total: {{ $quote->vehicles->count() }}</strong>
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
                                    <a href="https://www.google.com/maps/search/{{ urlencode($quote->pickup_location) }}"
                                        target="_blank">{{ $quote->pickup_location }}</a><br>
                                    <span>{{ $quote->pickup_date_formatted }}</span><br>
                                    <strong>Delivery:</strong><br>
                                    <a href="https://www.google.com/maps/search/{{ urlencode($quote->delivery_location) }}"
                                        target="_blank">{{ $quote->delivery_location }}</a><br>
                                    <span>{{ $quote->delivery_date_formatted }}</span>
                                </td>
                                <td>{!! $quote->status_label !!}</td>
                                <td>
                                    @can('view-quoteDetail')
                                        <a href="{{ route('dashboard.quotes.details', $quote->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="material-icons-outlined">edit</i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
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

            // Initialize DataTable
            var table = $('#quoteTable').DataTable({
                pageLength: 10,
                autoWidth: false,
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                        orderable: false,
                        targets: [1, 4]
                    } // Vehicles & Actions not sortable
                ]
            });

            // Column-specific filter
            $('#quoteSearch').on('keyup', function() {
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
