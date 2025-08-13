@extends('layouts.guest')

@section('title', 'Home')
@section('meta_description', 'Explore our SaaS solutions tailored to your business.')
@section('meta_keywords', 'SaaS, services, business software')
@section('content')

<!--========== Slider Section Start ==============-->
    <section class="tj-slider-section-three">
        <div class="slider_shape2"><img src="web-assets/images/banner/shape-2.png" alt="Image" /></div>
        <div class="swiper thumb-slider2">
            <div class="swiper-wrapper">
                <div class="swiper-slide tj-bg-layer" data-bg-image="web-assets/images/slider/slider-1.png">
                    <div class="container container-two">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="slider-content p-z-idex">
                                    <div class="slider-client">
                                        <div class="client-wrapper">
                                            <img src="web-assets/images/team/author-2.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-3.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-4.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-5.jpg" alt="Image" />
                                        </div>
                                        <div class="client-auother">
                                            <p>Licensed & Insured by FMCSA & USDOT</p>
                                        </div>
                                    </div>
                                    <h1 class="slider-title">Reliable, Insured Vehicle Transport Across the USA</h1>
                                    <div class="tj-theme-button">
                                        <a class="tj-transparent-btn" href="contact.html">
                                            Read More <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="slider-tabs slider-tabs-two d-none d-lg-block">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link active"
                                                id="pills-home-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-home"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-home"
                                                aria-selected="true"
                                            >
                                                <i class="flaticon-shipped"></i> Car
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link"
                                                id="pills-profile-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-profile"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-profile"
                                                aria-selected="false"
                                            >
                                                <i class="flaticon-global-navigation"></i> Motorcycle
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link"
                                                id="pills-contact-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-contact"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-contact"
                                                aria-selected="false"
                                            >
                                                <i class="flaticon-cargo-ship-1"></i> Heavy
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div
                                            class="tab-pane fade show active"
                                            id="pills-home"
                                            role="tabpanel"
                                            aria-labelledby="pills-home-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <form id="calculatePriceForm">
                                                    <div class="container mt-2">

                                                        <!-- Step 1 -->
                                                        <div id="step1" class="route_quote_info">
                                                            <div class="row">
                                                                <h4 class="title text-center">Quote Request!</h4>
                                                                <div class="col-xl-12 mb-4">
                                                                    <h6>Moving From</h6>
                                                                    <label class="d-block mb-2">Where Are You Moving From?</label>
                                                                    <div class="input-form single-input-field">
                                                                        <input class="" type="text" id="pickup-location" placeholder="Enter City or ZipCode" required>
                                                                        <ul class="suggestions suggestionsPickup"></ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 mb-4">
                                                                    <h6>Moving To</h6>
                                                                    <label class="d-block mb-2">Where Are You Moving To?</label>
                                                                    <div class="input-form single-input-field">
                                                                        <input class="" type="text" id="delivery-location" placeholder="Enter City or ZipCode" required>
                                                                        <ul class="suggestions suggestionsDelivery"></ul>
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
                                                                <select id="tabSelector" required>
                                                                    <option value="" selected disabled>Select a Vehicle</option>
                                                                    <option value="Atv">Atv Utv Transport</option>
                                                                    <option value="Boat-Transport">Boat Transport</option>
                                                                    <option value="Car">Car</option>
                                                                    <option value="Golf-Cart">Golf Cart</option>
                                                                    <option value="Heavy-Equipment">Heavy Equipment Transport</option>
                                                                    <option value="Motorcycle">Motorcycle</option>
                                                                    <option value="RV-Transport">RV Transport</option>
                                                                </select>
                                                                <div class="tab-content mt-3" id="additionalContent"></div>
                                                            </div>
                                                            <div class="row mt-2 justify-content-evenly">
                                                                <button type="button" id="step2_previous" class="tj-submit-btn">Previous</button>
                                                                <button type="button" id="step2_next" class="tj-submit-btn">Next</button>
                                                            </div>
                                                        </div>

                                                        <!-- Step 3 -->
                                                        <div id="step3" class="basic_quote_info" style="display: none;">
                                                            <div class="row mb-3">
                                                                <h4 class="text-center">Customer Information</h4>
                                                                <div class="col-xl-6">
                                                                    <div class="input-form single-input-field">
                                                                        <label class="d-block">Your Name:</label>
                                                                        <input class="" id="name" type="text" placeholder="Customer Name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="single-input-field">
                                                                        <label class="d-block">Phone:</label>
                                                                        <input class="" id="phone" type="tel" placeholder="Customer Phone" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="single-input-field">
                                                                        <label class="d-block">Email Address:</label>
                                                                        <input class="" id="email" type="email" placeholder="Email address" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-evenly">
                                                                <button type="button" id="step3_previous" class="tj-submit-btn">Previous</button>
                                                                <button type="submit" class="tj-submit-btn">Calculate Price</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>

                                                <script>
                                                    const zipCodeList = [
                                                        "New York,NY,10001",
                                                        "Los Angeles,CA,90001",
                                                        "Chicago,IL,60601",
                                                        "Dallas,TX,75201",
                                                        "Houston,TX,77001",
                                                        "Miami,FL,33101",
                                                        "Phoenix,AZ,85001",
                                                        "San Francisco,CA,94101"
                                                    ];

                                                    function showStep(stepId) {
                                                        document.querySelectorAll('.route_quote_info, .vehicle_quote_info, .basic_quote_info')
                                                            .forEach(div => div.style.display = "none");
                                                        document.getElementById(stepId).style.display = "block";
                                                    }

                                                    function fetchSuggestionsStatic(inputField, suggestionsList) {
                                                        const query = inputField.value.toLowerCase();
                                                        suggestionsList.innerHTML = "";
                                                        if (query.length >= 2) {
                                                            zipCodeList
                                                                .filter(item => item.toLowerCase().includes(query))
                                                                .forEach(suggestion => {
                                                                    const li = document.createElement('li');
                                                                    li.textContent = suggestion;
                                                                    li.onclick = () => {
                                                                        inputField.value = suggestion;
                                                                        suggestionsList.innerHTML = "";
                                                                    };
                                                                    suggestionsList.appendChild(li);
                                                                });
                                                        }
                                                    }

                                                    document.getElementById('pickup-location').addEventListener('input', function() {
                                                        fetchSuggestionsStatic(this, document.querySelector('.suggestionsPickup'));
                                                    });

                                                    document.getElementById('delivery-location').addEventListener('input', function() {
                                                        fetchSuggestionsStatic(this, document.querySelector('.suggestionsDelivery'));
                                                    });

                                                    document.getElementById('step1_next').onclick = () => showStep('step2');
                                                    document.getElementById('step2_previous').onclick = () => showStep('step1');
                                                    document.getElementById('step2_next').onclick = () => showStep('step3');
                                                    document.getElementById('step3_previous').onclick = () => showStep('step2');

                                                    document.getElementById('calculatePriceForm').addEventListener('submit', e => {
                                                        e.preventDefault();
                                                        alert('Quote request submitted successfully!');
                                                    });
                                                </script>

                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="pills-profile"
                                            role="tabpanel"
                                            aria-labelledby="pills-profile-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameFive"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameSix"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameSeven"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="pills-contact"
                                            role="tabpanel"
                                            aria-labelledby="pills-contact-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameEight"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameNine"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameTen"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide tj-bg-layer" data-bg-image="web-assets/images/slider/slider-4.jpg">
                    <div class="container container-two">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="slider-content p-z-idex">
                                    <div class="slider-client">
                                        <div class="client-wrapper">
                                            <img src="web-assets/images/team/author-2.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-3.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-4.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-5.jpg" alt="Image" />
                                        </div>
                                        <div class="client-auother">
                                            <p>Trusted Nationwide Carrier</p>
                                        </div>
                                    </div>
                                    <h1 class="slider-title">Door-to-Door Transport Services—Any Vehicle</h1>
                                    <div class="tj-theme-button">
                                        <a class="tj-transparent-btn" href="#">
                                            Read More <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="slider-tabs slider-tabs-two d-none d-lg-block">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link active"
                                                id="pills-home-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-home"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-home"
                                                aria-selected="true"
                                            >
                                                <i class="flaticon-shipped"></i> Car
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link"
                                                id="pills-profile-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-profile"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-profile"
                                                aria-selected="false"
                                            >
                                                <i class="flaticon-global-navigation"></i> Motorcycle
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link"
                                                id="pills-contact-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-contact"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-contact"
                                                aria-selected="false"
                                            >
                                                <i class="flaticon-cargo-ship-1"></i> Heavy
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div
                                            class="tab-pane fade show active"
                                            id="pills-home"
                                            role="tabpanel"
                                            aria-labelledby="pills-home-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameTwo"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameThree"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Phone:</label>
                                                            <input
                                                                type="text"
                                                                id="nameFour"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="pills-profile"
                                            role="tabpanel"
                                            aria-labelledby="pills-profile-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameFive"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameSix"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameSeven"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="pills-contact"
                                            role="tabpanel"
                                            aria-labelledby="pills-contact-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameEight"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameNine"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameTen"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide tj-bg-layer" data-bg-image="web-assets/images/slider/slider-5.jpg">
                    <div class="slide-image sc-image-layer"></div>
                    <div class="container container-two">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="slider-content p-z-idex">
                                    <div class="slider-client">
                                        <div class="client-wrapper">
                                            <img src="web-assets/images/team/author-2.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-3.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-4.jpg" alt="Image" />
                                            <img src="web-assets/images/team/author-5.jpg" alt="Image" />
                                        </div>
                                        <div class="client-auother">
                                            <p>100% Driver & Vehicle Safety Standards</p>
                                        </div>
                                    </div>
                                    <h1 class="slider-title">Fast, Reliable and All-Rounder Transport Company</h1>
                                    <div class="tj-theme-button">
                                        <a class="tj-transparent-btn" href="#">
                                            Read More <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="slider-tabs slider-tabs-two d-none d-lg-block">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link active"
                                                id="pills-home-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-home"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-home"
                                                aria-selected="true"
                                            >
                                                <i class="flaticon-shipped"></i> Car
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link"
                                                id="pills-profile-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-profile"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-profile"
                                                aria-selected="false"
                                            >
                                                <i class="flaticon-global-navigation"></i> Motorcycle
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link"
                                                id="pills-contact-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-contact"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-contact"
                                                aria-selected="false"
                                            >
                                                <i class="flaticon-cargo-ship-1"></i> Heavy
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div
                                            class="tab-pane fade show active"
                                            id="pills-home"
                                            role="tabpanel"
                                            aria-labelledby="pills-home-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameTwo"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameThree"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Phone:</label>
                                                            <input
                                                                type="text"
                                                                id="nameFour"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="pills-profile"
                                            role="tabpanel"
                                            aria-labelledby="pills-profile-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameFive"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameSix"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameSeven"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="pills-contact"
                                            role="tabpanel"
                                            aria-labelledby="pills-contact-tab"
                                        >
                                            <div
                                                class="tj-input-form"
                                                data-bg-image="web-assets/images/banner/form-shape.png"
                                            >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Name:</label>
                                                            <input
                                                                type="text"
                                                                id="nameEight"
                                                                name="name"
                                                                placeholder="First Name"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameNine"
                                                                name="name"
                                                                placeholder=" Email"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form">
                                                            <label class="d-block"> Your Email:</label>
                                                            <input
                                                                type="text"
                                                                id="nameTen"
                                                                name="name"
                                                                placeholder="Phone"
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tj-input-range">
                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                <label> Distance (miles):</label>
                                                                <output class="output"></output>
                                                            </div>
                                                            <input
                                                                class="tj-range-1"
                                                                type="range"
                                                                min="400"
                                                                max="7000"
                                                                step="10"
                                                                value="800"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row select-bm">
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Freight Type:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-form tj-select">
                                                            <label> Load:</label>
                                                            <select class="nice-select">
                                                                <option value="2">Select</option>
                                                                <option value="1" disabled>Optimized Cost</option>
                                                                <option value="2">Delivery on Time</option>
                                                                <option value="3">Cargo</option>
                                                                <option value="4">Safety & Reliability</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tj-theme-button">
                                                    <button class="tj-submit-btn" type="submit" value="submit">
                                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper thumb-slider">
            <div class="swiper-wrapper thumb_slider">
                <div class="swiper-slide thumb_slide">
                    <img src="web-assets/images/banner/arrow-image.png" alt="Icons" />
                </div>
                <div class="swiper-slide thumb_slide">
                    <img src="web-assets/images/banner/arrow-image2.png" alt="Icons" />
                </div>
                <div class="swiper-slide thumb_slide">
                    <img src="web-assets/images/banner/arrow-image3.png" alt="Icons" />
                </div>
            </div>
        </div>
    </section>
