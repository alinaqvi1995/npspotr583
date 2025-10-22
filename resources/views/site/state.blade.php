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

<section class="tj-choose-us-section-state" data-bg-image="web-assets/images/banner/feature-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5" data-sal="slide-left" data-sal-duration="800">
                <div class="choose-us-content-1">
                    <div class="tj-section-heading">
                        <span class="sub-title active-shape2">California Car Shipping Services</span>
                        <h6 class="title">California Vehicle transport with Bridgeway Logistics LLC</h6>
                        <p class="desc">
                            Bridgeway Logistics LLC is California’s trusted name in nationwide vehicle transport.
                            Whether you’re relocating, purchasing a car out of state, or need to ship a vehicle for a family member —
                            our team ensures safe, reliable, and fully insured transport anywhere in the U.S.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-sal="slide-right" data-sal-duration="800">
                <div class="tj-input-form trq-1" data-bg-image="web-assets/images/banner/form-shape.png">
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
                    <h2 class="title">Top-Rated California Auto Transport Company</h2>
                    <p class="desc">
                        There are many reasons to look for car shipping near you. Are you sending a vehicle to a student?
                        Moving for a new job? Or perhaps purchasing a vehicle across the country?
                        Bridgeway Logistics LLC is fully licensed and insured to ship your vehicle safely across all 50 states.
                        Our process is smooth, transparent, and customer-focused from pickup to delivery.
                    </p>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-left" data-sal-duration="800">
                <div class="about-content-one">
                    <div class="tj-section-heading">
                        <span class="sub-title active-shape">Shipping a Car TO California</span>
                        <p class="desc">
                            Whether you're adding to your classic collection, moving for work, or relocating for military orders,
                            our professional drivers make shipping a vehicle to California simple and secure.
                            Since our founding, we’ve served thousands of satisfied customers nationwide.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-right" data-sal-duration="800">
                <div class="image-box mt-4">
                    <img class="rounded img-fluid" src="https://www.bridgewaylogisticsllc.com/web-assets/images/california-car-shipping.jpg" alt="California Car Shipping" title="California Car Shipping">
                </div>
            </div>
        </div>

        <div class="row pt-4 mt-4">
            <div class="col-lg-6 col-md-12 order-2 order-md-1 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-left" data-sal-duration="800">
                <div class="image-box mt-4">
                    <img class="rounded img-fluid" src="https://www.bridgewaylogisticsllc.com/web-assets/images/car-transport-from-california.jpg" alt="Shipping From California" title="Shipping From California">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-1 order-md-2 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-right" data-sal-duration="800">
                <div class="about-content-one">
                    <div class="tj-section-heading">
                        <span class="sub-title active-shape">Shipping a Car FROM California</span>
                        <p class="desc">
                            Our vast carrier network covers the entire U.S., transporting vehicles from California to any destination.
                            From cars and trucks to motorcycles, EVs, and classic collectibles — Bridgeway Logistics LLC ensures
                            your vehicle arrives safely, on schedule, and within your budget.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="tj-about-section pt-0 pb-4 mb-2">
    <div class="container">

        <div class="row pt-4">
            <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-left" data-sal-duration="800">
                <div class="about-content-one">
                    <div class="tj-section-heading">
                        <span class="sub-title active-shape">Shipping a Car TO California</span>
                        <p class="desc">
                            Whether you're adding to your classic collection, moving for work, or relocating for military orders,
                            our professional drivers make shipping a vehicle to California simple and secure.
                            Since our founding, we’ve served thousands of satisfied customers nationwide.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-right" data-sal-duration="800">
                <div class="image-box mt-4">
                    <img class="rounded img-fluid" src="https://www.bridgewaylogisticsllc.com/web-assets/images/california-car-shipping.jpg" alt="California Car Shipping" title="California Car Shipping">
                </div>
            </div>
        </div>

        <div class="row pt-4 mt-4">
            <div class="col-lg-6 col-md-12 order-2 order-md-1 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-left" data-sal-duration="800">
                <div class="image-box mt-4">
                    <img class="rounded img-fluid" src="https://www.bridgewaylogisticsllc.com/web-assets/images/car-transport-from-california.jpg" alt="Shipping From California" title="Shipping From California">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-1 order-md-2 d-flex align-items-center justify-content-center sal-animate" data-sal="slide-right" data-sal-duration="800">
                <div class="about-content-one">
                    <div class="tj-section-heading">
                        <span class="sub-title active-shape">Shipping a Car FROM California</span>
                        <p class="desc">
                            Our vast carrier network covers the entire U.S., transporting vehicles from California to any destination.
                            From cars and trucks to motorcycles, EVs, and classic collectibles — Bridgeway Logistics LLC ensures
                            your vehicle arrives safely, on schedule, and within your budget.
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