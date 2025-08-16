<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-quotes')->only(['index']);
        $this->middleware('permission:create-quotes')->only(['store']);
        $this->middleware('permission:edit-quotes')->only(['update']);
        $this->middleware('permission:delete-quotes')->only(['destroy']);
    }

    public function allQuotes(Request $request)
    {
        $quotes = Quote::with('vehicles.images')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.quote.index', compact('quotes'));
    }
    
    public function quoteDetail($id)
    {
        $quote = Quote::with('vehicles.images')->findOrFail($id);

        return view('admin.quote.details', compact('quote'));
    }
}
