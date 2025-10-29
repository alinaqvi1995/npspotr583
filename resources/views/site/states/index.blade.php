@extends('layouts.guest')
@section('title', 'State')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Our State Listings</h2>
    <div class="row g-4">
        @foreach($states as $state)
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset($state->banner_image) }}" class="card-img-top" alt="{{ $state->state_name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $state->state_name }}</h5>
                    <p class="text-muted mb-2">{{ $state->short_title ?? '—' }}</p>
                    <a href="{{ route('states.show', $state->slug) }}" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
