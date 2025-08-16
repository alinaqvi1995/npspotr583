<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Admin bypass: always allow
        Gate::before(function (User $user, string $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });

        // Register all permissions as gates dynamically
        try {
            Permission::pluck('slug')->each(function ($slug) {
                Gate::define($slug, function (User $user) use ($slug) {
                    return $user->hasPermission($slug);
                });
            });
        } catch (\Exception $e) {
            // Prevent errors during migrations or fresh installs
            // logger()->error("Gate registration failed: " . $e->getMessage());
        }
    }
}
