   @extends('layouts.guest')

   @section('title', 'Get Quote')

   @section('content')
       <!--========== breadcrumb Start ==============-->
       <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="breadcrumb-content">
                           <h1 class="breadcrumb-title text-center mb-5">Quote Form</h1>
                           <div class="breadcrumb-link">
                               <span>
                                   <a href="index.html">
                                       <span>Home</span>
                                   </a>
                               </span>
                               >
                               <span>
                                   <span> Quote Form</span>
                               </span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       {{-- <!--========== breadcrumb End ==============-->
        <section class="tj-choose-us-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" data-sal="slide-right" data-sal-duration="800">
                        <div class="tj-input-form m-0" data-bg-image="web-assets/images/banner/form-shape.png">
                           <div id="make-options" class="d-none">
                              @foreach ($makes as $make)
                                 <option value="{{ $make }}">{{ $make }}</option>
                              @endforeach
                           </div>
                              @include('site.partials.multiform')
                        </div>
                    </div>
                     <div class="col-lg-6" data-sal="slide-left" data-sal-duration="800">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   <!--=========== Project Section End =========--> --}}


       <!--=========== Feature Section Start =========-->
       <section class="tj-choose-us-section">
           <div class="container">
               <div class="row">
                   <div class="col-lg-5" data-sal="slide-left" data-sal-duration="800">
                       <div class="choose-us-content-1">
                           <div class="tj-section-heading">
                               <span class="sub-title active-shape2"> Why Choose Us</span>
                               <h2 class="title">We are the Future of Auto Transport</h2>
                               <p class="desc">
                                   Safe & Secure Shipping Your Shipment is handled with the utmost care from
                                   pick-up to delivery.
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

       <!--=========== Newsletter Section Start =========-->
       <section class="tj-subscribe-section">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="subscribe-content-box d-flex align-items-center justify-content-between"
                           data-bg-image="web-assets/images/banner/subscribe.png">
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
                                   <input type="text" id="email" name="emailAddress" placeholder="Email Address"
                                       required="" />
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
