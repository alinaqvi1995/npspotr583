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
    <link rel="apple-touch-icon" href="{{ asset('web-assets/images/fav.svg') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web-assets/images/fav.svg') }}" />

    <!-- Bootstrap  v5.1.3 css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/bootstrap.min.css') }}" />
    <!-- Meanmenu  css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/meanmenu.css') }}" />
    <!-- Sal css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/sal.css') }}" />
    <!-- Magnific css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/magnific-popup.css') }}" />
    <!-- Swiper Slider css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/swiper.min.css') }}" />
    <!-- Carousel css file -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/owl.carousel.css') }}" />
    <!-- Icons css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/icons.css') }}" />
    <!-- Odometer css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/odometer.min.css') }}" />
    <!-- Select css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/nice-select.css') }}" />
    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/animate.css') }}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/style.css') }}" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('web-assets/css/responsive.css') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <style>
        .suggestions-box {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            z-index: 9999;
            display: none;
        }

        .suggestions-box div {
            padding: 8px 12px;
            cursor: pointer;
        }

        .suggestions-box div:hover {
            background: #f0f0f0;
        }
    </style>

    {{-- Header --}}
    @include('partials.site.header')

    @yield('content')

    {{-- Footer --}}
    @include('partials.site.footer')

    <!-- Modernizr.JS -->
    <script src="{{ asset('web-assets/js/modernizr-2.8.3.min.js') }}"></script>
    <!-- jQuery.min JS -->
    <script src="{{ asset('web-assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap.min JS -->
    <script src="{{ asset('web-assets/js/bootstrap.min.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('web-assets/js/meanmenu.js') }}"></script>
    <!-- Imagesloaded JS -->
    <script src="{{ asset('web-assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope JS -->
    <script src="{{ asset('web-assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Magnific JS -->
    <script src="{{ asset('web-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Swiper.min JS -->
    <script src="{{ asset('web-assets/js/swiper.min.js') }}"></script>
    <!-- Owl.min JS -->
    <script src="{{ asset('web-assets/js/owl.carousel.js') }}"></script>
    <!-- Appear JS -->
    <script src="{{ asset('web-assets/js/jquery.appear.min.js') }}"></script>
    <!-- Odometer JS -->
    <script src="{{ asset('web-assets/js/odometer.min.js') }}"></script>
    <!-- Sal JS -->
    <script src="{{ asset('web-assets/js/sal.js') }}"></script>
    <!-- Nice JS -->
    <script src="{{ asset('web-assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('web-assets/js/main.js') }}"></script>
    <script src="{{ asset('web-assets/js/extra.js') }}"></script>

    @yield('scripts')


    <!-- Include Select2 CSS & JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.make-select, .model-select').select2({
                width: '100%',
                placeholder: '-- Select --'
            });

            $(document).on('change', '.make-select', function() {
                const make = $(this).val();
                const $modelSelect = $(this).closest('.vehicle-item').find('.model-select');

                $modelSelect.html('<option value="">-- Select Model --</option>');

                if (make) {
                    $.ajax({
                        url: "{{ route('vehicles.models') }}",
                        data: {
                            make: make
                        },
                        success: function(models) {
                            models.forEach(model => {
                                $modelSelect.append('<option value="' + model + '">' +
                                    model + '</option>');
                            });
                            $modelSelect.trigger('change'); // refresh Select2
                        },
                        error: function() {
                            alert('Failed to fetch models.');
                        }
                    });
                }
            });

            function bindSearch(inputId, suggestionBoxId) {
                let selected = false;

                $(inputId).on('keyup', function() {
                    let query = $(this).val();
                    selected = false;

                    if (query.length < 2) {
                        $(suggestionBoxId).hide();
                        return;
                    }

                    $.ajax({
                        url: "{{ route('zipcode.searchByLocation') }}",
                        data: {
                            q: query
                        },
                        success: function(data) {
                            let html = '';
                            if (data.length > 0) {
                                data.forEach(item => {
                                    html +=
                                        `<div class="suggestion-item">${item.label}</div>`;
                                });
                            } else {
                                html = '<div>No results found</div>';
                            }
                            $(suggestionBoxId).html(html).show();
                        }
                    });
                });

                $(document).on('click', suggestionBoxId + ' .suggestion-item', function() {
                    $(inputId).val($(this).text());
                    $(suggestionBoxId).hide();
                    selected = true;
                });

                // Hide dropdown if clicked outside
                $(document).on('click', function(e) {
                    if (!$(e.target).closest(inputId).length && !$(e.target).closest(suggestionBoxId)
                        .length) {
                        $(suggestionBoxId).hide();
                    }
                });

                // Restrict form submission if value not selected from suggestions
                $('form').on('submit', function(e) {
                    if (!selected) {
                        e.preventDefault();
                        alert('Please select a location from the suggestions.');
                    }
                });
            }

            bindSearch('#pickup-location', '#pickup-suggestions');
            bindSearch('#delivery-location', '#delivery-suggestions');
        });
    </script>

</body>

</html>