<!--========== Slider Section End ==============-->

<!--========== Tabs Section Start ==============-->
    <section class="tj-tabs-section-two d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-tabs slider-tabs-two">
                        <ul class="nav nav-pills" id="pills-tab-one" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="pills-home-tab-two"
                                    data-bs-toggle="pill"
                                    data-bs-target="#tabs-one"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-home"
                                    aria-selected="true"
                                >
                                    <i class="flaticon-shipped"></i> Road Fright
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-profile-tab-two"
                                    data-bs-toggle="pill"
                                    data-bs-target="#tabs-two"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-profile"
                                    aria-selected="false"
                                >
                                    <i class="flaticon-global-navigation"></i> Air Fright
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-contact-tab-two"
                                    data-bs-toggle="pill"
                                    data-bs-target="#tabs-three"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-contact"
                                    aria-selected="false"
                                >
                                    <i class="flaticon-cargo-ship-1"></i> Ocean Fright
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent-two">
                            <div
                                class="tab-pane fade show active"
                                id="tabs-one"
                                role="tabpanel"
                                aria-labelledby="pills-home-tab"
                            >
                                <div class="tj-input-form" data-bg-image="web-assets/images/banner/form-shape.png">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-form">
                                                <label class="d-block"> Your Name:</label>
                                                <input
                                                    type="text"
                                                    id="nameFirst"
                                                    name="name"
                                                    placeholder="First Name"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-form">
                                                <label class="d-block"> Your Email:</label>
                                                <input
                                                    type="text"
                                                    id="nameEmail"
                                                    name="name"
                                                    placeholder=" Email"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-form">
                                                <label class="d-block"> Your Email:</label>
                                                <input
                                                    type="text"
                                                    id="namePhone"
                                                    name="name"
                                                    placeholder="Phone"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tj-input-range">
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    <label> Distance (miles):</label>
                                                    <output class="output"></output>
                                                </div>
                                                <input
                                                    class="tj-range-1"
                                                    type="range"
                                                    min="400"
                                                    max="7000"
                                                    step="10"
                                                    value="800"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row select-bm">
                                        <div class="col-md-6">
                                            <div class="input-form tj-select">
                                                <label> Freight Type:</label>
                                                <select class="nice-select">
                                                    <option value="2">Select</option>
                                                    <option value="1" disabled>Optimized Cost</option>
                                                    <option value="2">Delivery on Time</option>
                                                    <option value="3">Cargo</option>
                                                    <option value="4">Safety & Reliability</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-form tj-select">
                                                <label> Load:</label>
                                                <select class="nice-select">
                                                    <option value="2">Select</option>
                                                    <option value="1" disabled>Optimized Cost</option>
                                                    <option value="2">Delivery on Time</option>
                                                    <option value="3">Cargo</option>
                                                    <option value="4">Safety & Reliability</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tj-theme-button">
                                        <button class="tj-submit-btn" type="submit" value="submit">
                                            Submit Now <i class="fa-light fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="tabs-two"
                                role="tabpanel"
                                aria-labelledby="pills-profile-tab"
                            >
                                <div class="tj-input-form" data-bg-image="web-assets/images/banner/form-shape.png">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-form">
                                                <label class="d-block"> Your Name:</label>
                                                <input
                                                    type="text"
                                                    id="firstOne"
                                                    name="name"
                                                    placeholder="First Name"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-form">
                                                <label class="d-block"> Your Email:</label>
                                                <input
                                                    type="text"
                                                    id="emailOne"
                                                    name="name"
                                                    placeholder=" Email"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-form">
                                                <label class="d-block"> Your Email:</label>
                                                <input
                                                    type="text"
                                                    id="phoneOne"
                                                    name="name"
                                                    placeholder="Phone"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tj-input-range">
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    <label> Distance (miles):</label>
                                                    <output class="output"></output>
                                                </div>
                                                <input
                                                    class="tj-range-1"
                                                    type="range"
                                                    min="400"
                                                    max="7000"
                                                    step="10"
                                                    value="800"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row select-bm">
                                        <div class="col-md-6">
                                            <div class="input-form tj-select">
                                                <label> Freight Type:</label>
                                                <select class="nice-select">
                                                    <option value="2">Select</option>
                                                    <option value="1" disabled>Optimized Cost</option>
                                                    <option value="2">Delivery on Time</option>
                                                    <option value="3">Cargo</option>
                                                    <option value="4">Safety & Reliability</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-form tj-select">
                                                <label> Load:</label>
                                                <select class="nice-select">
                                                    <option value="2">Select</option>
                                                    <option value="1" disabled>Optimized Cost</option>
                                                    <option value="2">Delivery on Time</option>
                                                    <option value="3">Cargo</option>
                                                    <option value="4">Safety & Reliability</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tj-theme-button">
                                        <button class="tj-submit-btn" type="submit" value="submit">
                                            Submit Now <i class="fa-light fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="tabs-three"
                                role="tabpanel"
                                aria-labelledby="pills-contact-tab"
                            >
                                <div class="tj-input-form" data-bg-image="web-assets/images/banner/form-shape.png">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-form">
                                                <label class="d-block"> Your Name:</label>
                                                <input
                                                    type="text"
                                                    id="firstTwo"
                                                    name="name"
                                                    placeholder="First Name"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-form">
                                                <label class="d-block"> Your Email:</label>
                                                <input
                                                    type="text"
                                                    id="emailTwo"
                                                    name="name"
                                                    placeholder=" Email"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-form">
                                                <label class="d-block"> Your Email:</label>
                                                <input
                                                    type="text"
                                                    id="PhoneTwo"
                                                    name="name"
                                                    placeholder="Phone"
                                                    required=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tj-input-range">
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    <label> Distance (miles):</label>
                                                    <output class="output"></output>
                                                </div>
                                                <input
                                                    class="tj-range-1"
                                                    type="range"
                                                    min="400"
                                                    max="7000"
                                                    step="10"
                                                    value="800"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row select-bm">
                                        <div class="col-md-6">
                                            <div class="input-form tj-select">
                                                <label> Freight Type:</label>
                                                <select class="nice-select">
                                                    <option value="2">Select</option>
                                                    <option value="1" disabled>Optimized Cost</option>
                                                    <option value="2">Delivery on Time</option>
                                                    <option value="3">Cargo</option>
                                                    <option value="4">Safety & Reliability</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-form tj-select">
                                                <label> Load:</label>
                                                <select class="nice-select">
                                                    <option value="2">Select</option>
                                                    <option value="1" disabled>Optimized Cost</option>
                                                    <option value="2">Delivery on Time</option>
                                                    <option value="3">Cargo</option>
                                                    <option value="4">Safety & Reliability</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tj-theme-button">
                                        <button class="tj-submit-btn" type="submit" value="submit">
                                            Submit Now <i class="fa-light fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--========== Tabs Section End ==============-->

