<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'index'   => 'view-permissions',
            'store'   => 'create-permissions',
            'update'  => 'edit-permissions',
            'destroy' => 'delete-permissions',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function index()
    {
        $permissions = Permission::all();
        return view('dashboard.pages.permissions', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'slug' => 'required|string|max:255|unique:permissions,slug',
        ]);

        $permission = Permission::create($request->only(['name', 'slug']));

        activity('permission')
            ->causedBy(Auth::user())
            ->performedOn($permission)
            ->withProperties([
                'new_values' => $permission->getAttributes(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => [
                    'city' => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ])
            ->log('Permission created');

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'slug' => 'required|string|max:255|unique:permissions,slug,' . $permission->id,
        ]);

        $original = $permission->getOriginal();

        $permission->update($request->only(['name', 'slug']));

        activity('permission')
            ->causedBy(Auth::user())
            ->performedOn($permission)
            ->withProperties([
                'old_values' => $original,
                'new_values' => $permission->getAttributes(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => [
                    'city' => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ])
            ->log('Permission updated');

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $attributes = $permission->getAttributes();

        $permission->roles()->detach();
        $permission->delete();

        activity('permission')
            ->causedBy(Auth::user())
            ->performedOn($permission)
            ->withProperties([
                'old_values' => $attributes,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'location' => [
                    'city' => request()->header('X-Geo-City'),
                    'region' => request()->header('X-Geo-Region'),
                    'country' => request()->header('X-Geo-Country'),
                ],
            ])
            ->log('Permission deleted');

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
