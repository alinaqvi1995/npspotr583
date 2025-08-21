@extends('layouts.guest')
@section('title', 'Home')
@section('content')

<!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Service Details</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="#">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> Service</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--========== breadcrumb End ==============-->

<!--========== blog details Start ==============-->
    <section class="tj-service-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-details-wrapper service-details-wrapper">
                        <div class="tj-blog-item-three">
                            <div class="tj-blog-image">
                                <a href="service-details.html">
                                    <img src="{{ asset('web-assets/images/service/service-11.jpg') }}" alt="Blog"
                                /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-header">
                                    <h3>
                                        <a class="title-link" href="service-details.html"> Road Transport</a>
                                    </h3>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui
                                dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta
                                sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit
                                amet finibus eros. Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the ndustry standard dummy text ever since the 1500s,
                                when an unknown printer took a galley
                            </p>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <div class="check-image">
                                    <img src="{{ asset('web-assets/images/blog/blog-12.jpg') }}" alt="Blog" />
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="check-list">
                                    <h5 class="title">Logistics Around the World</h5>
                                    <ul class="list-gap">
                                        <li>
                                            <i class="fa-light fa-check"></i> Those who do not know how to pursue
                                        </li>
                                        <li><i class="fa-light fa-check"></i> Pleasure rationally encounter</li>
                                        <li>
                                            <i class="fa-light fa-check"></i> Consequences that are extremely
                                            painful.
                                        </li>
                                        <li>
                                            <i class="fa-light fa-check"></i> Nor again is there anyone who loves or
                                            pursues
                                        </li>
                                        <li><i class="fa-light fa-check"></i> Service Guarantee</li>
                                        <li><i class="fa-light fa-check"></i> Excellence in Healthcare every</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="details-video-content">
                            <h4 class="title">Communicate With Us</h4>
                            <p>
                                Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui
                                dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta
                                sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit
                                amet finibus eros. Lorem Ipsum
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="sevice-image">
                                        <img src="{{ asset('web-assets/images/service/service-13.jpg') }}" alt="Image" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="sevice-image">
                                        <img src="{{ asset('web-assets/images/service/service-14.jpg') }}" alt="Image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
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
                                                        >There are many variations of passages of available but the
                                                        Ut elit tellus luctus nec ullamcorper at mattis</strong
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
                                                        >There are many variations of passages of available but the
                                                        Ut elit tellus luctus nec ullamcorper at mattis</strong
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
                                                        >There are many variations of passages of available but the
                                                        Ut elit tellus luctus nec ullamcorper at mattis</strong
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
                                                        >There are many variations of passages of available but the
                                                        Ut elit tellus luctus nec ullamcorper at mattis</strong
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
                                                        >There are many variations of passages of available but the
                                                        Ut elit tellus luctus nec ullamcorper at mattis</strong
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details-sidebar-inner">
                        <div class="tj-sidebar-widget sidebar-search">
                            <form action="#">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="search"
                                    id="search"
                                    placeholder="Search"
                                />
                                <i class="flaticon-loupe"></i>
                            </form>
                        </div>
                        <div class="tj-sidebar-widget sidebar-service">
                            <h5 class="details_title">Logistics Services</h5>
                            <ul class="list-gap">
                                <li>
                                    <a href="#"
                                        >Land Transport
                                        <i class="flaticon-right-chevron"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        >Ocean Transport
                                        <i class="flaticon-right-chevron"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        >Road Transport
                                        <i class="flaticon-right-chevron"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        >Train Transportation
                                        <i class="flaticon-right-chevron"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        >Vegetative Roofing
                                        <i class="flaticon-right-chevron"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        >Air Freight Service
                                        <i class="flaticon-right-chevron"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tj-sidebar-widget sidebar-documents">
                            <h5 class="details_title">Documents</h5>
                            <ul class="list-gap">
                                <li>
                                    <a href="#">
                                        Our Company Details <br />
                                        [450KB] <i class="fa-solid fa-cloud-arrow-down"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href="#">
                                        Our Company Details <br />
                                        [450KB] <i class="fa-solid fa-cloud-arrow-down"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tj-appointment-box" data-bg-image="{{ asset('web-assets/images/service/service-15.jpg') }}">
                            <div
                                class="tj-appointment-bg"
                                data-bg-image="{{ asset('web-assets/images/banner/service_shape.png') }}"
                            ></div>
                            <div class="tj-appointment-body">
                                <div class="appointment-percent text-center">
                                    <span class="text-uppercase"
                                        >100% <br />
                                        Quality</span
                                    >
                                </div>
                                <div class="appointment-content text-center">
                                    <h4 class="title">Make An Appointment</h4>
                                    <a class="tel-link" href="tel:+51-(0)-888-455-369"> +51-(0)-888-455-369</a>
                                    <p>Perfectly simple & easy to distinguish free hour when power.</p>
                                    <div class="tj-theme-button">
                                        <button class="tj-transparent-btn submit-btn2" type="submit" value="submit">
                                            Get a Quote <i class="fa-light fa-arrow-right"></i>
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
<!--========== blog details End ==============-->

@endsection