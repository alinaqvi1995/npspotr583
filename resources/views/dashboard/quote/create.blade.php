@extends('dashboard.includes.partial.base')
@section('title', 'Create Quote')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Quote</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('frontend.submit.quote') }}" id="quoteForm" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Dynamic Locations -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Locations</h5>
                        <div id="locationsContainer">
                            <!-- Initial Pickup Location -->
                            <div class="location-item mb-4 border p-3 rounded" data-index="1">
                                <h6 class="mb-3">Location #1</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Type *</label>
                                        <select name="locations[1][type]" class="form-select" required>
                                            <option value="">Select type</option>
                                            <option value="pickup">Pickup</option>
                                            <option value="delivery">Delivery</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Location Name</label>
                                        <input type="text" name="locations[1][name]" class="form-control"
                                            placeholder="Location Name">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Location Type</label>
                                        <select name="locations[1][location_type]" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Warehouse">Warehouse</option>
                                            <option value="Business">Business</option>
                                            <option value="Residential">Residential</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Address 1</label>
                                        <input type="text" name="locations[1][address1]" class="form-control"
                                            placeholder="Street address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Address 2</label>
                                        <input type="text" name="locations[1][address2]" class="form-control"
                                            placeholder="Apt, suite, etc.">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City *</label>
                                        <input type="text" name="locations[1][city]" class="form-control"
                                            placeholder="City">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State *</label>
                                        <input type="text" name="locations[1][state]" class="form-control"
                                            placeholder="State">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">ZIP *</label>
                                        <input type="text" name="locations[1][zip]" class="form-control"
                                            placeholder="ZIP">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Contact Name</label>
                                        <input type="text" name="locations[1][contact_name]" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Contact Email</label>
                                        <input type="email" name="locations[1][contact_email]" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Contact Phone</label>
                                        <input type="text" name="locations[1][contact_phone][]" class="form-control"
                                            placeholder="Phone">
                                        <small><a href="#" class="text-primary addPhoneBtn">+ Add phone</a></small>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input class="form-check-input" type="checkbox" name="locations[1][twic]"
                                            id="twic1">
                                        <label for="twic1">TWIC Card Required?</label>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <!-- Delete button for extra locations -->
                                </div>
                            </div>
                        </div>
                        {{-- <button type="button" id="addLocationBtn" class="btn btn-outline-primary mt-3">+ Add
                            Location</button> --}}
                    </div>
                </div>
            </div>

            <!-- Dynamic Vehicles -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Vehicles</h5>
                        <div id="vehiclesContainer">
                            <div class="vehicle-item mb-4 border p-3 rounded" data-index="1">
                                <h6 class="mb-3">Vehicle #1</h6>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Type *</label>
                                        <select name="vehicles[1][type]" class="form-select" required>
                                            <option value="">Select</option>
                                            <option>Car</option>
                                            <option>SUV</option>
                                            <option>Truck</option>
                                            <option>Motorcycle</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Year *</label>
                                        <select name="vehicles[1][year]" class="form-select year-select"></select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Make *</label>
                                        <select name="vehicles[1][make]" class="form-select make-select" required>
                                            <option value="">-- Select Make --</option>
                                            @foreach ($makes as $make)
                                                <option value="{{ $make }}">{{ $make }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Model *</label>
                                        <select name="vehicles[1][model]" class="form-select model-select" required>
                                            <option value="">-- Select Model --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Color</label>
                                        <input type="text" name="vehicles[1][color]" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">VIN</label>
                                        <input type="text" name="vehicles[1][vin]" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Images</label>
                                        <input type="file" name="images[1][]" class="form-control" multiple>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <!-- Delete button for extra vehicles -->
                                </div>
                            </div>
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
                                    value="{{ old('dates.available_date', $quote->dates['available_date'] ?? '') }}">
                                <small class="text-muted">Select up to 30 days from your creation date</small>
                            </div>

                            <!-- Expiration Date -->
                            <div class="col-md-4">
                                <label class="form-label">Expiration Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="dates[expiration_date]"
                                    value="{{ old('dates.expiration_date', $quote->dates['expiration_date'] ?? now()->addDays(30)->format('Y-m-d')) }}">
                                <small class="text-muted">Select up to 30 days from your creation date</small>
                            </div>

                            <!-- Desired Delivery Date -->
                            <div class="col-md-4">
                                <label class="form-label">Desired Delivery Date</label>
                                <input type="date" class="form-control" name="dates[desired_delivery_date]"
                                    value="{{ old('dates.desired_delivery_date', $quote->dates['desired_delivery_date'] ?? '') }}">
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
                                    value="{{ old('pricing.amount_to_pay', $quote->pricing['amount_to_pay'] ?? '') }}"
                                    placeholder="Enter amount to pay carrier">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">COP/COD</label>
                                <input type="text" class="form-control" name="pricing[cop_cod]"
                                    value="{{ old('pricing.cop_cod', $quote->pricing['cop_cod'] ?? '') }}"
                                    placeholder="COP/COD">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">COP/COD Amount <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pricing[cop_cod_amount]"
                                    value="{{ old('pricing.cop_cod_amount', $quote->pricing['cop_cod_amount'] ?? '') }}"
                                    placeholder="0.00">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Balance</label>
                                <input type="text" class="form-control" name="pricing[balance]"
                                    value="{{ old('pricing.balance', $quote->pricing['balance'] ?? '') }}"
                                    placeholder="Balance Amount">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Balance Amount</label>
                                <input type="text" class="form-control" name="pricing[balance_amount]"
                                    value="{{ old('pricing.balance_amount', $quote->pricing['balance_amount'] ?? '') }}"
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
                                    value="{{ old('additional.load_id', $quote->additional['load_id'] ?? '') }}"
                                    placeholder="ID Number">
                                <small class="text-muted">50 characters remaining</small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Pre-dispatch Notes</label>
                                <textarea class="form-control" rows="3" maxlength="4000" name="additional[pre_dispatch_notes]"
                                    placeholder="Pre-dispatch notes are only visible after the load is dispatched">{{ old('additional.pre_dispatch_notes', $quote->additional['pre_dispatch_notes'] ?? '') }}</textarea>
                                <small class="text-muted">4000 characters remaining</small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Transport Special Instructions</label>
                                <textarea class="form-control" rows="3" maxlength="4000" name="additional[special_instructions]"
                                    placeholder="Transport special instructions are only visible after the load is dispatched">{{ old('additional.special_instructions', $quote->additional['special_instructions'] ?? '') }}</textarea>
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
                                    placeholder="Add any additional terms">{{ old('contract.terms', $quote->contract['terms'] ?? '') }}</textarea>
                                <small class="text-muted">500 characters remaining</small>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="contractAgree"
                                        name="contract[agree]" value="1"
                                        {{ old('contract.agree', $quote->contract['agree'] ?? false) ? 'checked' : '' }}
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
                <button type="submit" class="btn btn-grd-primary px-4">Submit Quote</button>
            </div>
        </form>
    </div>
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            let locationIndex = 1;
            let vehicleIndex = 1;
            const allModels = @json($models);
            const currentYear = new Date().getFullYear();

            // Generate years for dropdown
            function generateYearOptions($select) {
                $select.empty().append('<option value="">-- Year --</option>');
                for (let y = currentYear; y >= currentYear - 30; y--) {
                    $select.append('<option value="' + y + '">' + y + '</option>');
                }
            }
            generateYearOptions($('.year-select'));

            // Add Location
            // $('#addLocationBtn').click(function() {
            //     locationIndex++;
            //     const $clone = $('.location-item').first().clone();
            //     $clone.attr('data-index', locationIndex);
            //     $clone.find('input, select').each(function() {
            //         const name = $(this).attr('name').replace(/\d+/, locationIndex);
            //         $(this).attr('name', name).val('');
            //     });
            //     $clone.find('.text-end').html(
            //         '<button type="button" class="btn btn-outline-danger deleteLocationBtn">Delete Location</button>'
            //     );
            //     $('#locationsContainer').append($clone);
            // });

            // // Delete Location
            // $(document).on('click', '.deleteLocationBtn', function() {
            //     if ($('.location-item').length > 1) {
            //         $(this).closest('.location-item').remove();
            //     } else {
            //         alert('At least one location is required.');
            //     }
            // });

            // Add Vehicle
            $('#addVehicleBtn').click(function() {
                vehicleIndex++;
                const $clone = $('.vehicle-item').first().clone();
                $clone.attr('data-index', vehicleIndex);
                $clone.find('input, select').each(function() {
                    const name = $(this).attr('name').replace(/\d+/, vehicleIndex);
                    $(this).attr('name', name).val('');
                });
                generateYearOptions($clone.find('.year-select'));
                $clone.find('.text-end').html(
                    '<button type="button" class="btn btn-outline-danger deleteVehicleBtn">Delete Vehicle</button>'
                );
                $('#vehiclesContainer').append($clone);
            });

            // Delete Vehicle
            $(document).on('click', '.deleteVehicleBtn', function() {
                if ($('.vehicle-item').length > 1) {
                    $(this).closest('.vehicle-item').remove();
                } else {
                    alert('At least one vehicle is required.');
                }
            });

            // Make -> Model dependent dropdown
            $(document).on('change', '.make-select', function() {
                const make = $(this).val();
                const $modelSelect = $(this).closest('.vehicle-item').find('.model-select');
                $modelSelect.empty().append('<option value="">-- Select Model --</option>');
                if (make && allModels[make]) {
                    allModels[make].forEach(model => {
                        $modelSelect.append('<option value="' + model + '">' + model + '</option>');
                    });
                }
            });

            // Add phone
            $(document).on('click', '.addPhoneBtn', function(e) {
                e.preventDefault();
                $(this).before('<input type="text" name="' + $(this).closest('.location-item').data(
                        'index') +
                    '_extra_phone[]" class="form-control mt-1" placeholder="Additional phone">');
            });
        });
    </script>
@endsection
