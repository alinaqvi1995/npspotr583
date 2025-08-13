@extends('layouts.guest')

@section('title', 'Contact Us')

@section('content')

        <!--========== breadcrumb Start ==============-->
        <section class="breadcrumb-wrapper" data-bg-image="web-assets/images/banner/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h1 class="breadcrumb-title text-center">Contact Us</h1>
                            <div class="breadcrumb-link">
                                <span>
                                    <a href="index.html">
                                        <span>Home</span>
                                    </a>
                                </span>
                                >
                                <span>
                                    <span> Contact</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--========== breadcrumb End ==============-->

        <!--========== Contact Page Start ==============-->
            <section class="tj-contact-page">
                <div class="container">
                    <div class="row tj-contact-box">
                        <div class="col-lg-4 col-md-6">
                            <div class="tj-contact-list">
                                <div class="contact-icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="contact-header">
                                    <span> Any Questions? Call us</span>
                                    <a href="tel:+1(246)3330079"> +1 (246) 333 0079</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="tj-contact-list">
                                <div class="contact-icon">
                                    <i class="flaticon-email-3"></i>
                                </div>
                                <div class="contact-header">
                                    <span> Any Questions? Email us</span>
                                    <a href="mailto:example@gmail.com"> example@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="tj-contact-list">
                                <div class="contact-icon">
                                    <i class="flaticon-map"></i>
                                </div>
                                <div class="contact-header">
                                    <span> 51 Somestreet Cambridge</span>
                                    <a href="#"> CB4, United Kingdom</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="tj-section-heading">
                                <span class="sub-title active-shape"> Need Any Help?</span>
                                <h3 class="title">Get in Touch With Us</h3>
                            </div>
                            <div class="tj-animate-form d-flex align-items-center">
                                <form class="animate-form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form__div">
                                                <input type="text" class="form__input" placeholder=" " />
                                                <label class="form__label">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form__div">
                                                <input type="text" class="form__input" placeholder=" " />
                                                <label class="form__label">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form__div">
                                                <input type="text" class="form__input" placeholder=" " />
                                                <label class="form__label">Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form__div">
                                                <input type="text" class="form__input" placeholder=" " />
                                                <label class="form__label"> Email Address</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form__div">
                                                <input type="text" class="form__input" placeholder=" " />
                                                <label class="form__label">Website</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form__div">
                                                <input type="text" class="form__input" placeholder=" " />
                                                <label class="form__label">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form__div">
                                                <input type="text" class="form__input textarea" placeholder=" " />
                                                <label class="form__label"> Message</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tj-theme-button">
                                        <button class="tj-primary-btn contact-btn" type="submit" value="submit">
                                            Send Message <i class="flaticon-right-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="google-map">
                                <iframe
                                    src="https://maps.google.com/maps?width=100%25&amp;height=750&amp;hl=en&amp;q=New%20york+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                >
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!--========== Contact Page End ==============-->

        <!--=========== Newsletter Section Start =========-->
        <section class="tj-subscribe-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="subscribe-content-box d-flex align-items-center justify-content-between"
                            data-bg-image="web-assets/images/banner/subscribe.png"
                        >
                            <div class="subscribe-content d-flex align-items-center">
                                <div class="mail-icon">
                                    <img src="web-assets/images/icon/email.svg" alt="Icon" />
                                </div>
                                <div class="subscribe-title">
                                    <h3 class="title">Subscribe Our Newslatter</h3>
                                </div>
                            </div>
                            <div class="subscribe-form d-flex align-items-center">
                                <div class="subscribe-input">
                                    <input
                                        type="text"
                                        id="email"
                                        name="emailAddress"
                                        placeholder="Email Address"
                                        required=""
                                    />
                                </div>
                                <div class="tj-theme-button">
                                    <button class="tj-submit-btn" type="submit" value="submit">
                                        Submit Now <i class="fa-light fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=========== Newsletter Section End =========-->
@endsection