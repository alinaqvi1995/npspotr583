@extends('dashboard.includes.partial.base')
@section('title', 'Create')

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
        <form action="#" id="quoteForm">
            <!-- Pickup/Drop-off Locations -->
            <div class="row">
                @for ($i = 1; $i <= 2; $i++)
                    <div class="col-6 col-xl-6">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">{{ $i == 1 ? 'Pick-Up Location' : 'Drop-Off Location' }}</h5>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Location Name</label>
                                        <input type="text" name="locations[{{ $i }}][name]"
                                            class="form-control"
                                            placeholder="Type to select from address book or input new location name">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Location Type</label>
                                        <select name="locations[{{ $i }}][type]" class="form-select">
                                            <option value="">Select location type</option>
                                            <option>Warehouse</option>
                                            <option>Business</option>
                                            <option>Residential</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address 1</label>
                                        <input type="text" name="locations[{{ $i }}][address1]"
                                            class="form-control" placeholder="Street address">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address 2</label>
                                        <input type="text" name="locations[{{ $i }}][address2]"
                                            class="form-control" placeholder="Apartment, suite, unit, etc.">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" name="locations[{{ $i }}][city]"
                                            class="form-control" placeholder="City name">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State/Province <span class="text-danger">*</span></label>
                                        <input type="text" name="locations[{{ $i }}][state]"
                                            class="form-control" placeholder="State/Province name">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">ZIP Code <span class="text-danger">*</span></label>
                                        <input type="text" name="locations[{{ $i }}][zip]"
                                            class="form-control" placeholder="Number">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Buyer Reference Number</label>
                                        <input type="text" name="locations[{{ $i }}][buyer_ref]"
                                            class="form-control" placeholder="#">
                                    </div>

                                    <h6 class="mt-3">Contact</h6>
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="locations[{{ $i }}][contact_name]"
                                            class="form-control" placeholder="Contact Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="locations[{{ $i }}][contact_email]"
                                            class="form-control" placeholder="Enter valid email">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Contact Phone</label>
                                        <input type="text" name="locations[{{ $i }}][contact_phone]"
                                            class="form-control" placeholder="Cell">
                                        <small><a href="#" class="text-primary addPhoneBtn">+ Add phone</a></small>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="locations[{{ $i }}][twic]"
                                                id="twicPickup{{ $i }}">
                                            <label class="form-check-label" for="twicPickup{{ $i }}">Is a TWIC
                                                Card required
                                                for this location?</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="locations[{{ $i }}][save]"
                                                id="savePickup{{ $i }}">
                                            <label class="form-check-label" for="savePickup{{ $i }}">Save to
                                                address book</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Vehicle Section -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Vehicle Information</h5>
                        <div id="vehiclesContainer">
                            <div class="vehicle-item mb-3" data-index="1">
                                <div class="row g-3 vehicle-row">
                                    <div class="col-md-3">
                                        <label class="form-label">Vehicle Type *</label>
                                        <select name="vehicles[1][type]" class="form-select">
                                            <option value="">Select vehicle type</option>
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
                                        <input type="text" name="vehicles[1][color]" class="form-control"
                                            placeholder="Color">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Lot Number</label>
                                        <input type="text" name="vehicles[1][lot_number]" class="form-control"
                                            placeholder="Number">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">VIN</label>
                                        <input type="text" name="vehicles[1][vin]" class="form-control"
                                            placeholder="VIN">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">License Plate</label>
                                        <input type="text" name="vehicles[1][license_plate]" class="form-control"
                                            placeholder="License">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">License State/Province</label>
                                        <input type="text" name="vehicles[1][license_state]" class="form-control"
                                            placeholder="State/Province">
                                    </div>
                                </div>
                                <div class="text-end mt-2">
                                    <!-- Delete button will appear here for additional vehicles -->
                                </div>
                            </div>
                        </div>
                        <button type="button" id="addVehicleBtn" class="btn btn-outline-primary mt-3">+ Add
                            Vehicle</button>
                    </div>
                </div>
            </div>



            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Dates</h5>
                        <div class="row g-3">

                            <!-- Date Available to Ship -->
                            <div class="col-md-4">
                                <label class="form-label">Date Available to Ship <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="MM/DD/YYYY">
                                <small class="text-muted">Select up to 30 days from your creation date</small>
                            </div>

                            <!-- Expiration Date -->
                            <div class="col-md-4">
                                <label class="form-label">Expiration Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" value="2025-09-19">
                                <small class="text-muted">Select up to 30 days from your creation date</small>
                            </div>

                            <!-- Desired Delivery Date -->
                            <div class="col-md-4">
                                <label class="form-label">Desired Delivery Date</label>
                                <input type="date" class="form-control" placeholder="MM/DD/YYYY">
                                <small class="text-muted">Select up to 30 days from your creation date</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Pricing and Payment</h5>
                        <div class="row g-3">

                            <!-- Amount to Pay Carrier -->
                            <div class="col-md-6">
                                <label class="form-label">Amount to Pay Carrier <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter amount to pay carrier">
                            </div>

                            <!-- COP/COD -->
                            <div class="col-md-6">
                                <label class="form-label">COP/COD</label>
                                <input type="text" class="form-control" placeholder="COP/COD">
                            </div>

                            <!-- COP/COD Amount -->
                            <div class="col-md-6">
                                <label class="form-label">COP/COD Amount <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="0.00">
                            </div>

                            <!-- Balance -->
                            <div class="col-md-6">
                                <label class="form-label">Balance</label>
                                <input type="text" class="form-control" placeholder="Balance Amount">
                            </div>

                            <!-- Balance Amount -->
                            <div class="col-md-6">
                                <label class="form-label">Balance Amount</label>
                                <input type="text" class="form-control" placeholder="0.00">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Additional Info</h5>
                        <div class="row g-3">

                            <!-- Load ID -->
                            <div class="col-md-6">
                                <label class="form-label">Your Load ID</label>
                                <input type="text" class="form-control" maxlength="50" placeholder="ID Number">
                                <small class="text-muted">50 characters remaining</small>
                            </div>

                            <!-- Pre-dispatch Notes -->
                            <div class="col-md-12">
                                <label class="form-label">Pre-dispatch Notes</label>
                                <textarea class="form-control" rows="3" maxlength="4000"
                                    placeholder="Pre-dispatch notes are only visible after the load is dispatched"></textarea>
                                <small class="text-muted">4000 characters remaining</small>
                            </div>

                            <!-- Transport Special Instructions -->
                            <div class="col-md-12">
                                <label class="form-label">Transport Special Instructions</label>
                                <textarea class="form-control" rows="3" maxlength="4000"
                                    placeholder="Transport special instructions are only visible after the load is dispatched"></textarea>
                                <small class="text-muted">4000 characters remaining</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Your Contract</h5>

                        <div class="row g-3">

                            <!-- Info Notice -->
                            <div class="col-12">
                                <p class="text-muted mb-1">Only visible after the load is dispatched</p>
                                <p class="mb-3">If you would like to review your contract, please see the contracts page.
                                </p>
                            </div>

                            <!-- Load Specific Terms -->
                            <div class="col-12">
                                <label class="form-label">Load-Specific Terms</label>
                                <textarea class="form-control" rows="3" maxlength="500" placeholder="Add any additional terms"></textarea>
                                <small class="text-muted">500 characters remaining</small>
                            </div>

                            <!-- Contract Agreement -->
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="contractAgree" required>
                                    <label class="form-check-label" for="contractAgree">
                                        I acknowledge and agree that once the carrier has accepted my request, I will be
                                        entered into a legal contract with the carrier for the transport of my vehicle(s). I
                                        further acknowledge and agree that Dealertrack Central Dispatch, Inc. is not a party
                                        to such contract, and has no obligation or liability whatsoever arising out of such
                                        contract. I consent to Dealertrack Central Dispatch, Inc. adding a provision to this
                                        effect in my dispatch sheets. I also understand that any changes that I make to the
                                        dispatch sheet after the carrier has accepted my request, unless the carrier has
                                        approved the change, may not be binding on the carrier.
                                    </label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-grd-primary px-4">Post Listing</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            let vehicleIndex = 1;
            const allModels = @json($models);
            const currentYear = new Date().getFullYear();
            const startYear = currentYear;
            const endYear = currentYear - 30;

            // Populate Year dropdown
            function generateYearOptions($select) {
                $select.empty().append('<option value="">-- Select Year --</option>');
                for (let y = startYear; y >= endYear; y--) {
                    $select.append('<option value="' + y + '">' + y + '</option>');
                }
            }

            generateYearOptions($('select.year-select'));

            // Make -> Model dependent dropdown
            $(document).on('change', '.make-select', function() {
                const $make = $(this).val();
                const $modelSelect = $(this).closest('.vehicle-item').find('.model-select');
                $modelSelect.empty().append('<option value="">-- Select Model --</option>');
                if ($make && allModels[$make]) {
                    allModels[$make].forEach(model => {
                        $modelSelect.append('<option value="' + model + '">' + model + '</option>');
                    });
                }
            });

            // Add Vehicle
            $('#addVehicleBtn').click(function() {
                vehicleIndex++;
                const $first = $('#vehiclesContainer .vehicle-item').first();
                const $clone = $first.clone();
                $clone.attr('data-index', vehicleIndex);

                $clone.find('input, select').each(function() {
                    const name = $(this).attr('name').replace(/\d+/, vehicleIndex);
                    $(this).attr('name', name).val('');
                    if ($(this).hasClass('year-select')) {
                        generateYearOptions($(this));
                    }
                });

                // Remove old delete button and add new one
                $clone.find('.deleteVehicleBtn').remove();
                $clone.find('.text-end').html(
                    '<button type="button" class="btn btn-outline-danger deleteVehicleBtn">Delete Vehicle</button>'
                    );

                $('#vehiclesContainer').append($clone);
            });

            // Delete Vehicle
            $(document).on('click', '.deleteVehicleBtn', function() {
                if ($('#vehiclesContainer .vehicle-item').length > 1) {
                    $(this).closest('.vehicle-item').remove();
                } else {
                    alert('At least one vehicle is required.');
                }
            });

            // Add Phone
            $(document).on('click', '.addPhoneBtn', function(e) {
                e.preventDefault();
                const $container = $(this).closest('.col-md-6');
                $container.append('<input type="text" name="' + $(this).closest('.vehicle-item').data(
                        'index') +
                    '_extra_phone[]" class="form-control mt-1" placeholder="Additional phone">');
            });
        });
    </script>
@endsection
