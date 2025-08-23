<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)->get();
        return view('site.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $latestServices = Service::where([
            ['status', '=', 1],
            ['id', '!=', $service->id],
        ])
            ->latest()
            ->take(5)
            ->get();
        return view('frontend.services.show', compact('service', 'latestServices'));
    }

    public function carservice()
    {
        return view('site.services.car-shipping');
    }
    public function bikeservice()
    {
        return view('site.services.motorcycle-shipping');
    }
    public function heavyservice()
    {
        return view('site.services.heavy-equipment-shipping');
    }
}
