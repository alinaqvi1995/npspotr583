@extends('dashboard.includes.partial.base')
@section('title', 'Home')
@section('meta_description', 'Explore our SaaS solutions tailored to your business.')
@section('meta_keywords', 'SaaS, services, business software')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Analysis</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button"
                    class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
                <div class="card-body position-relative p-4">
                    <div class="row">
                        <div class="col-12 col-sm-7">
                            <div class="d-flex align-items-center gap-3 mb-5">
                                <img src="https://placehold.co/110x110/png" class="rounded-circle bg-grd-info p-1"
                                    width="60" height="60" alt="user">
                                <div class="">
                                    <p class="mb-0 fw-semibold">Welcome back</p>
                                    <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ auth()->user()->name }}!</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">
                                        ${{ number_format($todaySales / 1000, 1) }}K<i
                                            class="ti ti-arrow-up-right fs-5 lh-base {{ $salesGrowth >= 0 ? 'text-success' : 'text-danger' }}"></i>
                                    </h4>
                                    <p class="mb-3">Today's Sales</p>
                                    <div class="progress mb-0" style="height:5px;">
                                        <div class="progress-bar bg-grd-success" role="progressbar"
                                            style="width: {{ min(100, max(0, $salesGrowth)) }}%"
                                            aria-valuenow="{{ $salesGrowth }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="vr"></div>
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">
                                        {{ number_format($quotesGrowth, 1) }}%<i
                                            class="ti ti-arrow-up-right fs-5 lh-base {{ $quotesGrowth >= 0 ? 'text-success' : 'text-danger' }}"></i>
                                    </h4>
                                    <p class="mb-3">Growth Rate</p>
                                    <div class="progress mb-0" style="height:5px;">
                                        <div class="progress-bar bg-grd-danger" role="progressbar"
                                            style="width: {{ min(100, max(0, $quotesGrowth)) }}%"
                                            aria-valuenow="{{ $quotesGrowth }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5">
                            <div class="welcome-back-img pt-4">
                                <img src="{{ asset('admin/images/gallery/welcome-back-3.png') }}" height="180"
                                    alt="">
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-1">
                        <div class="">
                            <h5 class="mb-0">{{ number_format($activeUsers / 1000, 1) }}K</h5>
                            <p class="mb-0">Active Users</p>
                        </div>
                    </div>
                    <div class="chart-container2">
                        <div id="chart1"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 font-12">{{ $activeUsers }} active users out of {{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0">Top States</h5>
                            <p class="mb-0">Pickup Volume</p>
                        </div>
                    </div>
                    <div class="chart-container2">
                        <div id="chart2"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 font-12">Top states by pickup count</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="text-center">
                        <h6 class="mb-0">Monthly Revenue</h6>
                    </div>
                    <div class="mt-4" id="chart5"></div>
                    <p>Trends over the last 9 months</p>
                    <div class="d-flex align-items-center gap-3 mt-4">
                        <div class="">
                            <h1 class="mb-0 text-primary">${{ number_format($revenueTrends->last() / 1000, 1) }}K</h1>
                        </div>
                        <div class="d-flex align-items-center align-self-end text-success">
                            <p class="mb-0">Current Month</p>
                            <span class="material-icons-outlined">trending_up</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="">
                                <h5 class="mb-0">Revenue by Category</h5>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="piechart-legend">
                                <h2 class="mb-1">${{ number_format($revenueTrends->sum() / 1000, 1) }}K</h2>
                                <h6 class="mb-0">Total Revenue</h6>
                            </div>
                            <div id="chart6"></div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            @foreach ($revenueByCategory->take(3) as $rev)
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 d-flex align-items-center gap-2 w-50">
                                        <span class="material-icons-outlined fs-6 text-primary">category</span>
                                        {{ $rev->name }}
                                    </p>
                                    <div class="">
                                        <p class="mb-0">${{ number_format($rev->total / 1000, 1) }}K</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="row">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-1">
                                <div class="">
                                    <h5 class="mb-0">{{ $totalQuotes }}</h5>
                                    <p class="mb-0">Total Quotes</p>
                                </div>
                            </div>
                            <div class="chart-container2">
                                <div id="chart3"></div>
                            </div>
                            <div class="text-center">
                                <p class="mb-0 font-12">Quotes volume trends</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex align-items-stretch">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-1">
                                <div class="">
                                    <h5 class="mb-0">Top Makes</h5>
                                    <p class="mb-0">Vehicle Volume</p>
                                </div>
                            </div>
                            <div class="chart-container2">
                                <div id="chart4"></div>
                            </div>
                            <div class="text-center">
                                <p class="mb-0 font-12">Most common vehicles</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-4 text-center p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-2 justify-content-center">
                        <h3 class="mb-0">{{ number_format($totalQuotes) }}</h3>
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>Dynamic
                        </p>
                    </div>
                    <p class="mb-0">Total Life-time Quotes</p>
                    <div id="chart7"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <h6 class="mb-0 fw-bold">Quote Stats Detail</h6>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach ($statusStats as $stat)
                            <li class="list-group-item px-0 bg-transparent">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-primary">
                                        <span class="material-icons-outlined text-white">{{ $stat['icon'] }}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $stat['status'] }}</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="mb-0">{{ $stat['count'] }}</p>
                                        <p class="mb-0 fw-bold text-success">{{ $stat['percentage'] }}%</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body text-center">
                    <div id="chart8"></div>
                    <div class="d-flex align-items-center gap-3 mt-4 justify-content-center">
                        <h1 class="mb-0">
                            {{ $totalQuotes > 0 ? round((($statusStats->where('status', 'Completed')->first()['count'] ?? 0) / $totalQuotes) * 100, 1) : 0 }}%
                        </h1>
                        <div class="d-flex align-items-center align-self-end gap-2 text-success">
                            <span class="material-icons-outlined">trending_up</span>
                            <p class="mb-0">Success Rate</p>
                        </div>
                    </div>
                    <p class="mb-4">Overall Performance</p>
                    <div class="d-flex flex-column gap-3 text-start">
                        @foreach ($statusStats->take(4) as $stat)
                            <div class="">
                                <p class="mb-1">{{ $stat['status'] }} <span
                                        class="float-end">{{ $stat['count'] }}</span></p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-grd-info" style="width: {{ $stat['percentage'] }}%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <h6 class="mb-0 fw-bold">Top Pickup States</h6>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach ($topStates as $state)
                            <li class="list-group-item px-0 bg-transparent">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-info">
                                        <span class="material-icons-outlined text-white">location_on</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $state->state }}</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="mb-0">{{ $state->total }}</p>
                                        <p class="mb-0 fw-bold text-success">
                                            {{ $totalQuotes > 0 ? round(($state->total / $totalQuotes) * 100, 1) : 0 }}%
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-header border-0 p-3 border-bottom">
                    <h5 class="mb-0">Top Vehicle Makes</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($topMakes as $make)
                            <li class="list-group-item px-0 bg-transparent">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-warning">
                                        <span class="material-icons-outlined text-white">directions_car</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $make->make }}</h6>
                                    </div>
                                    <div class="">
                                        <p class="mb-0 fw-bold">{{ $make->total }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 rounded-4 text-center">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <h5 class="mb-0">Recent Activity</h5>
                        <a href="{{ route('dashboard.quotes.index', 'New') }}" class="btn btn-sm btn-outline-primary">
                            View All Quotes
                        </a>
                    </div>

                    <div class="table-responsive text-start">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Sr#.</th>
                                    <th>Quote #</th>
                                    <th>Customer</th>
                                    <th>Vehicles</th>
                                    <th>Pickup / Delivery</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentQuotes as $quote)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.quotes.details', $quote->id) }}"
                                                class="text-decoration-none">
                                                #{{ $quote->id }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $quote->customer_name }}<br>
                                            <small>{{ $quote->customer_email }}</small><br>
                                            <small>{{ $quote->customer_phone }}</small>
                                        </td>
                                        <td>
                                            @foreach ($quote->vehicles as $vehicle)
                                                <p class="mb-1">{{ $vehicle->year }} {{ $vehicle->make }}
                                                    {{ $vehicle->model }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            <strong>P:</strong> {{ $quote->pickupLocation?->full_location ?? '-' }}<br>
                                            <strong>D:</strong> {{ $quote->deliveryLocation?->full_location ?? '-' }}
                                        </td>
                                        <td>
                                            {!! $quote->status_label !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script>
        // Inject data for global use in dashboard js
        window.dashboardData = {
            revenueTrends: @json($revenueTrends),
            months: @json($months),
            quoteCountsTrends: @json($quoteCountsTrends),
            statusStats: @json($statusStats->values()),
            totalQuotes: {{ $totalQuotes }},
            activeUsers: {{ $activeUsers }},
            totalUsers: {{ $totalUsers }},
            topStatesValue: @json($topStates->pluck('total')),
            topStatesName: @json($topStates->pluck('state')),
            topMakesValue: @json($topMakes->pluck('total')),
            topMakesName: @json($topMakes->pluck('make')),
            revenueByCategory: @json($revenueByCategory->pluck('total')),
            categoryNames: @json($revenueByCategory->pluck('name'))
        };
    </script>
    <script src="{{ asset('admin/js/dashboard1.js') }}"></script>
    <script>
        $(".data-attributes span").peity("donut")
        new PerfectScrollbar(".user-list")
    </script>
@endsection
