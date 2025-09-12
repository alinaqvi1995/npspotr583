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
        // Map slugs back to real statuses
        $map = collect(\App\Models\Quote::$statuses)->keys()
            ->mapWithKeys(fn($s) => [Str::slug($s) => $s]);

        // Date range filter values
        $start = $end = null;
        if ($request->filled('date_from') && $request->filled('date_to')) {
            $start = $request->date_from . ' 00:00:00';
            $end   = $request->date_to . ' 23:59:59';
        }

        // --- Compute status counts (first time each status was entered per quote) ---
        $firstStatusQuery = QuoteHistory::select(
            'quote_id',
            'status',
            DB::raw('MIN(created_at) as first_entered_at')
        )
            ->groupBy('quote_id', 'status');

        if ($start && $end) {
            $firstStatusQuery->havingBetween('first_entered_at', [$start, $end]);
        }

        $dbCounts = DB::table(DB::raw("({$firstStatusQuery->toSql()}) as first_statuses"))
            ->mergeBindings($firstStatusQuery->getQuery()) // keep bindings safe
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
                // Subquery for table (first entered only)
                $tableQuery = QuoteHistory::select(
                    'quote_histories.*',
                    DB::raw('MIN(quote_histories.created_at) as first_entered_at')
                )
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
                    ->orderByDesc('first_entered_at');

                if ($start && $end) {
                    $tableQuery->whereBetween('quote_histories.created_at', [$start, $end]);
                }

                if ($request->filled('status')) {
                    $status = $map[$request->status] ?? null;
                    if ($status) {
                        $tableQuery->where('quote_histories.status', $status);
                    }
                }

                $histories = $tableQuery->paginate(5);

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
