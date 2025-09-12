<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\VehicleMakeModel;
use App\Models\Blog;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)
            ->whereRaw('id % 2 = 1') 
            ->latest()
            ->get();
        $blogs = Blog::latest()->take(3)->get();
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return view('site.home', compact('services','makes','blogs'));
    }
    public function about()
    {
        $services = Service::where('status', 1)->latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return view('site.about', compact('services','makes','blogs'));
    }
    public function getModels(Request $request)
    {
        $make = $request->query('make');
        if (!$make) {
            return response()->json([]);
        }

        $models = VehicleMakeModel::where('make', $make)
            ->distinct()
            ->orderBy('model')
            ->pluck('model');

        return response()->json($models);
    }
    public function getMakes($year = null)
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return response()->json($makes);
    }


    public function privacy()
    {
        return view('site.privacy');
    }
}