<!--========== Service Section Start ==============-->
    <section class="tj-service-section-four">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-section-heading text-center">
                        <span class="sub-title active-shape"> What We Do</span>
                        <h2 class="title">Vehicle & Freight Transportation Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Car Transport Service -->
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                    <div class="service-item-three">
                        <div class="service-image">
                            <img src="web-assets/images/service/service-8.jpg" alt="Car Transport Service" />
                        </div>
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="flaticon-delivery-van"></i>
                            </div>
                            <h4><a class="title" href="service-details.html">Car Transport Service</a></h4>
                            <p>Safe and reliable car transportation tailored to your schedule and destination.</p>
                        </div>
                    </div>
                </div>
                <!-- Heavy Equipment Transport -->
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                    <div class="service-item-three">
                        <div class="service-image">
                            <img src="web-assets/images/service/service-9.jpg" alt="Heavy Equipment Services" />
                        </div>
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="flaticon-cargo-ship-1"></i>
                            </div>
                            <h4><a class="title" href="service-details.html">Heavy Equipment Services</a></h4>
                            <p>Expert transport solutions for construction, farming, and commercial heavy equipment.</p>
                        </div>
                    </div>
                </div>
                <!-- Freight Transportation - Reefer Transport -->
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                    <div class="service-item-three">
                        <div class="service-image">
                            <img src="web-assets/images/service/service-10.jpg" alt="Motorcycle Transport Service
                                    " />
                        </div>
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="flaticon-air-freight"></i>
                            </div>
                            <h4><a class="title" href="service-details.html">Motorcycle Transport Service</a></h4>
                            <p>Safe and reliable motorcycle transportation tailored to your schedule and destination saftly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--========== Service Section End ==============-->


