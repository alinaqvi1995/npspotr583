<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="Admin & Dashboard" name="description">
        <meta content="Dashboard" name="author">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="admin-assets/images/favicon.ico">
        <!-- Fonts css load -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link id="fontsLink" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">    <!--Swiper slider css-->
        <link href="admin-assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
        <!-- Layout config Js -->
        <script src="admin-assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="admin-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="admin-assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="admin-assets/css/app.min.css" rel="stylesheet" type="text/css">
        <!-- custom Css-->
        <link href="admin-assets/css/custom.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <section class="auth-page-wrapper p-2 p-lg-4 position-relative d-flex align-items-center justify-content-center min-vh-100">
            <div class="card mb-0 w-100 p-3 p-lg-2" style="background-image: url('{{ asset('admin-assets/images/auth/auth.jpg') }}');background-size: cover;background-position: center;">
                <div class="effect-one"></div>
                <div class="row g-0 align-items-center">
                    <div class="col-xxl-8 order-last order-xl-first">
                        <div class="card auth-card border-0 shadow-none mb-0 bg-transparent">
                            <div class="card-body p-4 p-xl-5 d-flex justify-content-between flex-column h-100">
                                <div class="text-center mt-auto">
                                    <p class="mb-0 mt-3 text-white">
                                        &copy;
                                        <script>document.write(new Date().getFullYear())</script> Dosix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="col-xxl-4 mx-auto">
                        <div class="card shadow-lg border-none m-lg-5">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-4 pb-2">
                                        <a href="{{ route('home') }}" class="auth-logo">
                                            <img src="{{ asset('admin-assets/images/logo-dark.png') }}" alt="" height="30" class="auth-logo-dark mx-auto">
                                            <img src="{{ asset('admin-assets/images/logo-light.png') }}" alt="" height="30" class="auth-logo-light mx-auto">
                                        </a>
                                    </div>
                                    <h5 class="fs-3xl">Create your free account</h5>
                                    <p class="text-muted">Get your free Dosix account now</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                                        @csrf

                                        <!-- Name -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" class="form-control password-input pe-5" id="password" name="password" required autocomplete="new-password" placeholder="Enter password">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                            </div>
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                        </div>
                                    </form>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Already have an account? 
                                            <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline">Signin</a>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                </div>
            </div>
        </section>

        <script src="admin-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="admin-assets/libs/simplebar/dist/simplebar.min.js"></script>
        <script src="admin-assets/js/plugins.js"></script>    
        <script src="admin-assets/libs/list.js/dist/list.min.js"></script>
        <!--Swiper slider js-->
        <script src="admin-assets/libs/swiper/swiper-bundle.min.js"></script>
        <!-- apexcharts -->
        <script src="admin-assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <!--dashboard doctor init js-->
        <script src="admin-assets/js/pages/dashboard-doctor.init.js"></script>
        <!-- App js -->
        <script src="admin-assets/js/app.js"></script>
    </body>
</html>