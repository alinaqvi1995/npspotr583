@extends('dashboard.includes.partial.base')
@section('title', 'Admin Dashboard')
@section('meta_description', 'Overview of system performance, user activity and quote pipeline.')
@section('meta_keywords', 'admin, dashboard, quotes, users, revenue')

@section('content')

{{-- Breadcrumb --}}
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <span class="text-muted small"><i class="bx bx-calendar me-1"></i>{{ now()->format('D, M d Y') }}</span>
    </div>
</div>

{{-- ======================================================
     ROW 1: KPI CARDS
     ====================================================== --}}
<div class="row g-3 mb-3">

    {{-- Total Quotes --}}
    <div class="col-6 col-md-4">
        <div class="card rounded-4 h-100 border-0" style="background: linear-gradient(135deg,#6366f1,#8b5cf6);">
            <div class="card-body text-white p-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="material-icons-outlined opacity-75 fs-2">receipt_long</span>
                    <span class="badge bg-white bg-opacity-20 text-white fw-normal small">All Time</span>
                </div>
                <h3 class="mb-0 fw-bold text-white">{{ number_format($totalQuotes) }}</h3>
                <p class="mb-0 opacity-75 small">Total Quotes</p>
            </div>
        </div>
    </div>

    {{-- Active Users --}}
    <div class="col-6 col-md-4">
        <div class="card rounded-4 h-100 border-0" style="background: linear-gradient(135deg,#f59e0b,#d97706);">
            <div class="card-body text-white p-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="material-icons-outlined opacity-75 fs-2">group</span>
                    <span class="badge bg-white bg-opacity-20 text-white fw-normal small">{{ $totalUsers }} total</span>
                </div>
                <h3 class="mb-0 fw-bold text-white">{{ $activeUsers }}</h3>
                <p class="mb-0 opacity-75 small">Active Users</p>
            </div>
        </div>
    </div>

    {{-- Booked --}}
    <div class="col-6 col-md-4">
        <div class="card rounded-4 h-100 border-0" style="background: linear-gradient(135deg,#10b981,#059669);">
            <div class="card-body text-white p-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="material-icons-outlined opacity-75 fs-2">event_available</span>
                    <span class="badge bg-white bg-opacity-20 text-white fw-normal small">{{ $completedCount }} completed</span>
                </div>
                <h3 class="mb-0 fw-bold text-white">{{ number_format($bookedCount) }}</h3>
                <p class="mb-0 opacity-75 small">Booked</p>
            </div>
        </div>
    </div>
</div>

{{-- ======================================================
     ROW 2: Pipeline Status
     ====================================================== --}}
<div class="row g-3 mb-3">

    {{-- Quote Pipeline Summary --}}
    <div class="col-12">
        <div class="card rounded-4 h-100 border-0">
            <div class="card-header border-0 pb-0 pt-3 px-3">
                <h6 class="fw-bold mb-0">
                    <span class="material-icons-outlined align-middle me-1 text-primary" style="font-size:18px;">funnel</span>
                    Quote Pipeline
                </h6>
                <p class="text-muted small mb-0">Live status distribution</p>
            </div>
            <div class="card-body px-3 pt-2 pb-3">

                @php
                    $pipeline = [
                        ['label'=>'Booked',          'count'=>$bookedCount,          'icon'=>'event_available', 'color'=>'#10b981', 'bg'=>'rgba(16,185,129,.12)'],
                        ['label'=>'In Progress',     'count'=>$inProgressCount,      'icon'=>'hourglass_top',   'color'=>'#f59e0b', 'bg'=>'rgba(245,158,11,.12)'],
                        ['label'=>'Payment Missing', 'count'=>$paymentMissingCount,  'icon'=>'payment',         'color'=>'#ef4444', 'bg'=>'rgba(239,68,68,.12)'],
                        ['label'=>'Completed',       'count'=>$completedCount,       'icon'=>'check_circle',    'color'=>'#6366f1', 'bg'=>'rgba(99,102,241,.12)'],
                        ['label'=>'Cancelled',       'count'=>$cancelledCount,       'icon'=>'cancel',          'color'=>'#6b7280', 'bg'=>'rgba(107,114,128,.12)'],
                    ];
                    $counts = array_column($pipeline, 'count');
    $pipelineMax = max(max($counts ?: [0]), 1);
                @endphp

                <div class="d-flex flex-column gap-2 mt-1">
                    @foreach($pipeline as $p)
                    <div class="d-flex align-items-center gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3"
                             style="width:34px;height:34px;background:{{ $p['bg'] }};">
                            <span class="material-icons-outlined" style="font-size:17px;color:{{ $p['color'] }};">{{ $p['icon'] }}</span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-semibold">{{ $p['label'] }}</span>
                                <span class="small fw-bold" style="color:{{ $p['color'] }};">{{ number_format($p['count']) }}</span>
                            </div>
                            <div class="progress" style="height:5px;border-radius:99px;">
                                <div class="progress-bar" role="progressbar"
                                     style="width:{{ $pipelineMax > 0 ? round(($p['count']/$pipelineMax)*100) : 0 }}%;background:{{ $p['color'] }};border-radius:99px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Extra status counts in compact chips --}}
                @php
                    $extraStatuses = $statusStats->whereNotIn('status', ['Booked','In Progress','Payment Missing','Completed','Cancelled','Deleted']);
                @endphp
                <div class="d-flex flex-wrap gap-2 mt-3 pt-2 border-top">
                    @foreach($extraStatuses as $s)
                    <span class="badge rounded-pill text-dark border fw-normal px-2 py-1 small"
                          style="background:#f8f9fa;">
                        {{ $s['status'] }}: <strong>{{ $s['count'] }}</strong>
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ======================================================
     ROW 3: User Performance Leaderboard
     ====================================================== --}}
