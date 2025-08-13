<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="theme-style-mode" content="1">
        <meta name="description" content="@yield('meta_description', 'saas, software, tools, solutions')">
        <title>@yield('title', 'Service Site')</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" href="web-assets/images/fav.svg" />
        <link rel="shortcut icon" type="image/x-icon" href="web-assets/images/fav.svg" />

        <!-- Bootstrap  v5.1.3 css -->
        <link rel="stylesheet" href="web-assets/css/bootstrap.min.css" />
        <!-- Meanmenu  css -->
        <link rel="stylesheet" href="web-assets/css/meanmenu.css" />
        <!-- Sal css -->
        <link rel="stylesheet" href="web-assets/css/sal.css" />
        <!-- Magnific css -->
        <link rel="stylesheet" href="web-assets/css/magnific-popup.css" />
        <!-- Swiper Slider css -->
        <link rel="stylesheet" href="web-assets/css/swiper.min.css" />
        <!-- Carousel css file -->
        <link rel="stylesheet" href="web-assets/css/owl.carousel.css" />
        <!-- Icons css -->
        <link rel="stylesheet" href="web-assets/css/icons.css" />
        <!-- Odometer css -->
        <link rel="stylesheet" href="web-assets/css/odometer.min.css" />
        <!-- Select css -->
        <link rel="stylesheet" href="web-assets/css/nice-select.css" />
        <!-- Animate css -->
        <link rel="stylesheet" href="web-assets/css/animate.css" />
        <!-- Style css -->
        <link rel="stylesheet" href="web-assets/css/style.css" />
        <!-- Responsive css -->
        <link rel="stylesheet" href="web-assets/css/responsive.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

        {{-- Header --}}
        @include('partials.site.header')

            @yield('content')
            
        {{-- Footer --}}
        @include('partials.site.footer')
      
        <!-- Modernizr.JS -->
        <script src="web-assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jQuery.min JS -->
        <script src="web-assets/js/jquery.min.js"></script>
        <!-- Bootstrap.min JS -->
        <script src="web-assets/js/bootstrap.min.js"></script>
        <!-- Meanmenu JS -->
        <script src="web-assets/js/meanmenu.js"></script>
        <!-- Imagesloaded JS -->
        <script src="web-assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- Isotope JS -->
        <script src="web-assets/js/isotope.pkgd.min.js"></script>
        <!-- Magnific JS -->
        <script src="web-assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Swiper.min JS -->
        <script src="web-assets/js/swiper.min.js"></script>
        <!-- Owl.min JS -->
        <script src="web-assets/js/owl.carousel.js"></script>
        <!-- Appear JS -->
        <script src="web-assets/js/jquery.appear.min.js"></script>
        <!-- Odometer JS -->
        <script src="web-assets/js/odometer.min.js"></script>
        <!-- Sal JS -->
        <script src="web-assets/js/sal.js"></script>
        <!-- Nice JS -->
        <script src="web-assets/js/jquery.nice-select.min.js"></script>
        <!-- Main JS -->
        <script src="web-assets/js/main.js"></script>

    </body>
</html>
