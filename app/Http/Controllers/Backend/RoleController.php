<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class RoleController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'index'   => 'view-roles',
            'store'   => 'create-roles',
            'update'  => 'edit-roles',
            'destroy' => 'delete-roles',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('dashboard.pages.roles', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'slug' => 'required|string|max:255|unique:roles,slug',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create($request->only(['name', 'slug']));

        if ($request->filled('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        Activity::create([
            'log_name'     => 'role',
            'description'  => 'Role created',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => Role::class,
            'subject_id'   => $role->id,
            'properties'   => [
                'new_values'  => $role->getAttributes(),
                'permissions' => $request->permissions ?? [],
                'ip_address'  => $request->ip(),
                'user_agent'  => $request->userAgent(),
                'location'    => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'slug' => 'required|string|max:255|unique:roles,slug,' . $role->id,
            'permissions' => 'nullable|array',
        ]);

        $original = $role->getOriginal();

        $role->update($request->only(['name', 'slug']));
        $role->permissions()->sync($request->permissions ?? []);

        Activity::create([
            'log_name'     => 'role',
            'description'  => 'Role updated',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => Role::class,
            'subject_id'   => $role->id,
            'properties'   => [
                'old_values'  => $original,
                'new_values'  => $role->getAttributes(),
                'permissions' => $request->permissions ?? [],
                'ip_address'  => $request->ip(),
                'user_agent'  => $request->userAgent(),
                'location'    => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $attributes = $role->getAttributes();
        $permissions = $role->permissions()->pluck('id')->toArray();

        $role->permissions()->detach();
        $role->users()->detach();
        $role->delete();

        Activity::create([
            'log_name'     => 'role',
            'description'  => 'Role deleted',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => Role::class,
            'subject_id'   => $role->id,
            'properties'   => [
                'old_values'  => $attributes,
                'permissions' => $permissions,
                'ip_address'  => request()->ip(),
                'user_agent'  => request()->userAgent(),
                'location'    => [
                    'city'   => request()->header('X-Geo-City'),
                    'region' => request()->header('X-Geo-Region'),
                    'country' => request()->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
