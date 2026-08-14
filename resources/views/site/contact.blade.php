@extends('layouts.guest')

@section('title', 'Contact Us')

@section('content')

<!--========== breadcrumb Start ==============-->
<section class="breadcrumb-wrapper"
    data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-content">

                    <h1 class="breadcrumb-title text-center">
                        Contact Us
                    </h1>

                    <div class="breadcrumb-link">

                        <span>
                            <a href="{{ url('/') }}">
                                <span>Home</span>
                            </a>
                        </span>

                        >

                        <span>
                            <span>Contact</span>
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

        <!-- Contact Information -->
        <div class="row tj-contact-box">

            <!-- Phone -->
            <div class="col-lg-4 col-md-6">

                <div class="tj-contact-list">

                    <div class="contact-icon">
                        <i class="flaticon-phone-call"></i>
                    </div>

                    <div class="contact-header">

                        <span>
                            Any Questions? Call us
                        </span>

                        <a href="tel:+17134706157">
                            +1 (713) 470-6157
                        </a>

                    </div>

                </div>

            </div>


            <!-- Email -->
            <div class="col-lg-4 col-md-6">

                <div class="tj-contact-list">

                    <div class="contact-icon">
                        <i class="flaticon-email-3"></i>
                    </div>

                    <div class="contact-header">

                        <span>
                            Any Questions? Email us
                        </span>

                        <a href="mailto:info@bridgewaylogistics.com">
                            info@bridgewaylogistics.com
                        </a>

                    </div>

                </div>

            </div>


            <!-- Address -->
            <div class="col-lg-4 col-md-6">

                <div class="tj-contact-list">

                    <div class="contact-icon">
                        <i class="flaticon-map"></i>
                    </div>

                    <div class="contact-header">

                        <span>
                            5402 Renwick Dr Apt 902
                        </span>

                        <a href="#">
                            Houston, TX 77081, United States
                        </a>

                    </div>

                </div>

            </div>

        </div>


        <!-- Contact Form + Map -->
        <div class="row align-items-center">

            <!-- Contact Form -->
            <div class="col-lg-7">

                <div class="tj-section-heading">

                    <span class="sub-title active-shape">
                        Need Any Help?
                    </span>

                    <h3 class="title">
                        Get in Touch With Us
                    </h3>

                </div>


                <div class="tj-animate-form d-flex align-items-center">

                    <form
                        class="animate-form"
                        method="POST"
                        action="{{ url('/contact') }}"
                    >

                        @csrf


                        <div class="row">

                            <!-- First Name -->
                            <div class="col-lg-6 col-md-6">

                                <div class="form__div">

                                    <input
                                        type="text"
                                        name="first_name"
                                        class="form__input"
                                        placeholder=" "
                                        required
                                    />

                                    <label class="form__label">
                                        First Name
                                    </label>

                                </div>

                            </div>


                            <!-- Last Name -->
                            <div class="col-lg-6 col-md-6">

                                <div class="form__div">

                                    <input
                                        type="text"
                                        name="last_name"
                                        class="form__input"
                                        placeholder=" "
                                        required
                                    />

                                    <label class="form__label">
                                        Last Name
                                    </label>

                                </div>

                            </div>


                            <!-- Phone -->
                            <div class="col-lg-6 col-md-6">

                                <div class="form__div">

                                    <input
                                        type="tel"
                                        name="phone"
                                        id="phone"
                                        class="form__input"
                                        placeholder=" "
                                        required
                                    />

                                    <label class="form__label">
                                        Phone
                                    </label>

                                </div>

                            </div>


                            <!-- Email -->
                            <div class="col-lg-6 col-md-6">

                                <div class="form__div">

                                    <input
                                        type="email"
                                        name="email"
                                        class="form__input"
                                        placeholder=" "
                                        required
                                    />

                                    <label class="form__label">
                                        Email Address
                                    </label>

                                </div>

                            </div>

                                                        <!-- SMS Consent -->
                            <div class="col-lg-12 mt-3 mb-4">

                                <div class="form-check d-flex align-items-start">

                                    <input
                                        class="form-check-input flex-shrink-0 mt-1 me-2"
                                        type="checkbox"
                                        name="sms_consent"
                                        id="sms_consent"
                                        value="1"
                                        
                                    >

                                    <label
                                        class="form-check-label"
                                        for="sms_consent"
                                    >
                                        By providing a telephone number and submitting
                                        this form you are consenting to be contacted by
                                        SMS text message. Message &amp; data rates may
                                        apply. Message frequency may vary.
                                        <a
                                            href="{{ url('/privacy-policy') }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            Privacy Policy
                                        </a>.
                                        Reply Help for more information. You can reply
                                        STOP to opt-out of further messaging.
                                    </label>

                                </div>

                            </div>

                            <!-- Subject -->
                            <div class="col-lg-12 col-md-12">

                                <div class="form__div">

                                    <input
                                        type="text"
                                        name="subject"
                                        class="form__input"
                                        placeholder=" "
                                        required
                                    />

                                    <label class="form__label">
                                        Subject
                                    </label>

                                </div>

                            </div>


                            <!-- Message -->
                            <div class="col-lg-12">

                                <div class="form__div">

                                    <textarea
                                        name="message"
                                        class="form__input textarea"
                                        placeholder=" "
                                        required
                                    ></textarea>

                                    <label class="form__label">
                                        Message
                                    </label>

                                </div>

                            </div>




                        </div>


                        <!-- Submit Button -->
                        <div class="tj-theme-button mt-2">

                            <button
                                class="tj-primary-btn contact-btn"
                                type="submit"
                                value="submit"
                            >
                                Send Message
                                <i class="flaticon-right-1"></i>
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- Google Map -->
            <div class="col-lg-5">

                <div class="google-map">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11041.520444338936!2d-95.4889277!3d29.7131701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c03c8a12a8bb%3A0x6d1e23e05a553d97!2sBridgeway%20Logistics%20LLC!5e0!3m2!1sen!2sus!4v1694800000000!5m2!1sen!2sus"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>

            </div>

        </div>

    </div>

</section>

    <!--========== Contact Page End ==============-->
@endsection