@extends('layouts.guest')
@section('title', 'Get Quote on ATV/UTV | ShipA1')

@section('meta_description',
    'Get an instant atv-utv shipping quote with ease! Trust our reliable service for
    nationwide coverage, transparent pricing, and secure transportation. Plan your shipment quickly and efficiently.')


@section('content')
<section class="breadcrumb-wrapper" data-bg-image="{{ asset('frontend/images/banner/all-cover-banner.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-title text-center">Vehicle - AtV-UTV</h1>
                    <div class="breadcrumb-link">
                        <span><a href="#"><span>Home</span></a></span> > <span><span> Vehicle - AtV-UTV</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="tj-tabs-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-box">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                <i class="flaticon-box"></i> Request A Quote
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <i class="flaticon-tracking"></i> Track &amp; Trace
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="tabs-form-box">
                                        <h6 class="title">Personal Data</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="nameOne" name="name" placeholder="Name*" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="emailThree" name="email" placeholder="Mail*" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="emailTwo" name="phone" placeholder="Phone*" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs-form-box">
                                        <h6 class="title">Shipment Data</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="freightOne" name="name" placeholder="Freight Type" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="departureOne" name="email" placeholder="City of Departure" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="deliveryOne" name="phone" placeholder="Delivery City" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs-form-box">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="incotermsOne" name="name" placeholder="Incoterms" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="weightOne" name="email" placeholder="Weight" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="heightOne" name="email" placeholder="Height" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="width" name="email" placeholder="Width" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="lengthOne" name="email" placeholder="length" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tj-quiz-list">
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Fragile
                                        </label>
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Express Delivery
                                        </label>
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Insurance
                                        </label>
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Packaging
                                        </label>
                                    </div>
                                    <div class="tj-theme-button">
                                        <button class="tj-primary-btn tabs-button" type="submit" value="submit">
                                            Request For A Quote <i class="flaticon-right-1"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="tabs-image">
                                        <img src="assets/images/project/tabs-1.jpg" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="tabs-form-box">
                                        <h6 class="title">Personal Data</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="name" name="name" placeholder="Name*" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="emailFour" name="email" placeholder="Mail*" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="email" name="phone" placeholder="Phone*" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs-form-box">
                                        <h6 class="title">Shipment Data</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="freight" name="name" placeholder="Freight Type" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="departure" name="email" placeholder="City of Departure" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="delivery" name="phone" placeholder="Delivery City" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs-form-box">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="tabs-input">
                                                    <input type="text" id="incoterms" name="name" placeholder="Incoterms" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="weight" name="email" placeholder="Weight" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="height" name="email" placeholder="Height" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="widthOne" name="email" placeholder="Width" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="length" name="email" placeholder="length" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tj-quiz-list">
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Fragile
                                        </label>
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Express Delivery
                                        </label>
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Insurance
                                        </label>
                                        <label class="quiz-check">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Packaging
                                        </label>
                                    </div>
                                    <div class="tj-theme-button">
                                        <button class="tj-primary-btn tabs-button" type="submit" value="submit">
                                            Request For A Quote <i class="flaticon-right-1"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="tabs-image">
                                        <img src="assets/images/project/tabs-2.png" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
