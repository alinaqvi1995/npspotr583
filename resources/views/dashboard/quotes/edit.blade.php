@extends('dashboard.includes.partial.base')
@section('title', 'Edit Quote')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Quote</li>
                </ol>
            </nav>
        </div>
    </div>

    @if ($errors->any())
        <ul class="text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="row">
        <form action="{{ route('dashboard.quotes.update', $quote->id) }}" id="quoteForm" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-12">
                <div class="card">
                    <div class="card-header mb-4">
                        <h3 class="fw-bold text-center">Order#: {{ $quote->id }}</h3>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="mb-4">Customer Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Contact Name</label>
                                <input type="text" name="customer_name" value="{{ $quote->customer_name }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Email</label>
                                <input type="email" name="customer_email" value="{{ $quote->customer_email }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Phone</label>
                                <input type="text" name="customer_phone" value="{{ $quote->customer_phone }}"
                                    class="form-control" placeholder="Phone">
                                {{-- <small><a href="#" class="text-primary addPhoneBtn">+ Add
                                        phone</a></small> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pickup and Delivery Locations -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- <h3>Order #: {{ $quote->id }}</h3> --}}
                        <h5 class="mb-4">Locations</h5>
                        <div class="row">
                            @foreach (['pickup', 'delivery'] as $type)
                                @php
                                    $location = $quote->locations->where('type', $type)->first();
                                    $index = $loop->index + 1;
                                @endphp
                                <input type="hidden" name="locations[{{ $index }}][id]"
                                    value="{{ $location->id ?? '' }}">
                                <div class="col-md-6">
                                    <div class="location-item mb-4 border p-3 rounded" data-index="{{ $index }}">
                                        <h6 class="mb-3">{{ ucfirst($type) }} Location</h6>
                                        <div class="row g-3">
                                            <input type="hidden" name="locations[{{ $index }}][type]"
                                                value="{{ $type }}">

                                            <div class="col-md-12">
                                                <label class="form-label">Location Name</label>
                                                <input type="text" name="locations[{{ $index }}][name]"
                                                    class="form-control" placeholder="Location Name"
                                                    value="{{ $location->name ?? '' }}">
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Location Type</label>
                                                <select name="locations[{{ $index }}][location_type]"
                                                    class="form-select">
                                                    <option value="">Select</option>
                                                    @foreach (['Warehouse', 'Business', 'Residential', 'Auction', 'Port'] as $locType)
                                                        <option value="{{ $locType }}" @selected(($location->location_type ?? '') === $locType)>
                                                            {{ $locType }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Address 1</label>
                                                <input type="text" name="locations[{{ $index }}][address1]"
                                                    class="form-control" placeholder="Street address"
                                                    value="{{ $location->address1 ?? '' }}">
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Address 2</label>
                                                <input type="text" name="locations[{{ $index }}][address2]"
                                                    class="form-control" placeholder="Apt, suite, etc."
                                                    value="{{ $location->address2 ?? '' }}">
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">City/State/Zip *</label>
                                                <div class="input-form single-input-field">
                                                    <input class="form-control" type="text"
                                                        id="{{ $location->type . '-location' }}" name=""
                                                        placeholder="Enter City or ZipCode"
                                                        value="{{ $location->full_location ?? '' }}" required>
                                                    <div id="{{ $location->type . '-suggestions' }}"
                                                        class="form-control suggestions-box">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">City *</label>
                                                <input type="text" name="locations[{{ $index }}][city]" readonly
                                                    id="{{ $location->type . '_city' }}" class="form-control"
                                                    placeholder="City" value="{{ $location->city ?? '' }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">State *</label>
                                                <input type="text" name="locations[{{ $index }}][state]"
                                                    readonly id="{{ $location->type . '_state' }}" class="form-control"
                                                    placeholder="State" value="{{ $location->state ?? '' }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">ZIP *</label>
                                                <input type="text" name="locations[{{ $index }}][zip]" readonly
                                                    id="{{ $location->type . '_zip' }}" class="form-control"
                                                    placeholder="ZIP" value="{{ $location->zip ?? '' }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Contact Name</label>
                                                <input type="text" name="locations[{{ $index }}][contact_name]"
                                                    class="form-control" value="{{ $location->contact_name ?? '' }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Contact Email</label>
                                                <input type="email"
                                                    name="locations[{{ $index }}][contact_email]"
                                                    class="form-control" value="{{ $location->contact_email ?? '' }}">
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Contact Phones</label>
                                                <div class="phone-list">
                                                    @if ($location)
                                                        @foreach ($location->phones as $pIndex => $phone)
                                                            <div class="input-group mb-2">
                                                                <input type="text"
                                                                    name="locations[{{ $index }}][contact_phone][]"
                                                                    class="form-control" placeholder="Phone"
                                                                    value="{{ $phone->phone }}">
                                                                <button type="button"
                                                                    class="btn btn-danger removePhoneBtn">-</button>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    <div class="input-group mb-2">
                                                        <input type="text"
                                                            name="locations[{{ $index }}][contact_phone][]"
                                                            class="form-control" placeholder="Phone">
                                                        <button type="button"
                                                            class="btn btn-success addPhoneBtn">+</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-2">
                                                <input type="hidden" name="locations[{{ $index }}][twic]"
                                                    value="0">
                                                <input class="form-check-input" type="checkbox"
                                                    name="locations[{{ $index }}][twic]"
                                                    id="twic{{ $index }}" value="1"
                                                    @checked($location->twic ?? false)>
                                                <label for="twic{{ $index }}">TWIC Card Required?</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Vehicles -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Vehicles</h5>
                        <div id="vehiclesContainer">
                            @foreach ($quote->vehicles as $vIndex => $vehicle)
                                <div class="vehicle-item mb-4 border p-3 rounded" data-index="{{ $vIndex + 1 }}">
                                    <h6 class="mb-3">Vehicle #{{ $vIndex + 1 }}</h6>
                                    <div class="row g-3">
                                        <input type="hidden" name="vehicles[{{ $vIndex + 1 }}][id]"
                                            value="{{ $vehicle->id }}">

                                        <!-- Basic Info -->
                                        <div class="col-md-3">
                                            <label class="form-label">Type *</label>
                                            <select name="vehicles[{{ $vIndex + 1 }}][type]" class="form-select"
                                                required>
                                                <option value="">Select</option>
                                                <option @if ($vehicle->type == 'Car') selected @endif>Car</option>
                                                <option @if ($vehicle->type == 'Motorcycle') selected @endif>Motorcycle
                                                </option>
                                                <option @if ($vehicle->type == 'Golf Cart') selected @endif>Golf Cart</option>
                                                <option @if ($vehicle->type == 'ATV') selected @endif>ATV</option>
                                                <option @if ($vehicle->type == 'Heavy Equipment') selected @endif>Heavy Equipment
                                                </option>
                                                <option @if ($vehicle->type == 'RV Transport') selected @endif>RV Transport
                                                </option>
                                                <option @if ($vehicle->type == 'Boat Transport') selected @endif>Boat Transport
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Year</label>
                                            <select class="form-select year-select"
                                                name="vehicles[{{ $vIndex + 1 }}][year]"
                                                data-selected="{{ $vehicle->year }}">
                                                <option value="">-- Year --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Make *</label>
                                            <input type="text" class="form-control"
                                                name="vehicles[{{ $vIndex + 1 }}][make]" value="{{ $vehicle->make }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Model *</label>
                                            <input type="text" class="form-control"
                                                name="vehicles[{{ $vIndex + 1 }}][model]"
                                                value="{{ $vehicle->model }}">
                                        </div>

                                        <!-- CONDITIONAL: Show size fields for boats, heavy equipment, RV -->
                                        @if (in_array($vehicle->type, ['Boat-Transport', 'Heavy-Equipment', 'RV-Transport']))
                                            <div class="col-md-2">
                                                <label class="form-label">Length (ft)</label>
                                                <input type="number" class="form-control"
                                                    name="vehicles[{{ $vIndex + 1 }}][length_ft]"
                                                    value="{{ $vehicle->length_ft }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Width (ft)</label>
                                                <input type="number" class="form-control"
                                                    name="vehicles[{{ $vIndex + 1 }}][width_ft]"
                                                    value="{{ $vehicle->width_ft }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Height (ft)</label>
                                                <input type="number" class="form-control"
                                                    name="vehicles[{{ $vIndex + 1 }}][height_ft]"
                                                    value="{{ $vehicle->height_ft }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Weight (lbs)</label>
                                                <input type="number" class="form-control"
                                                    name="vehicles[{{ $vIndex + 1 }}][weight]"
                                                    value="{{ $vehicle->weight }}">
                                            </div>
                                        @endif

                                        <!-- Condition & Trailer -->
                                        <div class="col-md-3">
                                            <label class="form-label">Condition</label>
                                            <select name="vehicles[{{ $vIndex + 1 }}][condition]" class="form-select">
                                                <option value="Running"
                                                    {{ $vehicle->condition == 'Running' ? 'selected' : '' }}>Running
                                                </option>
                                                <option value="Non-Running"
                                                    {{ $vehicle->condition == 'Non-Running' ? 'selected' : '' }}>
                                                    Non-Running</option>
                                            </select>
                                        </div>

                                        <!-- Trailer Type only for heavy equipment and RV -->
                                        <div class="col-md-3">
                                            <label class="form-label">Trailer Type</label>
                                            <select name="vehicles[{{ $vIndex + 1 }}][trailer_type]"
                                                class="form-select">
                                                <option value="Open Trailer"
                                                    {{ $vehicle->trailer_type == 'Open Trailer' ? 'selected' : '' }}>
                                                    Open Trailer
                                                </option>
                                                <option value="Enclosed Trailer"
                                                    {{ $vehicle->trailer_type == 'Enclosed Trailer' ? 'selected' : '' }}>
                                                    Enclosed Trailer</option>
                                            </select>
                                        </div>

                                        <!-- Booleans -->
                                        <div class="col-md-2">
                                            <label class="form-label">Modified</label><br>
                                            <input type="hidden" name="vehicles[{{ $vIndex + 1 }}][modified]"
                                                value="0">
                                            <input type="checkbox" name="vehicles[{{ $vIndex + 1 }}][modified]"
                                                value="1" {{ $vehicle->modified ? 'checked' : '' }}>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Modified Info</label>
                                            <input type="text" class="form-control"
                                                name="vehicles[{{ $vIndex + 1 }}][modified_info]"
                                                value="{{ $vehicle->modified_info }}">
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label">Auction</label><br>
                                            <input type="hidden"
                                                name="vehicles[{{ $vIndex + 1 }}][available_at_auction]"
                                                value="0">
                                            <input type="checkbox" class="auction-toggle"
                                                data-target="#auctionFields-{{ $vIndex + 1 }}"
                                                name="vehicles[{{ $vIndex + 1 }}][available_at_auction]" value="1"
                                                {{ $vehicle->available_at_auction ? 'checked' : '' }}>
                                        </div>

                                        <!-- Auction extra fields (hidden by default) -->
                                        <!-- Auction extra fields (hidden by default) -->
                                        {{-- {{ dd($vehicle->available_at_auction) }} --}}
                                        <div class="col-12 auction-fields" id="auctionFields-{{ $vIndex + 1 }}"
                                            @if ($vehicle->available_at_auction == 0) style="display: none;" @endif>
                                            <div class="row g-3 mt-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Auction Link</label>
                                                    <input type="text" class="form-control"
                                                        name="vehicles[{{ $vIndex + 1 }}][available_link]"
                                                        value="{{ $vehicle->available_link }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Buyer</label>
                                                    <input type="text" class="form-control"
                                                        name="vehicles[{{ $vIndex + 1 }}][buyer]"
                                                        value="{{ $vehicle->buyer }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Lot</label>
                                                    <input type="text" class="form-control"
                                                        name="vehicles[{{ $vIndex + 1 }}][lot]"
                                                        value="{{ $vehicle->lot }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Gate PIN</label>
                                                    <input type="text" class="form-control"
                                                        name="vehicles[{{ $vIndex + 1 }}][gatepin]"
                                                        value="{{ $vehicle->gatepin }}">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Images -->
                                        <div class="col-md-12">
                                            <label class="form-label">Images</label>
                                            <input type="file" name="vehicles[{{ $vIndex + 1 }}][images][]"
                                                class="form-control image-input" multiple>
                                            <div class="image-preview mt-2 d-flex flex-wrap gap-2">
                                                @foreach ($vehicle->images as $img)
                                                    <div class="position-relative d-inline-block"
                                                        style="width:80px;height:80px;">
                                                        <img src="{{ asset($img->image_path) }}" class="img-thumbnail"
                                                            style="width:100%;height:100%;object-fit:cover;">
                                                        <input type="checkbox"
                                                            name="vehicles[{{ $vIndex + 1 }}][delete_images][]"
                                                            value="{{ $img->id }}"
                                                            class="position-absolute top-0 end-0">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end mt-3">
                                        <button type="button" class="btn btn-outline-danger deleteVehicleBtn">Delete
                                            Vehicle</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="addVehicleBtn" class="btn btn-outline-primary mt-3">+ Add
                            Vehicle</button>
                    </div>
                </div>
            </div>

            <!-- Dates Section -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Dates</h5>
                        <div class="row g-3">
                            <!--    p -->
                            <div class="col-md-4">
                                <label class="form-label">Date Available to Ship <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="dates[pickup_date]"
                                    value="{{ old('dates.pickup_date', optional($quote->pickup_date)->format('Y-m-d')) }}">
                                <small class="text-muted">Select up to 30 days from your creation date</small>
                            </div>

                            <!-- Expiration Date -->
                            <div class="col-md-4">
                                <label class="form-label">Expiration Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="dates[expiration_date]"
                                    value="{{ old('dates.expiration_date', optional($quote->expiration_date)->format('Y-m-d') ?? now()->addDays(30)->format('Y-m-d')) }}">
                                <small class="text-muted">Select up to 30 days from your creation date</small>
                            </div>

                            <!-- Desired Delivery Date -->
                            {{-- <div class="col-md-4">
                                <label class="form-label">Desired Delivery Date</label>
                                <input type="date" class="form-control" name="dates[delivery_date]"
                                    value="{{ old('dates.delivery_date', optional($quote->delivery_date)->format('Y-m-d')) }}">
                                <small class="text-muted">Optional field</small>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing and Payment Section -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Pricing and Payment</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Amount(Book) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pricing[amount_to_pay]"
                                    value="{{ old('pricing.amount_to_pay', $quote->amount_to_pay) }}"
                                    placeholder="Enter amount to pay carrier">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">COP/COD Amount <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pricing[cop_cod_amount]"
                                    value="{{ old('pricing.cop_cod_amount', $quote->cop_cod_amount) }}"
                                    placeholder="0.00">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Balance Amount</label>
                                <input type="text" class="form-control" name="pricing[balance_amount]"
                                    value="{{ old('pricing.balance_amount', $quote->balance_amount) }}"
                                    placeholder="0.00">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Discounted Amount</label>
                                <input type="text" class="form-control" name="pricing[discounted_price]"
                                    value="{{ old('pricing.discounted_price', $quote->discounted_price) }}"
                                    placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Section -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Additional Info</h5>
                        <div class="row g-3">

                            <div class="col-md-12">
                                <label class="form-label">Pre-dispatch Notes</label>
                                <textarea class="form-control" rows="3" maxlength="4000" name="additional[pre_dispatch_notes]"
                                    placeholder="Pre-dispatch notes are only visible after the load is dispatched">{{ old('additional.pre_dispatch_notes', $quote->pre_dispatch_notes) }}</textarea>
                                <small class="text-muted">4000 characters remaining</small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Transport Special Instructions</label>
                                <textarea class="form-control" rows="3" maxlength="4000" name="additional[special_instructions]"
                                    placeholder="Transport special instructions are only visible after the load is dispatched">{{ old('additional.special_instructions', $quote->transport_special_instructions) }}</textarea>
                                <small class="text-muted">4000 characters remaining</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Your Contract Section -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Your Contract</h5>

                        <div class="row g-3">
                            <div class="col-12">
                                <p class="text-muted mb-1">Only visible after the load is dispatched</p>
                                <p class="mb-3">If you would like to review your contract, please see the contracts page.
                                </p>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Load-Specific Terms</label>
                                <textarea class="form-control" rows="3" maxlength="500" name="contract[terms]"
                                    placeholder="Add any additional terms">{{ old('contract.terms', $quote->load_specific_terms) }}</textarea>
                                <small class="text-muted">500 characters remaining</small>
                            </div>

                            <div class="modal-body">
                                <label class="form-label fw-semibold">Select Status</label>
                                <select name="status" id="statusSelect" class="form-select">
                                    @foreach ($quote->allowedStatuses($quote->status) as $status => $details)
                                        {{-- <option value="{{ $details }}">{{ $details }}</option> --}}
                                        <option value="{{ $status }}"
                                            {{ old('status', $quote->status) == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-body" id="listedPriceContainer" style="display: none;">
                                <label class="form-label fw-semibold">Listed Price ($)</label>
                                <input type="number" step="0.01" name="listed_price" id="listedPrice"
                                    class="form-control rounded-3" placeholder="Enter listed price">
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="contractAgree"
                                        name="contract[agree]" value="1"
                                        {{ old('contract.agree', false) || $quote->status === 'Dispatched' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="contractAgree">
                                        I acknowledge and agree that once the carrier has accepted my request, I will be
                                        entered into a legal contract...
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-grd btn-grd-primary px-4">Update Quote</button>
            </div>
        </form>
    </div>

@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            let vehicleIndex = $('.vehicle-item').length; // start from existing vehicles
            const currentYear = new Date().getFullYear();

            // ✅ Generate years for dropdown with optional selected value
            function generateYearOptions($select) {
                const selected = $select.data('selected');
                $select.empty().append('<option value="">-- Year --</option>');
                const currentYear = new Date().getFullYear();
                for (let y = currentYear; y >= currentYear - 75; y--) {
                    $select.append(`<option value="${y}" ${selected == y ? 'selected' : ''}>${y}</option>`);
                }
            }

            // Initialize all year selects
            $('.year-select').each(function() {
                generateYearOptions($(this));
            });

            // ✅ Add Vehicle
            $('#addVehicleBtn').click(function() {
                vehicleIndex++;
                const $clone = $('.vehicle-item').first().clone();

                $clone.attr('data-index', vehicleIndex);
                $clone.find('input, select').each(function() {
                    const name = $(this).attr('name').replace(/\d+/, vehicleIndex);
                    $(this).attr('name', name).val('');
                });

                $clone.find('.model-select').html('<option value="">-- Select Model --</option>');
                $clone.find('h6').text('Vehicle #' + vehicleIndex);
                $clone.find('.image-preview').html('');
                $clone.find('.text-end').html(
                    '<button type="button" class="btn btn-outline-danger deleteVehicleBtn">Delete Vehicle</button>'
                );

                $('#vehiclesContainer').append($clone);
                generateYearOptions($clone.find('.year-select'));
            });

            // ✅ Delete Vehicle
            $(document).on('click', '.deleteVehicleBtn', function() {
                if ($('.vehicle-item').length > 1) {
                    $(this).closest('.vehicle-item').remove();
                    renumberVehicles();
                } else {
                    alert('At least one vehicle is required.');
                }
            });

            // ✅ Image Preview with Remove Option
            $(document).on('change', '.image-input', function() {
                const previewContainer = $(this).siblings('.image-preview');
                previewContainer.html('');
                const files = this.files;

                if (files) {
                    Array.from(files).forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = `
                        <div class="position-relative d-inline-block" style="width:80px;height:80px;">
                            <img src="${e.target.result}" class="img-thumbnail" style="width:100%;height:100%;object-fit:cover;">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image" data-index="${index}">&times;</button>
                        </div>
                    `;
                            previewContainer.append(img);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });

            // ✅ Remove image from preview (and input)
            $(document).on('click', '.remove-image', function() {
                const index = $(this).data('index');
                const $input = $(this).closest('.image-preview').siblings('.image-input');
                const dt = new DataTransfer();

                const files = $input[0].files;
                for (let i = 0; i < files.length; i++) {
                    if (i !== index) {
                        dt.items.add(files[i]);
                    }
                }
                $input[0].files = dt.files;
                $(this).parent().remove();
            });

            // ✅ Renumber Vehicles
            function renumberVehicles() {
                $('.vehicle-item').each(function(index) {
                    const newIndex = index + 1;
                    $(this).attr('data-index', newIndex);
                    $(this).find('h6').text('Vehicle #' + newIndex);

                    // Fix input/select names
                    $(this).find('input, select').each(function() {
                        const oldName = $(this).attr('name');
                        if (oldName) {
                            const newName = oldName.replace(/\[\d+\]/, `[${newIndex}]`);
                            $(this).attr('name', newName);
                        }
                    });

                    // Auction toggle & fields
                    const $auctionToggle = $(this).find('.auction-toggle');
                    const $auctionFields = $(this).find('.auction-fields');

                    $auctionFields.attr('id', `auctionFields-${newIndex}`);
                    $auctionToggle.attr('data-target', `#auctionFields-${newIndex}`);

                    // Keep visibility consistent
                    if ($auctionToggle.is(':checked')) {
                        $auctionFields.show();
                    } else {
                        $auctionFields.hide();
                    }
                });
            }

            // Add phone dynamically
            $(document).on('click', '.addPhoneBtn', function(e) {
                e.preventDefault();
                const index = $(this).closest('.location-item').data('index');
                const phoneHtml = `
                    <div class="input-group mb-2">
                        <input type="text" name="locations[${index}][contact_phone][]" class="form-control" placeholder="Phone">
                        <button type="button" class="btn btn-danger removePhoneBtn">-</button>
                    </div>
                `;
                $(this).closest('.phone-list').append(phoneHtml);
            });

            // Remove phone dynamically
            $(document).on('click', '.removePhoneBtn', function(e) {
                e.preventDefault();
                $(this).closest('.input-group').remove();
            });


            // ✅ Fetch models based on make
            $(document).on('change', '.make-select', function() {
                const make = $(this).val();
                const $modelSelect = $(this).closest('.vehicle-item').find('.model-select');
                $modelSelect.html('<option value="">-- Select Model --</option>');

                if (make) {
                    $.ajax({
                        url: "{{ route('vehicles.models') }}",
                        data: {
                            make: make
                        },
                        success: function(models) {
                            models.forEach(model => {
                                $modelSelect.append('<option value="' + model + '">' +
                                    model + '</option>');
                            });
                        },
                        error: function() {
                            alert('Failed to fetch models.');
                        }
                    });
                }
            });

            // ✅ Pre-fill existing makes/models for edit
            $('.vehicle-item').each(function() {
                const $makeSelect = $(this).find('.make-select');
                const $modelSelect = $(this).find('.model-select');
                const selectedMake = $makeSelect.data('selected');
                const selectedModel = $modelSelect.data('selected');

                if (selectedMake) {
                    $makeSelect.val(selectedMake).trigger('change');
                    if (selectedModel) {
                        setTimeout(() => { // wait for AJAX to fill models
                            $modelSelect.val(selectedModel);
                        }, 300);
                    }
                }
            });

            $(document).on('change', '.auction-toggle', function() {
                const target = $(this).data('target');
                if ($(this).is(':checked')) {
                    $(target).show();
                } else {
                    $(target).hide();
                }
            });

            $(document).on('change', '#statusSelect', function() {
                const selectedStatus = $(this).val();

                if (selectedStatus === 'Listed') {
                    $('#listedPriceContainer').slideDown(200);
                    $('#listedPrice').attr('required', true);
                } else {
                    $('#listedPriceContainer').slideUp(200);
                    $('#listedPrice').removeAttr('required').val('');
                }
            });

        });
    </script>
@endsection
