@extends('admin.includes.partial.base')

@section('title', 'Quote Details')

@section('content')
    <h6 class="mb-0 text-uppercase">
        Quote Details</h6>
    <hr>

    <div class="row">
        {{-- Customer Info --}}
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <strong>Customer</strong>
                </div>
                <div class="card-body">
                    @if ($quote->customer_name)
                        <p><strong>Name:</strong> {{ $quote->customer_name }}</p>
                    @endif
                    @if ($quote->customer_email)
                        <p><strong>Email:</strong> {{ $quote->customer_email }}</p>
                    @endif
                    @if ($quote->customer_phone)
                        <p><strong>Phone:</strong> {{ $quote->customer_phone }}</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Quote Info --}}
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white">
                    <strong>Quote Info</strong>
                </div>
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
                    </div>
                    <div class="col-sm-6">
                        @if ($quote->pickup_location || $quote->pickup_date_formatted)
                            <p><strong>Pickup:</strong> {{ $quote->pickup_location }} @if ($quote->pickup_date_formatted)
                                    ({{ $quote->pickup_date_formatted }})
                                @endif
                            </p>
                        @endif
                        @if ($quote->delivery_location || $quote->delivery_date_formatted)
                            <p><strong>Delivery:</strong> {{ $quote->delivery_location }} @if ($quote->delivery_date_formatted)
                                    ({{ $quote->delivery_date_formatted }})
                                @endif
                            </p>
                        @endif
                        @if ($quote->created_at_formatted)
                            <p><strong>Created:</strong> {{ $quote->created_at_formatted }}</p>
                        @endif
                        @if ($quote->updated_at_formatted)
                            <p><strong>Updated:</strong> {{ $quote->updated_at_formatted }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Vehicles --}}
    @if ($quote->vehicles->count())
        <div class="card mb-3">
            <div class="card-header bg-dark text-white">
                <strong>Vehicles ({{ $quote->vehicles->count() }})</strong>
            </div>
            <div class="card-body">
                <div class="accordion" id="vehicleAccordion">
                    @foreach ($quote->vehicles as $index => $vehicle)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#vehicleAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            @if ($vehicle->color)
                                                <p><strong>Color:</strong> {{ $vehicle->color }}</p>
                                            @endif
                                            @if ($vehicle->vin)
                                                <p><strong>VIN:</strong> {{ $vehicle->vin }}</p>
                                            @endif
                                            @if ($vehicle->condition)
                                                <p><strong>Condition:</strong> {{ $vehicle->condition }}</p>
                                            @endif
                                            @if (!is_null($vehicle->modified))
                                                <p><strong>Modified:</strong> {{ $vehicle->modified ? 'Yes' : 'No' }}</p>
                                            @endif
                                            @if (!is_null($vehicle->available_at_auction))
                                                <p><strong>Auction:</strong>
                                                    {{ $vehicle->available_at_auction ? 'Yes' : 'No' }}</p>
                                            @endif
                                            @if ($vehicle->available_link)
                                                <p><strong>Auction Link:</strong> <a href="{{ $vehicle->available_link }}"
                                                        target="_blank">{{ $vehicle->available_link }}</a></p>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            @if ($vehicle->length_ft || $vehicle->width_ft || $vehicle->height_ft)
                                                <p><strong>Dimensions:</strong>
                                                    {{ $vehicle->length_ft }}ft {{ $vehicle->length_in }}in ×
                                                    {{ $vehicle->width_ft }}ft {{ $vehicle->width_in }}in ×
                                                    {{ $vehicle->height_ft }}ft {{ $vehicle->height_in }}in
                                                </p>
                                            @endif
                                            @if ($vehicle->weight)
                                                <p><strong>Weight:</strong> {{ $vehicle->weight }}</p>
                                            @endif
                                            @if ($vehicle->trailer_type)
                                                <p><strong>Trailer Type:</strong> {{ $vehicle->trailer_type }}</p>
                                            @endif
                                            @if ($vehicle->load_method)
                                                <p><strong>Load Method:</strong> {{ $vehicle->load_method }}</p>
                                            @endif
                                            @if ($vehicle->unload_method)
                                                <p><strong>Unload Method:</strong> {{ $vehicle->unload_method }}</p>
                                            @endif
                                            @if ($vehicle->type)
                                                <p><strong>Type:</strong> {{ $vehicle->type }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Images --}}
                                    @if ($vehicle->images->count())
                                        <div class="d-flex flex-wrap mt-3">
                                            @foreach ($vehicle->images as $img)
                                                <div class="position-relative me-2 mb-2">
                                                    <img src="{{ asset($img->image_path) }}" class="rounded" width="80"
                                                        height="80">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <a href="{{ route('admin.quotes.index') }}" class="btn btn-secondary">Back to Quotes</a>
@endsection
