@extends('admin.includes.partial.base')

@section('title', 'Quote Details')

@section('content')
    <h6 class="mb-0 text-uppercase">Quote Details</h6>
    <hr>
    <div class="card">
        <div class="card-body">

            {{-- Customer Information --}}
            <h5 class="mb-3">Customer Information</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $quote->customer_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $quote->customer_email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $quote->customer_phone }}</td>
                </tr>
            </table>

            {{-- Quote Information --}}
            <h5 class="mt-4 mb-3">Quote Information</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Category</th>
                    <td>{{ $quote->categoryName() }}</td>
                </tr>
                <tr>
                    <th>Subcategory</th>
                    <td>{{ $quote->subcategoryName() }}</td>
                </tr>
                <tr>
                    <th>Vehicle Type</th>
                    <td>{{ $quote->vehicle_type }}</td>
                </tr>
                <tr>
                    <th>Pickup Location</th>
                    <td>{{ $quote->pickup_location }}</td>
                </tr>
                <tr>
                    <th>Delivery Location</th>
                    <td>{{ $quote->delivery_location }}</td>
                </tr>
                <tr>
                    <th>Pickup Date</th>
                    <td>{{ $quote->pickup_date_formatted }}</td>
                </tr>
                <tr>
                    <th>Delivery Date</th>
                    <td>{{ $quote->delivery_date_formatted }}</td>
                </tr>
                <tr>
                    <th>Additional Info</th>
                    <td>{{ $quote->additional_info ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{!! $quote->status_label !!}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $quote->created_at_formatted }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $quote->updated_at_formatted }}</td>
                </tr>
            </table>

            {{-- Vehicles --}}
            <h5 class="mt-4 mb-3">Vehicles</h5>
            @forelse ($quote->vehicles as $vehicle)
                <div class="border rounded p-3 mb-4">
                    <table class="table table-bordered mb-2">
                        <tr>
                            <th>Year</th>
                            <td>{{ $vehicle->year }}</td>
                        </tr>
                        <tr>
                            <th>Make</th>
                            <td>{{ $vehicle->make }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $vehicle->model }}</td>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td>{{ $vehicle->color ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>VIN</th>
                            <td>{{ $vehicle->vin ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dimensions (L × W × H)</th>
                            <td>
                                {{ $vehicle->length_ft }}ft {{ $vehicle->length_in }}in ×
                                {{ $vehicle->width_ft }}ft {{ $vehicle->width_in }}in ×
                                {{ $vehicle->height_ft }}ft {{ $vehicle->height_in }}in
                            </td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>{{ $vehicle->weight ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>Condition</th>
                            <td>{{ $vehicle->condition ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>Modified</th>
                            <td>{{ $vehicle->modified ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Modification Info</th>
                            <td>{{ $vehicle->modified_info ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>Available at Auction</th>
                            <td>{{ $vehicle->available_at_auction ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Auction Link</th>
                            <td>
                                @if ($vehicle->available_link)
                                    <a href="{{ $vehicle->available_link }}" target="_blank">{{ $vehicle->available_link }}</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Trailer Type</th>
                            <td>{{ $vehicle->trailer_type ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>Load Method</th>
                            <td>{{ $vehicle->load_method ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>Unload Method</th>
                            <td>{{ $vehicle->unload_method ?: '-' }}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $vehicle->type ?: '-' }}</td>
                        </tr>
                    </table>

                    {{-- Vehicle Images --}}
                    @if ($vehicle->images->count())
                        <div class="d-flex flex-wrap">
                            @foreach ($vehicle->images as $img)
                                <img src="{{ asset($img->image_path) }}" alt="Vehicle Image"
                                    width="100" height="100" class="rounded me-2 mb-2">
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <p>No vehicles found for this quote.</p>
            @endforelse

            <a href="{{ route('admin.quotes.index') }}" class="btn btn-secondary mt-3">Back to Quotes</a>
        </div>
    </div>
@endsection
