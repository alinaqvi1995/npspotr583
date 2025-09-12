@extends('dashboard.includes.partial.base')

@section('title', 'Quotes Histories Report')

@section('content')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
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
                    <input type="hidden" name="date_from" id="dateFrom" value="{{ request('date_from') }}">
                    <input type="hidden" name="date_to" id="dateTo" value="{{ request('date_to') }}">
                    <input type="hidden" name="status" id="selectedStatus" value="{{ request('status') }}">
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Filter</button>
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
                        data-status="{{ Str::slug($status) }}">
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

        {{-- Quotes Table --}}
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
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function() {
            let selectedStatus = $('#selectedStatus').val() || '';

            function loadQuotes(url, params = {}, loadTable = false) {
                // Only add table param when we actually want the table
                if (loadTable) params.table = 1;

                if (loadTable) {
                    $("#quotesTableWrapper").show();
                    $("#quotesTableContainer").html('<div class="text-center p-4">Loading...</div>');
                }

                $.get(url, params, function(data) {
                    if (loadTable) {
                        $("#quotesTableContainer").html(data.html);
                    }

                    // Always update status counts dynamically
                    if (data.statusCounts) {
                        $.each(data.statusCounts, function(status, count) {
                            $('.status-box[data-status="' + status + '"] span').text(count);
                        });
                    }
                }).fail(function(xhr) {
                    if (loadTable) {
                        $("#quotesTableContainer").html(
                            '<div class="text-danger p-3">Error loading data.</div>');
                    }
                    console.error('AJAX error', xhr);
                });
            }

            // --- Status box click ---
            $(document).on("click", ".status-box", function() {
                $('.status-box').removeClass('active');
                $(this).addClass('active');

                selectedStatus = $(this).data('status');
                $('#selectedStatus').val(selectedStatus);

                loadQuotes("{{ route('reports.quotes.histories') }}", {
                    status: selectedStatus,
                    date_from: $('#dateFrom').val(),
                    date_to: $('#dateTo').val()
                }, true); // <-- true = load table
            });

            // --- Date filter submit ---
            // --- Date filter submit ---
            $('form[action="{{ route('reports.quotes.histories') }}"]').on('submit', function(e) {
                e.preventDefault(); // prevent page reload

                // collect filter values
                let dateFrom = $('#dateFrom').val();
                let dateTo = $('#dateTo').val();
                let status = $('#selectedStatus').val();

                // AJAX request
                $.get("{{ route('reports.quotes.histories') }}", {
                    date_from: dateFrom,
                    date_to: dateTo,
                    status: status
                }, function(data) {
                    // Update status counts
                    if (data.statusCounts) {
                        console.log('yes innn');
                        console.log(data.statusCounts);
                        $.each(data.statusCounts, function(status, count) {
                            let key = status.toLowerCase().replace(/\s+/g, '-');
                            $('.status-box[data-status="' + key + '"] span').text(count);
                        });
                    }

                    // Optionally hide table if open
                    $('#quotesTableWrapper').hide();
                    $('#quotesTableContainer').html(
                        '<div class="text-center text-muted">Click a status box to load quotes.</div>'
                    );

                    // remove active class from status boxes (optional)
                    $('.status-box').removeClass('active');
                }).fail(function(xhr) {
                    console.error('Error updating filter counts', xhr);
                });
            });

            // --- Pagination ---
            $(document).on("click", "#quotesTableWrapper .pagination a", function(e) {
                e.preventDefault();
                const url = $(this).attr("href");
                loadQuotes(url, {
                    status: selectedStatus,
                    date_from: $('#dateFrom').val(),
                    date_to: $('#dateTo').val()
                }, true);
            });

            // --- Close table ---
            $(document).on('click', '#closeTableBtn', function() {
                $('#quotesTableWrapper').hide();
                $('#quotesTableContainer').html(
                    '<div class="text-center text-muted">Click a status box to load quotes.</div>');
                $('.status-box').removeClass('active');
                $('#selectedStatus').val('');
                selectedStatus = '';
            });

            // --- Date picker ---
            $('#dateRangePicker').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
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

            // --- Auto-load table only if status pre-selected ---
            if (selectedStatus) {
                $('.status-box[data-status="' + selectedStatus + '"]').trigger('click');
            }
        });
    </script>
@endsection
