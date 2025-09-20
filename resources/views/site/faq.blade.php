@extends('layouts.guest')

@section('title', 'FAQ')

@section('content')

        <!--========== breadcrumb Start ==============-->
        <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h1 class="breadcrumb-title text-center">FAQ</h1>
                            <div class="breadcrumb-link">
                                <span>
                                    <a href="#">
                                        <span>Home</span>
                                    </a>
                                </span>
                                >
                                <span>
                                    <span> FAQ</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--========== breadcrumb End ==============-->

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
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What types of services does Bridgeway Logistics LLC offer?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" style="visibility: visible !important;" data-bs-parent="#accordionExample">
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
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    style="visibility: visible !important;" data-bs-parent="#accordionExample">
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
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" style="visibility: visible !important;" data-bs-parent="#accordionExample">
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
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    style="visibility: visible !important;" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Bridgeway supports multiple payment methods including credit/debit cards, bank
                                        transfers, and major digital platforms for your convenience.
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ 5 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        How often are raises provided for employees?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    style="visibility: visible !important;" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        According to employee feedback, raises are typically offered on a quarterly basis
                                        for delivery staff.
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


@endsection