<!--========== Cta Section Start ==============-->
    <section class="tj-cta-section-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-sal="slide-left" data-sal-duration="800">
                    <div class="tj-cta-left-content">
                        <h3 class="title">Reliable Transportation Solutions for Your Business Growth</h3>
                        <p>We ensure timely and secure delivery, helping your business move forward seamlessly.</p>
                        <div class="tj-theme-button">
                            <a class="tj-primary-btn tj-transparent-btn" href="contact.html">
                                Contact Us <i class="flaticon-right-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                    <div class="cta-counter-box">
                        <ul class="list-gap list-one">
                            <li>
                                <div class="counter-number">
                                    <div class="tj-count"><span class="odometer" data-count="380000">0</span></div>
                                    <span class="sub-title">Packages Delivered</span>
                                </div>
                            </li>
                            <li>
                                <div class="counter-number">
                                    <div class="tj-count"><span class="odometer" data-count="68000">0</span></div>
                                    <span class="sub-title">Satisfied Customers</span>
                                </div>
                            </li>
                            <li>
                                <div class="counter-number">
                                    <div class="tj-count"><span class="odometer" data-count="120">0</span></div>
                                    <span class="sub-title">Countries Served</span>
                                </div>
                            </li>
                            <li>
                                <div class="counter-number">
                                    <div class="tj-count"><span class="odometer" data-count="50000">0</span></div>
                                    <span class="sub-title">Tons of Freight Transported</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--========== Cta Section End ==============-->


