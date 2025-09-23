<!doctype html>
<html lang="en" data-bs-theme="semi-dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bridgeway</title>
    <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }}" type="image/png">

    <!-- inject:css -->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>

    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!--plugins-->
    <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/plugins/fullcalendar/css/main.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}">

    <!--bootstrap css-->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">

    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

    <!--main css-->
    <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/responsive.css') }}" rel="stylesheet">

    @yield('extra_css')
</head>

<body>
    <style>
        .suggestions-box {
            position: relative;
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

        .make-select,
        .model-select {
            width: 100%;
        }

        select option {
            white-space: nowrap;
        }
    </style>

    @section('navbar')
        @include('dashboard.includes.partial.nav')
    @show

    @section('sidebar')
        @include('dashboard.includes.partial.sidebar')
    @show

    <!--================= Wrapper Start Here =================-->
    <main class="main-wrapper">
        <div class="main-content">
            {{-- Success message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Generic error message --}}
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    @section('footer')
        @include('dashboard.includes.partial.footer')
    @show

    @section('cart')
        @include('dashboard.includes.partial.cart')
    @show

    @section('switcher')
        @include('dashboard.includes.partial.switcher')
    @show

    <!--end main wrapper-->

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/plugins/metismenu/metisMenu.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Bootstrap bundle -->
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

    @yield('extra_js')

    @if (Route::currentRouteName() !== 'reports.quotes.histories')
        <script>
            // Initialize DataTable
            let table = $('.datatable').DataTable({
                "paging": true,
                "pageLength": 10,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });

            // modal
            if ($.fn.modal) {
                // Patch enforceFocus only if Constructor exists (Bootstrap 4.x)
                if ($.fn.modal.Constructor) {
                    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
                }
            }

            $('.select2').select2({
                theme: 'bootstrap-5',
                width: '100%',
                allowClear: true,
            });

            function bindSearch(inputId, suggestionBoxId, cityId, stateId, zipId) {
                let selected = false;

                $(inputId).on('keyup', function() {
                    let query = $(this).val();
                    selected = false;

                    $(inputId).removeClass('is-invalid');
                    $(inputId).siblings('.invalid-feedback').remove();

                    if (query.length < 2) {
                        $(suggestionBoxId).slideUp(200);
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
                                    // pass structured data with dataset
                                    html += `<div class="suggestion-item" 
                                    data-city="${item.city}" 
                                    data-state="${item.state}" 
                                    data-zip="${item.zip}">
                                    ${item.label}
                                 </div>`;
                                });
                            } else {
                                html = '<div class="p-2 text-muted">No results found</div>';
                            }

                            $(suggestionBoxId).html(html).stop(true, true).slideDown(200);
                        }
                    });
                });

                // On selecting suggestion
                $(document).on('click', suggestionBoxId + ' .suggestion-item', function() {
                    let city = $(this).data('city');
                    let state = $(this).data('state');
                    let zip = $(this).data('zip');

                    $(inputId).val($(this).text()); // show full label in search box
                    $(cityId).val(city);
                    $(stateId).val(state);
                    $(zipId).val(zip);

                    $(suggestionBoxId).slideUp(200);
                    selected = true;
                });

                // Close dropdown if clicked outside
                $(document).on('click', function(e) {
                    if (!$(e.target).closest(inputId).length && !$(e.target).closest(suggestionBoxId).length) {
                        $(suggestionBoxId).slideUp(200);
                    }
                });

                // Validate on form submit
                // $('form').on('submit', function(e) {
                //     if (!selected) {
                //         e.preventDefault();

                //         if (!$(inputId).hasClass('is-invalid')) {
                //             $(inputId).addClass('is-invalid')
                //                 .after(
                //                     '<div class="invalid-feedback">Please select a location from the suggestions.</div>'
                //                 );
                //         }

                //         $(suggestionBoxId).stop(true, true).slideDown(200);
                //     }
                // });
            }

            bindSearch('#pickup-location', '#pickup-suggestions', '#pickup_city', '#pickup_state', '#pickup_zip');
            bindSearch('#delivery-location', '#delivery-suggestions', '#delivery_city', '#delivery_state', '#delivery_zip');
        </script>
    @endif

    <script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>

</html>
