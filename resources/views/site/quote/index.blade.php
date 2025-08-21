@extends('layouts.guest')

@section('title', 'Get Quote')

@section('content')
   <!--========== breadcrumb Start ==============-->
   <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
      <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center mb-5">Projects Page</h1>
                        <div class="breadcrumb-link">
                           <span>
                              <a href="index.html">
                                    <span>Home</span>
                              </a>
                           </span>
                           >
                           <span>
                              <span> Projects</span>
                           </span>
                        </div>
                  </div>
               </div>
            </div>
      </div>
   </section>
   <!--========== breadcrumb End ==============-->

<div class="tj-input-form" data-bg-image="web-assets/images/banner/form-shape.png">
      @include('site.partials.multiform')
</div>

   <!--=========== Project Section End =========-->

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