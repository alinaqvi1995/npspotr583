<!-- Preloader start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
                <div class="loader-icon">
                    {{-- <img src="web-assets/images/logo/loder.png" alt="Bridgeway Logistics LLC" /> --}}
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
                <a href="{{ route('home') }}"><img src="web-assets/images/logo/1-logo.png" alt="Bridgeway Logistics LLC" /></a>
            </div>
            <div class="offcanvas-icon">
                <a id="canva_close" href="#">
                    <i class="fa-light fa-xmark"></i>
                </a>
            </div>
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
                    <p>5402 Renwick Dr Apt 902, Houston, TX 77081</p>
                </div>
            </div>
            <div class="contact-box contact-box1">
                <div class="contact-icon">
                    <i class="flaticon-email-2"></i>
                </div>
                <div class="contact-link">
                    <span class="d-block"> Email us:</span>
                    <a href="mailto:info@bridgewaylogisticsllc.com"> info@bridgewaylogisticsllc.com</a>
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
                <li>
                    <a href="tel:+17134706157" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="contact-map d-none d-lg-block">
            <iframe
                src="https://www.google.com/maps?q=5402+Renwick+Dr+Apt+902,+Houston,+TX+77081&hl=en&z=15&output=embed"
                style="border:0; width:100%; height:250px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="tj-theme-button tj-btn d-lg-none">
            <a class="tj-primary-btn" href="{{ route('multiform') }}">Get a Free Quote <i class="flaticon-right-1"></i></a>
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
                                <a href="{{ route('home') }}">
                                    <img src="web-assets/images/logo/1-logo.png" alt="Bridgeway Logistics LLC" />
                                </a>
                            </div>
                        </div>
                        {{-- <div class="search_form">
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="search-popup-overlay"></div>
<!-- end: Search Popup -->

<!--========== Header Section Start ==============-->
    <header class="header-section-two" id="header-sticky">
        <div class="header-topbar d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="topbar-content-area">
                            <div class="header-content-left">
                                <ul class="list-gap">
                                    <li>
                                        <i class="flaticon flaticon-mail"></i
                                        ><a href="mailto:info@bridgewaylogisticsllc.com"> info@bridgewaylogisticsllc.com</a>
                                    </li>
                                    <li>
                                        <i class="flaticon flaticon-call"></i
                                        ><a href="tel:+17134706157"> +1 (713) 470-6157</a>
                                    </li>
                                    <li>
                                        <i class="fa-brands fa-whatsapp fa-bounce fa-lg " style="display:inline-block; position: relative;"></i
                                        ><a href="tel:+17134706157"> +1 (713) 470-6157</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-content-right d-flex align-items-center justify-content-end">
                                {{-- <div class="input-form tj-select">
                                    <select class="nice-select">
                                        <option value="1">English</option>
                                        <option value="2">Arabic</option>
                                    </select>
                                </div> --}}
                                <div class="header-social-icon">
                                    <ul class="list-gap social-list">
                                        <li>
                                            <a href="#"> <i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa-brands fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa-brands fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header menu Start -->
        <div class="tj-header-menu-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="header-menu-area">
                            <div class="logo-box">
                                <a href="{{ route('home') }}"><img src="{{ asset('web-assets/images/logo/logo_001.png') }}" alt="Bridgeway Logistics LLC" /></a>
                            </div>
                            <div class="tj-main-menu d-lg-block d-none text-end" id="main-menu">
                                <ul class="main-menu">
                                    <li class="{{ request()->routeIs('home') ? 'active current-menu-item' : '' }}">
                                        <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                    </li>

                                    <li class="{{ request()->routeIs('about') ? 'active current-menu-item' : '' }}">
                                        <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                                    </li>

                                    <li class="{{ request()->routeIs('all_services.index') ? 'active current-menu-item' : '' }}">
                                        <a class="{{ request()->routeIs('all_services.index') ? 'active' : '' }}" href="{{ route('all_services.index') }}">Services</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('multiform') }}" 
                                        class="{{ request()->routeIs('multiform') ? 'active' : '' }}">
                                        Get a Quote
                                        </a>
                                    </li>


                                    <li class="{{ request()->routeIs('blog.index') ? 'active current-menu-item' : '' }}">
                                        <a class="{{ request()->routeIs('blog.index') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                                    </li>

                                    <li class="{{ request()->routeIs('contact') ? 'active current-menu-item' : '' }}">
                                        <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
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