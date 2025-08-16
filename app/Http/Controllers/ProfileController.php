<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'update'  => 'edit-profile',
            'destroy' => 'delete-profile',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $original = $user->getOriginal();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        Activity::create([
            'log_name'     => 'profile',
            'description'  => 'Profile updated',
            'causer_type'  => $user::class,
            'causer_id'    => $user->id,
            'subject_type' => $user::class,
            'subject_id'   => $user->id,
            'properties'   => [
                'old_values' => $original,
                'new_values' => $user->getAttributes(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location'   => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country'=> $request->header('X-Geo-Country'),
                ],
            ],
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $attributes = $user->getAttributes();

        Activity::create([
            'log_name'     => 'profile',
            'description'  => 'Profile deleted',
            'causer_type'  => $user::class,
            'causer_id'    => $user->id,
            'subject_type' => $user::class,
            'subject_id'   => $user->id,
            'properties'   => [
                'old_values' => $attributes,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location'   => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country'=> $request->header('X-Geo-Country'),
                ],
            ],
        ]);

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
