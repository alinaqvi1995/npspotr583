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
                        {{-- <strong>Total: {{ $quote->vehicles->count() }}</strong> --}}
                        @foreach ($quote->vehicles as $vehicle)
                            <p class="mb-1">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                            </p>
                            @if ($vehicle->images->count())
                                <div class="d-flex flex-wrap mb-2">
                                    @foreach ($vehicle->images as $img)
                                        <img src="{{ asset($img->image_path) }}"
                                            alt="{{ $vehicle->make }} {{ $vehicle->model }}" width="50" height="50"
                                            class="rounded-circle me-1 mb-1">
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
                        @can('edit-quotes')
                            <a href="{{ route('dashboard.quotes.edit', $quote->id) }}" class="btn btn-sm btn-info">
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
