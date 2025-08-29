<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
