@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
        .input-container {
        height: 34px;
        background: white;
        display: flex;
        align-items: center;
        /* border: 1px solid #ccc; */
        border-radius: 4px;
        padding: 8px 0px 8px 0px;
        width: fit-content;
    }
    .input-container1 {
        height: 34px;
        background: white;
        display: flex;
        align-items: center;
        /* border: 1px solid #ccc; */
        border-radius: 4px;
        padding: 8px 0px 8px 0px;
        width: fit-content;
    }
    .input-field {
        width: 50px;
        padding: 5px;
        font-size: 14px;
        border: none;
        outline: none;
    }
    .input-field-1 {
        width: 65px;
        padding: 0px 0px 0px 10px;
        font-size: 14px;
        border: none;
        outline: none;
    }
    .separator {
        margin: 0px 0px 0px 0px;
        font-size: 14px;
    }
    .separators {
        margin: 0px 5px 0px 0px;
        font-size: 14px;
    }
    .separators-w {
        margin: 0px 5px 0px 0px;
        font-size: 14px;
    }
    .input-container input[type="number"] {
        -moz-appearance: textfield;
    }
</style>
<div id="make-options" class="d-none">
    @foreach ($makes as $make)
        <option value="{{ $make }}">{{ $make }}</option>
    @endforeach
</div>
<form class="rd-mailform validate-form" id="calculatePriceFrom" action="{{ route('frontend.submit.quote') }}" method="POST" enctype="multipart/form-data" novalidate data-parsley-validate data-parsley-errors-messages-disabled>
    @csrf
    @php $today = date('Y-m-d'); @endphp

    <input type="hidden" name="vehicle_opt" value="vehicle">
    <input type="hidden" name="type" value="car">
    <div class="container mt-2 px-0">

        <!-- Step 1 -->
        <div id="step1" class="route_quote_info">
            <div class="row">
                <h4 class="title text-center">Quote Request!</h4>
                <div class="col-xl-12 mb-4">
                    <h6 class="text-white">Moving From</h6>
                    <label class="d-block mb-2 text-white">Where Are You Moving From?</label>
                    <div class="input-form single-input-field">
                        <input class="form-control" type="text" id="pickup-location" name="pickup_location"
                            placeholder="Enter City or ZipCode" value="{{ old('pickup_location') }}" required>
                        <div id="pickup-suggestions" class="form-control suggestions-box"></div>
                    </div>
                </div>
                <div class="col-xl-12 mb-4">
                    <h6 class="text-white">Moving To</h6>
                    <label class="d-block mb-2 text-white">Where Are You Moving To?</label>
                    <div class="input-form single-input-field">
                        <input class="form-control" type="text" id="delivery-location" name="delivery_location"
                            placeholder="Enter City or ZipCode" value="{{ old('delivery_location') }}" required>
                        <div id="delivery-suggestions" class="form-control suggestions-box"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <button type="button" id="step1_next" class="tj-submit-btn no_move">Next</button>
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
                <div class="vehicle-error text-danger text-center mb-3" style="display:none;">
                    Please add at least one vehicle before continuing.
                </div>

                <div id="firstVehicle"></div>

                <div class="tab-content mt-3" id="additionalContent"></div>
                <button type="button" id="addVehicleBtn" class="text-white text-center text-decoration-underline"
                    style="display:none;">Add Vehicle</button>
            </div>
            <div class="row mt-2 justify-content-evenly">
                <div class="col-12 d-flex flex-column flex-md-row justify-content-evenly">
                    <button type="button" id="step2_previous" class="tj-submit-btn no_move">Previous</button>
                    <button type="button" id="step2_next" class="tj-submit-btn no_move">Next</button>
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
                        <input class="form-control" id="name" name="customer_name" value="{{ old('customer_name') }}" type="text"
                            placeholder="Customer Name" required>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="input-form single-input-field">
                        <label>Phone:</label>
                        <input class="form-control" id="phone" name="customer_phone" value="{{ old('customer_phone') }}" type="tel"
                            placeholder="(123) 456-7890" required>
                        <input type="hidden" name="country_code" id="country_code" value="+1" />
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="input-form single-input-field">
                        <label>Email Address:</label>
                        <input class="form-control" id="email" name="customer_email" type="email" placeholder="Email address"
                            value="{{ old('customer_email') }}" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-evenly">
                <div class="col-12 d-flex flex-column flex-md-row justify-content-evenly">
                    <button type="button" id="step3_previous" class="tj-submit-btn no_move">Previous</button>
                    <button type="submit" class="tj-submit-btn">Submit Quote</button>
                </div>
            </div>
        </div>

    </div>
</form>