<!-- Preloader start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
                <div class="loader-icon">
                    <img src="web-assets/images/logo/loder.png" alt="Bridgeway Logistics LLC" />
                </div>
            </div>
            <div class="txt-loading">
                <span data-text-preloader="B" class="letters-loading"> B </span>
                <span data-text-preloader="R" class="letters-loading"> R </span>
                <span data-text-preloader="I" class="letters-loading"> I </span>
                <span data-text-preloader="D" class="letters-loading"> D </span>
                <span data-text-preloader="G" class="letters-loading"> G </span>
                <span data-text-preloader="E" class="letters-loading"> E </span>
                <span data-text-preloader="W" class="letters-loading"> W </span>
                <span data-text-preloader="A" class="letters-loading"> A </span>
                <span data-text-preloader="Y" class="letters-loading"> Y </span>
            </div>
        </div>
        <button class="tj-primary-btn">Cancel Preloader</button>
    </div>
<!-- Preloader end -->

<!-- Offcanvas Area Start-->
    <div id="tj-overlay-bg2" class="tj-overlay-canvas"></div>
    <div class="tj-offcanvas-area">
        <div class="tj-offcanvas-header d-flex align-items-center justify-content-between">
            <div class="logo-area text-center">
                <a href="index.html"><img src="web-assets/images/logo/logo.png" alt="Bridgeway Logistics LLC" /></a>
            </div>
            <div class="offcanvas-icon">
                <a id="canva_close" href="#">
                    <i class="fa-light fa-xmark"></i>
                </a>
            </div>
        </div>
        <div class="tj-search-box">
            <form action="#">
                <input type="text" class="form-control-1" name="search" id="search" placeholder="Search" />
                <a href="#"><i class="fal fa-search"></i></a>
            </form>
        </div>
        <!-- Canvas Mobile Menu start -->
        <nav class="right_menu_togle mobile-navbar-menu d-lg-none" id="mobile-navbar-menu"></nav>
        <p class="des d-none d-lg-block">
            Bridgeway Logistics LLC — Your trusted nationwide vehicle transportation partner. 
            We provide insured, safe, and reliable car, truck, boat, motorcycle, and heavy equipment shipping across the USA.
        </p>
        <!-- Canvas Menu end -->
        <div class="contact-info-list">
            <h4 class="offcanvas-title">Contact info</h4>
            <div class="contact-box">
                <div class="contact-icon">
                    <i class="fa-light fa-location-dot"></i>
                </div>
                <div class="contact-link">
                    <span class="d-block"> Location:</span>
                    <p>United States (Nationwide Service)</p>
                </div>
            </div>
            <div class="contact-box contact-box1">
                <div class="contact-icon">
                    <i class="flaticon-email-2"></i>
                </div>
                <div class="contact-link">
                    <span class="d-block"> Email us:</span>
                    <a href="mailto:quote@bridgewaylogisticsllc.com">quote@bridgewaylogisticsllc.com</a>
                </div>
            </div>
            <div class="contact-box">
                <div class="contact-icon">
                    <i class="flaticon-telephone"></i>
                </div>
                <div class="contact-link">
                    <span class="d-block"> Call us:</span>
                    <a href="tel:+17134706157">+1 (713) 470-6157</a>
                </div>
            </div>
        </div>
        <div class="tj-offcanvas-icon-list">
            <h4 class="offcanvas-title">Follow Us</h4>
            <ul>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
        </div>
        <div class="contact-map d-none d-lg-block">
            <iframe
                src="https://maps.google.com/maps?q=USA&amp;t=&amp;z=4&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                style="border: 0"
                allowfullscreen=""
            ></iframe>
        </div>
        <div class="tj-theme-button tj-btn d-lg-none">
            <a class="tj-primary-btn" href="#">Get a Free Quote <i class="flaticon-right-1"></i></a>
        </div>
    </div>
<!-- Offcanvas Area End -->

<!-- Offcanvas Area End-->

