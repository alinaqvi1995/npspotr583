@extends('layouts.guest')
@section('title', 'State')

@section('content')

    <section class="tj-choose-us-section-state" data-bg-image="{{ asset($state->banner_image ?? 'web-assets/images/banner/feature-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5" data-sal="slide-left" data-sal-duration="800">
                    <div class="choose-us-content-1">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape2">
                                {{ $state->state_name . ' Transport Services' }}
                            </span>
                            <h6 class="title">
                                Vehicle transport with Bridgeway Logistics LLC
                            </h6>
                            <p class="desc">
                                {{ $state->short_title }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-sal="slide-right" data-sal-duration="800">
                    <div class="tj-input-form trq-1" data-bg-image="{{ asset('web-assets/images/banner/form-shape.png') }}">
                        @include('site.partials.multiform')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tj-about-section pt-0 pb-4 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-section-heading text-center">
                        <h2 class="title">
                            Top-Rated {{ $state->state_name }} Auto Transport Company
                        </h2>
                        <p class="desc">
                            Bridgeway Logistics LLC is fully licensed and insured to ship your vehicle safely across all 50 states.
                            Our process is smooth, transparent, and customer-focused from pickup to delivery.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Image + Text Row 1 -->
            <div class="row pt-4">
                <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center" data-sal="slide-left" data-sal-duration="800">
                    <div class="about-content-one">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape">
                                {{ $state->heading_one ?? "Shipping a Car TO {$state->state_name}" }}
                            </span>
                            <p class="desc">
                                {!! $state->description_one ??
                                    "Whether you're adding to your classic collection, moving for work, or relocating for military orders, our professional drivers make shipping a vehicle to {$state->state_name} simple and secure." !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center" data-sal="slide-right" data-sal-duration="800">
                    <div class="image-box mt-4">
                        <img class="rounded img-fluid" src="{{ asset($state->image_one ?? 'web-assets/images/default-placeholder.jpg') }}"
                            alt="{{ $state->state_name }} Car Shipping"
                            title="{{ $state->state_name }} Car Shipping">
                    </div>
                </div>
            </div>

            <!-- Image + Text Row 2 -->
            <div class="row pt-4 mt-4">
                <div class="col-lg-6 col-md-12 order-2 order-md-1 d-flex align-items-center justify-content-center" data-sal="slide-left" data-sal-duration="800">
                    <div class="image-box mt-4">
                        <img class="rounded img-fluid" src="{{ asset($state->image_two ?? 'web-assets/images/default-placeholder.jpg') }}"
                            alt="Shipping From {{ $state->state_name }}"
                            title="Shipping From {{ $state->state_name }}">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 order-1 order-md-2 d-flex align-items-center justify-content-center" data-sal="slide-right" data-sal-duration="800">
                    <div class="about-content-one">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape">
                                {{ $state->heading_two ?? "Shipping a Car FROM {$state->state_name}" }}
                            </span>
                            <p class="desc">
                                {!! $state->description_two ??
                                    "Our vast carrier network covers the entire U.S., transporting vehicles from {$state->state_name} to any destination. From cars and trucks to motorcycles, EVs, and classic collectibles — Bridgeway Logistics LLC ensures your vehicle arrives safely, on schedule, and within your budget." !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section class="tj-about-section pt-0 pb-4 mb-2">
        <div class="container">

            <!-- Image + Text Row 1 -->
            <div class="row pt-4">
                <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center" data-sal="slide-left" data-sal-duration="800">
                    <div class="about-content-one">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape">
                                {{ $state->heading_three ?? "Shipping a Car TO {$state->state_name}" }}
                            </span>
                            <p class="desc">
                                {!! $state->description_three ??
                                    "Whether you're adding to your classic collection, moving for work, or relocating for military orders, our professional drivers make shipping a vehicle to {$state->state_name} simple and secure." !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center" data-sal="slide-right" data-sal-duration="800">
                    <div class="image-box mt-4">
                        <img class="rounded img-fluid" src="{{ asset($state->image_three ?? 'web-assets/images/default-placeholder.jpg') }}"
                            alt="{{ $state->state_name }} Car Shipping"
                            title="{{ $state->state_name }} Car Shipping">
                    </div>
                </div>
            </div>

            <!-- Image + Text Row 2 -->
            <div class="row pt-4 mt-4">
                <div class="col-lg-6 col-md-12 order-2 order-md-1 d-flex align-items-center justify-content-center" data-sal="slide-left" data-sal-duration="800">
                    <div class="image-box mt-4">
                        <img class="rounded img-fluid" src="{{ asset($state->image_four ?? 'web-assets/images/default-placeholder.jpg') }}"
                            alt="Shipping From {{ $state->state_name }}"
                            title="Shipping From {{ $state->state_name }}">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 order-1 order-md-2 d-flex align-items-center justify-content-center" data-sal="slide-right" data-sal-duration="800">
                    <div class="about-content-one">
                        <div class="tj-section-heading">
                            <span class="sub-title active-shape">
                                {{ $state->heading_four ?? "Shipping a Car FROM {$state->state_name}" }}
                            </span>
                            <p class="desc">
                                {!! $state->description_four ??
                                    "Our vast carrier network covers the entire U.S., transporting vehicles from {$state->state_name} to any destination. From cars and trucks to motorcycles, EVs, and classic collectibles — Bridgeway Logistics LLC ensures your vehicle arrives safely, on schedule, and within your budget." !!}
                            </p>
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
@endsection
