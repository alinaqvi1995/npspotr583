<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\PanelType;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Services\ActivityLogService;

class UserManagementController extends Controller
{
    protected $activityLog;

    public function __construct(ActivityLogService $activityLog)
    {
        $this->activityLog = $activityLog;
    }

    public function allUsers(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        $panelTypes = PanelType::all();

        return view('admin.users.edit', compact('user', 'roles', 'permissions', 'panelTypes'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'roles' => 'required|array',
            'panel_types' => 'nullable|array',
            'permissions' => 'nullable|array',
        ]);

        $original = $user->getOriginal();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Sync pivots
        $user->roles()->sync($request->roles);
        $user->panelTypes()->sync($request->panel_types ?? []);
        $user->directPermissions()->sync($request->permissions ?? []);

        // Log detailed activity
        $this->activityLog->log(
            'user',
            'User updated',
            $user,
            $original,
            $user->getAttributes(),
            [
                'roles' => $request->roles ?? [],
                'permissions' => $request->permissions ?? [],
                'panel_types' => $request->panel_types ?? []
            ]
        );

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);

        // Log before delete
        $this->activityLog->log(
            'user',
            'User deleted',
            $user,
            $user->getOriginal(),
            [],
            [
                'roles' => $user->roles()->pluck('id')->toArray(),
                'permissions' => $user->directPermissions()->pluck('id')->toArray(),
                'panel_types' => $user->panelTypes()->pluck('id')->toArray()
            ]
        );

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
