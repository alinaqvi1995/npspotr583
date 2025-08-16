<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

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

        Activity::create([
            'log_name'     => 'permission',
            'description'  => 'Permission created',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => Permission::class,
            'subject_id'   => $permission->id,
            'properties'   => [
                'new_values'  => $permission->getAttributes(),
                'ip_address'  => $request->ip(),
                'user_agent'  => $request->userAgent(),
                'location'    => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country'=> $request->header('X-Geo-Country'),
                ],
            ],
        ]);

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

        Activity::create([
            'log_name'     => 'permission',
            'description'  => 'Permission updated',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => Permission::class,
            'subject_id'   => $permission->id,
            'properties'   => [
                'old_values'  => $original,
                'new_values'  => $permission->getAttributes(),
                'ip_address'  => $request->ip(),
                'user_agent'  => $request->userAgent(),
                'location'    => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country'=> $request->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $attributes = $permission->getAttributes();
        $permission->roles()->detach();
        $permission->delete();

        Activity::create([
            'log_name'     => 'permission',
            'description'  => 'Permission deleted',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => Permission::class,
            'subject_id'   => $permission->id,
            'properties'   => [
                'old_values'  => $attributes,
                'ip_address'  => request()->ip(),
                'user_agent'  => request()->userAgent(),
                'location'    => [
                    'city'   => request()->header('X-Geo-City'),
                    'region' => request()->header('X-Geo-Region'),
                    'country'=> request()->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
