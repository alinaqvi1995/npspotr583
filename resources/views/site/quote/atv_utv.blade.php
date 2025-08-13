@extends('layouts.guest')
@section('title', 'Get Quote on ATV/UTV | ShipA1')

@section('meta_description',
    'Get an instant atv-utv shipping quote with ease! Trust our reliable service for
    nationwide coverage, transparent pricing, and secure transportation. Plan your shipment quickly and efficiently.')


@section('content')
    {{-- <style>
    .custom-select-style{
        background: #f0f2f7;
        width: 100%;
        font-size: 14px;
        font-weight: 500;
        height: 35px;
        line-height: 38px;
        padding: 15px 15px;
        border-radius: 3px;
    }
</style> --}}
    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('frontend/images/banner/all-cover-banner.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Vehicle - ATV/UTV</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="#">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> Vehicle - ATV/UTV</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== breadcrumb End ==============-->
    <!--========== Contact Page Start ==============-->
    <section class="tj-contact-page">
        <div class="container">
            <div class="row tj-contact-box">
                <div class="col-lg-4 col-md-6">
                    <div class="tj-contact-list">
                        <div class="contact-icon">
                            <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="contact-header">
                            <span> Any Questions? Call us</span>
                            <a href="tel:+1(246)3330079"> +1 (246) 333 0079</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tj-contact-list">
                        <div class="contact-icon">
                            <i class="flaticon-email-3"></i>
                        </div>
                        <div class="contact-header">
                            <span> Any Questions? Email us</span>
                            <a href="mailto:example@gmail.com"> example@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tj-contact-list">
                        <div class="contact-icon">
                            <i class="flaticon-map"></i>
                        </div>
                        <div class="contact-header">
                            <span> 51 Somestreet Cambridge</span>
                            <a href="#"> CB4, United Kingdom</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== Contact Page End ==============-->
    <!--=========== Contact Section Start =========-->
    <section class="tj-tabs-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-box">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item w-100" role="presentation">
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
                                    <i class="flaticon-box"></i> Request A Quote
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
                                <div class="row">
                                    <div class="col-lg-12">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <!-- Your Name -->
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="tabs-form-box">
                                                <h6 class="title">Your Name</h6>
                                                <div class="tabs-input">
                                                    <input
                                                    type="text"
                                                    name="full_name"
                                                    placeholder="Full Name"
                                                    required
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Phone -->
                                        <div class="col-6 col-md-6">
                                                <div class="tabs-form-box">
                                                <h6 class="title">Phone</h6>
                                            <div class="tabs-input">
                                                <input
                                                type="text"
                                                name="phone_country_code"
                                                placeholder="+1"
                                                required
                                                pattern="^\+\d{1,3}$"
                                                title="Enter country code, e.g., +1"
                                                />
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Email Address -->
                                        <div class="tabs-form-box">
                                        <h6 class="title">Email Address</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="tabs-input">
                                                <input
                                                type="email"
                                                name="email"
                                                placeholder="Your Email Address"
                                                required
                                                />
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Pickup & Delivery Locations -->
                                        <div class="tabs-form-box">
                                        <h6 class="title">Pickup & Delivery Locations</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="tabs-input">
                                                <input
                                                type="text"
                                                name="pickup_location"
                                                placeholder="Ex: 90005 Or Los Angeles"
                                                required
                                                />
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="tabs-input">
                                                <input
                                                type="text"
                                                name="delivery_location"
                                                placeholder="Ex: 90005 Or Los Angeles"
                                                required
                                                />
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- ATV/UTV Information -->
                                        <div class="tabs-form-box">
                                        <h6 class="title">ATV/UTV Information</h6>
                                        <div class="row">
                                            <div class="col-12 col-md-4 mb-2 mb-md-0">
                                                <div class="input-form tj-select">
                                                    <label class="d-flex"> Select Year</label>
                                                    <select class="nice-select">
                                                        <option value="" disabled selected>Select Year</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-2 mb-md-0">
                                            <div class="tabs-input">
                                                <input
                                                type="text"
                                                name="make"
                                                placeholder="Enter Make"
                                                required
                                                />
                                            </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                            <div class="tabs-input">
                                                <input
                                                type="text"
                                                name="model"
                                                placeholder="Enter Model"
                                                required
                                                />
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Trailer Type & Condition -->
                                        <div class="tabs-form-box">
                                        <h6 class="title">Trailer Type & Condition</h6>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                            <div class="tabs-input">
                                                <select name="trailer_type" required class="form-select">
                                                <option value="" disabled selected>Select Trailer Type</option>
                                                <option value="enclosed">Enclosed</option>
                                                <option value="open">Open</option>
                                                <option value="flatbed">Flatbed</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                            <div class="tabs-input">
                                                <select name="condition" required class="form-select">
                                                <option value="" disabled selected>Select Condition</option>
                                                <option value="new">New</option>
                                                <option value="used">Used</option>
                                                <option value="refurbished">Refurbished</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Add Vehicle -->
                                        <div class="tabs-form-box">
                                        <h6 class="title">Add Vehicle</h6>
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="tabs-input">
                                                    <textarea
                                                    name="add_vehicle"
                                                    placeholder="Additional vehicle details..."
                                                    rows="3"
                                                    class="form-control"
                                                    ></textarea>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modified & Available at Auction -->
                                        <div class="tabs-form-box">
                                            <div class="row tj-quiz-list">
                                                <div class="col-6">
                                                    <label class="quiz-check">
                                                        <input type="checkbox" name="modified">
                                                        <span class="checkmark"></span>
                                                        Modified?
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label class="quiz-check">
                                                        <input type="checkbox" name="available_at_auction">
                                                        <span class="checkmark"></span>
                                                        Available at Auction?
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Image Upload -->
                                        <div class="tabs-form-box">
                                        <h6 class="title">Image</h6>
                                        <input type="file" name="image" accept="image/*" class="form-control" />
                                        <small>No file chosen</small>
                                        </div>

                                        <!-- Calculate Price Button -->
                                        <div class="tj-theme-button mt-3">
                                        <button class="tj-primary-btn tabs-button btn btn-primary" type="submit" value="submit">
                                            Calculate Price <i class="flaticon-right-1"></i>
                                        </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Contact Section End =========-->

    <!--=========== Video Section Start =========-->
    <section class="tj-video-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-video-area text-center">
                        <div class="tj-video-popup">
                            <div class="circle pulse video-icon">
                                <a
                                    class="venobox popup-videos-button"
                                    data-autoplay="true"
                                    data-vbtype="video"
                                    href="https://www.youtube.com/watch?v=ADmQTw4qqTY"
                                >
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="video-title">Offers Excellentcom Bination of Location & Quality</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Video Section End =========-->

@endsection
