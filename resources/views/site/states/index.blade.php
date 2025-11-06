@extends('layouts.guest')
@section('title', 'State')
<style>
    /* --- States Map Section --- */
    .states-map-container {
        background-color: var(--tj-dark-color2); /* light background for contrast */
        padding: 60px 0;
    }

    .states-map-title {
        font-family: var(--tj-ff-title);
        color: var(--tj-secondary-color);
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 20px;
    }

    .states-map-description {
        font-family: var(--tj-ff-body);
        color: var(--tj-body-color);
        text-align: center;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    #states-map {
        width: 100%;
        height: 550px;
    }

    /* AnyChart tooltip and map theme */
    .anychart-credits {
        display: none !important;
    }

    .anychart-tooltip {
        background-color: var(--tj-white-color);
        border: 1px solid var(--tj-gray-color3);
        color: var(--tj-dark-color);
        font-family: var(--tj-ff-body);
        font-size: 14px;
        border-radius: 6px;
        padding: 8px 12px;
    }

    /* Custom color theme for regions */
    .state-hover {
        fill: var(--tj-primary-color) !important;
        cursor: pointer;
    }

    .state-default {
        fill: var(--tj-primary-color2);
        stroke: var(--tj-gray-color4);
        stroke-width: 0.5px;
        transition: 0.3s ease;
    }

    .state-default:hover {
        fill: var(--tj-primary-color);
        stroke: var(--tj-primary-color3);
    }
</style>
@section('content')
<!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Service Page</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="{{ route('home') }}">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> Service</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--========== breadcrumb End ==============-->
@include('site.partials.stateservice')
<!--========== About Content Start ==============-->
<!--========== About Content End ==============-->



@endsection
