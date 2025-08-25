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

            <!-- Pickup and Delivery Locations -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Locations</h5>
                        <div class="row">
                            @foreach (['pickup', 'delivery'] as $index => $locType)
                                @php $loc = $quote->locations[$locType] ?? []; @endphp
                                <div class="col-md-6">
                                    <div class="location-item mb-4 border p-3 rounded" data-index="{{ $index + 1 }}">
                                        <h6 class="mb-3">{{ ucfirst($locType) }} Location</h6>
                                        <div class="row g-3">
                                            <input type="hidden" name="locations[{{ $index + 1 }}][type]"
                                                value="{{ $locType }}">
                                            <div class="col-md-12">
                                                <label class="form-label">Location Name</label>
                                                <input type="text" name="locations[{{ $index + 1 }}][name]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.name', $loc['name'] ?? '') }}">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Location Type</label>
                                                <select name="locations[{{ $index + 1 }}][location_type]"
                                                    class="form-select">
                                                    <option value="">Select</option>
                                                    @foreach (['Warehouse', 'Business', 'Residential'] as $type)
                                                        <option value="{{ $type }}"
                                                            {{ old('locations.' . ($index + 1) . '.location_type', $loc['location_type'] ?? '') == $type ? 'selected' : '' }}>
                                                            {{ $type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Address 1</label>
                                                <input type="text" name="locations[{{ $index + 1 }}][address1]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.address1', $loc['address1'] ?? '') }}">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Address 2</label>
                                                <input type="text" name="locations[{{ $index + 1 }}][address2]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.address2', $loc['address2'] ?? '') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">City *</label>
                                                <input type="text" name="locations[{{ $index + 1 }}][city]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.city', $loc['city'] ?? '') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">State *</label>
                                                <input type="text" name="locations[{{ $index + 1 }}][state]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.state', $loc['state'] ?? '') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">ZIP *</label>
                                                <input type="text" name="locations[{{ $index + 1 }}][zip]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.zip', $loc['zip'] ?? '') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Contact Name</label>
                                                <input type="text" name="locations[{{ $index + 1 }}][contact_name]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.contact_name', $loc['contact_name'] ?? '') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Contact Email</label>
                                                <input type="email" name="locations[{{ $index + 1 }}][contact_email]"
                                                    class="form-control"
                                                    value="{{ old('locations.' . ($index + 1) . '.contact_email', $loc['contact_email'] ?? '') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Contact Phone</label>
                                                @php
                                                    $phones = old(
                                                        'locations.' . ($index + 1) . '.contact_phone',
                                                        $loc['contact_phone'] ?? [],
                                                    );
                                                @endphp
                                                @foreach ($phones as $pIndex => $phone)
                                                    <input type="text"
                                                        name="locations[{{ $index + 1 }}][contact_phone][]"
                                                        class="form-control mt-1" value="{{ $phone }}">
                                                @endforeach
                                                <small><a href="#" class="text-primary addPhoneBtn">+ Add
                                                        phone</a></small>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <input type="hidden" name="locations[{{ $index + 1 }}][twic]"
                                                    value="0">
                                                <input class="form-check-input" type="checkbox"
                                                    name="locations[{{ $index + 1 }}][twic]"
                                                    id="twic{{ $index + 1 }}" value="1"
                                                    {{ old('locations.' . ($index + 1) . '.twic', $loc['twic'] ?? 0) ? 'checked' : '' }}>
                                                <label for="twic{{ $index + 1 }}">TWIC Card Required?</label>
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
                                        <div class="col-md-3">
                                            <label class="form-label">Type *</label>
                                            <select name="vehicles[{{ $vIndex + 1 }}][type]" class="form-select"
                                                required>
                                                @foreach (['Car', 'SUV', 'Truck', 'Motorcycle'] as $type)
                                                    <option value="{{ $type }}"
                                                        {{ $vehicle->type == $type ? 'selected' : '' }}>
                                                        {{ $type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Year *</label>
                                            <select name="vehicles[{{ $vIndex + 1 }}][year]"
                                                class="form-select year-select"></select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Make *</label>
                                            <select name="vehicles[{{ $vIndex + 1 }}][make]"
                                                class="form-select make-select" required>
                                                <option value="">-- Select Make --</option>
                                                @foreach ($makes as $make)
                                                    <option value="{{ $make }}"
                                                        {{ $vehicle->make == $make ? 'selected' : '' }}>
                                                        {{ $make }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Model *</label>
                                            <select name="vehicles[{{ $vIndex + 1 }}][model]"
                                                class="form-select model-select" required>
                                                <option value="{{ $vehicle->model }}">{{ $vehicle->model }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Color</label>
                                            <input type="text" name="vehicles[{{ $vIndex + 1 }}][color]"
                                                class="form-control" value="{{ $vehicle->color }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">VIN</label>
                                            <input type="text" name="vehicles[{{ $vIndex + 1 }}][vin]"
                                                class="form-control" value="{{ $vehicle->vin }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Images</label>
                                            <input type="file" name="images[{{ $vIndex + 1 }}][]"
                                                class="form-control image-input" multiple>
                                            <div class="image-preview mt-2 d-flex flex-wrap gap-2">
                                                @foreach ($vehicle->images as $img)
                                                    <div class="position-relative d-inline-block"
                                                        style="width:80px;height:80px;">
                                                        <img src="{{ asset($img->image_path) }}" class="img-thumbnail"
                                                            style="width:100%;height:100%;object-fit:cover;">
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
                            <!-- Date Available to Ship -->
                            <div class="col-md-4">
                                <label class="form-label">Date Available to Ship <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="dates[available_date]"
                                    value="{{ old('dates.available_date', optional($quote->pickup_date)->format('Y-m-d')) }}">
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
                            <div class="col-md-4">
                                <label class="form-label">Desired Delivery Date</label>
                                <input type="date" class="form-control" name="dates[desired_delivery_date]"
                                    value="{{ old('dates.desired_delivery_date', optional($quote->delivery_date)->format('Y-m-d')) }}">
                                <small class="text-muted">Optional field</small>
                            </div>
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
                                <label class="form-label">Amount to Pay Carrier <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pricing[amount_to_pay]"
                                    value="{{ old('pricing.amount_to_pay', $quote->amount_to_pay) }}"
                                    placeholder="Enter amount to pay carrier">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">COP/COD</label>
                                <input type="text" class="form-control" name="pricing[cop_cod]"
                                    value="{{ old('pricing.cop_cod', $quote->cop_cod) }}" placeholder="COP/COD">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">COP/COD Amount <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pricing[cop_cod_amount]"
                                    value="{{ old('pricing.cop_cod_amount', $quote->cop_cod_amount) }}"
                                    placeholder="0.00">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Balance</label>
                                <input type="text" class="form-control" name="pricing[balance]"
                                    value="{{ old('pricing.balance', $quote->balance) }}" placeholder="Balance Amount">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Balance Amount</label>
                                <input type="text" class="form-control" name="pricing[balance_amount]"
                                    value="{{ old('pricing.balance_amount', $quote->balance_amount) }}"
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
                            <div class="col-md-6">
                                <label class="form-label">Your Load ID</label>
                                <input type="text" class="form-control" name="additional[load_id]" maxlength="50"
                                    value="{{ old('additional.load_id', $quote->load_id) }}" placeholder="ID Number">
                                <small class="text-muted">50 characters remaining</small>
                            </div>

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
            function generateYearOptions($select, selected = null) {
                $select.empty().append('<option value="">-- Year --</option>');
                for (let y = currentYear; y >= currentYear - 30; y--) {
                    $select.append(`<option value="${y}" ${(selected==y)?'selected':''}>${y}</option>`);
                }
            }
            $('.year-select').each(function() {
                generateYearOptions($(this), $(this).val());
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
                    $(this).find('input, select').each(function() {
                        const name = $(this).attr('name').replace(/\d+/, newIndex);
                        $(this).attr('name', name);
                    });
                });
            }

            // ✅ Add phone input dynamically
            $(document).on('click', '.addPhoneBtn', function(e) {
                e.preventDefault();
                const index = $(this).closest('.location-item').data('index');
                $(this).before('<input type="text" name="locations[' + index +
                    '][contact_phone][]" class="form-control mt-1" placeholder="Additional phone">');
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

        });
    </script>
@endsection
