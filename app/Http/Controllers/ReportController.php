<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteHistory;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function quotesHistoriesReport(Request $request)
    {
        // Map slugs (from request) back to actual statuses
        $map = collect(\App\Models\Quote::$statuses)->keys()
            ->mapWithKeys(fn($s) => [Str::slug($s) => $s]);

        $start = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
        $end   = $request->date_to   ? Carbon::parse($request->date_to)->endOfDay()   : null;

        $response = [];

        /**
         * ----------------------------------
         * STATUS COUNTS (first time entered)
         * ----------------------------------
         */
        $countQuery = QuoteHistory::select('quote_histories.status', DB::raw('COUNT(DISTINCT quote_histories.quote_id) as count'))
            ->join(
                DB::raw('(SELECT quote_id, status, MIN(created_at) as min_created
                          FROM quote_histories
                          GROUP BY quote_id, status) as fh'),
                function ($join) {
                    $join->on('quote_histories.quote_id', '=', 'fh.quote_id')
                        ->on('quote_histories.status', '=', 'fh.status')
                        ->on('quote_histories.created_at', '=', 'fh.min_created');
                }
            );

        if ($start && $end) {
            $countQuery->whereBetween('quote_histories.created_at', [$start, $end]);
        }

        if ($request->filled('user_id')) {
            $countQuery->where('quote_histories.changed_by', $request->user_id);
        }

        $dbCounts = $countQuery->groupBy('quote_histories.status')->pluck('count', 'status')->toArray();

        // Ensure all statuses exist in response (even if count = 0)
        $statusCounts = collect(\App\Models\Quote::$statuses)
            ->keys()
            ->mapWithKeys(fn($s) => [$s => $dbCounts[$s] ?? 0])
            ->toArray();

        $response['statusCounts'] = $statusCounts;

        /**
         * -------------------
         * TABLE DATA
         * -------------------
         */
        $tableQuery = QuoteHistory::select('quote_histories.*', 'quote_histories.created_at as first_entered_at')
            ->join(
                DB::raw('(SELECT quote_id, status, MIN(created_at) as min_created
                          FROM quote_histories
                          GROUP BY quote_id, status) as fh'),
                function ($join) {
                    $join->on('quote_histories.quote_id', '=', 'fh.quote_id')
                        ->on('quote_histories.status', '=', 'fh.status')
                        ->on('quote_histories.created_at', '=', 'fh.min_created');
                }
            )
            ->with(['quote.category', 'quote.subcategory', 'user'])
            ->orderByDesc('quote_histories.created_at');

        if ($start && $end) {
            $tableQuery->whereBetween('quote_histories.created_at', [$start, $end]);
        }

        if ($request->filled('status')) {
            $status = $map[$request->status] ?? null;
            if ($status) {
                $tableQuery->where('quote_histories.status', $status);
            }
        }

        if ($request->filled('user_id')) {
            $tableQuery->where('quote_histories.changed_by', $request->user_id);
        }

        $histories = $tableQuery->paginate(5);

        $response['html'] = view('dashboard.reports.partials.quotes-table', compact('histories'))->render();

        /**
         * -------------------
         * RETURN
         * -------------------
         */
        if ($request->ajax()) {
            return response()->json($response);
        }

        // Initial page load
        return view('dashboard.reports.quotes_histories', [
            'statusCounts'  => $statusCounts,
            'categories'    => cache()->remember('categories', 3600, fn() => Category::all()),
            'subcategories' => cache()->remember('subcategories', 3600, fn() => Subcategory::all()),
            'users'         => cache()->remember('users', 3600, fn() => User::all()),
            'histories'     => $histories,
        ]);
    }
}
