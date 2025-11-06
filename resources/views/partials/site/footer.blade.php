
        <footer class="tj-footer-v2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer2_col_1 footer-content-info">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('web-assets/images/logo/logo_001.png') }}" alt="Logo" />
                            </a>
                            <p class="text-white">
                                Bridgeway Logistics LLC is committed to providing reliable and secure vehicle
                                transportation services across the United States. Your shipment is our priority.
                            </p>
                            <div class="footer-social-icon">
                                <ul class="list-gap">
                                    <li><a href="https://www.facebook.com/p/Bridgeway-Logistics-LLC-100095155214364/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/bridgewaylogistics.llc?igsh=MTQ5MnFjaDhucnpjdg==" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                    {{-- <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li> --}}
                                    <li>
                                        <a href="https://wa.me/17134706157" target="_blank">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Working Hours -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer2_col_4 widget_date_menu">
                            <div class="footer-title">
                                <h5 class="title">Useful Links</h5>
                            </div>
                            <div class="widget-time">
                                <ul class="list-gap">
                                    <li><a class="text-white" href="{{ route('about') }}"><i class="flaticon-right-chevron-1"></i> About
                                            Us</a></li>
                                    <li><a class="text-white" href="{{ route('multiform') }}"><i class="flaticon-right-chevron-1"></i> Get
                                            Quote</a></li>
                                    <li><a class="text-white" href="{{ route('contact') }}"><i class="flaticon-right-chevron-1"></i>
                                            Contact Us</a></li>
                                    <li><a class="text-white" href="{{ route('track.order') }}"><i class="flaticon-right-chevron-1"></i>
                                            Track Order</a></li>
                                    <li><a class="text-white" href="{{ route('trems') }}"><i class="flaticon-right-chevron-1"></i> Terms &
                                            Conditions</a></li>
                                    <li><a class="text-white" href="{{ route('faq') }}"><i class="flaticon-right-chevron-1"></i> FAQs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Services -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer2_col_2 widget_nav_menu">
                            <div class="footer-title">
                                <h5 class="title">Our Services</h5>
                            </div>
                            <div class="widget-menu">
                                <ul class="list-gap">
                                    @php
                                        $services = App\Models\Service::where('status', 1)->get();
                                    @endphp
                                    @foreach ($services->take(5) as $row)
                                        <li>
                                            <a class="text-white" href="{{ route('services.show.detail', $row->slug) }}">
                                                <i class="flaticon-right-chevron-1"></i> {{ $row->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Blog / Recent Posts -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer2_col_3 widget_recent_post">
                            <div class="footer-title">
                                <h5 class="title">Recent Post</h5>
                            </div>
                            @php
                                $blogs = App\Models\Blog::where('status', 1)->take(2)->get();
                            @endphp
                            @foreach ($blogs->take(2) as $blog)
                                <div class="widget-post">
                                    {{-- <div class="post-img">
                                        <img src="{{ asset($blog->image_one) }}" alt="Image" />
                                    </div> --}}
                                    <div class="post-calender">
                                        <i class="flaticon-calendar"></i> <span>
                                            {{ $blog->created_at ? $blog->created_at->format('d') : '-' }}</span>
                                        <h6><a class="post-title"
                                                href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }} </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>

            <!-- Copyright -->
            <div class="copyright-bottom-two">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-copyright-two">
                                <div class="copyright-target">
                                    <p class="text-white">© 2025 Bridgeway Logistics LLC. All Rights Reserved.</p>
                                </div>
                                <div class="copyright-menu">
                                    <ul class="list-gap">
                                        <li><a class="text-white" href="{{ route('privacy') }}">Privacy Policy</a></li>
                                        <li><a class="text-white" href="{{ route('faq') }}">FAQs</a></li>
                                        <li><a class="text-white" href="{{ route('trems') }}">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--=========== Footer Section End =========-->

        <!-- start scrollUp  -->
        <div class="logiland-scroll-top progress-done">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="
                        transition: stroke-dashoffset 10ms linear 0s;
                        stroke-dasharray: 307.919px, 307.919px;
                        stroke-dashoffset: 71.1186px;
                    ">
                </path>
            </svg>
            <div class="logiland-scroll-top-icon">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
                    viewBox="0 0 24 24" data-icon="mdi:arrow-up" class="iconify iconify--mdi">
                    <path fill="currentColor" d="M13 20h-2V8l-5.5 5.5l-1.42-1.42L12 4.16l7.92 7.92l-1.42 1.42L13 8v12Z">
                    </path>
                </svg>
            </div>
        </div>
        <!-- End scrollUp  -->
