@extends('dashboard.includes.partial.base')

@section('title', 'Dashboard')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card rounded-4">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0">Your Quick Stats (Current Month)</h5>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @foreach ($statusStats as $stat)
                    <div class="col">
                        <div class="card h-100 border shadow-none rounded-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="wh-48 d-flex align-items-center justify-content-center rounded-3 {{ $stat['color'] }} text-white">
                                        <span class="material-icons-outlined">{{ $stat['icon'] }}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $stat['status'] }}</h6>
                                        <h4 class="mb-0 mt-2">{{ $stat['count'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection