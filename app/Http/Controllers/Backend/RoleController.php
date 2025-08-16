<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-roles')->only(['index']);
        // $this->middleware('permission:create-roles')->only(['store']);
        // $this->middleware('permission:edit-roles')->only(['update']);
        // $this->middleware('permission:delete-roles')->only(['destroy']);
    }

    // List all roles with their permissions
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.pages.roles', compact('roles'));
    }

    // Store a new role
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

        activity('role')
            ->causedBy(Auth::user())
            ->performedOn($role)
            ->withProperties([
                'new_values' => $role->getAttributes(),
                'permissions' => $request->permissions ?? [],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => [
                    'city' => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ])
            ->log('Role created');

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    // Update existing role
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'slug' => 'required|string|max:255|unique:roles,slug,' . $role->id,
            'permissions' => 'nullable|array',
        ]);

        $original = $role->getOriginal();

        $role->update($request->only(['name', 'slug']));

        // Sync permissions
        $role->permissions()->sync($request->permissions ?? []);

        activity('role')
            ->causedBy(Auth::user())
            ->performedOn($role)
            ->withProperties([
                'old_values' => $original,
                'new_values' => $role->getAttributes(),
                'permissions' => $request->permissions ?? [],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => [
                    'city' => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ])
            ->log('Role updated');

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    // Delete a role
    public function destroy(Role $role)
    {
        $attributes = $role->getAttributes();
        $permissions = $role->permissions()->pluck('id')->toArray();

        $role->permissions()->detach();
        $role->users()->detach();      
        $role->delete();

        activity('role')
            ->causedBy(Auth::user())
            ->performedOn($role)
            ->withProperties([
                'old_values' => $attributes,
                'permissions' => $permissions,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'location' => [
                    'city' => request()->header('X-Geo-City'),
                    'region' => request()->header('X-Geo-Region'),
                    'country' => request()->header('X-Geo-Country'),
                ],
            ])
            ->log('Role deleted');

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
