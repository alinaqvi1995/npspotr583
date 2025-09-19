@extends('dashboard.includes.partial.base')

@section('title', 'Order Form Detail')

@section('content')
    <h6 class="mb-0 text-uppercase">Order Form Detail</h6>
    <hr>

    <div class="card">
        <div class="card-body">

            <h5 class="mb-3">Customer Information</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Name</label>
                    <p class="form-control-plaintext">{{ $orderForm->customer_name }}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Email</label>
                    <p class="form-control-plaintext">{{ $orderForm->customer_email }}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Phone</label>
                    <p class="form-control-plaintext">{{ $orderForm->customer_phone ?? '-' }}</p>
                </div>
            </div>

            <h5 class="mb-3">Pickup Information</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Address</label>
                    <p class="form-control-plaintext">{{ $orderForm->pickup_address1 }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Contact Name</label>
                    <p class="form-control-plaintext">{{ $orderForm->pickup_contact_name }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Contact Email</label>
                    <p class="form-control-plaintext">{{ $orderForm->pickup_contact_email ?? '-' }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Pickup Date</label>
                    <p class="form-control-plaintext">{{ $orderForm->pickup_date?->format('M d, Y') ?? '-' }}</p>
                </div>
            </div>

            <h5 class="mb-3">Delivery Information</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Address</label>
                    <p class="form-control-plaintext">{{ $orderForm->delivery_address1 }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Contact Name</label>
                    <p class="form-control-plaintext">{{ $orderForm->delivery_contact_name }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Contact Email</label>
                    <p class="form-control-plaintext">{{ $orderForm->delivery_contact_email ?? '-' }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Delivery Date</label>
                    <p class="form-control-plaintext">{{ $orderForm->delivery_date?->format('M d, Y') ?? '-' }}</p>
                </div>
            </div>

            <h5 class="mb-3">Special Instructions</h5>
            <p class="form-control-plaintext">{{ $orderForm->special_instructions ?? '-' }}</p>

            <h5 class="mb-3">Payment & Signature</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Payment Option</label>
                    <p class="form-control-plaintext">{{ ucfirst($orderForm->payment_option) }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Signature Name</label>
                    <p class="form-control-plaintext">{{ $orderForm->signature_name }}</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Signature Date</label>
                    <p class="form-control-plaintext">{{ $orderForm->signature_date?->format('M d, Y') ?? '-' }}</p>
                </div>
            </div>

            <h5 class="mb-3">Quote Reference</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Quote ID</label>
                    <p class="form-control-plaintext">{{ $orderForm->quote_id }}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Status</label>
                    <p class="form-control-plaintext">{!! $orderForm->quote->status_label ?? '-' !!}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Created At</label>
                    <p class="form-control-plaintext">{{ $orderForm->created_at?->format('M d, Y h:i A') ?? '-' }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('dashboard.orderForms.index') }}" class="btn btn-secondary">
                    <i class="material-icons-outlined me-1">arrow_back</i> Back to List
                </a>
            </div>

        </div>
    </div>
@endsection
