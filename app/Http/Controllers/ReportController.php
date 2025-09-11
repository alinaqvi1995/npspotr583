<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\QuoteHistory;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class ReportController extends Controller
{
    public function quotesHistoriesReport(Request $request)
    {
        $query = QuoteHistory::with([
            'quote.vehicles.images',
            'quote.pickupLocation',
            'quote.deliveryLocation',
            'quote.category',
            'quote.subcategory',
            'user'
        ]);

        // --- Date Range Filter ---
        if ($request->filled('date_from') && $request->filled('date_to')) {
            $start = $request->date_from . ' 00:00:00';
            $end   = $request->date_to . ' 23:59:59';
            $query->whereBetween('created_at', [$start, $end]);
        } elseif ($request->filled('date_from')) {
            $start = $request->date_from . ' 00:00:00';
            $query->where('created_at', '>=', $start);
        } elseif ($request->filled('date_to')) {
            $end = $request->date_to . ' 23:59:59';
            $query->where('created_at', '<=', $end);
        }

        // --- Status Filter ---
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // --- Change Type ---
        if ($request->filled('change_type')) {
            $query->where('change_type', $request->change_type);
        }

        // --- Customer Name / Email ---
        if ($request->filled('customer_name')) {
            $query->whereHas('quote', function ($q) use ($request) {
                $q->where('customer_name', 'like', '%' . $request->customer_name . '%');
            });
        }
        if ($request->filled('customer_email')) {
            $query->whereHas('quote', function ($q) use ($request) {
                $q->where('customer_email', 'like', '%' . $request->customer_email . '%');
            });
        }

        // --- Vehicle Type ---
        if ($request->filled('vehicle_type')) {
            $query->whereHas('quote', function ($q) use ($request) {
                $q->where('vehicle_type', 'like', '%' . $request->vehicle_type . '%');
            });
        }

        // --- Category / Subcategory ---
        if ($request->filled('category_id')) {
            $query->whereHas('quote', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }
        if ($request->filled('subcategory_id')) {
            $query->whereHas('quote', function ($q) use ($request) {
                $q->where('subcategory_id', $request->subcategory_id);
            });
        }

        // --- Changed By (user) ---
        if ($request->filled('changed_by')) {
            $query->where('changed_by', $request->changed_by);
        }

        // --- AJAX request (return only quotes table) ---
        if ($request->ajax()) {
            $histories = $query->latest()->get();
            $quotes = $histories->pluck('quote')->filter();
            return view('dashboard.reports.partials.quotes-table', compact('quotes'));
        }

        // --- Status counts ---
        $statusCounts = [];
        foreach (Quote::$statuses as $status => $info) {
            $statusCounts[$status] = (clone $query)->where('status', $status)->count();
        }

        return view('dashboard.reports.quotes_histories', [
            'statusCounts' => $statusCounts,
            'categories' => Category::all(),
            'subcategories' => Subcategory::all(),
            'users' => User::all(),
        ]);
    }
}
