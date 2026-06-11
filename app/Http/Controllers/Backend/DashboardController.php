<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $now = Carbon::now();
            $today = $now->toDateString();
            $yesterday = $now->copy()->subDay()->toDateString();
            $startOfMonth = $now->copy()->startOfMonth();
            $endOfMonth = $now->copy()->endOfMonth();

            // --- KPI Cards ---
            $totalQuotes = Quote::count();

            $monthRevenue = Quote::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('amount_to_pay');
            $lastMonthRevenue = Quote::whereBetween('created_at', [
                $now->copy()->subMonth()->startOfMonth(),
                $now->copy()->subMonth()->endOfMonth()
            ])->sum('amount_to_pay');
            $revenueGrowth = $lastMonthRevenue > 0
                ? round((($monthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100, 1)
                : ($monthRevenue > 0 ? 100 : 0);

            $activeUsers = User::where('is_active', 1)->count();
            $totalUsers  = User::count();

            // Pipeline counts (active/hot leads)
            $bookedCount       = Quote::where('status', 'Booked')->count();
            $inProgressCount   = Quote::where('status', 'In Progress')->count();
            $paymentMissingCount = Quote::where('status', 'Payment Missing')->count();
            $completedCount    = Quote::where('status', 'Completed')->count();
            $cancelledCount    = Quote::where('status', 'Cancelled')->count();

            // Success rate
            $successRate = $totalQuotes > 0 ? round(($completedCount / $totalQuotes) * 100, 1) : 0;

            // --- Revenue Trends (Last 9 months) ---
            $revenueTrends = collect();
            $months = collect();
            for ($i = 8; $i >= 0; $i--) {
                $date = $now->copy()->subMonths($i);
                $months->push($date->format('M Y'));
                $revenueTrends->push(Quote::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('amount_to_pay'));
            }

            $quoteCountsTrends = collect();
            for ($i = 8; $i >= 0; $i--) {
                $date = $now->copy()->subMonths($i);
                $quoteCountsTrends->push(Quote::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count());
            }

            // --- Simplified status funnel ---
            $statuses = [
                'New'             => 'fiber_new',
                'In Progress'     => 'hourglass_top',
                'Completed'       => 'check_circle',
                'Cancelled'       => 'cancel',
                'Asking Low'      => 'trending_down',
                'Interested'      => 'thumb_up',
                'Follow Up'       => 'schedule',
                'Not Interested'  => 'thumb_down',
                'No Response'     => 'phone_missed',
                'Booked'          => 'event_available',
                'Payment Missing' => 'payment',
                'Listed'          => 'list',
                'Dispatch'        => 'local_shipping',
                'Pickup'          => 'shopping_bag',
                'Delivery'        => 'done_all',
                'Deleted'         => 'delete',
            ];

            $statusStats = collect($statuses)->map(function ($icon, $status) use ($totalQuotes) {
                $count = Quote::where('status', $status)->count();
                return [
                    'status'     => $status,
                    'icon'       => $icon,
                    'count'      => $count,
                    'percentage' => $totalQuotes > 0 ? round(($count / $totalQuotes) * 100, 1) : 0,
                ];
            });

            // --- User Performance Leaderboard (non-admin users) ---
            $userPerformance = User::with('detail')
                ->whereDoesntHave('roles', fn($q) => $q->where('slug', 'admin'))
                ->where('is_active', 1)
                ->get()
                ->map(function ($u) use ($startOfMonth, $endOfMonth) {
                    $monthQuotes   = Quote::where('user_id', $u->id)
                        ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
                    $totalQ  = Quote::where('user_id', $u->id)->count();
                    $monthQ  = (clone $monthQuotes)->count();
                    $booked  = Quote::where('user_id', $u->id)->where('status', 'Booked')->count();
                    $completed = Quote::where('user_id', $u->id)->where('status', 'Completed')->count();
                    $revenue   = Quote::where('user_id', $u->id)->sum('amount_to_pay');
                    $monthRev  = (clone $monthQuotes)->sum('amount_to_pay');
                    return [
                        'id'          => $u->id,
                        'name'        => $u->name,
                        'designation' => $u->detail->designation ?? '-',
                        'department'  => $u->detail->department ?? '-',
                        'total'       => $totalQ,
                        'this_month'  => $monthQ,
                        'booked'      => $booked,
                        'completed'   => $completed,
                        'revenue'     => $revenue,
                        'month_rev'   => $monthRev,
                        'success_rate'=> $totalQ > 0 ? round(($completed / $totalQ) * 100, 1) : 0,
                    ];
                })
                ->sortByDesc('total')
                ->values();

            // --- Recent Quotes ---
            $recentQuotes = Quote::with(['user', 'vehicles', 'pickupLocation', 'deliveryLocation'])
                ->latest()
                ->take(10)
                ->get();

            // --- Top Pickup States ---
            $topStates = DB::table('quote_locations')
                ->select('state', DB::raw('count(*) as total'))
                ->where('type', 'pickup')
                ->whereNotNull('state')
                ->groupBy('state')
                ->orderByDesc('total')
                ->take(5)
                ->get();

            // --- Top Vehicle Makes ---
            $topMakes = DB::table('vehicles')
                ->select('make', DB::raw('count(*) as total'))
                ->whereNotNull('make')
                ->groupBy('make')
                ->orderByDesc('total')
                ->take(5)
                ->get();

            // --- Revenue by Category ---
            $revenueByCategory = DB::table('quotes')
                ->join('categories', 'quotes.category_id', '=', 'categories.id')
                ->select('categories.name', DB::raw('sum(amount_to_pay) as total'))
                ->groupBy('categories.name')
                ->get();

            return view('dashboard.index', compact(
                'totalQuotes',
                'monthRevenue',
                'revenueGrowth',
                'activeUsers',
                'totalUsers',
                'bookedCount',
                'inProgressCount',
                'paymentMissingCount',
                'completedCount',
                'cancelledCount',
                'successRate',
                'months',
                'revenueTrends',
                'quoteCountsTrends',
                'statusStats',
                'userPerformance',
                'recentQuotes',
                'topStates',
                'topMakes',
                'revenueByCategory'
            ));
        } else {
            // USER DASHBOARD LOGIC
            $statuses = [
                'New'             => 'fiber_new',
                'In Progress'     => 'hourglass_top',
                'Completed'       => 'check_circle',
                'Cancelled'       => 'cancel',
                'Asking Low'      => 'trending_down',
                'Interested'      => 'thumb_up',
                'Follow Up'       => 'schedule',
                'Not Interested'  => 'thumb_down',
                'No Response'     => 'phone_missed',
                'Booked'          => 'event_available',
                'Payment Missing' => 'payment',
                'Listed'          => 'list',
                'Dispatch'        => 'local_shipping',
                'Pickup'          => 'shopping_bag',
                'Delivery'        => 'done_all',
                'Deleted'         => 'delete',
            ];

            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth   = Carbon::now()->endOfMonth();

            $statusStats = collect($statuses)->map(function ($icon, $status) use ($user, $startOfMonth, $endOfMonth) {
                $count = Quote::where('user_id', $user->id)
                    ->where('status', $status)
                    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                    ->count();

                $statusConfig = Quote::$statuses[$status] ?? [];
                $colorClass   = $statusConfig['class'] ?? 'bg-primary';

                return [
                    'status' => $status,
                    'icon'   => $icon,
                    'count'  => $count,
                    'color'  => $colorClass,
                ];
            });

            return view('dashboard.user_index', compact('statusStats'));
        }
    }
}