<!--=========== About Section Start =========-->
    <section class="tj-about-section-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-sal="slide-left" data-sal-duration="800">
                    <div class="about-content-three">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape">Explore the Benefits of Nationwide Transport</span>
                            <h2 class="title">Delivering Fast, Reliable Transport Solutions</h2>
                            <p class="desc">
                                We are the "ALL-ROUNDER" in vehicle transport—specializing in shipping everything from cars and heavy equipment to ATVs, construction vehicles, trucks, and even boats.
                            </p>
                        </div>
                        <div class="content-box d-flex align-items-center">
                            <div class="tj-icon-box">
                                <div class="ab-text d-flex align-items-center">
                                    <div class="ab-icon">
                                        <img src="web-assets/images/icon/global.svg" alt="Our Mission Icon" />
                                    </div>
                                    <div class="ab-title">
                                        <h5 class="title">Our Mission</h5>
                                    </div>
                                </div>
                                <p class="desc">To provide safe, reliable, and hassle-free transport solutions and delivering every shipment on time, with care, and backed by exceptional customer service.</p>
                            </div>
                            <div class="tj-icon-box">
                                <div class="ab-text d-flex align-items-center">
                                    <div class="ab-icon">
                                        <img src="web-assets/images/icon/winner.svg" alt="Our Vision Icon" />
                                    </div>
                                    <div class="ab-title">
                                        <h5 class="title">Our Vision</h5>
                                    </div>
                                </div>
                                <p class="desc">To be the nation’s most trusted all-round transport provider setting the standard for nationwide shipping , driven by innovation, transparency, and customer care.</p>
                            </div>
                        </div>
                        <div class="tj-theme-button">
                            <a class="tj-primary-btn" href="contact.html">
                                Learn More <i class="flaticon-right-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                    <div class="about_image text-end">
                        <img src="web-assets/images/about/ab-5.png" alt="About Us Image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--=========== About Section End =========-->


