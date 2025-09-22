<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use App\Models\Permission;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Quote;
use App\Observers\QuoteObserver;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // 🔹 Register QuoteObserver
        Quote::observe(QuoteObserver::class);

        Gate::before(function (User $user, string $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });

        try {
            Permission::pluck('slug')->each(function ($slug) {
                Gate::define($slug, function (User $user) use ($slug) {
                    return $user->hasPermission($slug);
                });
            });
        } catch (\Exception $e) {
        }
    }
}
