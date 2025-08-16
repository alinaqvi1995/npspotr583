<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SetPanelType
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('current_panel_type') && Auth::check()) {
            session(['current_panel_type' => Auth::user()->panelTypes->first()->id ?? null]);
        }
        return $next($request);
    }
}
