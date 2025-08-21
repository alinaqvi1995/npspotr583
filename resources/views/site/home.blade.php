@extends('layouts.guest')

@section('title', 'Home')
@section('meta_description', 'Explore our SaaS solutions tailored to your business.')
@section('meta_keywords', 'SaaS, services, business software')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--========== Slider Section Start ==============-->
    <section class="tj-slider-section-three">
        <div class="slider_shape2"><img src="web-assets/images/banner/shape-2.png" alt="Image" /></div>
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
                                        <a class="tj-transparent-btn" href="contact.html">
                                            Read More <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 py-5 my-5">
                                <div class="slider-tabs slider-tabs-two d-none d-lg-block"> 
                                    <div
                                        class="tj-input-form"
                                        data-bg-image="web-assets/images/banner/form-shape.png">
                                        @include('site.partials.multiform')
                                    </div>
                                </div>
                            </div>
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
                                        <a class="tj-transparent-btn" href="#">
                                            Read More <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                {{-- <div class="slider-tabs slider-tabs-two d-none d-lg-block"> 
                                    <div  class="tj-input-form"
                                        data-bg-image="web-assets/images/banner/form-shape.png">
                                        @include('site.partials.multiform')
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide tj-bg-layer" data-bg-image="web-assets/images/slider/slider-2.webp">
                    <div class="slide-image sc-image-layer"></div>
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
                                    <h1 class="slider-title">Fast, Reliable and All-Rounder Transport Company</h1>
                                    <div class="tj-theme-button">
                                        <a class="tj-transparent-btn" href="#">
                                            Read More <i class="flaticon-right-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                {{-- <div class="slider-tabs slider-tabs-two d-none d-lg-block"> 
                                    <div  class="tj-input-form" data-bg-image="web-assets/images/banner/form-shape.png">
                                        @include('site.partials.multiform')
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <section class="tj-tabs-section-two d-lg-none">
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
                                <h4><a class="title" href="{{ route('services.car-shipping') }}">Car Transport Service</a></h4>
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
                                <h4><a class="title" href="{{ route('services.heavy-equipment-shipping') }}">Heavy Equipment Services</a></h4>
                                <p>Expert transport solutions for construction, farming, and commercial heavy equipment.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Motorcycle Transport Service -->
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                        <div class="service-item-three">
                            <div class="service-image">
                                <img src="web-assets/images/service/service-10.jpg" alt="Motorcycle Transport Service" />
                            </div>
                            <div class="service-content">
                                <div class="service-icon">
                                    <i class="flaticon-air-freight"></i>
                                </div>
                                <h4><a class="title" href="{{ route('services.motorcycle-shipping') }}">Motorcycle Transport Service</a></h4>
                                <p>Safe and reliable motorcycle transportation tailored to your schedule and destination safely.</p>
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
                        <img src="web-assets/images/about/benefits.webp" alt="About Us Image" />
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
            <div class="col-lg-12 col-md-12 sal-animate" data-sal="slide-right" data-sal-duration="800" data-sal-delay="100">
                <div class="tj-cta-content">
                    <div class="tj-section-heading">
                        <span class="sub-title active-shape2"> Here We Are</span>
                        <h2 class="title fs-4">Get Any Type of Quote for Your Shipping Needs</h2>
                    </div>
                    <div class="tj-theme-button">
                        <a class="tj-transparent-btn" href="#">
                            Get Quote<i class="flaticon-right-1"></i>
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
                    <p>We work only with licensed carriers—no brokers, no hidden fees—ensuring clarity and peace of mind.</p>
                    </div>
                </div>
                <div class="faq-content">
                    <div class="faq-icon"><i class="fa-regular fa-check"></i></div>
                    <div class="faq-text">
                    <h6 class="title">Comprehensive Coverage</h6>
                    <p>Every transport quote includes full insurance coverage, so your vehicle is protected throughout the journey.</p>
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
                        Bridgeway offers reliable vehicle transport across the U.S., including sedans, SUVs, motorcycles, heavy equipment, boats, and more, all with competitive pricing and smooth communication.
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
                        You can easily reach them via phone at +1 (713) 470‑6157 or via email at <a href="mailto:quote@bridgewaylogisticsllc.com">quote@bridgewaylogisticsllc.com</a>.
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
                        While quotes typically include coverage and standard charges, final pricing may vary depending on distance and unique circumstances. Bridgeway prides itself on transparent communication throughout the process.
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
                        Bridgeway supports multiple payment methods including credit/debit cards, bank transfers, and major digital platforms for your convenience.
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
                        According to employee feedback, raises are typically offered on a quarterly basis for delivery staff.
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
                            <a href="{{ route('blog.show') }}"><img src="web-assets/images/blog/blog-5.jpg" alt="Blog" /></a>
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
                                        <a class="title-link" href="{{ route('blog.show') }}">
                                            Top 5 Tips for Efficient Vehicle Transport</a>
                                    </h4>
                                </div>
                                <div class="blog-button">
                                    <ul class="list-gap">
                                        <li>
                                            <a href="{{ route('blog.show') }}">
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
                            <a href="{{ route('blog.show') }}"><img src="web-assets/images/blog/blog-6.jpg" alt="Blog" /></a>
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
                                        <a class="title-link" href="{{ route('blog.show') }}">
                                            Understanding Enclosed vs Open Auto Transport</a>
                                    </h4>
                                </div>
                                <div class="blog-button">
                                    <ul class="list-gap">
                                        <li>
                                            <a href="{{ route('blog.show') }}">
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
                            <a href="{{ route('blog.show') }}"><img src="web-assets/images/blog/blog-7.jpg" alt="Blog" /></a>
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
                                        <a class="title-link" href="{{ route('blog.show') }}">
                                            How to Prepare Your Vehicle for Transport</a>
                                    </h4>
                                </div>
                                <div class="blog-button">
                                    <ul class="list-gap">
                                        <li>
                                            <a href="{{ route('blog.show') }}">
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