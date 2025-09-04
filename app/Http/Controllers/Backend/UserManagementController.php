<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\PanelType;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'allUsers'   => 'view-users',
            'userUpdate' => 'edit-users',
            'userDestroy' => 'delete-users',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function allUsers(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.users.index', compact('users'));
    }

    public function userCreate()
    {
        $roles = Role::all();
        $panelTypes = PanelType::all();
        $permissions = Permission::all();

        return view('dashboard.users.create', compact('roles', 'panelTypes', 'permissions'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'roles' => 'required|array',
            'panel_types' => 'nullable|array',
            'permissions' => 'nullable|array',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Sync pivots
        $user->roles()->sync($request->roles);
        $user->panelTypes()->sync($request->panel_types ?? []);
        $user->directPermissions()->sync($request->permissions ?? []);

        return redirect()->route('dashboard.users.index')->with('success', 'User created successfully.');
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        $panelTypes = PanelType::all();

        return view('dashboard.users.edit', compact('user', 'roles', 'permissions', 'panelTypes'));
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

        return redirect()->route('dashboard.users.index')->with('success', 'User updated successfully.');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('dashboard.users.index')->with('success', 'User deleted successfully.');
    }

    public function toggleActive(User $user)
    {
        $user->is_active = !$user->is_active;
        if ($user->is_active) {
            $user->force_logout = false;
        }

        $user->save();

        return back()->with('success', 'User status updated.');
    }

    public function forceLogout(User $user)
    {
        $user->force_logout = true;
        $user->save();

        return back()->with('success', 'User will be logged out on next request.');
    }
}
