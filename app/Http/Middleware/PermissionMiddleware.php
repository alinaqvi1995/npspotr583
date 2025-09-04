<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permissions)
    {
        $user = $request->user();
        if (!$user) {
            abort(403, 'Forbidden');
        }

        if ($request->has('status') && !empty($request->status)) {
            $status = Str::title(str_replace('-', ' ', $request->status));

            if (!$user->hasRole('admin')) {
                $allowedStatuses = $user->allPermissions()
                    ->filter(fn($perm) => str_starts_with($perm->slug, 'view-quotes-'))
                    ->pluck('slug')
                    ->map(fn($slug) => Str::title(str_replace('view-quotes-', '', $slug)))
                    ->toArray();

                if (!in_array($status, $allowedStatuses)) {
                    abort(403, 'Forbidden');
                }
            }
        }

        if (!empty($permissions) && !$user->hasRole('admin')) {
            $required = array_filter(array_map('trim', explode(',', $permissions)));
            if (!$user->hasAllPermissions($required)) {
                abort(403, 'Forbidden');
            }
        }

        return $next($request);
    }
}
