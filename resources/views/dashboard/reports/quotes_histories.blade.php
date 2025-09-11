@extends('dashboard.includes.partial.base')

@section('title', 'Quotes Histories Report')

@section('content')
    {{-- Load Material Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    {{-- Date Range Picker CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
        /* Highlight selected status box */
        .status-box.active {
            border: 2px solid #0d6efd;
            background-color: #eaf2ff;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.5);
        }

        .status-box.active small,
        .status-box.active span,
        .status-box.active i {
            color: #0d6efd !important;
        }
    </style>

    <div class="container-fluid">
        <h2 class="mb-4">Quotes Histories Report</h2>

        {{-- Filters --}}
        <form method="GET" action="{{ route('reports.quotes.histories') }}" class="card p-3 mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Date Range</label>
                    <input type="text" id="dateRangePicker" class="form-control" placeholder="Select date range">

                    {{-- hidden inputs for controller --}}
                    <input type="hidden" name="date_from" id="dateFrom" value="{{ request('date_from') }}">
                    <input type="hidden" name="date_to" id="dateTo" value="{{ request('date_to') }}">
                    <input type="hidden" name="status" id="selectedStatus" value="{{ request('status') }}">
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary">Filter</button>
                <a href="{{ route('reports.quotes.histories') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        {{-- Status Summary --}}
        <div class="row g-3 mb-4">
            @foreach (\App\Models\Quote::$statuses as $status => $info)
                @php
                    $colorClass = str_replace('bg-', 'text-', $info['class']);
                    $isActive = request('status') === $status ? 'active' : '';
                @endphp
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="status-box d-flex align-items-center justify-content-between rounded bg-white border p-3 shadow-sm h-100 cursor-pointer {{ $isActive }}"
                        data-status="{{ $status }}">
                        <div>
                            <small class="d-block fw-bold text-secondary">{{ $status }}</small>
                            <span class="fs-5 fw-semibold text-dark">{{ $statusCounts[$status] ?? 0 }}</span>
                        </div>
                        <i class="material-icons-outlined fs-2 {{ $colorClass }}">
                            {{ $info['icon'] }}
                        </i>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Quotes Table (AJAX target) --}}
        <div id="quotesTableWrapper" class="mt-4" style="display: none;">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Quotes</h5>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="closeTableBtn">Close</button>
                </div>
                <div class="card-body" id="quotesTableContainer">
                    <div class="text-center text-muted">Click a status box to load quotes.</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    {{-- Moment + Date Range Picker --}}
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function() {
            let selectedStatus = $('#selectedStatus').val() || '';

            function loadQuotes(url, params = {}) {
                $("#quotesTableWrapper").show();
                $("#quotesTableContainer").html('<div class="text-center p-4">Loading...</div>');

                $.get(url, params, function(data) {
                    $("#quotesTableContainer").html(data);
                }).fail(function(xhr) {
                    $("#quotesTableContainer").html(
                        '<div class="text-danger p-3">Error loading data.</div>');
                    console.error('AJAX error', xhr);
                });
            }

            // CLICK STATUS BOX
            $(document).on("click", ".status-box", function(e) {
                e.preventDefault();

                $('.status-box').removeClass('active');
                $(this).addClass('active');

                selectedStatus = $(this).data('status') ?? '';
                $('#selectedStatus').val(selectedStatus);

                const params = {
                    status: selectedStatus,
                    date_from: $('#dateFrom').val() || '',
                    date_to: $('#dateTo').val() || ''
                };

                loadQuotes("{{ route('reports.quotes.histories') }}", params);
            });

            // PAGINATION AJAX
            $(document).on("click", "#quotesTableWrapper .pagination a", function(e) {
                e.preventDefault();
                const url = $(this).attr("href");

                const params = {
                    status: $('#selectedStatus').val() || selectedStatus || '',
                    date_from: $('#dateFrom').val() || '',
                    date_to: $('#dateTo').val() || ''
                };

                loadQuotes(url, params);
            });

            // FILTER FORM AJAX
            $('form[action="{{ route('reports.quotes.histories') }}"]').on('submit', function(e) {
                e.preventDefault();

                const params = {
                    status: $('#selectedStatus').val() || '',
                    date_from: $('#dateFrom').val() || '',
                    date_to: $('#dateTo').val() || ''
                };

                loadQuotes("{{ route('reports.quotes.histories') }}", params);
            });

            // CLOSE TABLE
            $(document).on('click', '#closeTableBtn', function() {
                $('#quotesTableWrapper').hide();
                $('#quotesTableContainer').html('');
                $('.status-box').removeClass('active');
                $('#selectedStatus').val('');
                selectedStatus = '';
            });

            // INIT DATERANGEPICKER
            $('#dateRangePicker').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days')
                        .endOf('day')
                    ],
                    'This Week': [moment().startOf('week'), moment().endOf('week')],
                    'Last Week': [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week')
                        .endOf('week')
                    ],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')],
                    'This Year': [moment().startOf('year'), moment().endOf('year')],
                    'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year')
                        .endOf('year')
                    ]
                }
            });

            $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format(
                    'YYYY-MM-DD'));
                $('#dateFrom').val(picker.startDate.format('YYYY-MM-DD'));
                $('#dateTo').val(picker.endDate.format('YYYY-MM-DD'));
            });

            $('#dateRangePicker').on('cancel.daterangepicker', function() {
                $(this).val('');
                $('#dateFrom').val('');
                $('#dateTo').val('');
            });

            // If page loads with a pre-selected status (via request), show quotes
            if (selectedStatus) {
                const params = {
                    status: selectedStatus,
                    date_from: $('#dateFrom').val() || '',
                    date_to: $('#dateTo').val() || ''
                };
                loadQuotes("{{ route('reports.quotes.histories') }}", params);
            }
        });
    </script>
@endsection