<!--========== FAQ Section Start ==============-->
    <section class="tj-faq-section">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="tj-section-heading text-center">
                <span class="sub-title active-shape">How It Works</span>
                <h2 class="title">Frequently Asked Questions</h2>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6" data-sal="slide-left" data-sal-duration="800">
                <div class="tj-faq-left-content">
                <div class="faq-image">
                    <img src="web-assets/images/slider/slider-4.jpg" alt="FAQ Visual" />
                </div>
                <div class="faq-content">
                    <div class="faq-icon"><i class="fa-regular fa-check"></i></div>
                    <div class="faq-text">
                    <h6 class="title">Reliable & Transparent</h6>
                    <p>We work only with licensed carriers—no brokers, no hidden fees—ensuring clarity and peace of mind.:contentReference[oaicite:0]{index=0}</p>
                    </div>
                </div>
                <div class="faq-content">
                    <div class="faq-icon"><i class="fa-regular fa-check"></i></div>
                    <div class="faq-text">
                    <h6 class="title">Comprehensive Coverage</h6>
                    <p>Every transport quote includes full insurance coverage, so your vehicle is protected throughout the journey.:contentReference[oaicite:1]{index=1}</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                <div class="tj-faq-area">
                <div class="accordion" id="accordionExample">
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        What types of services does Bridgeway Logistics LLC offer?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        Bridgeway offers reliable vehicle transport across the U.S., including sedans, SUVs, motorcycles, heavy equipment, boats, and more, all with competitive pricing and smooth communication.:contentReference[oaicite:2]{index=2}
                        </div>
                    </div>
                    </div>
                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        How can I contact Bridgeway Logistics LLC?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        You can easily reach them via phone at +1 (713) 470‑6157 or via email at <a href="mailto:quote@bridgewaylogisticsllc.com">quote@bridgewaylogisticsllc.com</a>.:contentReference[oaicite:3]{index=3}
                        </div>
                    </div>
                    </div>
                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Are there any extra fees I should know about?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        While quotes typically include coverage and standard charges, final pricing may vary depending on distance and unique circumstances. Bridgeway prides itself on transparent communication throughout the process.:contentReference[oaicite:4]{index=4}
                        </div>
                    </div>
                    </div>
                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        What payment options are available?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        Bridgeway supports multiple payment methods including credit/debit cards, bank transfers, and major digital platforms for your convenience.:contentReference[oaicite:5]{index=5}
                        </div>
                    </div>
                    </div>
                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        How often are raises provided for employees?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        According to employee feedback, raises are typically offered on a quarterly basis for delivery staff.:contentReference[oaicite:6]{index=6}
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
<!--========== FAQ Section End ==============-->


