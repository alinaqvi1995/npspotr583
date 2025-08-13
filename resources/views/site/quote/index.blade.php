@extends('layouts.guest')

@section('title', 'Get Quote')

@section('content')
   <!--========== breadcrumb Start ==============-->
   <section class="breadcrumb-wrapper" data-bg-image="web-assets/images/banner/breadcrumb.jpg">
      <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Projects Page</h1>
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

   <!--=========== Project Section Start =========-->
   <section class="tj-project-section-two tj-project-page">
      <div class="container">
         <div class="row">
               <div class="tj-section-heading text-center">
                  <span class="sub-title active-shape"> Latest Projects</span>
                  <h2 class="title">Works Across The World</h2>
               </div>
         </div>
         <div class="row">
               <div class="col-lg-12">
                  <div class="tj-project-area grid">
                     <div class="gutter-sizer"></div>

                     <!-- Project 1 -->
                     <div class="project-item-three grid-item grid-division-1">
                           <div class="project-image" style="background-image: url('assets/images/project/project-1.jpg')"></div>
                           <a class="arrow-btn" href="{{ route('quote.car') }}"> <i class="flaticon-right-1"></i> </a>
                           <div class="project-text">
                              <span class="sub-title">Car Transport</span>
                              <h6><a class="title-link" href="{{ route('quote.car') }}">Reliable Car Shipping</a></h6>
                           </div>
                     </div>

                     <!-- Project 2 -->
                     <div class="project-item-three grid-item grid-division">
                           <div class="project-image" style="background-image: url('assets/images/project/project-2.jpg')"></div>
                           <a class="arrow-btn" href="/quote/motorcycle"> <i class="flaticon-right-1"></i> </a>
                           <div class="project-text">
                              <span class="sub-title">Motorcycle Transport</span>
                              <h6><a class="title-link" href="/quote/motorcycle">Safe & Secure Motorcycle Delivery</a></h6>
                           </div>
                     </div>

                     <!-- Project 3 -->
                     <div class="project-item-three grid-item grid-division">
                           <div class="project-image" style="background-image: url('assets/images/project/project-3.jpg')"></div>
                           <a class="arrow-btn" href="/quote/golf-cart"> <i class="flaticon-right-1"></i> </a>
                           <div class="project-text">
                              <span class="sub-title">Golf Cart Transport</span>
                              <h6><a class="title-link" href="/quote/golf-cart">Nationwide Golf Cart Shipping</a></h6>
                           </div>
                     </div>

                     <!-- Project 4 -->
                     <div class="project-item-three grid-item grid-division">
                           <div class="project-image" style="background-image: url('assets/images/project/project-4.jpg')"></div>
                           <a class="arrow-btn" href="/quote/boat"> <i class="flaticon-right-1"></i> </a>
                           <div class="project-text">
                              <span class="sub-title">Boat Transport</span>
                              <h6><a class="title-link" href="/quote/boat">Marine & Yacht Transport Solutions</a></h6>
                           </div>
                     </div>

                     <!-- Project 5 -->
                     <div class="project-item-three grid-item grid-division">
                           <div class="project-image" style="background-image: url('assets/images/project/project-5.jpg')"></div>
                           <a class="arrow-btn" href="/quote/heavy"> <i class="flaticon-right-1"></i> </a>
                           <div class="project-text">
                              <span class="sub-title">Heavy Equipment</span>
                              <h6><a class="title-link" href="/quote/heavy">Construction & Industrial Equipment Shipping</a></h6>
                           </div>
                     </div>

                     <!-- Project 6 -->
                     <div class="project-item-three grid-item grid-division-1">
                           <div class="project-image" style="background-image: url('assets/images/project/project-6.jpg')"></div>
                           <a class="arrow-btn" href="/quote/freight"> <i class="flaticon-right-1"></i> </a>
                           <div class="project-text">
                              <span class="sub-title">Freight Transportation</span>
                              <h6><a class="title-link" href="/quote/freight">Nationwide Freight Solutions</a></h6>
                           </div>
                     </div>
                  </div>

                  <div class="tj-theme-btn text-center">
                     <a class="tj-primary-btn" href="/services">
                           View All Services <i class="flaticon-right-1"></i>
                     </a>
                  </div>
               </div>
         </div>
      </div>
   </section>

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