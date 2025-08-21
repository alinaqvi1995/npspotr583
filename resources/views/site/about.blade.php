@extends('layouts.guest')

@section('title', 'About Us - Service Site')
@section('meta_description', 'Learn more about our SaaS team, vision, and what we offer.')
@section('meta_keywords', 'about saas, our team, company info')

@section('content')

    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">About Us</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="{{ route('home') }}">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> About</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== breadcrumb End ==============-->

    <!--=========== About Section Start =========-->
    <section class="tj-about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-sal="slide-left" data-sal-duration="800">
                    <div class="about-content-one">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape"> Transportation Company</span>
                            <h2 class="title">We Provide Full Range Global Logistics</h2>
                            <p class="desc">
                                Quisque dignissim enim diam, eget pulvinar ex viverra id. Nulla a lobortis lectus,
                                id volutpat magna. Morbi consequat porttitor fermentum. Nulla vestibulum tincidunt
                                viverra. Vestibulum accumsan
                            </p>
                        </div>
                        <div class="tj-icon-box">
                            <div class="ab-text d-flex align-items-center">
                                <div class="ab-icon">
                                    <img src="web-assets/images/icon/global.svg" alt="Icon" />
                                </div>
                                <div class="ab-title">
                                    <h5 class="title">Worldwide Service</h5>
                                </div>
                            </div>
                            <p class="desc">
                                Lorem ipsum is simply velit anod<br />
                                ipas aliquet enean quis.
                            </p>
                        </div>
                        <div class="tj-icon-box">
                            <div class="ab-text d-flex align-items-center">
                                <div class="ab-icon">
                                    <img src="web-assets/images/icon/winner.svg" alt="Icon" />
                                </div>
                                <div class="ab-title">
                                    <h5 class="title">Certified & Awward Winner</h5>
                                </div>
                            </div>
                            <p class="desc">
                                Lorem ipsum is simply velit anod<br />
                                ipas aliquet enean quis.
                            </p>
                        </div>
                        <div class="ab-button-box d-flex align-items-center">
                            <div class="tj-theme-btn">
                                <a class="tj-primary-btn" href="contact.html">
                                    Read More <i class="flaticon-right-1"></i>
                                </a>
                            </div>
                            <div class="right-text">
                                <img src="web-assets/images/icon/auother.svg" alt="Image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                    <div class="about-group-image d-flex flex-wrap align-items-start flex-column">
                        <div class="tj-icon-box2 text-center">
                            <div class="number-icon">
                                <i class="flaticon-in-person"></i>
                            </div>
                            <div class="about-number">
                                <div class="tj-count"><span class="odometer" data-count="1700">0</span></div>
                                <p class="desc">Satisfied Client</p>
                            </div>
                        </div>
                        <div class="image-box">
                            <img class="p-z-idex" src="web-assets/images/about/ab-1.jpg" alt="Image" />
                        </div>
                        <img class="group-1 p-z-idex" src="web-assets/images/about/ab-2.jpg" alt="Image" />
                        <img class="group-shape" src="web-assets/images/about/ab-shape.png" alt="Image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== About Section End =========-->

    <!--=========== Cta Section Start =========-->
    <section class="tj-cta-section icon-animate">
        <div class="cta-inner" data-bg-image="web-assets/images/cta/cta-1.jpg"></div>
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
                                <p class="desc">Dapibus interdum senectus malesuada est nec morbi cursus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <div class="tj-theme-button">
                        <a class="tj-transparent-btn" href="contact.html">
                            Read More <i class="flaticon-right-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Cta Section End =========-->

    <!--========== Team Section Start ==============-->
    <section class="tj-team-section-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-section-heading text-center">
                        <span class="sub-title active-shape"> Our Services</span>
                        <h2 class="title">What We Offer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                    <div class="team-item-three">
                        <img src="web-assets/images/team/team-4.jpg" alt="Car Shipping" />
                        <div class="arrow-icon">
                            <ul class="team-social list-gap">
                                <li class="social-active">
                                    <i class="flaticon-plus"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="tj-project-content">
                            <span class="sub-title"> Premium Service</span>
                            <h4><a href="service-details.html" class="title-link">Car Shipping</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                    <div class="team-item-three">
                        <img src="web-assets/images/team/team-5.jpg" alt="Motorcycle Shipping" />
                        <div class="arrow-icon">
                            <ul class="team-social list-gap">
                                <li class="social-active">
                                    <i class="flaticon-plus"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="tj-project-content">
                            <span class="sub-title"> Fast & Secure</span>
                            <h4><a href="service-details.html" class="title-link">Motorcycle Shipping</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                    <div class="team-item-three">
                        <img src="web-assets/images/team/team-6.jpg" alt="Heavy Equipment Shipping" />
                        <div class="arrow-icon">
                            <ul class="team-social list-gap">
                                <li class="social-active">
                                    <i class="flaticon-plus"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="tj-project-content">
                            <span class="sub-title"> Reliable Handling</span>
                            <h4><a href="service-details.html" class="title-link w-100 px-4">Heavy Equipment Shipping</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== Team Section End ==============-->

    <!--=========== Testimonial Section Start =========-->
    <section class="tj-testimonial-section tj-testimonial-page">
        @include('site.partials.testimonial')
    </section>
    <!--=========== Testimonial Section End =========-->

    <!--========== Faq Section Start ==============-->
    <section class="tj-faq-section tj-faq-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-section-heading text-center">
                        <span class="sub-title active-shape"> How It’s Work</span>
                        <h2 class="title">Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6" data-sal="slide-left" data-sal-duration="800">
                    <div class="tj-faq-left-content">
                        <div class="faq-image">
                            <img src="web-assets/images/slider/slider-4.jpg" alt="Image" />
                        </div>
                        <div class="faq-content">
                            <div class="faq-icon">
                                <i class="fa-regular fa-check"></i>
                            </div>
                            <div class="faq-text">
                                <h6 class="title">Reliable & Trustworthy</h6>
                                <p>Trage agile frameworks to provide a robust synopsis for high level overviews.</p>
                            </div>
                        </div>
                        <div class="faq-content">
                            <div class="faq-icon">
                                <i class="fa-regular fa-check"></i>
                            </div>
                            <div class="faq-text">
                                <h6 class="title">High Quality Material</h6>
                                <p>Trage agile frameworks to provide a robust synopsis for high level overviews.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                    <div class="tj-faq-area">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button
                                        class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-expanded="true"
                                        aria-controls="collapseOne"
                                    >
                                        Is My Technology Allowed on Tech?
                                    </button>
                                </h2>
                                <div
                                    id="collapseOne"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample"
                                >
                                    <div class="accordion-body">
                                        <strong
                                            >There are many variations of passages of available but the Ut elit
                                            tellus luctus nec ullamcorper at mattis</strong
                                        >
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
                                        How Long Does air Freight Take?
                                    </button>
                                </h2>
                                <div
                                    id="collapseTwo"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample"
                                >
                                    <div class="accordion-body">
                                        <strong
                                            >There are many variations of passages of available but the Ut elit
                                            tellus luctus nec ullamcorper at mattis</strong
                                        >
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
                                        What Payment Methods are Supported?
                                    </button>
                                </h2>
                                <div
                                    id="collapseThree"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample"
                                >
                                    <div class="accordion-body">
                                        <strong
                                            >There are many variations of passages of available but the Ut elit
                                            tellus luctus nec ullamcorper at mattis</strong
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour"
                                        aria-expanded="false"
                                        aria-controls="collapseFour"
                                    >
                                        Methods are Supported What Payment?
                                    </button>
                                </h2>
                                <div
                                    id="collapseFour"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample"
                                >
                                    <div class="accordion-body">
                                        <strong
                                            >There are many variations of passages of available but the Ut elit
                                            tellus luctus nec ullamcorper at mattis</strong
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive"
                                        aria-expanded="false"
                                        aria-controls="collapseFive"
                                    >
                                        Methods are Supported What Payment?
                                    </button>
                                </h2>
                                <div
                                    id="collapseFive"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingFive"
                                    data-bs-parent="#accordionExample"
                                >
                                    <div class="accordion-body">
                                        <strong
                                            >There are many variations of passages of available but the Ut elit
                                            tellus luctus nec ullamcorper at mattis</strong
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== Faq Section End ==============-->
@endsection