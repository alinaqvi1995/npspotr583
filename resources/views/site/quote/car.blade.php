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
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-lg-8">
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
                                        <form action="{{ route('frontend.submit.quote') }}" method="post"
                                            class="rd-mailform validate-form"
                                            id="calculatePriceFrom"
                                            novalidate data-parsley-validate data-parsley-errors-messages-disabled
                                            enctype="multipart/form-data">
                                                @csrf
                                                @php $today = date('Y-m-d'); @endphp

                                                <input type="hidden" name="vehicle_opt" value="vehicle">
                                                <input type="hidden" name="type" value="car">

                                            <!-- Personal Data -->
                                            <div class="tabs-form-box">
                                                <h6 class="title">Personal Data</h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="tabs-input">
                                                            <input type="text" id="name" name="customer_name" placeholder="Full Name*" 
                                                                required value="{{ old('customer_name') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="tabs-input">
                                                            <input type="tel" id="phone" name="customer_phone" placeholder="Phone Number*" 
                                                                required value="{{ old('customer_phone') }}">
                                                            <input type="hidden" name="country_code" id="country_code" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="tabs-input">
                                                            <input type="email" id="email" name="customer_email" placeholder="Email*" 
                                                                required value="{{ old('customer_email') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Shipment Data -->
                                            <div class="tabs-form-box">
                                                <h6 class="title">Shipment Data</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="pickup-location" name="pickup_location"
                                                                placeholder="Pickup Location*" required
                                                                value="{{ old('pickup_location') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="text" id="delivery-location" name="delivery_location"
                                                                placeholder="Delivery Location*" required
                                                                value="{{ old('delivery_location') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="date" name="pickup_date" required min="{{ $today }}"
                                                                value="{{ old('pickup_date') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tabs-input">
                                                            <input type="date" name="delivery_date" required min="{{ $today }}"
                                                                value="{{ old('delivery_date') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Vehicle Info -->
                                            <div class="tabs-form-box">
                                                <h6 class="title">Car Information</h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="tabs-input">
                                                            <input type="text" name="vehicles[0][year]" placeholder="Year*" required
                                                                value="{{ old('vehicles.0.year') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="tabs-input">
                                                            <input type="text" name="vehicles[0][make]" placeholder="Make*" required
                                                                value="{{ old('vehicles.0.make') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="tabs-input">
                                                            <input type="text" name="vehicles[0][model]" placeholder="Model*" required
                                                                value="{{ old('vehicles.0.model') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="vehicles[0][trailer_type]">
                                                            <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                                                            <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="vehicles[0][condition]">
                                                            <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                                                            <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Vehicle Images -->
                                                <div class="mt-2">
                                                    <input class="form-control image_input" name="images[0][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                                                    <div class="image-preview-container" id="imagePreviewContainer"></div>
                                                </div>
                                            </div>

                                            <!-- Additional Info -->
                                            <div class="tabs-form-box">
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <label>
                                                            <input type="checkbox" name="modified" value="1" {{ old('modified') ? 'checked' : '' }}> Modified?
                                                        </label>
                                                        <div class="mt-2" style="display: {{ old('modified') ? 'block' : 'none' }}">
                                                            <input class="form-control" type="text" name="modified_info"
                                                                placeholder="Modification Information"
                                                                value="{{ old('modified_info') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            <input type="checkbox" name="available_at_auction" value="1" {{ old('available_at_auction') ? 'checked' : '' }}> Available at Auction?
                                                        </label>
                                                        <div class="mt-2" style="display: {{ old('available_at_auction') ? 'block' : 'none' }}">
                                                            <input class="form-control" type="url" name="available_link"
                                                                placeholder="Auction Link" value="{{ old('available_link') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit -->
                                            <div class="tj-theme-button text-center mt-3">
                                                <button class="tj-primary-btn tabs-button" type="submit">
                                                    Request For A Quote <i class="flaticon-right-1"></i>
                                                </button>
                                            </div>
                                        </form>
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
            </div>
        </div>
    </section>
    <section class="tj-video-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-video-area text-center">
                        <div class="tj-video-popup">
                            <div class="circle pulse video-icon">
                                <a class="venobox popup-videos-button" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=ADmQTw4qqTY">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="video-title">Offers Excellentcom Bination of Location &amp; Quality</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection