<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maxton | Bootstrap 5 Admin Dashboard Template</title>
    <link rel="icon" href="{{ asset('static/images/favicon-32x32.png') }}" type="image/png">

    <!-- inject:css -->
    <link href="{{ asset('static/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('static/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('static/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('static/plugins/fullcalendar/css/main.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/simplebar/css/simplebar.css') }}">
    
    <!--bootstrap css-->
    <link href="{{ asset('static/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">

    <!--main css-->
    <link href="{{ asset('static/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('static/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('static/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('static/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('static/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('static/sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('static/sass/responsive.css') }}" rel="stylesheet">

    @yield('extra_css')
</head>

<body>

    @section('navbar')
        @include('admin.includes.partial.nav')
    @show

    @section('sidebar')
        @include('admin.includes.partial.sidebar')
    @show

    <!--================= Wrapper Start Here =================-->
    <main class="main-wrapper">
        <div class="main-content">
            @yield('content')
        </div>
    </main>

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    @section('footer')
        @include('admin.includes.partial.footer')
    @show

    @section('cart')
        @include('admin.includes.partial.cart')
    @show

    @section('switcher')
        @include('admin.includes.partial.switcher')
    @show

    <!--end main wrapper-->

    <script src="{{ asset('static/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.min.js') }}"></script>
    <script src="{{ asset('static/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('static/plugins/metismenu/metisMenu.min.js') }}"></script>

    @yield('extra_js')

    <script src="{{ asset('static/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('static/js/main.js') }}"></script>
</body>

</html>
