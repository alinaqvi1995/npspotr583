@extends('dashboard.includes.partial.base')

@section('title', 'Quote Details')

@section('content')
<h6 class="mb-0 text-uppercase">Quote Details</h6>
<hr>

<div class="row">
    {{-- Customer Info --}}
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white"><strong>Customer</strong></div>
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
                </div>
                <div class="col-sm-6">
                    @if ($quote->pickup_location)
                        <p><strong>Pickup Location:</strong> {{ $quote->pickup_location }}</p>
                    @endif
                    @if ($quote->pickup_date_formatted)
                        <p><strong>Pickup Date:</strong> {{ $quote->pickup_date_formatted }}</p>
                    @endif
                    @if ($quote->delivery_location)
                        <p><strong>Delivery Location:</strong> {{ $quote->delivery_location }}</p>
                    @endif
                    @if ($quote->delivery_date_formatted)
                        <p><strong>Delivery Date:</strong> {{ $quote->delivery_date_formatted }}</p>
                    @endif
                    @if ($quote->created_at_formatted)
                        <p><strong>Created At:</strong> {{ $quote->created_at_formatted }}</p>
                    @endif
                    @if ($quote->updated_at_formatted)
                        <p><strong>Updated At:</strong> {{ $quote->updated_at_formatted }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Pricing --}}
<div class="card mb-3">
    <div class="card-header bg-info text-white"><strong>Pricing</strong></div>
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
            <p><strong>Balance:</strong> ${{ number_format($quote->balance, 2) }}</p>
        @endif
        @if ($quote->balance_amount)
            <p><strong>Balance Amount:</strong> ${{ number_format($quote->balance_amount, 2) }}</p>
        @endif
    </div>
</div>

{{-- Pickup & Delivery Details --}}
<div class="row mb-3">
    {{-- Pickup --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white"><strong>Pickup Details</strong></div>
            <div class="card-body">
                @if ($quote->pickup_address1 || $quote->pickup_address2)
                    <p><strong>Address:</strong> {{ $quote->pickup_address1 }} {{ $quote->pickup_address2 }}</p>
                @endif
                @if ($quote->pickup_city || $quote->pickup_state || $quote->pickup_zip)
                    <p><strong>City/State/Zip:</strong> {{ $quote->pickup_city }}, {{ $quote->pickup_state }} {{ $quote->pickup_zip }}</p>
                @endif
                @if ($quote->pickup_contact_name)
                    <p><strong>Contact Name:</strong> {{ $quote->pickup_contact_name }}</p>
                @endif
                @if ($quote->pickup_contact_email)
                    <p><strong>Contact Email:</strong> {{ $quote->pickup_contact_email }}</p>
                @endif
                @if ($quote->pickup_contact_phone)
                    <p><strong>Phone(s):</strong> {{ $quote->pickup_contact_phone }}</p>
                @endif
                @if (!is_null($quote->pickup_twic))
                    <p><strong>TWIC:</strong> {{ $quote->pickup_twic ? 'Yes' : 'No' }}</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Delivery --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-warning text-white"><strong>Delivery Details</strong></div>
            <div class="card-body">
                @if ($quote->delivery_address1 || $quote->delivery_address2)
                    <p><strong>Address:</strong> {{ $quote->delivery_address1 }} {{ $quote->delivery_address2 }}</p>
                @endif
                @if ($quote->delivery_city || $quote->delivery_state || $quote->delivery_zip)
                    <p><strong>City/State/Zip:</strong> {{ $quote->delivery_city }}, {{ $quote->delivery_state }} {{ $quote->delivery_zip }}</p>
                @endif
                @if ($quote->delivery_contact_name)
                    <p><strong>Contact Name:</strong> {{ $quote->delivery_contact_name }}</p>
                @endif
                @if ($quote->delivery_contact_email)
                    <p><strong>Contact Email:</strong> {{ $quote->delivery_contact_email }}</p>
                @endif
                @if ($quote->delivery_contact_phone)
                    <p><strong>Phone(s):</strong> {{ $quote->delivery_contact_phone }}</p>
                @endif
                @if (!is_null($quote->delivery_twic))
                    <p><strong>TWIC:</strong> {{ $quote->delivery_twic ? 'Yes' : 'No' }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Additional Info --}}
<div class="card mb-3">
    <div class="card-header bg-secondary text-white"><strong>Additional Info</strong></div>
    <div class="card-body">
        @if ($quote->load_id)
            <p><strong>Load ID:</strong> {{ $quote->load_id }}</p>
        @endif
        @if ($quote->pre_dispatch_notes)
            <p><strong>Pre-dispatch Notes:</strong> {{ $quote->pre_dispatch_notes }}</p>
        @endif
        @if ($quote->transport_special_instructions)
            <p><strong>Transport Instructions:</strong> {{ $quote->transport_special_instructions }}</p>
        @endif
        @if ($quote->load_specific_terms)
            <p><strong>Load Terms:</strong> {{ $quote->load_specific_terms }}</p>
        @endif
    </div>
</div>

{{-- Vehicles --}}
@if ($quote->vehicles->count())
    <div class="card mb-3">
        <div class="card-header bg-dark text-white"><strong>Vehicles ({{ $quote->vehicles->count() }})</strong></div>
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
                                        @if ($vehicle->type)
                                            <p><strong>Type:</strong> {{ $vehicle->type }}</p>
                                        @endif
                                        @if ($vehicle->color)
                                            <p><strong>Color:</strong> {{ $vehicle->color }}</p>
                                        @endif
                                        @if ($vehicle->vin)
                                            <p><strong>VIN:</strong> {{ $vehicle->vin }}</p>
                                        @endif
                                        @if ($vehicle->lot_number)
                                            <p><strong>Lot Number:</strong> {{ $vehicle->lot_number }}</p>
                                        @endif
                                        @if ($vehicle->license_plate)
                                            <p><strong>License Plate:</strong> {{ $vehicle->license_plate }}</p>
                                        @endif
                                        @if ($vehicle->license_state)
                                            <p><strong>License State:</strong> {{ $vehicle->license_state }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
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
                                        @if ($vehicle->available_at_auction !== null)
                                            <p><strong>Auction:</strong> {{ $vehicle->available_at_auction ? 'Yes' : 'No' }}</p>
                                        @endif
                                        @if ($vehicle->available_link)
                                            <p><strong>Auction Link:</strong> <a href="{{ $vehicle->available_link }}" target="_blank">{{ $vehicle->available_link }}</a></p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Vehicle Images --}}
                                @if ($vehicle->images->count())
                                    <div class="d-flex flex-wrap mt-3">
                                        @foreach ($vehicle->images as $img)
                                            <div class="position-relative me-2 mb-2">
                                                <img src="{{ asset($img->image_path) }}" class="rounded" width="80" height="80">
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

<a href="{{ route('dashboard.quotes.index', ['status' => 'New']) }}" class="btn btn-secondary">Back to Quotes</a>
@endsection
