@extends('dashboard.includes.partial.base')

@section('title', 'Order Form Detail')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Header -->
            <div class="row align-items-center border-bottom pb-3 mb-4">
                <div class="col-12 col-md-auto text-center text-md-start mb-3 mb-md-0">
                    <img src="{{ asset('web-assets/images/logo/1-logo.png') }}" alt="Company Logo" class="img-fluid"
                        style="max-height:70px;">
                </div>
                <div class="col text-md-end">
                    <h1 class="h4 fw-bold text-primary mb-1">Bridgeway Logistics</h1>
                    <p class="mb-0 small text-muted">
                        5402 Renwick Dr Apt 902, Houston, TX 77081
                    </p>
                    <p class="mb-0 small text-muted">
                        Email: sales@bridgewaylogisticsllc.com | Phone: +1 713-470-6157
                    </p>
                </div>
            </div>

            <!-- Step 1 -->
            <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">1</span> Customer Information</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">Name</label>
                    <p class="form-control-plaintext">{{ $orderForm->customer_name }}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <p class="form-control-plaintext">{{ $orderForm->customer_email }}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Phone</label>
                    <p class="form-control-plaintext">{{ $orderForm->customer_phone ?? '-' }}</p>
                </div>
            </div>

            <!-- Step 2 -->
            <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">2</span> Vehicle Information</h6>
            @foreach ($orderForm->quote->vehicles as $vehicle)
                <div class="card border mb-3">
                    <div class="card-body">
                        <h6 class="fw-semibold">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</h6>
                        <div class="row g-2 small text-muted">
                            @if ($vehicle->vin)
                                <div class="col-md-3"><strong>VIN:</strong> {{ $vehicle->vin }}</div>
                            @endif
                            @if ($vehicle->color)
                                <div class="col-md-3"><strong>Color:</strong> {{ $vehicle->color }}</div>
                            @endif
                            <div class="col-md-3"><strong>Condition:</strong> {{ $vehicle->condition ?? '-' }}</div>
                            <div class="col-md-3"><strong>Trailer:</strong> {{ $vehicle->trailer_type ?? '-' }}</div>
                        </div>
                        @if ($vehicle->images->count())
                            <div class="d-flex flex-wrap mt-3">
                                @foreach ($vehicle->images as $img)
                                    <img src="{{ asset($img->image_path) }}" class="img-thumbnail me-2 mb-2"
                                        style="width:80px;height:80px;object-fit:cover;">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <!-- Step 3 -->
            <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">3</span> Location Details</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-header fw-semibold">Pickup Information</div>
                        <div class="card-body">
                            <p><strong>Address:</strong> {{ $orderForm->pickup_address1 }}</p>
                            <p><strong>City, State, Zip:</strong>
                                {{ optional($orderForm->quote->pickupLocation)->full_location ?? '-' }}</p>
                            <p><strong>Contact Name:</strong> {{ $orderForm->pickup_contact_name ?? '-' }}</p>
                            <p><strong>Contact Email:</strong> {{ $orderForm->pickup_contact_email ?? '-' }}</p>
                            <p><strong>Pickup Date:</strong> {{ $orderForm->pickup_date_formatted ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-header fw-semibold">Delivery Information</div>
                        <div class="card-body">
                            <p><strong>Address:</strong> {{ $orderForm->delivery_address1 }}</p>
                            <p><strong>City, State, Zip:</strong>
                                {{ optional($orderForm->quote->deliveryLocation)->full_location ?? '-' }}</p>
                            <p><strong>Contact Name:</strong> {{ $orderForm->delivery_contact_name ?? '-' }}</p>
                            <p><strong>Contact Email:</strong> {{ $orderForm->delivery_contact_email ?? '-' }}</p>
                            <p><strong>Delivery Date:</strong> {{ $orderForm->delivery_date_formatted ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <h6 class="fw-bold mb-3 mt-4"><span class="badge bg-primary me-2">4</span> Special Instructions</h6>
            <div class="card border mb-3">
                <div class="card-body">
                    {{ $orderForm->special_instructions ?? '-' }}
                </div>
            </div>

            <!-- Step 5 -->
            <h6 class="fw-bold mb-3"><span class="badge bg-primary me-2">5</span> Confirmed Order & Payment</h6>
            <div class="card border mb-3">
                <div class="card-body">
                    <p><strong>Payment Option:</strong> {{ ucfirst($orderForm->payment_option) ?? '-' }}</p>
                    <p><strong>Signature Name:</strong> {{ $orderForm->signature_name ?? '-' }}</p>
                    <p><strong>Signature Date:</strong> {{ $orderForm->signature_date ?? '-' }}</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-top pt-3 mt-4 text-center small text-muted">
                © {{ date('Y') }} Bridgeway Logistics. All rights reserved.
            </div>

        </div>
    </div>
@endsection
