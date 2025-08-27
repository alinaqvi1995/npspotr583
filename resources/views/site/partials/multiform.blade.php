<form class="rd-mailform validate-form" action="{{ route('frontend.submit.quote') }}" method="POST"
    enctype="multipart/form-data" novalidate data-parsley-validate data-parsley-errors-messages-disabled>
    @csrf
    @php $today = date('Y-m-d'); @endphp

    <input type="hidden" name="vehicle_opt" value="vehicle">
    <input type="hidden" name="type" value="car">
    <div class="container mt-2">

        <!-- Step 1 -->
        <div id="step1" class="route_quote_info">
            <div class="row">
                <h4 class="title text-center">Quote Request!</h4>
                <div class="col-xl-12 mb-4">
                    <h6 class="text-white">Moving From</h6>
                    <label class="d-block mb-2 text-white">Where Are You Moving From?</label>
                    <div class="input-form single-input-field">
                        <input type="text" id="pickup-location" name="pickup_location"
                            placeholder="Enter City or ZipCode" required>
                        <div id="pickup-suggestions" class="suggestions-box"></div>
                    </div>
                </div>
                <div class="col-xl-12 mb-4">
                    <h6 class="text-white">Moving To</h6>
                    <label class="d-block mb-2 text-white">Where Are You Moving To?</label>
                    <div class="input-form single-input-field">
                        <input type="text" id="delivery-location" name="delivery_location"
                            placeholder="Enter City or ZipCode" required>
                        <div id="delivery-suggestions" class="suggestions-box"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <button type="button" id="step1_next" class="tj-submit-btn">Next</button>
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div id="step2" class="vehicle_quote_info" style="display: none;">
            <div class="row">
                <h4 class="title text-center">Vehicle Information</h4>
                <select id="tabSelector">
                    <option value="">-- Select Vehicle --</option>
                    <option value="Car">Car</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Golf-Cart">Golf Cart</option>
                    <option value="Atv">ATV</option>
                    <option value="Heavy-Equipment">Heavy Equipment</option>
                    <option value="RV-Transport">RV Transport</option>
                    <option value="Boat-Transport">Boat Transport</option>
                </select>

                <div id="firstVehicle"></div>

                <div class="tab-content mt-3" id="additionalContent"></div>
                <button type="button" id="addVehicleBtn" class="text-white text-center text-decoration-underline"
                    style="display:none;">Add Vehicle</button>
            </div>
            <div class="row mt-2 justify-content-evenly">
                <div class="col-12 d-flex flex-column flex-md-row justify-content-evenly">
                    <button type="button" id="step2_previous" class="tj-submit-btn">Previous</button>
                    <button type="button" id="step2_next" class="tj-submit-btn">Next</button>
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div id="step3" class="basic_quote_info" style="display: none;">
            <div class="row mb-3">
                <h4 class="text-white text-center fs-2">Customer Information</h4>
                <div class="col-xl-6">
                    <div class="input-form single-input-field">
                        <label>Your Name:</label>
                        <input id="name" name="customer_name" type="text" placeholder="Customer Name" required>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="input-form single-input-field">
                        <label>Phone:</label>
                        <input id="phone" name="customer_phone" type="tel" placeholder="Customer Phone"
                            required>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="input-form single-input-field">
                        <label>Email Address:</label>
                        <input id="email" name="customer_email" type="email" placeholder="Email address" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-evenly">
                <div class="col-12 d-flex flex-column flex-md-row justify-content-evenly">
                    <button type="button" id="step3_previous" class="tj-submit-btn">Previous</button>
                    <button type="submit" class="tj-submit-btn">Calculate Price</button>
                </div>
            </div>
        </div>

    </div>
</form>
