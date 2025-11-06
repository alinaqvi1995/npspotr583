<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VehicleMakeModel;
use App\Models\Blog;
use App\Models\Service;
use App\Models\State;

class StateFrontendController extends Controller
{
    // public function index()
    // {
    //     $states = State::latest()->get();
    //             $services = Service::where('status', 1)
    //         ->whereRaw('id % 2 = 1')
    //         ->latest()
    //         ->get();

    //     $blogs = Blog::latest()->take(3)->get();

    //     $makes = VehicleMakeModel::select('make')
    //         ->distinct()
    //         ->orderBy('make')
    //         ->pluck('make');
    //     return view('site.states.index', compact('states','services','makes','blogs'));
    // }
    public function index()
    {
        // Get states with only the fields needed for the map and listing
        $states = State::select('id', 'state_name', 'slug', 'short_title', 'banner_image', 'description_one')
            ->latest()
            ->get();

        // Existing data — keep as is
        $services = Service::where('status', 1)
            ->whereRaw('id % 2 = 1')
            ->latest()
            ->get();

        $blogs = Blog::latest()->take(3)->get();

        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        // Pass everything to view
        return view('site.states.index', compact('states', 'services', 'makes', 'blogs'));
    }


    public function show($slug)
    {
        $state = State::where('slug', $slug)->firstOrFail();
        $services = Service::where('status', 1)
            ->whereRaw('id % 2 = 1')
            ->latest()
            ->get();

        $blogs = Blog::latest()->take(3)->get();

        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');
        return view('site.states.show', compact('state','services','makes','blogs'));
    }
}
