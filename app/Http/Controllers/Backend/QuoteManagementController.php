<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\VehicleMakeModel;
use Illuminate\Support\Str;

class QuoteManagementController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'allQuotes'   => 'view-quotes',
            'quoteDetail'   => 'view-quoteDetail',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function allQuotes(Request $request)
    {
        $query = Quote::with('vehicles.images')
            ->orderBy('created_at', 'desc');

        if ($request->has('status') && !empty($request->status)) {
            $status = Str::title(str_replace('-', ' ', $request->status));
            $query->where('status', $status);
        }

        $quotes = $query->paginate(10);

        return view('dashboard.quote.index', compact('quotes'));
    }

    public function quoteDetail($id)
    {
        $quote = Quote::with('vehicles.images')->findOrFail($id);
        return view('dashboard.quote.details', compact('quote'));
    }

    public function quoteCreate()
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        $models = VehicleMakeModel::get();
        dd('yes inn', $models);

        $models = VehicleMakeModel::select('make', 'model')
            ->orderBy('make')
            ->get()
            ->groupBy('make')
            ->map(function ($items) {
                return $items->pluck('model')->toArray();
            })
            ->toArray();

        return view('dashboard.quote.create', compact('makes', 'models'));
    }
}
