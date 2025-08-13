@extends('layouts.guest')

@section('title', 'Get Quote on Freight | ShipA1')

@section('meta_description',
    'Get an instant Freight shipping quote with ease! Trust our reliable service for nationwide
    coverage, transparent pricing, and secure transportation. Plan your shipment quickly and efficiently.')


@section('content')

    <style>
        .suggestionsTwo {
            background: #fff;
            font-size: 14px;
            margin-top: -2px;
            padding-bottom: 20px;
            list-style: none;
            line-height: 28px;
            padding-left: 14px;
            display: none;
        }

        .suggestionsTwo li {
            cursor: pointer;
        }

        .suggestionsTwo li:hover {
            color: #8fc445;
        }

        .image_input {
            padding: 0px !important;
            padding-left: 10px !important;
        }

        .select2 {
            color: #38413b;
            opacity: 2;
            font-size: 18px;
            border: 1px solid #318eefc9;
            font-family: inherit;
        }

        select {
            width: 100%;
            min-height: 100px;
            border-radius: 3px;
            border: 1px solid #444;
            padding: 10px;
            color: #444444;
            font-size: 14px;
        }

        .lab-cos {
            font-size: 15px;
            font-weight: 500;
            color: var(--tj-white-color);
            margin-bottom: 10px;
        }

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

        .input-container input[type="number"]::-webkit-outer-spin-button,
        .input-container input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .form-wrap {
            margin-bottom: 10px;
            position: relative;
        }

        .form-label-outside {
            color: white;
            display: block;
            margin-bottom: 5px;
        }

        .input-container {
            display: flex;
            align-items: center;
        }

        .input-container input {
            border: none;
            /* border-bottom: 1px solid #ccc; */
            padding: 5px 0px 5px 0px;
            font-size: 14px;
            width: 38px;
            text-align: center;
            /* margin-right: 5px; */
        }

        .input-container .placeholders {
            /* color:white; */
            position: relative;
            right: 72px;
            color: black;
            display: inline-block;
            width: auto;

            padding: 0px 8px;
            /* background: white; */
        }

        .err-style {
            color: red;
        }

        .tj-input-form .input-form label {
            font-size: 15px;
            font-weight: 500;
            color: var(--tj-white-color);
            margin-bottom: 10px;
        }

        .error-message {
            display: none;
            color: red;
        }

        .error-field {
            border: 2px solid red;
        }
    </style>
    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('frontend/images/banner/all-cover-banner.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Freight</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="{{ route('welcome') }}">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> Freight</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== breadcrumb End ==============-->

    <section class="tj-choose-us-section">
        <div class="container-flude">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="col-lg-12" data-sal="slide-down" data-sal-duration="800">
                    <div class="tj-input-form" data-bg-image="">
                        <h4 class="title text-center">Instant Freight Shipping Quote!</h4>
                        <form action="{{ route('submit.quote') }}" method="post" class="rd-mailform validate-form"
                            id="calculatePriceFrom" data-parsley-validate data-parsley-errors-messages-disabled
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="hidden" name="car_type" value="3" hidden>
                            <input type="hidden" name="vehicle_opt" value="freight" hidden>
                            <div class="input-form">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="" disabled selected>Select</option>
                                    <option value="LTL USED COMMERCIAL GOODS">LTL USED COMMERCIAL GOODS</option>
                                    <option value="LTL NEW COMMERCIAL GOODS">LTL NEW COMMERCIAL GOODS</option>
                                    <option value="LTL USED GOODS">LTL USED GOODS</option>
                                    <option value="LTL NEW GOODS">LTL NEW GOODS</option>
                                    <option value="FTL FULL TRUCK LOAD">FTL FULL TRUCK LOAD</option>
                                </select>
                            </div>
                            <br>
                            <br>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="available_at_auction"
                                    name="available_at_auction" value="1" />
                                <label class="form-check-label text-white" for="available_at_auction"> Available at
                                    Auction?</label>
                            </div>

                            <div class="input-form div-link mt-3" style="display: none;">
                                <label class="d-block"> Enter Link:</label>
                                <input class="form-control" type="url" id="link" name="link"
                                    placeholder="Enter Link" />
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" checked type="checkbox" id="boat_on_trailer"
                                    name="boat_on_trailer" value="1" />
                                <label class="form-check-label text-white" for="boat_on_trailer"> Is your freight already on
                                    a
                                    trailer?</label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block"> Your Name:</label>
                                        <input type="text" id="name" name="name" placeholder="Full Name"
                                            required="" />
                                        <small id="errName" class="err-style"></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block">Phone:</label>
                                        <input type="tel" id="phone" name="phone" class="ophone" placeholder="Phone Number" required="" />
                                        <small id="errPhone" class="err-style"></small>
                                        <input type="hidden" name="country_code" id="country_code" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block"> Email Address:</label>
                                        <input type="email" id="email" name="email" placeholder="Your Email Address"
                                            required="" />
                                        <small id="errEmail" class="err-style"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block"> Pickup Location:</label>
                                        <input type="text" id="pickup-location" name="origin"
                                            placeholder="Ex: 90005 Or Los Angeles" required="" />
                                        <small id="errOLoc" class="err-loc"></small>
                                        <ul class="suggestions suggestionsTwo"></ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block"> Delivery Location:</label>
                                        <input type="text" id="delivery-location" name="destination"
                                            placeholder="Ex: 90005 Or Los Angeles" required="" />
                                        <small id="errDLoc" class="err-loc"></small>
                                        <ul class="suggestions suggestionsTwo"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label for="trailer_type" class="text-white">Select Trailer Type</label>
                                <select class="form-control" id="trailer_type" name="trailer_type">
                                    <option value="RGN" selected>RGN</option>
                                    <option value="Stepdeck">Stepdeck</option>
                                    <option value="Flatbed">Flatbed</option>
                                    <option value="Hotshot">Hotshot</option>
                                    <option value="Landoll">Landoll</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block"> Commodity Detail:</label>
                                        <input type="text" id="commodity_detail" name="commodity_detail"
                                            placeholder="Commodity Detail" required="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block"> Select Handling Unit:</label>
                                        <select class="form-control" id="handling_unit" name="handling_unit">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Pallet">Pallet</option>
                                            <option value="Crate">Crate</option>
                                            <option value="Box">Box</option>
                                            <option value="Bag">Bag</option>
                                            <option value="Bale">Bale</option>
                                            <option value="Bundle">Bundle</option>
                                            <option value="Can">Can</option>
                                            <option value="Carton">Carton</option>
                                            <option value="Case">Case</option>
                                            <option value="Coil">Coil</option>
                                            <option value="Cylinder">Cylinder</option>
                                            <option value="Drum">Drum</option>
                                            <option value="Loose">Loose</option>
                                            <option value="Pail">Pail</option>
                                            <option value="Reel">Reel</option>
                                            <option value="Roll">Roll</option>
                                            <option value="Pipe">Pipe</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block"> Commodity Unit:</label>
                                        <input type="number" id="commodity_unit" name="commodity_unit"
                                            placeholder="Commodity Unit" required="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block">Trailer Specification</label>
                                        <select id="example-multiple" class="js-example-basic-multiple sel-mul"
                                            name="trailer_specification[]" multiple="multiple" style="width: 100%">
                                            <option value="Air Ride(A)">Air Ride(A)</option>
                                            <option value="Blanket Wrap (B)">Blanket Wrap (B)</option>
                                            <option value="B-Train (BT)">B-Train (BT)</option>
                                            <option value="Chain(CH)">Chain(CH)</option>
                                            <option value="Chassis (CS)">Chassis (CS)</option>
                                            <option value="Conestoga(CO)">Conestoga(CO)</option>
                                            <option value="Curtain(C)">Curtain(C)</option>
                                            <option value="Double(2)">Double(2)</option>
                                            <option value="Extendable (E)">Extendable (E)</option>
                                            <option value="E-Track (ET)">E-Track (ET)</option>
                                            <option value="Hazmat (Z)">Hazmat (Z)</option>
                                            <option value="Hot Shot (HS)">Hot Shot (HS)</option>
                                            <option value="Insulated (N)">Insulated (N)</option>
                                            <option value="Lift Gate (LG)">Lift Gate (LG)</option>
                                            <option value="Load Out (LO)">Load Out (LO)</option>
                                            <option value="Load Ramp (LR)">Load Ramp (LR)</option>
                                            <option value="Moving (MV)">Moving (MV)</option>
                                            <option value="Open Top (OT)">Open Top (OT)</option>
                                            <option value="Oversized (O)">Oversized (O)</option>
                                            <option value="Pallet Exchange (X)">Pallet Exchange (X)</option>
                                            <option value="Side Kit (S)">Side Kit (S)</option>
                                            <option value="Tarp(T)">Tarp(T)</option>
                                            <option value="Team Driver(M)">Team Driver(M)</option>
                                            <option value="Temp Control (TC)">Temp Control (TC)</option>
                                            <option value="Triple (3)">Triple (3)</option>
                                            <option value="Vented (V)">Vented (V)</option>
                                            <option value="Walking Floor (WF)">Walking Floor (WF)</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block">Equipment Type</label>
                                        <select id="example-multiple-2" class="js-example-basic-multiple sel-mul"
                                            name="equipment_type[]" multiple="multiple" style="width: 100%">
                                            <option value="VAN (V)">VAN (V)</option>
                                            <option value="REEFER (RE)">REEFER (RE)</option>
                                            <option value="FLATBED (F)">FLATBED (F)</option>
                                            <option value="STEP DECK (SD)">STEP DECK (SD)</option>
                                            <option value="REMOVABLE GOOSENECK (RGN)">REMOVABLE GOOSENECK (RGN)</option>
                                            <option value="CONESTOGA (CS)">CONESTOGA (CS)</option>
                                            <option value="CONTAINER / DRAYAGE (C)">CONTAINER / DRAYAGE (C)</option>
                                            <option value="TRUCK (T)">TRUCK (T)</option>
                                            <option value="HAZMAT (hazardous materials)">HAZMAT (hazardous materials)
                                            </option>
                                            <option value="POWER ONLY (PO)">POWER ONLY (PO)</option>
                                            <option value="HOT SHOT (HS)">HOT SHOT (HS)</option>
                                            <option value="LOWBOY (LB)">LOWBOY (LB)</option>
                                            <option value="ENDUMP (ED)">ENDUMP (ED)</option>
                                            <option value="LANDOLL (LD)">LANDOLL (LD)</option>
                                            <option value="PARTIAL (PT)">PARTIAL (PT)</option>
                                            <option value="20ft container">20ft container</option>
                                            <option value="40ft container">40ft container</option>
                                            <option value="48ft container">48ft container</option>
                                            <option value="53ft container">53ft container</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="hazardous" name="hazardous"
                                    value="1" />
                                <label class="form-check-label text-white" for="hazardous"> Hazardous</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="stackable" name="stackable"
                                    value="1" />
                                <label class="form-check-label text-white" for="stackable"> Stackable</label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pick_up_services" class="text-white">Pickup Services</label>
                                        <select class="form-control" id="pick_up_services" name="pick_up_services">
                                            <option value="" disabled selected>Select</option>
                                            <option value="Construction_Utility">Construction / Utility</option>
                                            <option value="Container_Station">Container Station</option>
                                            <option value="Exhibition">Exhibition</option>
                                            <option value="Inside_Pickup">Inside Pickup</option>
                                            <option value="Lift_Gate_Service">Lift Gate Service</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Single_Shipment">Single Shipment</option>
                                            <option value="Sorting_Segregation">Sorting / Segregation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deliver_services" class="text-white">Deliver Services</label>
                                        <select class="form-control" id="deliver_services" name="deliver_services">
                                            <option value="" disabled selected>Select</option>
                                            <option value="After_Business_Hours_Delivery">After Business Hours Delivery
                                            </option>
                                            <option value="Construction_Utility">Construction / Utility</option>
                                            <option value="Appointment">Appointment</option>
                                            <option value="Container_Station">Container Station</option>
                                            <option value="Exhibition">Exhibition</option>
                                            <option value="In_Bond_Freight">In Bond Freight</option>
                                            <option value="In_Bond_TIR_Caret">In Bond TIR Caret</option>
                                            <option value="Inside_Same_Level_as_Delivery_Vehicle">Inside - Same Level as
                                                Delivery Vehicle</option>
                                            <option value="Lift_Gate_Service">Lift Gate Service</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Mine_Govt_Airport">Mine / Govt / Airport</option>
                                            <option value="Notification_Prior_Delivery">Notification Prior Delivery
                                            </option>
                                            <option value="Delivery_Appointment_Required">Delivery appointment required
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block"> Pickup Date:</label>
                                        <input type="date" id="ex_pickup_date" name="ex_pickup_date"
                                            required="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block"> Pickup Time:</label>
                                        <input type="time" id="ex_pickup_time" name="ex_pickup_time"
                                            required="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block"> Delivery Date:</label>
                                        <input type="date" id="ex_delivery_date" name="ex_delivery_date"
                                            required="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block"> Delivery Time:</label>
                                        <input type="time" id="ex_delivery_time" name="ex_delivery_time"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="input-form mt-3">
                                <label class="d-block" class="text-white"> Image:</label>
                                <!-- <input class="form-control image_input" type="file" id="image" name="image[]"
                                                placeholder="Upload File" /> -->
                                <input class="form-control image_input" name="image[]" type="file" accept="image/*"
                                    multiple onchange="previewImages(event)">
                                <div class="image-preview-container" id="imagePreviewContainer"></div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group">
                                    <label for="condition" class="text-white">Condition</label>
                                    <select class="form-control" id="condition" name="condition[]">
                                        <option value="1" selected>Running</option>
                                        <option value="2">Non Running</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">

                                    <label class="lab-cos">Length</label>
                                    <div class="input-container">
                                        <input type="number" id="feet-input" name="length_ft[]" class="input-field" placeholder=""
                                            min="0" maxlength="3" oninput="limitDigits(this, 3)">
                                        <span class="separator">(Ft.)</span>
                                        <input type="number" id="inches-input" class="input-field" name="length_in[]" placeholder=""
                                            min="0" max="11" maxlength="2" oninput="limitDigits(this, 2)">
                                        <span class="separators">(In.)</span>
                                    </div>
                                </div>

                                <div class="col-md-3">

                                    <label class="lab-cos">Width</label>
                                    <div class="input-container">
                                        <input type="number" id="feet-input1" name="width_ft[]" class="input-field" placeholder=""
                                            min="0" maxlength="3" oninput="limitDigits(this, 3)">
                                        <span class="separator">(Ft.)</span>
                                        <input type="number" id="inches-input1" name="width_in[]" class="input-field" placeholder=""
                                            min="0" max="11" maxlength="2" oninput="limitDigits(this, 2)">
                                        <span class="separators">(In.)</span>
                                    </div>
                                </div>

                                <div class="col-md-3">

                                    <label class="lab-cos">Height</label>
                                    <div class="input-container">
                                        <input type="number" id="feet-input2" name="height_ft[]" class="input-field" placeholder=""
                                            min="0" maxlength="3" oninput="limitDigits(this, 3)">
                                        <span class="separator">(Ft.)</span>
                                        <input type="number" id="inches-input2" name="height_in[]" class="input-field" placeholder=""
                                            min="0" max="11" maxlength="2" oninput="limitDigits(this, 2)">
                                        <span class="separators">(In.)</span>
                                    </div>
                                </div>

                                <div class="col-md-3">

                                    <label class="lab-cos">Weight</label>
                                    <div class="input-container1">
                                        <input type="" id="feet-input" class="input-field-1" name="weight[]" placeholder=""
                                            min="0" maxlength="6" oninput="limitDigits(this, 6)">
                                        <span class="separators-w">(Lbs.)</span>

                                    </div>
                                </div>







                            </div>


                            <div class="row">
                                <h4 class="text-white">Additional Services</h4>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="protect_from_freezing"
                                            name="protect_from_freezing" value="1" />
                                        <label class="form-check-label text-white" for="protect_from_freezing"
                                            style="font-size: 14px;"> Protect from freezing</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sort_segregate"
                                            name="sort_segregate" value="1" />
                                        <label class="form-check-label text-white" for="sort_segregate"
                                            style="font-size: 14px;"> Sort & Segregate</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="blind_shipment"
                                            name="blind_shipment" value="1" />
                                        <label class="form-check-label text-white" for="blind_shipment"
                                            style="font-size: 14px;"> Blind Shipment</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="2010" name="year[]">
                            <input type="hidden" value="freight" name="model[]">
                            <input type="hidden" value="freight" name="make[]">
                            <div class="tj-theme-button mt-3">
                                <button class="tj-submit-btn" type="submit" value="submit">
                                    Calculate Price <i class="fa-light fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extraScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example-multiple').select2();
    });
    $(document).ready(function() {
        $('#example-multiple-2').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('#available_at_auction').change(function() {
            if ($(this).is(':checked')) {
                $('.div-link').show();
            } else {
                $('.div-link').hide();
            }
        });
        function addNewVehicle() {
            var newVehicleHtml =
                `
                <div class="vehicle-info">
                    <div class="row select-bm">
                        <div class="col-md-4">
                            <div class="input-form tj-select">
                                <label> Year</label>
                                <select class="nice-select year" name="year[]" id="year"> <option value="" disabled selected>Select Year</option>`;
            var currentYear = {{ date('Y') }};
            for (var year = currentYear; year >= 1936; year--) {
                newVehicleHtml += `<option value="${year}">${year}</option>`;
            }
            newVehicleHtml +=
                `</select>
                            </div>
                        </div>
                        <div class="col-md-4">
            <div class="input-form tj-select">
                <label>Make</label>
                <input type="text" id="make" name="make[]"
                                        placeholder="Enter Make" required="" />
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="input-form tj-select model-div">
                                <label>Model</label>
                                <input type="text" id="model" name="model[]" placeholder="Enter Model"
                                    required="" />
                                <!-- Bin icon for deleting vehicle -->
                                <span class="delete-vehicle"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#vehicles-container').append(newVehicleHtml);
        }
        $('#addVehicleBtn').click(function() {
            addNewVehicle();
        });
        $(document).on('click', '.delete-vehicle', function() {
            $(this).closest('.vehicle-info').remove();
        });
    });
</script>
<script>
    var validPickupSuggestions = [];
    var validDeliverySuggestions = [];

    function updateSuggestions(inputField, suggestionsList, validSuggestions) {
        var inputValue = inputField.val();

        $.ajax({
            url: "{{ route('get.zipcodes') }}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "input": inputValue
            },
            success: function(response) {
                suggestionsList.empty();
                validSuggestions.length = 0;  // Clear previous suggestions

                $.each(response, function(index, suggestion) {
                    var listItem = $("<li>").text(suggestion).click(function() {
                        inputField.val(suggestion);
                        suggestionsList.css("display", "none");
                    });
                    validSuggestions.push(suggestion);  // Add to valid suggestions
                    suggestionsList.append(listItem);
                });
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }

    $("#pickup-location").keyup(function() {
        var inputField = $(this);
        var suggestionsList = inputField.siblings(".suggestionsTwo");
        suggestionsList.css("display", "block");
        if (inputField.val() === "") {
            suggestionsList.css("display", "none");
        }
        updateSuggestions(inputField, suggestionsList, validPickupSuggestions);
    });

    $("#delivery-location").keyup(function() {
        var inputField = $(this);
        var suggestionsList = inputField.siblings(".suggestionsTwo");
        suggestionsList.css("display", "block");
        if (inputField.val() === "") {
            suggestionsList.css("display", "none");
        }
        updateSuggestions(inputField, suggestionsList, validDeliverySuggestions);
    });

    function validateLocationInput(inputField, validSuggestions, errorField) {
        var inputValue = inputField.val();
        if (!validSuggestions.includes(inputValue)) {
            errorField.text("Please select a valid location.");
            return false;
        } else {
            errorField.text("");
            return true;
        }
    }

    $("form").submit(function(event) {
        var isPickupValid = validateLocationInput($("#pickup-location"), validPickupSuggestions, $("#errOLoc"));
        var isDeliveryValid = validateLocationInput($("#delivery-location"), validDeliverySuggestions, $("#errDLoc"));

        if (!isPickupValid || !isDeliveryValid) {
            event.preventDefault();  // Prevent form submission if validation fails
        }
    });
</script>
<script>
    $(document).ready(function() {
        function checkSpecificFieldsFilled() {
            var allFilled = true;
            $('.calculate_freight').each(function() {
                if ($(this).val() === '' || $(this).val() === '0') {
                    allFilled = false;
                    return false;
                }
            });
            return allFilled;
        }

        function allSpecificFieldsFilledFunction() {
            console.log("All specific fields are filled up!");
            freight_calc();
        }

        function freight_calc() {
            // var length_ft = $('#length_ft').val();
            // var length_in = $('#length_in').val();
            // var width_ft = $('#width_ft').val();
            // var width_in = $('#width_in').val();
            // var height_ft = $('#height_ft').val();
            // var height_in = $('#height_in').val();
            // var weight = $('#weight').val();

            // var length = length_ft * 12 + parseFloat(length_in);
            // var width = width_ft * 12 + parseFloat(width_in);
            // var height = height_ft * 12 + parseFloat(height_in);
            var length_ft = parseFloat($('#length_ft').val());
            var length_in = parseFloat($('#length_in').val());
            var width_ft = parseFloat($('#width_ft').val());
            var width_in = parseFloat($('#width_in').val());
            var height_ft = parseFloat($('#height_ft').val());
            var height_in = parseFloat($('#height_in').val());
            var weight = parseFloat($('#weight').val());

            console.log(
                length_ft,
                length_in,
                width_ft,
                width_in,
                height_ft,
                height_in,
                weight,
            );

            var length = length_ft * 12;
            length = length + length_in;

            var width = width_ft * 12;
            width = width + width_in;

            var height = height_ft * 12;
            height = height + height_in;

            console.log(length, width, height, weight);

            length = parseFloat(length);
            width = parseFloat(width);
            height = parseFloat(height);
            weight = parseFloat(weight);


            var unit = 'inch';
            var answer_1 = (length * height * width).toFixed(4);
            if (unit == 'inch') {
                answer_1 = (answer_1 / 1728).toFixed(4);
            }
            var fright_class = 0;
            var answer_1 = (length * height * width).toFixed(4);
            if (unit == 'inch') {
                answer_1 = (answer_1 / 1728).toFixed(4);
            }
            var fright_class = 0;
            answer_1 = (weight / answer_1).toFixed(4);
            if (answer_1 < 1) {
                fright_class = 500;
            } else if (answer_1 >= 1 && answer_1 < 2) {
                fright_class = 400;
            } else if (answer_1 >= 2 && answer_1 < 3) {
                fright_class = 300;
            } else if (answer_1 >= 3 && answer_1 < 4) {
                fright_class = 250;
            } else if (answer_1 >= 4 && answer_1 < 5) {
                fright_class = 200;
            } else if (answer_1 >= 5 && answer_1 < 6) {
                fright_class = 175;
            } else if (answer_1 >= 6 && answer_1 < 7) {
                fright_class = 150;
            } else if (answer_1 >= 7 && answer_1 < 8) {
                fright_class = 125;
            } else if (answer_1 >= 8 && answer_1 < 9) {
                fright_class = 110;
            } else if (answer_1 >= 9 && answer_1 < 10.5) {
                fright_class = 100;
            } else if (answer_1 >= 10.5 && answer_1 < 12) {
                fright_class = 92.5;
            } else if (answer_1 >= 12 && answer_1 < 13.5) {
                fright_class = 85;
            } else if (answer_1 >= 13.5 && answer_1 < 15) {
                fright_class = 77.5;
            } else if (answer_1 >= 15 && answer_1 < 22.5) {
                fright_class = 70;
            } else if (answer_1 >= 22.5 && answer_1 < 30) {
                fright_class = 65;
            } else if (answer_1 >= 30 && answer_1 < 35) {
                fright_class = 60;
            } else if (answer_1 >= 35 && answer_1 < 50) {
                fright_class = 55;
            } else if (answer_1 >= 50) {
                fright_class = 50;
            }
            console.log('fright_class', fright_class);
            $('#frieght_class').val(fright_class).trigger('change');
        }

        $('.calculate_freight').on('keyup', function() {
            if (checkSpecificFieldsFilled()) {
                allSpecificFieldsFilledFunction();
            }
        });
    });
</script>
<script>
    function limitDigits(element, maxDigits) {
        if (element.value.length > maxDigits) {
            element.value = element.value.slice(0, maxDigits);
        }
    }

    $(document).ready(function() {
        $('#inches-input').on('input', function() {
            if (this.value > 11) {
                this.value = 11;
            } else if (this.value < 0) {
                this.value = 0;
            }
        });

        $('#feet-input, #inches-input').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });

    $(document).ready(function() {
        $('#inches-input1').on('input', function() {
            if (this.value > 11) {
                this.value = 11;
            } else if (this.value < 0) {
                this.value = 0;
            }
        });

        $('#feet-input1, #inches-input1').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });

    $(document).ready(function() {
        $('#inches-input2').on('input', function() {
            if (this.value > 11) {
                this.value = 11;
            } else if (this.value < 0) {
                this.value = 0;
            }
        });

        // Optionally, you can also prevent the user from typing non-numeric characters.
        $('#feet-input, #inches-input2').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });
</script>
@endsection
