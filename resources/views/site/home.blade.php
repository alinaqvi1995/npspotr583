@extends('layouts.guest')
@section('title', 'Home – Bridgeway Logistics LLC')
@section('meta_description', 'Bridgeway Logistics LLC – Professional auto transport, freight services, and heavy equipment shipping across the USA.')
@section('meta_keywords', 'auto shipping, car transport, logistics, freight, heavy equipment shipping, Bridgeway Logistics, USA transport, vehicle transport')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* ✅ Default Desktop/Laptop */
        .fixed-form {
            position: absolute;
            top: 50%;
            right: 10%;
            transform: translateY(-50%);
            z-index: 20;
            width: 80%; /* form width */
        }
        @media only screen and (min-width: 1400px) and (max-width: 1599px) {
            .fixed-form {
                    position: absolute;
                    top: 50%;
                    right: 4%;
                    transform: translateY(-50%);
                    z-index: 20;
                    width: 80%; /* form width */
                }
        }
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .fixed-form {
                position: absolute;
                top: 50%;
                right: 3%;
                transform: translateY(-50%);
                z-index: 20;
                width: 38%;
                max-width: 500px;
                margin: 30px auto;
            }
        }
        /* ✅ Tablet (screen <= 991px) */
        @media (max-width: 991px) {
            .fixed-form {
                position: relative;
                top: auto;
                right: auto;
                transform: none;
                width: 80%;
                max-width: 500px;
                margin: 30px auto;
                z-index: 20;
            }
        }

        /* ✅ Mobile (screen <= 575px) */
        @media (max-width: 575px) {
            .fixed-form {
                width: 100%;
                max-width: 100%;
                padding: 0 5px;
            }

            .fixed-form .tj-input-form {
                background-size: cover;
                padding: 20px 15px;
            }
        }

    </style>
    <!--========== Slider Section Start ==============-->
    <section class="tj-slider-section-three">
        <div class="slider_shape2">
            <img src="web-assets/images/banner/shape-2.png" alt="Image" />
        </div>

        <!-- Slider Background + Content -->
        <div class="swiper thumb-slider2">
            <div class="swiper-wrapper">
                <div class="swiper-slide tj-bg-layer" data-bg-image="web-assets/images/slider/slider-3.webp">
                    <div class="container container-two py-5 my-5">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="slider-content p-z-idex">
                                    <div class="slider-client">
                                        <div class="client-wrapper mx-3">
                                            <img src="web-assets/images/team/fmcsa.jpeg" alt="Image" />
                                        </div>
                                        <div class="client-auother">
                                            <p>Licensed & Insured by FMCSA & USDOT</p>
                                        </div>
                                    </div>
                                    <h1 class="slider-title">Reliable, Insured Vehicle Transport Across the USA</h1>
                                    <div class="tj-theme-button">
                                        <a class="tj-transparent-btn" href="{{ route('multiform') }}">
                                            Get Quote <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5"><!-- form yahan nahi hoga --></div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide tj-bg-layer" data-bg-image="web-assets/images/slider/slider-1.webp ">
                    <div class="container container-two">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="slider-content p-z-idex">
                                    <div class="slider-client">
                                        <div class="client-wrapper mx-3">
                                            <img src="web-assets/images/team/fmcsa.jpeg" alt="Image" />
                                        </div>
                                        <div class="client-auother">
                                            <p>Trusted Nationwide Carrier</p>
                                        </div>
                                    </div>
                                    <h1 class="slider-title">Door-to-Door Transport Services—Any Vehicle</h1>
                                    <div class="tj-theme-button">
                                        <a class="tj-transparent-btn" href="{{ route('multiform') }}">
                                            Get Quote <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5"><!-- empty --></div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide tj-bg-layer" data-bg-image="web-assets/images/slider/slider-2.webp">
                    <div class="container container-two">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="slider-content p-z-idex">
                                    <div class="slider-client">
                                        <div class="client-wrapper mx-3">
                                            <img src="web-assets/images/team/fmcsa.jpeg" alt="Image" />
                                        </div>
                                        <div class="client-auother">
                                            <p>100% Driver & Vehicle Safety Standards</p>
                                        </div>
                                    </div>
                                    <h1 class="slider-title">Fast, Reliable and Delivering Excellence on Every Mile</h1>
                                    <div class="tj-theme-button">
                                        <a class="tj-transparent-btn" href="{{ route('multiform') }}">
                                            Get Quote <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5"><!-- empty --></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ✅ Fixed Form -->
        <div class="fixed-form">
            <div class="slider-tabs slider-tabs-two">
                <div class="tj-input-form" data-bg-image="web-assets/images/banner/form-shape.png">
                    @include('site.partials.multiform')
                </div>
            </div>
        </div>

        <!-- Thumbs -->
        <div class="swiper thumb-slider">
            <div class="swiper-wrapper thumb_slider">
                <div class="swiper-slide thumb_slide">
                    <img src="web-assets/images/banner/arrow-image3.webp" alt="Icons" />
                </div>
                <div class="swiper-slide thumb_slide">
                    <img src="web-assets/images/banner/arrow-image.webp" alt="Icons" />
                </div>
                <div class="swiper-slide thumb_slide">
                    <img src="web-assets/images/banner/arrow-image2.webp" alt="Icons" />
                </div>
            </div>
        </div>
    </section>

    <!--========== Slider Section End ==============-->

    <!--========== Tabs Section Start ==============-->
    {{-- <section class="tj-tabs-section-two d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-tabs slider-tabs-two">
                        <div class="tj-input-form" data-bg-image="web-assets/images/banner/form-shape.png">
                            @include('site.partials.multiform')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--========== Tabs Section End ==============-->

    <!--========== Service Section Start ==============-->
    <section class="tj-service-section-three">
        <div class="container">
            <div class="row">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape"> What We Do</span>
                    <h2 class="title">Vehicle & Freight Transportation Services</h2>
                </div>
            </div>
            <div class="row">
            @foreach ($services as $row)
                <div class="col-lg-6 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                    <div class="service-item-two d-flex justify-content-between">
                        <div class="service-image">
                            <img src="{{ asset($row->image_one) }}" alt="Image" />
                        </div>
                        <div class="service-text">
                            <div class="services-icon">
                                <i class="flaticon-delivery-van"></i>
                            </div>
                            <h4 class="service-title"><a href="{{ route('services.show.detail', $row->slug) }}">{{ $row->title }}</a></h4>
                            <p class="des">
                                {{ \Illuminate\Support\Str::words(strip_tags($row->description_one), 10, '...') }}
                            </p>
                            <div class="tj-theme-button">
                                <a class="tj-transparent-btn-two" href="{{ route('services.show.detail', $row->slug) }}"
                                    >Read More <i class="flaticon-right-1"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
                <!-- View All Button Row -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('all_services.index') }}" class="tj-primary-btn">
                        View All Services <i class="flaticon-right-1"></i>
                    </a>
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
                        <p>We guarantee secure and on-time delivery, facilitating the smooth operation of your company. Our committed staff is committed to provide dependable transportation solutions that are customized to your particular company requirements, guaranteeing effectiveness at every stage. We ensure that your shipment arrive on schedule and in great condition by using cutting-edge tracking technologies, expert handling, and a dedication to safety. By selecting us, you acquire a reliable partner and provides you with the assurance to go beyond any boundaries.</p>
                        <div class="tj-theme-button">
                            <a class="tj-primary-btn tj-transparent-btn" href="{{ route('contact') }}">
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
                                    <div class="tj-count"><span class="odometer" data-count="25767">0</span></div>
                                    <span class="sub-title">Vehicles Delivered</span>
                                </div>
                            </li>
                            <li>
                                <div class="counter-number">
                                    <div class="tj-count"><span class="odometer" data-count="23574">0</span></div>
                                    <span class="sub-title">Satisfied Customers</span>
                                </div>
                            </li>
                            <li>
                                <div class="counter-number">
                                    <div class="tj-count"><span class="odometer" data-count="25503770">0</span></div>
                                    <span class="sub-title">Miles Covered</span>
                                </div>
                            </li>
                            <li>
                                <div class="counter-number">
                                    <div class="tj-count"><span class="odometer" data-count="10+">0</span></div>
                                    <span class="sub-title">Years of Experiences</span>
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
                                We are the one stop solution in vehicle transport—specializing in shipping everything from cars
                                and heavy equipment to ATVs, construction vehicles, trucks, and even boats.
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
                                <p class="desc">To provide safe, reliable, and hassle-free transport solutions and
                                    delivering every shipment on time, with care, and backed by exceptional customer
                                    service.</p>
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
                                <p class="desc">To be the nation’s most trusted transport company, setting the
                                    standard for nationwide shipping , driven by innovation, transparency, and customer
                                    care.</p>
                            </div>
                        </div>
                        <div class="tj-theme-button">
                            <a class="tj-primary-btn" href="{{ route('about') }}">
                                Learn More <i class="flaticon-right-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                    <div class="about_image text-end">
                        <img src="web-assets/images/about/sec.png" alt="About Us Image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== About Section End =========-->

    <section class="tj-cta-section-two">
        <div class="tj_cta_image sal-animate" data-sal="slide-right" data-sal-duration="800" data-sal-delay="100"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 sal-animate" data-sal="slide-right" data-sal-duration="800"
                    data-sal-delay="100">
                    <div class="tj-cta-content">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape2"> Here We Are</span>
                            <h2 class="title fs-4">Get Any Type of Quote for Your Shipping Needs</h2>
                        </div>
                        <div class="tj-theme-button">
                            <a class="tj-transparent-btn" href="{{ route('multiform') }}">
                                Get Quote <i class="flaticon-right-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--========== FAQ Section Start ==============-->
    <section class="tj-faq-section pt-5">
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
                            <img src="web-assets/images/slider/slid-4.webp" alt="FAQ Visual" />
                        </div>
                        <div class="faq-content">
                            <div class="faq-icon"><i class="fa-regular fa-check"></i></div>
                            <div class="faq-text">
                                <h6 class="title">Reliable & Transparent</h6>
                                <p>We partner exclusively with fully licensed carriers no middlemen, no hidden charges providing you with complete transparency and peace of mind at every step.</p>
                            </div>
                        </div>
                        <div class="faq-content">
                            <div class="faq-icon"><i class="fa-regular fa-check"></i></div>
                            <div class="faq-text">
                                <h6 class="title">Comprehensive Coverage</h6>
                                <p>Every transport quote includes full insurance coverage, so your vehicle is protected
                                    throughout the journey.</p>
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        What types of services does Bridgeway Logistics LLC offer?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" style="visibility: visible !important;"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Bridgeway offers reliable vehicle transport across the U.S., including sedans, SUVs,
                                        motorcycles, heavy equipment, boats, and more, all with competitive pricing and
                                        smooth communication.
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
                                <div id="collapseTwo" class="accordion-collapse collapse" style="visibility: visible !important;" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        You can easily reach them via phone at +1 (713) 470‑6157 or via email at <a
                                            href="mailto:quote@bridgewaylogisticsllc.com">quote@bridgewaylogisticsllc.com</a>.
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Are there any extra fees I should know about?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" style="visibility: visible !important;"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        While quotes typically include coverage and standard charges, final pricing may vary
                                        depending on distance and unique circumstances. Bridgeway prides itself on
                                        transparent communication throughout the process.
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ 4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        What payment options are available?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" style="visibility: visible !important;" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Bridgeway supports multiple payment methods including credit/debit cards, bank
                                        transfers, and major digital platforms for your convenience.
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ 5 -->
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        How often are raises provided for employees?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" style="visibility: visible !important;" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        According to employee feedback, raises are typically offered on a quarterly basis
                                        for delivery staff.
                                    </div>
                                </div>
                            </div> --}}
                            <!-- FAQ 6 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false"
                                        aria-controls="collapseSix">
                                        Will I have to pay anything up-front?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" style="visibility: visible !important;" aria-labelledby="headingSix"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        There is no initial deposit. The driver is only paid the sum of money you pay after the delivery of your vehicle.
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
                <div class="project-image" data-bg-image="web-assets/images/project/1.png"></div>
                <a class="arrow-btn" href="https://bridgewaylogisticsllc.com/blog/open-auto-transport-with-bridgeway-logistics-llc"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">Service Type</span>
                    <h6><a class="title-link" href="https://bridgewaylogisticsllc.com/blog/open-auto-transport-with-bridgeway-logistics-llc">Open Transport</a></h6>
                </div>
            </div>
            <div class="project-item-three">
                <div class="project-image" data-bg-image="web-assets/images/project/2.png"></div>
                <a class="arrow-btn" href="https://bridgewaylogisticsllc.com/blog/enclosed-car-transport-with-bridgeway-logistics-llc"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">Service Type</span>
                    <h6><a class="title-link" href="https://bridgewaylogisticsllc.com/blog/enclosed-car-transport-with-bridgeway-logistics-llc">Enclosed Transport</a></h6>
                </div>
            </div>
            <div class="project-item-three">
                <div class="project-image" data-bg-image="web-assets/images/project/3.png"></div>
                <a class="arrow-btn" href="https://bridgewaylogisticsllc.com/blog/tow-away-transport-by-bridgeway-logistics-llc"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">Service Type</span>
                    <h6><a class="title-link" href="https://bridgewaylogisticsllc.com/blog/tow-away-transport-by-bridgeway-logistics-llc">Tow Away Service</a></h6>
                </div>
            </div>
            <div class="project-item-three">
                <div class="project-image" data-bg-image="web-assets/images/project/4.png"></div>
                <a class="arrow-btn" href="https://bridgewaylogisticsllc.com/blog/drive-away-transportation-service-with-bridgeway-logistics-llc"> <i class="flaticon-right-1"></i> </a>
                <div class="project-text">
                    <span class="sub-title">Service Type</span>
                    <h6><a class="title-link" href="https://bridgewaylogisticsllc.com/blog/drive-away-transportation-service-with-bridgeway-logistics-llc">Driveaway Service</a></h6>
                </div>
            </div>
        </div>
    </section>
    <!--========== Project Section End ==============-->

    <!--=========== Testimonial Section Start =========-->
    <section class="tj-testimonial-section tj-testimonial-page">
        @include('site.partials.testimonial')
    </section>
    <!--=========== Testimonial Section End =========-->

    <!--========== Choose Section Start ==============-->
    <section class="tj-choose-us-section-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="choose-us-top-content">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape2"> Why Partner With Us?</span>
                            <h2 class="title">Reasons Why You Choose Bridgeway Logistics LLC</h2>
                        </div>
                        <div class="tj-theme-button">
                            <a class="tj-transparent-btn" href="{{ route('contact') }}">
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
                            Our team has years of expertise in handling complex transport and freight operations
                            efficiently.
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
                            From open transport to heavy equipment shipping, we offer a full range of tailored logistics
                            services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== Choose Section End ==============-->

    <!--=========== Map Section Start =========-->
    <section class="tj-map-section">
        <div class="google-map">
            <iframe
                src="https://www.google.com/maps?q=5402+Renwick+Dr+Apt+902,+Houston,+TX+77081&hl=en&z=15&output=embed"
                style="border:0; width:100%; height:300px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            >
            </iframe>
        </div>
        {{-- <div class="tj-map-tabs" data-bg-image="assets/images/banner/form-shape2.png">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h4 class="accordion-header" id="headingOne">
                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                        >
                            London Office
                        </button>
                    </h4>
                    <div
                        id="collapseOne"
                        class="accordion-collapse collapse show"
                        aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample"
                        style=""
                    >
                        <div class="accordion-body">
                            <ul class="list-gap">
                                <li><i class="flaticon-placeholder"></i><span> Commercial Road, London</span></li>
                                <li>
                                    <i class="flaticon-mail"></i
                                    ><a href="mailto:subai2025@gmail.com"> subai2025@gmail.com</a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i
                                    ><a href="tel:+92(8800)-987025"> +92 (8800) - 9870 25</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                        >
                            Australia Office
                        </button>
                    </h2>
                    <div
                        id="collapseTwo"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body">
                            <ul class="list-gap">
                                <li><i class="flaticon-placeholder"></i><span> Commercial Road ,London</span></li>
                                <li>
                                    <i class="flaticon-mail"></i
                                    ><a href="mailto:subai2025@gmail.com"> subai2025@gmail.com</a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i
                                    ><a href="tel:+92(8800)-987025"> +92 (8800) - 9870 25</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseThree"
                            aria-expanded="false"
                            aria-controls="collapseThree"
                        >
                            Canada office
                        </button>
                    </h2>
                    <div
                        id="collapseThree"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body">
                            <ul class="list-gap">
                                <li><i class="flaticon-placeholder"></i><span> Commercial Road ,London</span></li>
                                <li>
                                    <i class="flaticon-mail"></i
                                    ><a href="mailto:subai2025@gmail.com"> subai2025@gmail.com</a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i
                                    ><a href="tel:+92(8800)-987025"> +92 (8800) - 9870 25</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!--=========== Map Section End =========-->

    <!--=========== Blog Section Start =========-->
    <section class="tj-blog-section-three">
        <div class="container">
            <div class="row">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape"> Latest Blogs</span>
                    <h2 class="title">Insights & Industry Updates</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <img src="{{ asset($blog->image_one) }}" alt="Blog" class="blog-img img-fluid w-100" style="height:250px; object-fit:cover;" />
                                </a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>{{ $blog->created_at ? $blog->created_at->format('d') : '-' }}</li>
                                            <li>{{ $blog->created_at ? $blog->created_at->format('M') : '-' }}</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li>
                                                <i class="fa-light fa-user"></i>
                                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->author }}</a>
                                            </li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="{{ route('blog.show', $blog->slug) }}">
                                                {!! Str::limit(strip_tags( $blog->title ), 20, '...') !!}
                                            </a>
                                        </h4>
                                        <p>{!! Str::limit(strip_tags($blog->description_one), 70, '...') !!}</p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="{{ route('blog.show', $blog->slug) }}">
                                                    Read More <i class="fa-regular fa-arrow-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=========== Blog Section End =========-->
    <!-- Promo Modal -->
    <div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 rounded-4 shadow-lg text-center" style="background: #fff; padding: 2rem;">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body d-flex flex-column align-items-center justify-content-center">
                <img src="web-assets/images/logo/1-logo.png" alt="Bridgeway Logistics" class="img-fluid mb-3" style="max-width: 120px;">
                <h2 class="h5 fw-bold mb-2">🚚 Special Discount Alert!</h2>
                <p class="mb-3 text-muted">
                Enjoy <strong>UP TO 30% OFF</strong> on your first shipment with Bridgeway Logistics LLC.<br>
                Reliable, fast, and cost-effective shipping across the U.S.
                </p>
                <div class="tj-theme-button">
                    <a class="tj-transparent-btn" href="{{ route('multiform') }}">
                        Get Quote <i class="flaticon-right-1"></i>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Auto-show script -->
    <script>
    window.addEventListener('load', () => {
        setTimeout(() => {
        const promoModal = new bootstrap.Modal(document.getElementById('promoModal'));
        promoModal.show();
        }, 3000); // show after 3 seconds
    });
    </script>

    <style>
    /* Remove modal background overlay */
    .modal-backdrop.show {
        opacity: 0 !important;
    }

    /* Center everything & add slight background blur */
    .modal-content {
        backdrop-filter: blur(10px);
    }

    /* Disable scroll jump effect */
    body.modal-open {
        padding-right: 0 !important;
    }
    </style>
@endsection