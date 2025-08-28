<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VehicleMakeModel;

class HomeController extends Controller
{
    public function index()
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return view('site.home', compact('makes'));
    }
    public function privacy()
    {
        return view('site.privacy');
    }
}
