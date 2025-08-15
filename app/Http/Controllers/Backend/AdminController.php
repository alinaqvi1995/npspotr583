<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $quotes = Quote::with('vehicles.images')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.quote.index', compact('quotes'));
    }
}
