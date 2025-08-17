<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserActive
{
    public function handle(Request $request, Closure $next)
    {
        if ($user = Auth::user()) {

            if ($user->hasRole('admin')) {
                return $next($request);
            }

            if (!$user->isActive()) {
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['Your account has been deactivated.']);
            }

            if ($user->isForcedLogout()) {
                $user->force_logout = false;
                $user->save();

                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['You have been logged out by admin.']);
            }
        }

        return $next($request);
    }
}
