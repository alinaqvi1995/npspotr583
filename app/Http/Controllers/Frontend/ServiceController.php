<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('site.services.index');
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