<div class="row g-3 mb-3">
    <div class="col-12">
        <div class="card rounded-4 border-0">
            <div class="card-header border-0 pt-3 pb-0 px-3 d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="fw-bold mb-0">
                        <span class="material-icons-outlined align-middle me-1 text-warning" style="font-size:18px;">leaderboard</span>
                        User Performance Leaderboard
                    </h6>
                    <p class="text-muted small mb-0">Active users · all-time quotes & this month</p>
                </div>
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-outline-primary">
                    <span class="material-icons-outlined" style="font-size:15px;vertical-align:middle;">open_in_new</span>
                    All Users
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3" style="width:30px;">#</th>
                                <th>Agent</th>
                                <th class="text-center">Total Quotes</th>
                                <th class="text-center">This Month</th>
                                <th class="text-center">Booked</th>
                                <th class="text-center pe-3">Completed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($userPerformance as $idx => $up)
                            <tr>
                                <td class="ps-3">
                                    @if($idx === 0)
                                        <span class="material-icons-outlined text-warning" style="font-size:18px;">workspace_premium</span>
                                    @elseif($idx === 1)
                                        <span class="material-icons-outlined text-secondary" style="font-size:18px;">military_tech</span>
                                    @elseif($idx === 2)
                                        <span class="material-icons-outlined" style="font-size:18px;color:#cd7f32;">military_tech</span>
                                    @else
                                        <span class="text-muted small">{{ $idx + 1 }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white"
                                             style="width:34px;height:34px;font-size:13px;background:hsl({{ ($up['id'] * 47) % 360 }},60%,50%);">
                                            {{ strtoupper(substr($up['name'], 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold small">{{ $up['name'] }}</div>
                                            <div class="text-muted" style="font-size:11px;">
                                                {{ $up['designation'] }}{{ $up['department'] !== '-' ? ' · '.$up['department'] : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center fw-bold">{{ number_format($up['total']) }}</td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary fw-semibold">
                                        {{ $up['this_month'] }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-success bg-opacity-10 text-success fw-semibold">
                                        {{ $up['booked'] }}
                                    </span>
                                </td>
                                <td class="text-center pe-3">
                                    <span class="badge rounded-pill bg-info bg-opacity-10 text-info fw-semibold">
                                        {{ $up['completed'] }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No active agent data yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ======================================================
     ROW 4: Top States + Top Makes
     ====================================================== --}}
<div class="row g-3 mb-3">

    {{-- Top Pickup States --}}
    <div class="col-md-6">
        <div class="card rounded-4 border-0 h-100">
            <div class="card-header border-0 pt-3 pb-0 px-3">
                <h6 class="fw-bold mb-0">
                    <span class="material-icons-outlined align-middle me-1 text-info" style="font-size:18px;">location_on</span>
                    Top Pickup States
                </h6>
            </div>
            <div class="card-body px-3 pt-2">
                @php $stateMax = $topStates->max('total') ?: 1; @endphp
                @foreach($topStates as $i => $state)
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="fw-bold text-muted" style="min-width:18px;font-size:12px;">{{ $i+1 }}</span>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-semibold">{{ $state->state }}</span>
                            <span class="small text-muted">{{ number_format($state->total) }}</span>
                        </div>
                        <div class="progress" style="height:4px;">
                            <div class="progress-bar bg-info" style="width:{{ round(($state->total/$stateMax)*100) }}%;"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Top Vehicle Makes --}}
    <div class="col-md-6">
        <div class="card rounded-4 border-0 h-100">
            <div class="card-header border-0 pt-3 pb-0 px-3">
                <h6 class="fw-bold mb-0">
                    <span class="material-icons-outlined align-middle me-1 text-warning" style="font-size:18px;">directions_car</span>
                    Top Vehicle Makes
                </h6>
            </div>
            <div class="card-body px-3 pt-2">
                @php $makeMax = $topMakes->max('total') ?: 1; @endphp
                @foreach($topMakes as $i => $make)
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="fw-bold text-muted" style="min-width:18px;font-size:12px;">{{ $i+1 }}</span>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-semibold">{{ $make->make ?: 'Unknown' }}</span>
                            <span class="small text-muted">{{ number_format($make->total) }}</span>
                        </div>
                        <div class="progress" style="height:4px;">
                            <div class="progress-bar bg-warning" style="width:{{ round(($make->total/$makeMax)*100) }}%;"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

{{-- ======================================================
     ROW 5: Recent Activity
     ====================================================== --}}
<div class="row g-3 mb-3">
    <div class="col-12">
        <div class="card rounded-4 border-0">
            <div class="card-header border-0 pt-3 pb-0 px-3 d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="fw-bold mb-0">
                        <span class="material-icons-outlined align-middle me-1 text-primary" style="font-size:18px;">history</span>
                        Recent Quotes
                    </h6>
                    <p class="text-muted small mb-0">Latest 10 entries across all agents</p>
                </div>
                <a href="{{ route('dashboard.quotes.index', 'New') }}" class="btn btn-sm btn-outline-primary">
                    View All
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Quote #</th>
                                <th>Agent</th>
                                <th>Customer</th>
                                <th>Vehicle(s)</th>
                                <th>Route</th>
                                <th>Status</th>
                                <th class="pe-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentQuotes as $quote)
                            <tr>
                                <td class="ps-3">
                                    <a href="{{ route('dashboard.quotes.details', $quote->id) }}"
                                       class="fw-semibold text-decoration-none text-primary">
                                        #{{ $quote->id }}
                                    </a>
                                </td>
                                <td>
                                    <span class="small">{{ $quote->user?->name ?? '—' }}</span>
                                </td>
                                <td>
                                    <div class="fw-semibold small">{{ $quote->customer_name }}</div>
                                    <div class="text-muted" style="font-size:11px;">{{ $quote->customer_phone }}</div>
                                </td>
                                <td>
                                    @foreach($quote->vehicles->take(2) as $vehicle)
                                        <div class="small">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</div>
                                    @endforeach
                                    @if($quote->vehicles->count() > 2)
                                        <div class="text-muted" style="font-size:11px;">+{{ $quote->vehicles->count()-2 }} more</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="small">
                                        <span class="material-icons-outlined text-success" style="font-size:13px;vertical-align:middle;">arrow_upward</span>
                                        {{ $quote->pickupLocation?->full_location ?? '—' }}
                                    </div>
                                    <div class="small">
                                        <span class="material-icons-outlined text-danger" style="font-size:13px;vertical-align:middle;">arrow_downward</span>
                                        {{ $quote->deliveryLocation?->full_location ?? '—' }}
                                    </div>
                                </td>
                                <td>{!! $quote->status_label !!}</td>
                                <td class="pe-3 text-muted small">{{ $quote->created_at->format('M d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- No charts needed --}}

@endsection
