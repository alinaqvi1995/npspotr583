<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\QuoteHistory;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function quotesHistoriesReport(Request $request)
    {
        $query = QuoteHistory::query()->with([
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
            $query->where('created_at', '>=', $request->date_from . ' 00:00:00');
        } elseif ($request->filled('date_to')) {
            $query->where('created_at', '<=', $request->date_to . ' 23:59:59');
        }

        // --- Filters ---
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('change_type')) {
            $query->where('change_type', $request->change_type);
        }
        if ($request->filled('customer_name')) {
            $query->whereHas(
                'quote',
                fn($q) =>
                $q->where('customer_name', 'like', "%{$request->customer_name}%")
            );
        }
        if ($request->filled('customer_email')) {
            $query->whereHas(
                'quote',
                fn($q) =>
                $q->where('customer_email', 'like', "%{$request->customer_email}%")
            );
        }
        if ($request->filled('vehicle_type')) {
            $query->whereHas(
                'quote',
                fn($q) =>
                $q->where('vehicle_type', 'like', "%{$request->vehicle_type}%")
            );
        }
        if ($request->filled('category_id')) {
            $query->whereHas(
                'quote',
                fn($q) =>
                $q->where('category_id', $request->category_id)
            );
        }
        if ($request->filled('subcategory_id')) {
            $query->whereHas(
                'quote',
                fn($q) =>
                $q->where('subcategory_id', $request->subcategory_id)
            );
        }
        if ($request->filled('changed_by')) {
            $query->where('changed_by', $request->changed_by);
        }

        // --- AJAX request (return only quotes table) ---
        if ($request->ajax()) {
            $histories = $query->latest()->paginate(3);
            return view('dashboard.reports.partials.quotes-table', compact('histories'));
        }

        // --- Status counts (optimized, single query) ---
        $statusCounts = QuoteHistory::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        return view('dashboard.reports.quotes_histories', [
            'statusCounts' => $statusCounts,
            'categories'   => cache()->remember('categories', 3600, fn() => Category::all()),
            'subcategories' => cache()->remember('subcategories', 3600, fn() => Subcategory::all()),
            'users'        => cache()->remember('users', 3600, fn() => User::all()),
        ]);
    }
}
