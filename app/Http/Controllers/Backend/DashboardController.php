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

        // Check if user is Admin using the model helper we found earlier
        if ($user->isAdmin()) {
            $now = Carbon::now();
            $today = $now->toDateString();
            $yesterday = $now->copy()->subDay()->toDateString();

            // 1. Today's Sales
            $todaySales = Quote::whereDate('created_at', $today)->sum('amount_to_pay');
            $yesterdaySales = Quote::whereDate('created_at', $yesterday)->sum('amount_to_pay');

            $salesGrowth = 0;
            if ($yesterdaySales > 0) {
                $salesGrowth = (($todaySales - $yesterdaySales) / $yesterdaySales) * 100;
            } elseif ($todaySales > 0) {
                $salesGrowth = 100;
            }

            // 2. Growth Rate (Quotes volume change)
            $todayQuotesCount = Quote::whereDate('created_at', $today)->count();
            $yesterdayQuotesCount = Quote::whereDate('created_at', $yesterday)->count();

            $quotesGrowth = 0;
            if ($yesterdayQuotesCount > 0) {
                $quotesGrowth = (($todayQuotesCount - $yesterdayQuotesCount) / $yesterdayQuotesCount) * 100;
            } elseif ($todayQuotesCount > 0) {
                $quotesGrowth = 100;
            }

            // 3. User Stats
            $activeUsers = User::where('is_active', 1)->count();
            $totalUsers = User::count();
            $userGrowth = 0; // Simplified for now

            // 4. Revenue Trends (Last 9 months)
            $revenueTrends = collect();
            $months = collect();
            for ($i = 8; $i >= 0; $i--) {
                $date = $now->copy()->subMonths($i);
                $monthName = $date->format('M');
                $months->push($monthName);

                $sum = Quote::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('amount_to_pay');
                $revenueTrends->push($sum);
            }

            // 5. Quote Status Distribution
            $statuses = [
                'New' => 'fiber_new',
                'In Progress' => 'hourglass_top',
                'Completed' => 'check_circle',
                'Cancelled' => 'cancel',
                'Asking Low' => 'trending_down',
                'Interested' => 'thumb_up',
                'Follow Up' => 'schedule',
                'Not Interested' => 'thumb_down',
                'No Response' => 'phone_missed',
                'Booked' => 'event_available',
                'Payment Missing' => 'payment',
                'Listed' => 'list',
                'Dispatch' => 'local_shipping',
                'Pickup' => 'shopping_bag',
                'Delivery' => 'done_all',
                'Deleted' => 'delete',
            ];

            $totalQuotes = Quote::count();
            $statusStats = collect($statuses)->map(function ($icon, $status) use ($totalQuotes) {
                $count = Quote::where('status', $status)->count();
                return [
                    'status' => $status,
                    'icon' => $icon,
                    'count' => $count,
                    'percentage' => $totalQuotes > 0 ? round(($count / $totalQuotes) * 100, 1) : 0,
                ];
            });

            // 6. Recent Quotes
            $recentQuotes = Quote::latest()->take(10)->get();

            // 7. Top Pickup States
            $topStates = DB::table('quote_locations')
                ->select('state', DB::raw('count(*) as total'))
                ->where('type', 'pickup')
                ->whereNotNull('state')
                ->groupBy('state')
                ->orderByDesc('total')
                ->take(5)
                ->get();

            // 8. Top Vehicle Makes
            $topMakes = DB::table('vehicles')
                ->select('make', DB::raw('count(*) as total'))
                ->whereNotNull('make')
                ->groupBy('make')
                ->orderByDesc('total')
                ->take(5)
                ->get();

            // 9. Revenue by Category
            $revenueByCategory = DB::table('quotes')
                ->join('categories', 'quotes.category_id', '=', 'categories.id')
                ->select('categories.name', DB::raw('sum(amount_to_pay) as total'))
                ->groupBy('categories.name')
                ->get();

            // 10. Data for Charts
            $quoteCountsTrends = collect();
            for ($i = 8; $i >= 0; $i--) {
                $date = $now->copy()->subMonths($i);
                $count = Quote::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count();
                $quoteCountsTrends->push($count);
            }

            return view('dashboard.index', compact(
                'todaySales',
                'salesGrowth',
                'quotesGrowth',
                'activeUsers',
                'totalUsers',
                'months',
                'revenueTrends',
                'statusStats',
                'recentQuotes',
                'quoteCountsTrends',
                'totalQuotes',
                'topStates',
                'topMakes',
                'revenueByCategory'
            ));
        } else {
            // USER DASHBOARD LOGIC
            $statuses = [
                'New' => 'fiber_new',
                'In Progress' => 'hourglass_top',
                'Completed' => 'check_circle',
                'Cancelled' => 'cancel',
                'Asking Low' => 'trending_down',
                'Interested' => 'thumb_up',
                'Follow Up' => 'schedule',
                'Not Interested' => 'thumb_down',
                'No Response' => 'phone_missed',
                'Booked' => 'event_available',
                'Payment Missing' => 'payment',
                'Listed' => 'list',
                'Dispatch' => 'local_shipping',
                'Pickup' => 'shopping_bag',
                'Delivery' => 'done_all',
                'Deleted' => 'delete',
            ];

            // Get 'active' statuses (filter out some if needed, but user asked for "just the boxes for all statuses")
            // Stats for THIS MONTH only
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();

            $statusStats = collect($statuses)->map(function ($icon, $status) use ($user, $startOfMonth, $endOfMonth) {
                // Count quotes for this user, with this status, created this month
                $count = Quote::where('user_id', $user->id)
                    ->where('status', $status)
                    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                    ->count();

                // Get class color helper from Quote model if available, or default
                $statusConfig = Quote::$statuses[$status] ?? [];
                $colorClass = $statusConfig['class'] ?? 'bg-primary';

                return [
                    'status' => $status,
                    'icon' => $icon,
                    'count' => $count,
                    'color' => $colorClass // Pass color for UI
                ];
            });

            return view('dashboard.user_index', compact('statusStats'));
        }
    }
}
