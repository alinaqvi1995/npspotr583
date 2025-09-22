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
                                    <h4 class="fw-semibold mb-0 fs-4 mb-0">Jhon Anderson!</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">$65.4K<i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h4>
                                    <p class="mb-3">Today's Sales</p>
                                    <div class="progress mb-0" style="height:5px;">
                                        <div class="progress-bar bg-grd-success" role="progressbar" style="width: 60%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="vr"></div>
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">78.4%<i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h4>
                                    <p class="mb-3">Growth Rate</p>
                                    <div class="progress mb-0" style="height:5px;">
                                        <div class="progress-bar bg-grd-danger" role="progressbar" style="width: 60%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <h5 class="mb-0">42.5K</h5>
                            <p class="mb-0">Active Users</p>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart-container2">
                        <div id="chart1"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 font-12">24K users increased from last month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0">97.4K</h5>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart-container2">
                        <div id="chart2"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 font-12"><span class="text-success me-1">12.5%</span> from last month</p>
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
                    <p>Avrage monthly sale for every author</p>
                    <div class="d-flex align-items-center gap-3 mt-4">
                        <div class="">
                            <h1 class="mb-0 text-primary">68.9%</h1>
                        </div>
                        <div class="d-flex align-items-center align-self-end">
                            <p class="mb-0 text-success">34.5%</p>
                            <span class="material-icons-outlined text-success">expand_less</span>
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
                                <h5 class="mb-0">Device Type</h5>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="piechart-legend">
                                <h2 class="mb-1">68%</h2>
                                <h6 class="mb-0">Total Views</h6>
                            </div>
                            <div id="chart6"></div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                        class="material-icons-outlined fs-6 text-primary">desktop_windows</span>Desktop</p>
                                <div class="">
                                    <p class="mb-0">35%</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                        class="material-icons-outlined fs-6 text-danger">tablet_mac</span>Tablet</p>
                                <div class="">
                                    <p class="mb-0">48%</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                        class="material-icons-outlined fs-6 text-success">phone_android</span>Mobile</p>
                                <div class="">
                                    <p class="mb-0">27%</p>
                                </div>
                            </div>
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
                                    <h5 class="mb-0">82.7K</h5>
                                    <p class="mb-0">Total Clicks</p>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chart-container2">
                                <div id="chart3"></div>
                            </div>
                            <div class="text-center">
                                <p class="mb-0 font-12"><span class="text-success me-1">12.5%</span> from last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex align-items-stretch">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-1">
                                <div class="">
                                    <h5 class="mb-0">68.4K</h5>
                                    <p class="mb-0">Total Views</p>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chart-container2">
                                <div id="chart4"></div>
                            </div>
                            <div class="text-center">
                                <p class="mb-0 font-12">35K users increased from last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="">
                            <h3 class="mb-0">85,247</h3>
                        </div>
                        <div class="flex-grow-0">
                            <p
                                class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                                <span class="material-icons-outlined fs-6">arrow_downward</span>23.7%
                            </p>
                        </div>
                    </div>
                    <p class="mb-0">Total Accounts</p>
                    <div id="chart7"></div>
                </div>
            </div>
        </div>
        @php
            $statuses = [
                'New' => 'fiber_new',
                'In Progress' => 'hourglass_top',
                'Completed' => 'check_circle',
                'Cancelled' => 'cancel',
                'Asking Low' => 'trending_down',
                'Interested' => 'thumb_up',
                'Follow Up' => 'schedule',
                'Not Interested' => 'thumb_down',
                'No Response' => 'phone_missed',
                'Booked' => 'event_available',
                'Payment Missing' => 'payment',
                'Listed' => 'list',
                'Dispatch' => 'local_shipping',
                'Pickup' => 'shopping_bag',
                'Delivery' => 'done_all',
                'Deleted' => 'delete',
            ];
        @endphp

        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <h6 class="mb-0 fw-bold">Quote Stats</h6>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach ($statuses as $status => $icon)
                            @php
                                $count = \App\Models\Quote::where('status', $status)->count();
                                $total = \App\Models\Quote::count();
                                $percentage = $total ? round(($count / $total) * 100, 1) . '%' : '0%';
                            @endphp
                            <li class="list-group-item px-0 bg-transparent">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-primary">
                                        <span class="material-icons-outlined text-white">{{ $icon }}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $status }}</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="mb-0">{{ $count }}</p>
                                        <p class="mb-0 fw-bold text-success">{{ $percentage }}</p>
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
                <div class="card-body">
                    <div id="chart8"></div>
                    <div class="d-flex align-items-center gap-3 mt-4">
                        <div class="">
                            <h1 class="mb-0">36.7%</h1>
                        </div>
                        <div class="d-flex align-items-center align-self-end gap-2">
                            <span class="material-icons-outlined text-success">trending_up</span>
                            <p class="mb-0 text-success">34.5%</p>
                        </div>
                    </div>
                    <p class="mb-4">Visitors Growth</p>
                    <div class="d-flex flex-column gap-3">
                        <div class="">
                            <p class="mb-1">Cliks <span class="float-end">2589</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-grd-primary" style="width: 65%"></div>
                            </div>
                        </div>
                        <div class="">
                            <p class="mb-1">Likes <span class="float-end">6748</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-grd-warning" style="width: 55%"></div>
                            </div>
                        </div>
                        <div class="">
                            <p class="mb-1">Upvotes <span class="float-end">9842</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-grd-info" style="width: 45%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Social Leads</h5>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between gap-4">
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1">
                                <img src="{{ asset('admin/images/apps/17.png') }}" width="32" alt="">
                                <p class="mb-0">Facebook</p>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">55%</p>
                            </div>
                            <div class="">
                                <p class="mb-0 data-attributes">
                                    <span
                                        data-peity='{ "fill": ["#0d6efd", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1">
                                <img src="{{ asset('admin/images/apps/18.png') }}" width="32" alt="">
                                <p class="mb-0">LinkedIn</p>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">67%</p>
                            </div>
                            <div class="">
                                <p class="mb-0 data-attributes">
                                    <span
                                        data-peity='{ "fill": ["#fc185a", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1">
                                <img src="{{ asset('admin/images/apps/19.png') }}" width="32" alt="">
                                <p class="mb-0">Instagram</p>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">78%</p>
                            </div>
                            <div class="">
                                <p class="mb-0 data-attributes">
                                    <span
                                        data-peity='{ "fill": ["#02c27a", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1">
                                <img src="{{ asset('admin/images/apps/20.png') }}" width="32" alt="">
                                <p class="mb-0">Snapchat</p>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">46%</p>
                            </div>
                            <div class="">
                                <p class="mb-0 data-attributes">
                                    <span
                                        data-peity='{ "fill": ["#fd7e14", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1">
                                <img src="{{ asset('admin/images/apps/05.png') }}" width="32" alt="">
                                <p class="mb-0">Google</p>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">38%</p>
                            </div>
                            <div class="">
                                <p class="mb-0 data-attributes">
                                    <span
                                        data-peity='{ "fill": ["#0dcaf0", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1">
                                <img src="{{ asset('admin/images/apps/08.png') }}" width="32" alt="">
                                <p class="mb-0">Altaba</p>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">15%</p>
                            </div>
                            <div class="">
                                <p class="mb-0 data-attributes">
                                    <span
                                        data-peity='{ "fill": ["#6f42c1", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1">
                                <img src="{{ asset('admin/images/apps/07.png') }}" width="32" alt="">
                                <p class="mb-0">Spotify</p>
                            </div>
                            <div class="">
                                <p class="mb-0 fs-6">12%</p>
                            </div>
                            <div class="">
                                <p class="mb-0 data-attributes">
                                    <span
                                        data-peity='{ "fill": ["#ff00b3", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-header border-0 p-3 border-bottom">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="">
                            <h5 class="mb-0">New Users</h5>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="user-list p-3">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://placehold.co/110x110/png" width="45" height="45"
                                    class="rounded-circle" alt="">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Elon Jonado</h6>
                                    <p class="mb-0">elon_deo</p>
                                </div>
                                <div class="form-check form-check-inline me-0">
                                    <input class="form-check-input ms-0" type="checkbox">
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://placehold.co/110x110/png" width="45" height="45"
                                    class="rounded-circle" alt="">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Alexzender Clito</h6>
                                    <p class="mb-0">zli_alexzender</p>
                                </div>
                                <div class="form-check form-check-inline me-0">
                                    <input class="form-check-input ms-0" type="checkbox">
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://placehold.co/110x110/png" width="45" height="45"
                                    class="rounded-circle" alt="">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Michle Tinko</h6>
                                    <p class="mb-0">tinko_michle</p>
                                </div>
                                <div class="form-check form-check-inline me-0">
                                    <input class="form-check-input ms-0" type="checkbox">
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://placehold.co/110x110/png" width="45" height="45"
                                    class="rounded-circle" alt="">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">KailWemba</h6>
                                    <p class="mb-0">wemba_kl</p>
                                </div>
                                <div class="form-check form-check-inline me-0">
                                    <input class="form-check-input ms-0" type="checkbox">
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://placehold.co/110x110/png" width="45" height="45"
                                    class="rounded-circle" alt="">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Henhco Tino</h6>
                                    <p class="mb-0">Henhco_tino</p>
                                </div>
                                <div class="form-check form-check-inline me-0">
                                    <input class="form-check-input ms-0" type="checkbox">
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://placehold.co/110x110/png" width="45" height="45"
                                    class="rounded-circle" alt="">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Gonjiko Fernando</h6>
                                    <p class="mb-0">gonjiko_fernando</p>
                                </div>
                                <div class="form-check form-check-inline me-0">
                                    <input class="form-check-input ms-0" type="checkbox">
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://placehold.co/110x110/png" width="45" height="45"
                                    class="rounded-circle" alt="">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Specer Kilo</h6>
                                    <p class="mb-0">specer_kilo</p>
                                </div>
                                <div class="form-check form-check-inline me-0">
                                    <input class="form-check-input ms-0" type="checkbox">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent p-3">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">share</i></a>
                        <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">textsms</i></a>
                        <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">email</i></a>
                        <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">attach_file</i></a>
                        <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">event</i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <h5 class="mb-0">Recent Quotes</h5>
                        <a href="{{ route('dashboard.quotes.index', ['status' => 'New'] ) }}" class="btn btn-sm btn-outline-primary">
                            View All
                        </a>
                    </div>

                    <div class="table-responsive">
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
                                @foreach (\App\Models\Quote::latest()->take(5)->get() as $quote)
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
                                            <strong>Pickup:</strong><br>
                                            Pickup Location:
                                            <a href="https://www.google.com/maps/search/{{ urlencode($quote->pickup_location) }}"
                                                target="_blank">
                                                {{ $quote->pickup_location }}
                                            </a><br>
                                            <span>Time: {{ $quote->pickup_date_formatted }}</span><br><br>

                                            <strong>Delivery:</strong><br>
                                            Delivery Location:
                                            <a href="https://www.google.com/maps/search/{{ urlencode($quote->delivery_location) }}"
                                                target="_blank">
                                                {{ $quote->delivery_location }}
                                            </a><br>
                                            <span>Time: {{ $quote->delivery_date_formatted }}</span>
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
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ asset('admin/js/dashboard1.js') }}"></script>
    <script>
        new PerfectScrollbar(".user-list")
    </script>
@endsection
