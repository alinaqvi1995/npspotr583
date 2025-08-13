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
                                        &copy; <script>document.write(new Date().getFullYear())</script> Dosix. Crafted with 
                                        <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-8 col-xxl-4 mx-auto order-first order-xl-last">
                        <div class="card shadow-lg border-none m-lg-5">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-4 pb-2">
                                        <a href="{{ url('/') }}" class="auth-logo">
                                            <img src="{{ asset('admin-assets/images/logo-dark.png') }}" alt="" height="30" class="auth-logo-dark mx-auto">
                                            <img src="{{ asset('admin-assets/images/logo-light.png') }}" alt="" height="30" class="auth-logo-light mx-auto">
                                        </a>
                                    </div>
                                    <h5 class="fs-3xl">Welcome Back</h5>
                                    <p class="text-muted">Sign in to continue to Dosix.</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <!-- Laravel session status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Login form -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter email" required autofocus>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <div class="float-end">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                                @endif
                                            </div>
                                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="password" id="password"
                                                    class="form-control pe-5 @error('password') is-invalid @enderror"
                                                    placeholder="Enter password" required>
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                                @error('password')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>

                                        <!-- Submit -->
                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                        </div>
                                    </form>

                                    <!-- Social Login Buttons -->
                                    <div class="mt-4 pt-2 text-center">
                                        <div class="signin-other-title position-relative">
                                            <h5 class="fs-md mb-4 title">Sign In with</h5>
                                        </div>
                                        <div class="pt-2 hstack gap-2 justify-content-center">
                                            <button type="button" class="btn btn-subtle-primary btn-icon"><i class="ri-facebook-fill fs-lg"></i></button>
                                            <button type="button" class="btn btn-subtle-danger btn-icon"><i class="ri-google-fill fs-lg"></i></button>
                                            <button type="button" class="btn btn-subtle-dark btn-icon"><i class="ri-github-fill fs-lg"></i></button>
                                            <button type="button" class="btn btn-subtle-info btn-icon"><i class="ri-twitter-fill fs-lg"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Signup Link -->
                                <div class="text-center mt-5">
                                    <p class="mb-0">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="fw-semibold text-secondary text-decoration-underline">Sign Up</a>
                                    </p>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
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