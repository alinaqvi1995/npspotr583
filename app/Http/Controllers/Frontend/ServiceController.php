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
    public function show($slug)
    {
        // Map slugs to view names
        $pages = [
            'car-shipping' => 'services.car-shipping',
            'motorcycle-shipping' => 'services.motorcycle-shipping',
            'heavy-equipment-shipping' => 'services.heavy-equipment-shipping',
        ];

        // If slug exists in map, load it, else 404
        if (array_key_exists($slug, $pages)) {
            return view($pages[$slug]);
        }

        abort(404);
    }

}