<!--========== Project Section Start ==============-->
    <section class="tj-project-section-three">
        <div class="tj-project-content-area">
            <div class="project-item-three project-image">
                <div class="project-image" data-bg-image="web-assets/images/project/project2.jpg"></div>
                <a class="arrow-btn" href="project-details.html"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">logistics</span>
                    <h6><a class="title-link" href="project-details.html">Car Shipping</a></h6>
                </div>
            </div>
            <div class="project-item-three">
                <div class="project-image" data-bg-image="web-assets/images/project/project3.jpg"></div>
                <a class="arrow-btn" href="project-details.html"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">logistics</span>
                    <h6><a class="title-link" href="project-details.html">Motorcycle Shipping</a></h6>
                </div>
            </div>
            <div class="project-item-three">
                <div class="project-image" data-bg-image="web-assets/images/project/project2.jpg"></div>
                <a class="arrow-btn" href="project-details.html"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">logistics</span>
                    <h6><a class="title-link" href="project-details.html">Heavy Equipment Shipping</a></h6>
                </div>
            </div>
            <div class="project-item-three">
                <div class="project-image" data-bg-image="web-assets/images/project/project2.jpg"></div>
                <a class="arrow-btn" href="project-details.html"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">logistics</span>
                    <h6><a class="title-link" href="project-details.html">Freight Transportation Shipping</a></h6>
                </div>
            </div>
        </div>
    </section>
<!--========== Project Section End ==============-->

