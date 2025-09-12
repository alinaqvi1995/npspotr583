<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteHistory;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function quotesHistoriesReport(Request $request)
    {
        $query = QuoteHistory::with(['quote.category', 'quote.subcategory', 'user']);

        // Map slugs back to real statuses
        $map = collect(\App\Models\Quote::$statuses)->keys()
            ->mapWithKeys(fn($s) => [Str::slug($s) => $s]);

        // Date range filter
        if ($request->filled('date_from') && $request->filled('date_to')) {
            $start = $request->date_from . ' 00:00:00';
            $end   = $request->date_to . ' 23:59:59';
            $query->whereBetween('created_at', [$start, $end]);
        }

        // Status filter (convert slug → actual status)
        if ($request->filled('status')) {
            $status = $map[$request->status] ?? null;
            if ($status) {
                $query->where('status', $status);
            }
        }

        // --- Compute status counts ---
        $statusCountsQuery = QuoteHistory::query();

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $statusCountsQuery->whereBetween('created_at', [$start, $end]);
        }

        // Raw DB counts
        $dbCounts = $statusCountsQuery
            ->select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        // Ensure all statuses are included (missing ones = 0)
        $statusCounts = collect(\App\Models\Quote::$statuses)
            ->keys()
            ->mapWithKeys(fn($s) => [$s => $dbCounts[$s] ?? 0])
            ->toArray();

        // --- AJAX response ---
        if ($request->ajax()) {
            $response = ['statusCounts' => $statusCounts];

            if ($request->filled('table')) {
                $histories = $query->latest()->paginate(5);
                $response['html'] = view('dashboard.reports.partials.quotes-table', compact('histories'))->render();
            }

            return response()->json($response);
        }

        // --- Initial page load ---
        return view('dashboard.reports.quotes_histories', [
            'statusCounts'  => $statusCounts,
            'categories'    => cache()->remember('categories', 3600, fn() => Category::all()),
            'subcategories' => cache()->remember('subcategories', 3600, fn() => Subcategory::all()),
            'users'         => cache()->remember('users', 3600, fn() => User::all()),
        ]);
    }
}
