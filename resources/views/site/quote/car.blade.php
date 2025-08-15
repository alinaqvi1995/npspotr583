@extends('layouts.guest')
@section('title', 'Get Car Shipping Quote | ShipA1')
@section('meta_description', 'Experience seamless car shipping with Shipa Car Transport. Get an instant quote,
    nationwide coverage, and transparent pricing. Trust us for swift and secure vehicle transportation.')
@section('content')
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('frontend/images/banner/all-cover-banner.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Vehicle - Car</h1>
                        <div class="breadcrumb-link">
                            <span><a href="#"><span>Home</span></a></span> > <span><span> Vehicle - Car</span></span>
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
                        </ul>
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
                </div>
            </div>
        </div>
    </section>
    <section class="tj-choose-us-section">
        <div class="container-flude">
            <div class="row">

                {{-- Success message --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Generic error message --}}
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="tj-input-form w-auto">
                        <h4 class="title text-center">Instant Car Shipping Quote!</h4>
                        @php $today = date('Y-m-d'); @endphp
                        <form action="{{ route('frontend.submit.quote') }}" method="post" class="rd-mailform validate-form"
                            id="calculatePriceFrom" novalidate data-parsley-validate data-parsley-errors-messages-disabled
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="vehicle_opt" value="vehicle">
                            <input type="hidden" name="type" value="car">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block">Your Name:</label>
                                        <input type="text" id="name" name="customer_name" placeholder="Full Name"
                                            required value="{{ old('customer_name') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block">Phone:</label>
                                        <input type="tel" id="phone" name="customer_phone" class="ophone"
                                            placeholder="Phone Number" required value="{{ old('customer_phone') }}" />
                                        <input type="hidden" name="country_code" id="country_code" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-form">
                                        <label class="d-block">Email Address:</label>
                                        <input type="email" id="email" name="customer_email"
                                            placeholder="Your Email Address" required value="{{ old('customer_email') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-0">
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block">Pickup Location:</label>
                                        <input type="text" id="pickup-location" name="pickup_location"
                                            placeholder="Ex: 90005 Or Los Angeles" required
                                            value="{{ old('pickup_location') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block">Delivery Location:</label>
                                        <input type="text" id="delivery-location" name="delivery_location"
                                            placeholder="Ex: 90005 Or Los Angeles" required
                                            value="{{ old('delivery_location') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block">Pickup Date:</label>
                                        <input type="date" name="pickup_date" required min="{{ $today }}"
                                            value="{{ old('pickup_date') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-form">
                                        <label class="d-block">Delivery Date:</label>
                                        <input type="date" name="delivery_date" required min="{{ $today }}"
                                            value="{{ old('delivery_date') }}" />
                                    </div>
                                </div>
                            </div>

                            {{-- Vehicle Info --}}
                            <div class="vehicle-info mt-3">
                                <div class="row select-bm">
                                    <div class="col-md-12 text-center">
                                        <h4 class="text-white">Car Information</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-form tj-select">
                                            <label>Year</label>
                                            <input class="form-control" type="text" name="vehicles[0][year]"
                                                placeholder="Select Year" required
                                                value="{{ old('vehicles.0.year') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-form tj-select">
                                            <label>Make</label>
                                            <input class="form-control" type="text" name="vehicles[0][make]"
                                                placeholder="Select Make" required
                                                value="{{ old('vehicles.0.make') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-form tj-select">
                                            <label>Model</label>
                                            <input class="form-control" type="text" name="vehicles[0][model]"
                                                placeholder="Select Model" required
                                                value="{{ old('vehicles.0.model') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="trailer_type" class="text-white">Select Trailer Type</label>
                                        <select class="form-control" id="trailer_type" name="vehicles[0][trailer_type]">
                                            <option value="Open Trailer"
                                                {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>
                                                Open Trailer</option>
                                            <option value="Enclosed Trailer"
                                                {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>
                                                Enclosed Trailer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="condition" class="text-white">Condition</label>
                                        <select class="form-control" id="condition" name="vehicles[0][condition]">
                                            <option value="Running"
                                                {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running
                                            </option>
                                            <option value="Non-Running"
                                                {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non
                                                Running</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Vehicle Images --}}
                            <div class="row mt-2">
                                <div class="input-form">
                                    <label class="d-block text-white">Image:</label>
                                    <input class="form-control image_input" name="images[0][]" type="file"
                                        accept="image/*" multiple onchange="previewImages(event)">
                                    <div class="image-preview-container" id="imagePreviewContainer">
                                        {{-- Preview old images if validation fails --}}
                                    </div>
                                </div>
                            </div>

                            {{-- Modified & Auction --}}
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modification"
                                            name="modified" value="1" {{ old('modified') ? 'checked' : '' }}>
                                        <label class="form-check-label text-white ms-4"
                                            for="modification">Modified?</label>
                                    </div>
                                    <div class="input-form div-modify_info"
                                        style="display: {{ old('modified') ? 'block' : 'none' }}">
                                        <label class="d-block">Modification Information:</label>
                                        <input class="form-control" type="text" name="modified_info"
                                            placeholder="Enter Modification Information"
                                            value="{{ old('modified_info') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="available_at_auction"
                                            name="available_at_auction" value="1"
                                            {{ old('available_at_auction') ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="available_at_auction">Available at
                                            Auction?</label>
                                    </div>
                                    <div class="input-form div-link mt-3"
                                        style="display: {{ old('available_at_auction') ? 'block' : 'none' }}">
                                        <label class="d-block">Enter Link:</label>
                                        <input class="form-control" type="url" name="available_link"
                                            placeholder="Enter Link" value="{{ old('available_link') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tj-theme-button text-center mt-3">
                                <button class="tj-submit-btn" type="submit">Calculate Price <i
                                        class="fa-light fa-arrow-right"></i></button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
@endsection