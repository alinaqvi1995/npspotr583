@extends('layouts.guest')
@section('title', 'Get Quote on RORO | ShipA1')
@section('meta_description',
    'Get an instant RORO shipping quote with ease! Trust our reliable service for nationwide
    coverage, transparent pricing, and secure transportation. Plan your shipment quickly and efficiently.')
@section('content')
    <style>
        .tj-testimonial-section {
            padding: 50px 0;
            background: #f9f9f9;
        }

        .tj-testimonial2-section {
            padding: 50px 0;
        }

        .carousel-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card .row {
            display: flex;
            flex-wrap: wrap;
        }

        .card .col-6 {
            width: 50%;
        }

        .star {
            margin-top: 10px;
        }

        .fa-star {
            color: #f39c12;
        }

        .owl-nav button {
            background: none;
            border: none;
            font-size: 2rem;
            color: #333;
        }

        .owl-nav button {
            display: none;
            background: none;
            border: none;
            font-size: 2rem;
            color: #333;
        }

        .owl-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            background: #ddd;
            border-radius: 50%;
            margin: 0 5px;
        }

        .owl-dot.active {
            background: #333;
        }


        @keyframes custom-slides {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-80%);
            }
        }

        .custom-logos {
            overflow: hidden;
            padding: 30px 0px;
            white-space: nowrap;
            position: relative;
        }

        .custom-logos:before,
        .custom-logos:after {
            position: absolute;
            top: 0;
            content: '';
            width: 250px;
            height: 100%;
            z-index: 2;
        }

        .custom-logos:before {
            left: 0;
            background: linear-gradient(to left, rgba(255, 255, 255, 0), rgb(255, 255, 255));
        }

        .custom-logos:after {
            right: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), rgb(255, 255, 255));
        }

        .custom-logo-items {
            display: inline-block;
            animation: 35s custom-slides infinite linear;
        }

        .custom-logos:hover .custom-logo-items {
            animation-play-state: paused;
        }

        .custom-logo-items img {
            height: 100px;
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
            padding: 5px 0px 5px 0px;
            font-size: 14px;
            width: 38px;
            text-align: center;
        }

        .input-container .placeholders {
            position: relative;
            right: 72px;
            color: black;
            display: inline-block;
            width: auto;

            padding: 0px 8px;
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

        .suggestionsCountry {
            background: #fff;
            font-size: 14px;
            margin-top: -2px;
            padding-bottom: 20px;
            list-style: none;
            line-height: 28px;
            padding-left: 14px;
            display: none;
        }

        .suggestionsCountry li {
            cursor: pointer;
        }

        .suggestionsCountry li:hover {
            color: #8fc445;
        }

        .image_input {
            padding: 0px !important;
            padding-left: 10px !important;
        }

        /* .error-message {
            display: none;
            color: red;
        }

        .error-field {
            border: 2px solid red;
        } */
    </style>
    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('frontend/images/banner/all-cover-banner.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">RORO</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="{{ route('welcome') }}">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> RORO</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tj-choose-us-section-roro">
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
                        <form action="{{ route('submit.quote') }}" novalidate method="post"
                            class="rd-mailform validate-form" id="calculatePriceFromRoro" data-parsley-validate
                            data-parsley-errors-messages-disabled enctype="multipart/form-data">
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
                            <div class="container mt-2">
                                <input type="hidden" name="roro" value="RORO SHIPMENT">
                                <div class="route_quote_info" id="step1">
                                    <div class="row">
                                        <h4 class="title text-center">Quote Request!</h4>
                                        <div class="col-xl-12 col-lg-12 mb-4">
                                            <h6 class="text-white">Moving From</h6>
                                            <label class="text-white mb-2">Where Are You Moving From?</label>
                                            <div class="single-input-field">
                                                <input class="form-control" type="text" id="pickup-location"
                                                    placeholder="Enter City or ZipCode" name="From_ZipCode" required>
                                                <ul class="suggestions suggestionsTwo"></ul>
                                                {{-- <label class="error-message" id="pickup-location-error">This field is required.</label> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6 class="text-white">Deliver To</h6>
                                        <div class="col-xl-4 col-lg-4 mb-4">
                                            <label class="text-white mb-2">Country:</label>
                                            <div class="single-input-field">
                                                <input class="form-control" type="text" id="delivery-country"
                                                    placeholder="Enter Country" name="To_Country" required>
                                                <ul class="suggestions suggestionsCountry"></ul>
                                                {{-- <input type="text" id="delivery-location" name="destination"
                                                    placeholder="Ex: 90005 Or Los Angeles" required="" /> --}}
                                                <small id="errDLoc" class="err-loc"></small>
                                                {{-- <ul class="suggestions suggestionsTwo"></ul> --}}
                                                {{-- <label class="error-message" id="delivery-location-error">This field is required.</label> --}}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 mb-4">
                                            <label class="text-white mb-2">City:</label>
                                            <div class="single-input-field">
                                                <input class="form-control" type="text" id="delivery-city"
                                                    placeholder="Enter City" name="To_City" required>
                                                {{-- <ul class="suggestions suggestionsTwo"></ul> --}}
                                                {{-- <label class="error-message" id="delivery-location-1-error">This field is required.</label> --}}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 mb-4">
                                            <label class="text-white mb-2">Zip Code:<small>(Optional)</small></label>
                                            <div class="single-input-field">
                                                <input class="form-control" type="text" id="delivery-zipcode"
                                                    placeholder="Enter ZipCode" name="To_ZipCode"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="price__cta-btn text-center">
                                                <button class="tj-submit-btn" type="button" id="step1_next">
                                                    Next <i class="fa-light fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 2: Vehicle Information -->
                                <div class="vehicle_quote_info" id="step2" style="display: none;">
                                    <div class="row">
                                        <h4 class="title text-center">VEHICLE INFORMATION</h4>
                                        <select id="tabSelector" class="" aria-label="Tab selector" required>
                                            <option value="" selected disabled>Select a Vehicle</option>
                                            <option value="Atv">Atv Utv Transport</option>
                                            <option value="Boat-Transport">Boat Transport</option>
                                            <option value="Car">Car Transport</option>
                                            <option value="Golf-Cart">Golf Cart Transport</option>
                                            <option value="Heavy-Equipment">Heavy Equipment Transport</option>
                                            <option value="Motorcycle">Motorcycle Transport</option>
                                            <option value="RV-Transport">RV Transport</option>
                                        </select>
                                        {{-- <label class="error-message" id="tabSelector-error">This field is
                                            required.</label> --}}

                                        <div class="tab-content" id="additionalContent"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="price__cta-btn">
                                                <button class="tj-submit-btn previous" id="step2_previous">
                                                    Previous <i class="fa-light fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="price__cta-btn float-end">
                                                <button class="tj-submit-btn" type="button" id="step2_next">
                                                    Next <i class="fa-light fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3: Customer Information -->
                                <div class="basic_quote_info" id="step3" style="display: none;">
                                    <div class="row mb-3">
                                        <h4 class="text-center text-white target-top">Customer Information</h4>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="single-input-field">
                                                <label class="d-block text-white"> Your Name:</label>
                                                <input class="form-control" id="name" name="name" type="text"
                                                    placeholder="Customer Name" required>
                                                <!-- <input class="form-control" required name="Custo_Name" type="text" placeholder="Customer Name"> -->

                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="single-input-field">
                                                <label class="d-block text-white">Phone:</label>
                                                <input id="phone" class="form-control ophone" name="phone"
                                                    type="tel" placeholder="Customer Phone" required>
                                                <small id="errPhone" class="err-style"></small>
                                                <input type="hidden" name="country_code" id="country_code" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="single-input-field">
                                                <label class="d-block text-white"> Email Address:</label>
                                                <input class="form-control" id="email" name="email" type="email"
                                                    placeholder="Email address" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="price__cta-btn">
                                                <button class="tj-submit-btn previous scroll-up-btn" id="step3_previous">
                                                    Previous <i class="fa-light fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="price__cta-btn float-end">
                                                <button class=" tj-submit-btn " href="" type="submit"
                                                    id="submit_instant_code" value="Submit Form">
                                                    Calculate Price <i class="fa-light fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extraScript')
    {{-- <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS8r7ZgkAHXuIJKgaYhhF4WccgswI-1F8&amp;v=3.exp&amp;libraries=places">
    </script> --}}
    {{-- <script>
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
    </script> --}}
    {{-- <script>
        function updateSuggestions(inputField, suggestionsList) {
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

                    $.each(response, function(index, suggestion) {
                        var listItem = $("<li>").text(suggestion).click(function() {
                            inputField.val(suggestion);
                            suggestionsList.css("display", "none");
                        });
                        suggestionsList.append(listItem);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        $("#pickup-location, #delivery-location").keyup(function() {
            var inputField = $(this);
            var suggestionsList = inputField.siblings(".suggestionsTwo");
            suggestionsList.css("display", "block");
            if (inputField.val() === "") {
                suggestionsList.css("display", "none");
            }
            updateSuggestions(inputField, suggestionsList);
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            var selectedTab = '';
            $('#tabSelector').change(function() {
                $('.vehicles-container').html('');
                selectedTab = $(this).val();
                var vehicleType = $(this).val();
                $('.tab-pane').removeClass('show active');
                $('#' + selectedTab).addClass('show active');

                $.ajax({
                    url: "{{ route('get.partial.form') }}",
                    method: 'GET',
                    data: {
                        vehicleType: vehicleType,
                    },
                    success: function(response) {
                        $('#additionalContent').html('');
                        $('#additionalContent').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            function addNewVehicle() {
                var newVehicleHtml =
                    `
                        <div class="vehicle-info">
                        <div class="row select-bm">
                        <div class="col-md-4">
                        <div class="input-form tj-select">
                        <label> Year</label>
                        <select class="nice-select year" name="year[]" required id="year"> <option value="" disabled selected>Select Year</option>`;
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
                        <select class="nice-select make" name="make[]" required id="make"> <option value="" disabled selected>Select Make</option>`;

                @foreach ($makes as $make)
                    newVehicleHtml +=
                        `<option value="{{ $make->make }}">{{ $make->make }}</option>`;
                @endforeach

                newVehicleHtml += `
                        </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="input-form tj-select model-div">
                        <label>Model</label>
                        <select class="nice-select model" name="model[]" id="model" required></select>`;

                newVehicleHtml +=
                    `<span class="delete-vehicle"><i class="fa fa-trash" style="float: right; margin-top: 10px; color: red; cursor: pointer;"></i></span>`;

                newVehicleHtml += `
                            </div>
                            </div>
                            </div>
                            </div>
                            `;

                $('.vehicles-container').append(newVehicleHtml);
            }

            function addOtherVehicle() {
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
                                required="" />`
                newVehicleHtml +=
                    `<span class="delete-vehicle"><i class="fa fa-trash" style="float: right; margin-top: 10px; color: red; cursor: pointer;"></i></span>`;

                newVehicleHtml += `</div>
                                </div>
                                </div>
                                </div>
                                `;

                $('.vehicles-container').append(newVehicleHtml);
            }

            $(document).on('click', '.addVehicleBtn', function() {
                if ($('#tabSelector').val() == 'Car') {
                    // console.log('yesss');
                    addNewVehicle();
                } else {
                    // console.log('nooo');
                    addOtherVehicle();
                }
            });

            $(document).on('click', '.delete-vehicle', function() {
                $(this).closest('.vehicle-info').remove();
            });

            $(document).on('change', '.year, .make', function() {
                var year = $(this).closest('.vehicle-info').find('.year').val();
                var makeId = $(this).closest('.vehicle-info').find('.make').val();
                var vehicleInfo = $(this).closest('.vehicle-info');
                if (year && makeId) {
                    getModel(year, makeId, vehicleInfo);
                }
            });

            function getModel(year, makeId, vehicleInfo) {
                // console.log('yes inn');
                $.ajax({
                    url: "{{ route('get.models') }}",
                    method: 'GET',
                    data: {
                        year: year,
                        make: makeId
                    },
                    success: function(response) {
                        var modelsDropdown = vehicleInfo.find('.model');
                        modelsDropdown.empty();
                        var selectOptions = '<option value="">Select Model</option>';
                        $.each(response, function(index, model) {
                            selectOptions += '<option value="' + model + '">' +
                                model +
                                '</option>';
                        });
                        modelsDropdown.html(selectOptions);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            $(document).on('change', '.category', function() {
                var selectedCategory = $(this).val();

                $.ajax({
                    url: "{{ route('get.subcategories') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "category": selectedCategory
                    },
                    success: function(response) {
                        console.log(response);
                        console.log(response.length);

                        var html = '';
                        $('#subcategory-box').html('');

                        html += "<label for='subcategory'>Subcategory</label>";
                        html +=
                            "<select class='nice-select form-control' id='subcategory' name='subcategory'>";
                        html += "<option value='' disabled selected>Select</option>";
                        $.each(response, function(index, val) {
                            html +=
                                `<option value='${val.id}' style='white-space: nowrap;'>${val.name}</option>`;
                        });
                        html += "</select>";
                        console.log('html', html);

                        $('#subcategory-box').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script> --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                initialCountry: "auto",
                geoIpLookup: function(callback) {
                    fetch('https://ipinfo.io/json')
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(ipinfo) {
                            var countryCode = "us";
                            callback(countryCode);
                        });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // for formatting/validation etc.
            });
        });
    </script> --}}
    {{-- <script>
        function playVideo() {
            document.querySelector('.video-thumbnail').style.display = 'none';
            document.querySelector('.video-iframe').style.display = 'block';
            var iframe = document.getElementById('videoFrame');
            var videoSrc = iframe.src;
            iframe.src = videoSrc + "&autoplay=1"; // Autoplay the video
        }
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

            // Optionally, you can also prevent the user from typing non-numeric characters.
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

            // Optionally, you can also prevent the user from typing non-numeric characters.
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
    <script>
        $(document).ready(function() {
            function showError(field, message) {
                $('#' + field).addClass('error-field');
                $('#' + field + '-error').text(message).show();
            }

            function hideError(field) {
                $('#' + field).removeClass('error-field');
                $('#' + field + '-error').hide();
            }

            // Move to Step 2
            $('#step1_next').click(function() {
                var isValid = true;

                if (!$('#pickup-location').val()) {
                    showError('pickup-location', 'This field is required.');
                    isValid = false;
                } else {
                    hideError('pickup-location');
                }

                // if (!$('#delivery-location').val()) {
                //     showError('delivery-location', 'This field is required.');
                //     isValid = false;
                // } else {
                //     hideError('delivery-location');
                // }

                if (isValid) {
                    $('#step1').hide();
                    $('#step2').show();
                }
            });

            // Return to Step 1
            $('#step2_previous').click(function() {
                $('#step2').hide();
                $('#step1').show();
            });

            // Move to Step 3
            $('#step2_next').click(function() {
                var isValid = true;

                if (!$('#tabSelector').val()) {
                    showError('tabSelector', 'This field is required.');
                    isValid = false;
                } else {
                    hideError('tabSelector');
                }

                if (isValid) {
                    $('#step2').hide();
                    $('#step3').show();
                }
            });

            // Return to Step 2
            $('#step3_previous').click(function() {
                $('#step3').hide();
                $('#step2').show();
            });
        });
    </script> --}}

    {{-- <script>
         $(document).on( function() {
            console.log('okok');
            $("#calculatePriceFrom").submit();
            });    
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            var countries = ["United States", "Canada", "Mexico", "United Kingdom", "Germany", "France", "Italy",
                "Spain", "Australia"
            ];

            $('#delivery-country').on('keyup', function() {
                var query = $(this).val().toLowerCase();
                var suggestions = '';

                if (query.length > 0) {
                    var filteredCountries = countries.filter(function(country) {
                        return country.toLowerCase().indexOf(query) !== -1;
                    });

                    filteredCountries.forEach(function(country) {
                        suggestions += '<li>' + country + '</li>';
                    });
                }

                $('.suggestionsCountry').html(suggestions).show();
            });

            $(document).on('click', '.suggestionsCountry li', function() {
                $('#delivery-country').val($(this).text());
                $('.suggestionsCountry').hide();
            });

            $('#delivery-country').on('blur', function() {
                setTimeout(function() {
                    $('.suggestionsCountry').hide();
                }, 200);
            });
        });
    </script>

    <script>
        $('#delivery-zipcode').on('keyup', function() {
            var destination = $('#delivery-city').val() + ',' + $('#delivery-country').val() + ',' + $(
                '#delivery-zipcode').val();
            $('#destination').val(destination);
        });
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var selectedCategory = $(this).find('option:selected').data('id');

                $.ajax({
                    url: "{{ route('get.subcategories') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "category": selectedCategory
                    },
                    success: function(response) {

                        var html = '';
                        $('#subcategory-box').html('');

                        html += "<label for='subcategory'>Subcategory</label>";
                        html +=
                            "<select class='nice-select form-control' id='subcategory' name='subcategory'>";
                        html += "<option value='' disabled selected>Select</option>";
                        $.each(response, function(index, val) {
                            console.log('val', val);
                            html +=
                                `<option value='${val.name}' style='white-space: nowrap;'>${val.name}</option>`;
                        });
                        html += "</select>";

                        $('#subcategory-box').html(html);

                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '#delivery-country', function() {
                var inputField = $(this);
                var suggestionsList = inputField.siblings(".suggestionsCountry");
                var query = inputField.val();

                if (query !== "") {
                    suggestionsList.css("display", "block");

                    $.ajax({
                        url: '/get-countries',
                        type: 'GET',
                        data: {
                            search: query
                        },
                        success: function(response) {

                            suggestionsList.empty();

                            if (response.length > 0) {
                                response.forEach(function(country) {
                                    suggestionsList.append(
                                        '<li class="suggestion-item-country">' +
                                        country.name + '</li>');
                                });
                            } else {
                                suggestionsList.append(
                                    '<li class="no-results">No results found</li>');
                            }
                        }
                    });
                } else {
                    suggestionsList.css("display", "none");
                }
            });

            $(document).on('click', '.suggestion-item-country', function() {
                var selectedCountry = $(this).text();
                $('#delivery-country').val(selectedCountry);
                $('.suggestionsCountry').css("display", "none");
            });

            $(document).on('click', '#submit_instant_code', function() {
                console.log('yes yes yes');
                $('#calculatePriceFromRoro').submit();
            });
        });
    </script>

@endsection