<!--========== Choose Section Start ==============-->
    <section class="tj-choose-us-section-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="choose-us-top-content">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape2"> Why Partner With Us?</span>
                            <h2 class="title">Reasons Why You Choose Bridgeway Logistics</h2>
                        </div>
                        <div class="tj-theme-button">
                            <a class="tj-transparent-btn" href="contact.html">
                                Contact Us <i class="flaticon-right-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                    <div class="choose-us-step-item">
                        <div class="choose-step-box">
                            <div class="choose-box"></div>
                            <div class="step-content">
                                <h6 class="title">Reliable & On-Time Delivery</h6>
                            </div>
                        </div>
                        <p>
                            We prioritize timely deliveries to ensure your cargo reaches safely and on schedule every time.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                    <div class="choose-us-step-item">
                        <div class="choose-step-box">
                            <div class="choose-box"></div>
                            <div class="step-content">
                                <h6 class="title">Experienced Logistics Professionals</h6>
                            </div>
                        </div>
                        <p>
                            Our team has years of expertise in handling complex transport and freight operations efficiently.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                    <div class="choose-us-step-item">
                        <div class="choose-step-box">
                            <div class="choose-box"></div>
                            <div class="step-content">
                                <h6 class="title">Comprehensive Transport Solutions</h6>
                            </div>
                        </div>
                        <p>
                            From open transport to heavy equipment shipping, we offer a full range of tailored logistics services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--========== Choose Section End ==============-->


<!--=========== Blog Section Start =========-->
    <section class="tj-blog-section-three">
        <div class="container">
            <div class="row">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape"> Latest News</span>
                    <h2 class="title">Industry Insights & Company Updates</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                    <div class="tj-blog-item-three">
                        <div class="tj-blog-image">
                            <a href="blog-details.html"><img src="web-assets/images/blog/blog-5.jpg" alt="Blog" /></a>
                        </div>
                        <div class="meta-date">
                            <ul class="list-gap">
                                <li>10</li>
                                <li>Jul</li>
                            </ul>
                        </div>
                        <div class="blog-content-area">
                            <div class="blog-meta">
                                <div class="meta-list">
                                    <ul class="list-gap">
                                        <li><i class="fa-light fa-user"></i><a href="#"> Admin</a></li>
                                        <li><i class="fa-light fa-comment"></i> <span> Comment (8)</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-text-box">
                                <div class="blog-header">
                                    <h4>
                                        <a class="title-link" href="blog-details.html">
                                            Top 5 Tips for Efficient Vehicle Transport</a>
                                    </h4>
                                </div>
                                <div class="blog-button">
                                    <ul class="list-gap">
                                        <li>
                                            <a href="blog-details.html">
                                                Read More <i class="fa-regular fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                    <div class="tj-blog-item-three">
                        <div class="tj-blog-image">
                            <a href="blog-details.html"><img src="web-assets/images/blog/blog-6.jpg" alt="Blog" /></a>
                        </div>
                        <div class="meta-date">
                            <ul class="list-gap">
                                <li>05</li>
                                <li>Aug</li>
                            </ul>
                        </div>
                        <div class="blog-content-area">
                            <div class="blog-meta">
                                <div class="meta-list">
                                    <ul class="list-gap">
                                        <li><i class="fa-light fa-user"></i><a href="#"> Admin</a></li>
                                        <li><i class="fa-light fa-comment"></i> <span> Comment (12)</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-text-box">
                                <div class="blog-header">
                                    <h4>
                                        <a class="title-link" href="blog-details.html">
                                            Understanding Enclosed vs Open Auto Transport</a>
                                    </h4>
                                </div>
                                <div class="blog-button">
                                    <ul class="list-gap">
                                        <li>
                                            <a href="blog-details.html">
                                                Read More <i class="fa-regular fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                    <div class="tj-blog-item-three">
                        <div class="tj-blog-image">
                            <a href="blog-details.html"><img src="web-assets/images/blog/blog-7.jpg" alt="Blog" /></a>
                        </div>
                        <div class="meta-date">
                            <ul class="list-gap">
                                <li>20</li>
                                <li>Sep</li>
                            </ul>
                        </div>
                        <div class="blog-content-area">
                            <div class="blog-meta">
                                <div class="meta-list">
                                    <ul class="list-gap">
                                        <li><i class="fa-light fa-user"></i><a href="#"> Admin</a></li>
                                        <li><i class="fa-light fa-comment"></i> <span> Comment (7)</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-text-box">
                                <div class="blog-header">
                                    <h4>
                                        <a class="title-link" href="blog-details.html">
                                            How to Prepare Your Vehicle for Transport</a>
                                    </h4>
                                </div>
                                <div class="blog-button">
                                    <ul class="list-gap">
                                        <li>
                                            <a href="blog-details.html">
                                                Read More <i class="fa-regular fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--=========== Blog Section End =========-->

@endsection