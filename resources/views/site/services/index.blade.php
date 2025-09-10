@extends('layouts.guest')
@section('title', 'Services')
@section('content')

    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Service Page</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="index.html">
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

    <!--========== Service Section Start ==============-->
    <section class="tj-service-section-four tj-service-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-section-heading text-center">
                        <span class="sub-title active-shape"> What We Do</span>
                        <h2 class="title">Logistic & Transport</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $row)
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <div class="service-item-three">
                            <div class="service-image">
                                <img src="{{ asset($row->image_one) }}" alt="Image" />
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
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--========== Service Section End ==============-->

    <!--=========== Feature Section Start =========-->
    <section class="tj-choose-us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5" data-sal="slide-left" data-sal-duration="800">
                    <div class="choose-us-content-1">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape2"> Why Choose Us</span>
                            <h2 class="title">We are the Future of Cargo & Logistics</h2>
                            <p class="desc">
                                Quisque dignissim enim diam, eget pulvinar ex viverra id. Nulla a lobortis lectus,
                                id volutpat magna. Morbi consequat porttitor
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

    <!--=========== Team Section Start =========-->
    <section class="tj-team-section-two">
        <div class="container">
            <div class="row">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape"> Our Workers</span>
                    <h2 class="title">Our Delivery Team</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                    <div class="tj-team-item-two">
                        <div class="image-box">
                            <img class="circule-1" src="web-assets/images/team/team-1.png" alt="Image" />
                        </div>
                        <div class="team-content text-center">
                            <h4><a class="title-link" href="team-details.html">Mike Hardson</a></h4>
                            <span class="sub-title"> Manager</span>
                        </div>
                        <div class="social-icon-box">
                            <ul class="social-icon">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                    <div class="tj-team-item-two">
                        <div class="image-box">
                            <img class="circule-1" src="web-assets/images/team/team-2.png" alt="Image" />
                        </div>
                        <div class="team-content text-center">
                            <h4><a class="title-link" href="team-details.html">David Cooper</a></h4>
                            <span class="sub-title"> Co Founder</span>
                        </div>
                        <div class="social-icon-box">
                            <ul class="social-icon">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                    <div class="tj-team-item-two">
                        <div class="image-box">
                            <img src="web-assets/images/team/team-3.png" alt="Image" />
                        </div>
                        <div class="team-content text-center">
                            <h4><a class="title-link" href="team-details.html">Lucas Damian</a></h4>
                            <span class="sub-title"> Architect</span>
                        </div>
                        <div class="social-icon-box">
                            <ul class="social-icon">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Team Section End =========-->

@endsection
