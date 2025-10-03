@extends('layouts.guest')

@section('title', 'Open Transport – Bridgeway Logistics LLC')
@section('meta_description', 'Affordable and reliable open transport services by Bridgeway Logistics LLC for cars, trucks, and vehicles across the USA.')
@section('meta_keywords', 'open transport, car shipping, auto transport USA, vehicle logistics, Bridgeway Logistics')

@section('content')

    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/page_start.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Open Transport</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="{{ route('home') }}">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> Open Transport</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== breadcrumb End ==============-->

    <!--=========== About Section Start =========-->
    <section class="tj-about-section-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-sal="slide-left" data-sal-duration="800">
                    <div class="about-content-three">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape">Affordable Nationwide Car Shipping</span>
                            <h2 class="title">Open Transport Service</h2>
                            <p class="desc">
                                Open transport is the most cost-effective way to ship your car. Using multi-vehicle carriers, we ensure quick, safe, and affordable delivery across the USA.
                            </p>
                        </div>
                        <div class="content-box d-flex align-items-center">
                            <div class="tj-icon-box">
                                <div class="ab-text d-flex align-items-center">
                                    <div class="ab-icon"><img src="web-assets/images/icon/global.svg" alt="Reliable Service" /></div>
                                    <div class="ab-title"><h5 class="title">Reliable Service</h5></div>
                                </div>
                                <p class="desc">Your vehicle is transported securely with regular updates along the way.</p>
                            </div>
                            <div class="tj-icon-box">
                                <div class="ab-text d-flex align-items-center">
                                    <div class="ab-icon"><img src="web-assets/images/icon/winner.svg" alt="Affordable Rates" /></div>
                                    <div class="ab-title"><h5 class="title">Affordable Rates</h5></div>
                                </div>
                                <p class="desc">Enjoy budget-friendly transport without compromising on safety or speed.</p>
                            </div>
                        </div>
                        <div class="tj-theme-button">
                            <a class="tj-primary-btn" href="{{ route('contact') }}">
                                Get a Quote <i class="flaticon-right-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                    <div class="about_image text-end">
                        <img src="web-assets/images/about/sec.png" alt="Open Transport" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== About Section End =========-->

    <!--=========== Cta Section Start =========-->
    <section class="tj-cta-section icon-animate">
        <div class="cta-inner" data-bg-image="web-assets/images/cta/gi.png"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="cta-content-area">
                        <div class="cta-content">
                            <div class="cta-icon">
                                <i class="flaticon flaticon-freight"></i>
                            </div>
                            <div class="cta-text">
                                <h3 class="title">Would you Like to get The Best Transport Services?</h3>
                                <p class="desc">Bridgeway logistics LLC ensure safe and timely delivery every time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <div class="tj-theme-button">
                        <a class="tj-transparent-btn" href="{{ route('multiform') }}">
                            Get Quote <i class="flaticon-right-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Cta Section End =========-->

    <section class="tj-service-section-four">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-section-heading text-center">
                        <span class="sub-title active-shape"> What We Do</span>
                        <h2 class="title"> Auto Transportation Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $row)
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <a href="{{ route('services.show.detail', $row->slug) }}">
                        <div class="service-item-three h-100">
                            <div class="service-image">
                                <img src="{{ asset($row->image_one) }}" 
                                    alt="Image" 
                                    class="img-fluid w-100" 
                                    style="height:250px; object-fit:cover;" />
                            </div>
                            <div class="service-content">
                                <div class="service-icon">
                                    <i class="flaticon-air-freight"></i>
                                </div>
                                <h4>
                                    <a class="title" href="{{ route('services.show.detail', $row->slug) }}">
                                        {{ $row->title }}
                                    </a>
                                </h4>
                                <p>{{ \Illuminate\Support\Str::words(strip_tags($row->description_one), 10, '...') }}</p>
                            </div>
                        </div>
                        </a>
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
      <!--=========== Feature Section Start =========-->
    <section class="tj-choose-us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5" data-sal="slide-left" data-sal-duration="800">
                    <div class="choose-us-content-1">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape2"> Why Choose Us</span>
                            <h2 class="title">We are the Future of Auto Transport</h2>
                            <p class="desc">
                                Safe & Secure Shipping Your Shipment is handled with the utmost care from
                                pick-up to delivery.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-6">
                                <div class="tj-icon-box3 text-center">
                                    <i class="flaticon flaticon-courier"></i>
                                    <h6 class="title">Optimized Cost</h6>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-6">
                                <div class="tj-icon-box3 text-center">
                                    <i class="flaticon flaticon-cargo"></i>
                                    <h6 class="title">Delivery on Time</h6>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-6">
                                <div class="tj-icon-box3 text-center">
                                    <i class="flaticon flaticon-agreement"></i>
                                    <h6 class="title">Safety & Reliability</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-sal="slide-right" data-sal-duration="800">
                    <div class="tj-input-form trq-1" data-bg-image="web-assets/images/banner/form-shape.png">
                        <div id="make-options" class="d-none">
                            @foreach ($makes as $make)
                                <option value="{{ $make }}">{{ $make }}</option>
                            @endforeach
                        </div>
                        @include('site.partials.multiform')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Feature Section End =========-->  
    <section class="tj-team-details pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="team-details-image">
                        <img src="{{ asset('web-assets/images/team/aloo.png') }}" alt="Team" />
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="team-sidebar-inner">
                        <h4 class="title">Bridgeway Logistics LLC</h4>
                        <span>Reliable Transport & Logistics Solutions</span>
                        <p>
                            At Bridgeway Logistics, we specialize in providing seamless and cost-effective 
                            transport solutions tailored to your needs. With years of industry expertise, 
                            we are committed to ensuring timely deliveries, secure handling, and 
                            customer-focused services that help businesses and individuals move forward 
                            with confidence.
                        </p>
                        <h5 class="title">Our mission is to deliver with trust, efficiency, and excellence.</h5>
                        <div class="team-check d-flex align-items-center">
                            <ul class="list-gap">
                                <li><i class="fa-light fa-check"></i> Dependable Transport Services</li>
                                <li><i class="fa-light fa-check"></i> On-Time Deliveries</li>
                            </ul>
                            <ul class="list-gap">
                                <li><i class="fa-light fa-check"></i> Secure & Safe Handling</li>
                                <li><i class="fa-light fa-check"></i> Customer-Centric Approach</li>
                            </ul>
                        </div>
                        <div class="tj-team-progress-bar">
                            <label>Successful Deliveries</label>
                            <div class="progress-bars">
                                <div class="bar" data-size="100">
                                    <span class="perc"></span>
                                </div>
                            </div>
                            <label>Client Satisfaction</label>
                            <div class="progress-bars">
                                <div class="bar" data-size="98">
                                    <span class="perc"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Testimonial Section Start =========-->
        <section class="tj-testimonial-section tj-testimonial-page">
            @include('site.partials.testimonial')
        </section>
    <!--=========== Testimonial Section End =========-->

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
    <!--=========== Blog Section Start =========-->
    {{-- <section class="tj-blog-section-three">
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
                                    <img src="{{ asset($blog->image_one) }}" alt="Blog" class="blog-img" />
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
                                                {{ $blog->title }}
                                            </a>
                                        </h4>
                                        <p>{!! Str::limit(strip_tags($blog->description_one), 100, '...') !!}</p>
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
    </section> --}}
<!--=========== Blog Section End =========-->
@endsection
