@extends('layouts.guest')


@section('title', 'Get Quote on RV Transport | ShipA1')

@section('meta_description', 'Get an instant RV Transport quote with ease! Trust our reliable service for nationwide coverage, transparent pricing, and secure transportation. Plan your shipment quickly and efficiently.')

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
    </style>
    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('frontend/images/banner/all-cover-banner.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">RV</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="{{ route('welcome') }}">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> RV</span>
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
                    <div class="tj-input-form" data-bg-image="{{ asset('frontend/images/banner/form-shape.png') }}">
                        <h4 class="title">Instant RV Shipping Quote!</h4>
                        <form action="{{ route('submit.quote') }}" method="post" class="rd-mailform"
                            id="calculatePriceFrom" data-parsley-validate data-parsley-errors-messages-disabled
                            enctype="multipart/form-data">
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
                            <input type="hidden" name="vehicle_opt" value="heavy" hidden>
                            <input type="hidden" name="car_type" value="2" hidden>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-form">
                                        <label for="rv_type">RV Types</label>
                                        <select class="form-control" id="rv_type" name="rv_type">
                                            <option value="" disabled selected>Select</option>
                                            <option value="Class A Motorhome">Class A Motorhome</option>
                                            <option value="Class B Motorhome">Class B Motorhome</option>
                                            <option value="Class C Motorhome">Class C Motorhome</option>
                                            <option value="Travel Trailer">Travel Trailer</option>
                                            <option value="Folding Tent Trailer">Folding Tent Trailer</option>
                                            <option value="Fifth-Wheel">Fifth-Wheel</option>
                                            <option value="Truck Camper">Truck Camper</option>
                                            <option value="Others">Other</option>
                                        </select>
                                        <input type="text" class="form-control" id="otherCategoryInput" name="rv_type"
                                            disabled style="display: none;" placeholder="Specify Please">
                                    </div>
                                </div>
                            </div><br>
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
                            <div class="row">
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
                                    <div class="form-group">
                                        <label for="trailer_type" class="text-white">Select Trailer Type</label>
                                        <select class="form-control" id="trailer_type" name="trailer_type">
                                            <option value="" selected disabled>Select</option>
                                            {{-- <option value="VAN (V)">VAN (V)</option> --}}
                                            <option value="FLATBED (F)">FLATBED (F)</option>
                                            <option value="STEP DECK (SD)">STEP DECK (SD)</option>
                                            <option value="REMOVABLE GOOSENECK (RGN)">REMOVABLE GOOSENECK (RGN)</option>
                                            <option value="CONESTOGA (CS)">CONESTOGA (CS)</option>
                                            {{-- <option value="CONTAINER / DRAYAGE (C)">CONTAINER / DRAYAGE (C)</option> --}}
                                            <option value="TRUCK (T)">TRUCK (T)</option>
                                            <option value="POWER ONLY (PO)">POWER ONLY (PO)</option>
                                            <option value="HOT SHOT (HS)">HOT SHOT (HS)</option>
                                            <option value="LOWBOY (LB)">LOWBOY (LB)</option>
                                            <option value="ENDUMP (ED)">ENDUMP (ED)</option>
                                            <option value="LANDOLL (LD)">LANDOLL (LD)</option>
                                            <option value="PARTIAL (PT)">PARTIAL (PT)</option>
                                            {{-- <option value="20ft container">20ft container</option>
                                            <option value="40ft container">40ft container</option>
                                            <option value="48ft container">48ft container</option>
                                            <option value="53ft container">53ft container</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="condition" class="text-white">Condition</label>
                                        <select class="form-control" id="condition" name="condition[]">
                                            <option value="1" selected>Running</option>
                                            <option value="2">Non Running</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="load_type" class="text-white">Load Type</label>
                                        <select class="form-control" id="load_type" name="load_type[]">
                                            <option value="" disabled selected>Select</option>
                                            <option value="LTL (LESS THEN TRUCK LOAD)">LTL (LESS THEN TRUCK LOAD)</option>
                                            <option value="FTL (FULL TRUCK LOAD)">FTL (FULL TRUCK LOAD)</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="load_method" class="text-white">Load Method</label>
                                        <select class="form-control" id="load_method" name="load_method[]">
                                            <option value="" disabled selected>Select</option>
                                            <option value="LOADING DOCK">LOADING DOCK</option>
                                            <option value="CRANE">CRANE</option>
                                            <option value="FORKLIFT">FORKLIFT</option>
                                            <option value="DRIVE ROLL">DRIVE ROLL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unload_method" class="text-white">Unload Method</label>
                                        <select class="form-control" id="unload_method" name="unload_method[]">
                                            <option value="" disabled selected>Select</option>
                                            <option value="LOADING DOCK">LOADING DOCK</option>
                                            <option value="CRANE">CRANE</option>
                                            <option value="FORKLIFT">FORKLIFT</option>
                                            <option value="DRIVE ROLL">DRIVE ROLL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-form mt-3">
                                <label class="d-block" class="text-white"> Image:</label>
                                <input class="form-control image_input" type="file" name="image[]" accept="image/*" multiple onchange="previewImages(event)">
                                <div class="image-preview-container" id="imagePreviewContainer"></div>
                                <!-- <input class="form-control image_input" type="file" id="image" name="image[]"
                                    placeholder="Upload File" /> -->
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Length (Ft.)</label>
                                        <input type="number" id="" name="length_ft[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Length (In.)</label>
                                        <input type="number" id="" name="length_in[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Width (Ft.)</label>
                                        <input type="number" id="" name="width_ft[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Width (In.)</label>
                                        <input type="number" id="" name="width_in[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Height (Ft.)</label>
                                        <input type="number" id="" name="height_ft[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Height (In.)</label>
                                        <input type="number" id="" name="height_in[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Weight (Lbs.)</label>
                                        <input type="number" id="" name="weight[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                            </div>
                            <div class="row select-bm">
                                <div class="col-md-12 text-center">
                                    <h4 class="text-white">Vehicle Information</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form tj-select">
                                        <label> Year</label>
                                        <!-- <select class="nice-select vehicle-year" name="year[]" id="year">
                                            <option value="" disabled selected>Select Year</option>
                                            @php
                                                $currentYear = date('Y');
                                                for ($year = $currentYear; $year >= 1936; $year--) {
                                                    echo "<option value='$year'>$year</option>";
                                                }
                                            @endphp
                                        </select> -->
                                        <div class="dropdown">
                                            <input class="form-control dropdown-toggle year" type="text"
                                                name="year[]" id="year" placeholder="Select Year"
                                                data-bs-toggle="dropdown" aria-expanded="false" maxlength="4" required>
                                            <ul class="dropdown-menu year-dropdown" aria-labelledby="year">
                                                <li><a class="dropdown-item">Select Year</a></li>
                                                @php
                                                    $currentYear = date('Y');
                                                    for ($year = $currentYear; $year >= 1936; $year--) {
                                                        echo "<li><a class='dropdown-item' data-value='$year'>$year</a></li>";
                                                    }
                                                @endphp
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form tj-select">
                                        <label>Make</label>
                                        <input type="text" id="make" name="make[]" placeholder="Enter Make"
                                            required="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form tj-select vehicle-model-div">
                                        <label>Model</label>
                                        <input type="text" id="model" name="model[]" placeholder="Enter Model"
                                            required="" />
                                    </div>
                                </div>
                            </div>

                            <a class="text-primary" id="addVehicleBtn"
                                style="cursor: pointer; text-decoration: underline;"><i class="fa fa-plus"></i> Add
                                Vehicle</a>

                            <div id="vehicles-container">
                            </div>
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
            $(document).on('change', '.category', function() {
                var selectedCategory = $(this).val();
                if (selectedCategory === "Others") {
                    $('#otherCategoryInput').show();
                    $('#otherCategoryInput').attr('disabled', false);
                } else {
                    $('#otherCategoryInput').hide();
                    $('#otherCategoryInput').attr('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function addNewVehicle() {
                var newVehicleHtml =
                    `
                    <div class="vehicle-info">
                    <div class="row select-bm">
                        <!-- Bin icon for deleting vehicle -->
                        <span class="delete-vehicle"><i class="fa fa-trash"></i></span>
                    <div class="col-md-4">
                    <div class="input-form tj-select">
                    <label> Year</label>
                    <div class="dropdown">
                            <input class="form-control dropdown-toggle year" type="text"
                                name="year[]" id="year" placeholder="Select Year"
                                data-bs-toggle="dropdown" aria-expanded="false" maxlength="4" required>
                            <ul class="dropdown-menu year-dropdown" aria-labelledby="year">
                                <li><a class="dropdown-item">Select Year</a></li>`;
                    var currentYear = {{ date('Y') }};
                    for (var year = currentYear; year >= 1936; year--) {
                        newVehicleHtml += `<li><a class='dropdown-item' data-value='${year}'>${year}</a></li>`;
                    }

                    newVehicleHtml +=
                        `</ul>
                        </div>
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
                        
                        </div>
                        </div>
                        </div>
                        <div class="row">
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Length (Ft.)</label>
                                        <input type="number" id="" name="length_ft[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Length (In.)</label>
                                        <input type="number" id="" name="length_in[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Width (Ft.)</label>
                                        <input type="number" id="" name="width_ft[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Width (In.)</label>
                                        <input type="number" id="" name="width_in[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Height (Ft.)</label>
                                        <input type="number" id="" name="height_ft[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Height (In.)</label>
                                        <input type="number" id="" name="height_in[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-form">
                                        <label class="d-block"> Weight (Lbs.)</label>
                                        <input type="number" id="" name="weight[]" placeholder=""
                                            required="" value="0" />
                                        <small id="errOLoc" class="err-loc"></small>

                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                // Append new vehicle to vehicles container
                $('#vehicles-container').append(newVehicleHtml);
                // Initialize the searchable dropdown for new elements
                    initializeSearchableDropdown();

            }

            // Add vehicle button click event
            $('#addVehicleBtn').click(function() {
                addNewVehicle();
            });
            // Initialize the searchable dropdown for new elements
                    initializeSearchableDropdown();


            // Delete vehicle click event
            $(document).on('click', '.delete-vehicle', function() {
                $(this).closest('.vehicle-info').remove();
            });
        });
    </script>
    <script>
        // $(document).ready(function() {
        //     $('#available_at_auction').change(function() {
        //         if ($(this).is(':checked')) {
        //             // $('#link').show();
        //             $('.div-link').show();
        //         } else {
        //             // $('#link').hide();
        //             $('.div-link').hide();
        //         }
        //     });
        // });
    </script>
    <script>
        // var validPickupSuggestions = [];
        // var validDeliverySuggestions = [];

        // function updateSuggestions(inputField, suggestionsList, validSuggestions) {
        //     var inputValue = inputField.val();

        //     $.ajax({
        //         url: "{{ route('get.zipcodes') }}",
        //         method: "POST",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "input": inputValue
        //         },
        //         success: function(response) {
        //             suggestionsList.empty();
        //             validSuggestions.length = 0;  // Clear previous suggestions

        //             $.each(response, function(index, suggestion) {
        //                 var listItem = $("<li>").text(suggestion).click(function() {
        //                     inputField.val(suggestion);
        //                     suggestionsList.css("display", "none");
        //                 });
        //                 validSuggestions.push(suggestion);  // Add to valid suggestions
        //                 suggestionsList.append(listItem);
        //             });
        //         },
        //         error: function(xhr, status, error) {
        //             console.error("Error:", error);
        //         }
        //     });
        // }

        // $("#pickup-location").keyup(function() {
        //     var inputField = $(this);
        //     var suggestionsList = inputField.siblings(".suggestionsTwo");
        //     suggestionsList.css("display", "block");
        //     if (inputField.val() === "") {
        //         suggestionsList.css("display", "none");
        //     }
        //     updateSuggestions(inputField, suggestionsList, validPickupSuggestions);
        // });

        // $("#delivery-location").keyup(function() {
        //     var inputField = $(this);
        //     var suggestionsList = inputField.siblings(".suggestionsTwo");
        //     suggestionsList.css("display", "block");
        //     if (inputField.val() === "") {
        //         suggestionsList.css("display", "none");
        //     }
        //     updateSuggestions(inputField, suggestionsList, validDeliverySuggestions);
        // });

        // function validateLocationInput(inputField, validSuggestions, errorField) {
        //     var inputValue = inputField.val();
        //     if (!validSuggestions.includes(inputValue)) {
        //         errorField.text("Please select a valid location.");
        //         return false;
        //     } else {
        //         errorField.text("");
        //         return true;
        //     }
        // }

        // $("form").submit(function(event) {
        //     var isPickupValid = validateLocationInput($("#pickup-location"), validPickupSuggestions, $("#errOLoc"));
        //     var isDeliveryValid = validateLocationInput($("#delivery-location"), validDeliverySuggestions, $("#errDLoc"));

        //     if (!isPickupValid || !isDeliveryValid) {
        //         event.preventDefault();  // Prevent form submission if validation fails
        //     }
        // });
    </script>
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
                        // Append suggestion as list item with click event listener
                        var listItem = $("<li>").text(suggestion).click(function() {
                            // Autofill input field with clicked suggestion
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

        // Keyup event handler for input fields
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
@endsection
