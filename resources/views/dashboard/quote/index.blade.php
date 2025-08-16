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

            <div class="order-search position-relative my-3">
                <input class="form-control rounded-5 px-5" type="text" placeholder="Search">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
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
                                    Pickup Location:
                                    <a href="https://www.google.com/maps/search/{{ urlencode($quote->pickup_location) }}"
                                        target="_blank">
                                        {{ $quote->pickup_location }}
                                    </a><br>
                                    <span>Time: {{ $quote->pickup_date_formatted }}</span><br><br>

                                    <strong>Delivery:</strong><br>
                                    Delivery Location:
                                    <a href="https://www.google.com/maps/search/{{ urlencode($quote->delivery_location) }}"
                                        target="_blank">
                                        {{ $quote->delivery_location }}
                                    </a><br>
                                    <span>Time: {{ $quote->delivery_date_formatted }}</span>
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
                            <tr>
                                <td colspan="6" class="text-center">No quotes found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $quotes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
