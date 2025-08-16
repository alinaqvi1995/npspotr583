<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permissions)
    {
        $user = $request->user();
        if (! $user) abort(403, 'Forbidden');

        if ($user->hasRole('admin')) {
            return $next($request);
        }

        $required = array_filter(array_map('trim', explode(',', $permissions)));

        if (! $user->hasAllPermissions($required)) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
