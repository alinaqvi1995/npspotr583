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
                                <a href="{{ route('home') }}">
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
                                    <img src="{{ asset($service->image_one) }}" alt="Blog" /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-header">
                                    <h3>
                                        <a class="title-link" href="service-details.html"> {{ $service->heading_one }}</a>
                                    </h3>
                                </div>
                            </div>
                            <p>
                                {!! $service->description_one !!}
                            </p>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <div class="check-image">
                                    <img src="{{ asset($service->image_two) }}" alt="Blog" />
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="check-list">
                                    <h5 class="title fs-4">{{ $service->heading_two }}</h5>
                                    <ul class="list-gap">
                                        <li class="fw-0">
                                            <i class="fa-light fa-check"></i> {!! $service->description_two_one !!}
                                        </li>
                                        <li class="fw-0"><i class="fa-light fa-check"></i> {!! $service->description_two_two !!}</li>
                                        <li class="fw-0">
                                            <i class="fa-light fa-check"></i> {!! $service->description_two_three !!}
                                        </li>
                                        <li class="fw-0">
                                            <i class="fa-light fa-check"></i> {!! $service->description_two_four !!}
                                        </li>
                                        <li class="fw-0"><i class="fa-light fa-check"></i> {!! $service->description_two_five !!}</li>
                                        <li class="fw-0"><i class="fa-light fa-check"></i> {!! $service->description_two_six !!}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="details-video-content">
                            <h4 class="title">{{ $service->heading_three }}</h4>
                            <p>
                                {!! $service->description_three !!}
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="sevice-image">
                                        <img src="{{ asset($service->image_three) }}" alt="Image" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="sevice-image">
                                        <img src="{{ asset($service->image_four) }}" alt="Image" />
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
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    {{ $service->ques_one }}
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>{!! $service->ans_one !!}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    {{ $service->ques_two }}
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>{!! $service->ans_two !!}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    {{ $service->ques_three }}
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>{!! $service->ans_three !!}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    {{ $service->ques_four }}
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>{!! $service->ans_four !!}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFive">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                    aria-expanded="false" aria-controls="collapseFive">
                                                    {{ $service->ques_five }}
                                                </button>
                                            </h2>
                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>{!! $service->ans_five !!}</strong>
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
                        <div class="tj-sidebar-widget sidebar-service">
                            <h5 class="details_title">Logistics Services</h5>
                            <ul class="list-gap">
                                @foreach ($latestServices as $item)
                                    <li>
                                        <a href="{{ route('services.show.detail', $item->slug) }}">
                                            {{ $item->title }}
                                            <i class="flaticon-right-chevron"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tj-appointment-box"
                            data-bg-image="{{ asset('web-assets/images/service/service-15.jpg') }}">
                            <div class="tj-appointment-bg"
                                data-bg-image="{{ asset('web-assets/images/banner/service_shape.png') }}"></div>
                            <div class="tj-appointment-body">
                                <div class="appointment-percent text-center">
                                    <span class="text-uppercase">Get <br />
                                        Quote</span>
                                </div>
                                <div class="appointment-content text-center">
                                    <h4 class="title">Make An Appointment</h4>
                                    <a class="tel-link" href="tel:+1 (713) 470-6157"> +1 (713) 470-6157</a>
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