<!-- start: Search Popup -->
    <section class="search_popup">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="search_wrapper">
                        <div class="search_top d-flex justify-content-between align-items-center">
                            <div class="search_logo">
                                <a href="index.html">
                                    <img src="web-assets/images/logo/logo2.png" alt="Bridgeway Logistics LLC" />
                                </a>
                            </div>
                            <div class="search_close">
                                <a class="search_close_btn" href="#"><i class="fa-regular fa-xmark"></i></a>
                            </div>
                        </div>
                        <div class="search_form">
                            <form action="search-results.html" method="GET">
                                <div class="search_input">
                                    <input
                                        class="search-input-field"
                                        type="text"
                                        name="q"
                                        placeholder="Search services or info..."
                                    />
                                    <span class="search-focus-border"></span>
                                    <button type="submit"><i class="flaticon-loupe"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="search-popup-overlay"></div>
<!-- end: Search Popup -->

<!--========== Header Section Start ==============-->
    <header class="header-section-three" id="header-sticky">
        <!-- header menu Start -->
        <div class="tj-header-menu-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="header-menu-area">
                            <div class="logo-box">
                                <a href="{{ route('home') }}"><img src="{{ asset('web-assets/images/logo/logo2.png') }}" alt="Bridgeway Logistics LLC" /></a>
                            </div>
                            <div class="tj-main-menu d-lg-block d-none text-end" id="main-menu">
                                <ul class="main-menu">
                                    <li class="{{ request()->routeIs('home') ? 'active current-menu-item' : '' }}">
                                        <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('services.index') }}">Services</a>
                                        <ul class="list-gap sub-menu-list">
                                            <li><a href="{{ route('services.index') }}">Car Shipping</a></li>
                                            <li><a href="{{ route('services.index') }}">Motorcycle Shipping</a></li>
                                            <li><a href="{{ route('services.index') }}">Heavy Equipment Shipping</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('quote.index') }}">Get a Quote</a>
                                        <ul class="list-gap sub-menu-list">
                                            <li><a href="{{ route('quote.car') }}">Car Quote</a></li>
                                            <li><a href="{{ route('quote.motorcycle') }}">Motorcycle Quote</a></li>
                                            <li><a href="{{ route('quote.heavyEquipment') }}">Heavy Equipment Quote</a></li>
                                            <li><a href="{{ route('quote.freight') }}">Freight Quote</a></li>
                                            <li><a href="{{ route('quote.golf_cart') }}">Golf Cart Quote</a></li>
                                            <li><a href="{{ route('quote.atv_utv') }}">ATV/UTV Quote</a></li>
                                            <li><a href="{{ route('quote.boat') }}">Boat Quote</a></li>
                                            <li><a href="{{ route('quote.roro') }}">RORO Shipping Quote</a></li>
                                            <li><a href="{{ route('form.recreational-vehicle') }}">Recreational Vehicle Quote</a></li>
                                            <li><a href="{{ route('quote.form.combine') }}">Combined Quote Form</a></li>
                                            <li><a href="{{ route('commercial.truck.transport') }}">Commercial Truck Transport Quote</a></li>
                                            <li><a href="{{ route('frontend.forms.construction_transport') }}">Construction Transport Quote</a></li>
                                            <li><a href="{{ route('frontend.forms.excavator') }}">Excavator Quote</a></li>
                                            <li><a href="{{ route('frontend.forms.farm_transport') }}">Farm Transport Quote</a></li>
                                            <li><a href="{{ route('frontend.forms.rv_transport') }}">RV Transport Quote</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{ route('blog.index') }}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="menu-search-box d-flex align-items-center">
                                <div class="tj-hambagur-icon d-lg-none">
                                    <a class="canva_expander nav-menu-link menu-button" href="#">
                                        <span class="dot1"></span>
                                        <span class="dot2"></span>
                                        <span class="dot3"></span>
                                    </a>
                                </div>
                                <div class="hambugar-icon d-none d-lg-block">
                                    <a class="canva_expander" href="#">
                                        <i class="flaticon-menu"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header end End -->
                </div>
            </div>
        </div>
        <!-- header menu End -->
    </header>
<!--========== Header Section End ==============-->