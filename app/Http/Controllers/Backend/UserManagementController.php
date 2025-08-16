<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\PanelType;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-users')->only(['allUsers']);
        // $this->middleware('permission:edit-users')->only(['userEdit', 'userUpdate']);
        // $this->middleware('permission:delete-users')->only(['destroy']);
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

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->roles()->sync($request->roles);
        $user->panelTypes()->sync($request->panel_types ?? []);
        $user->directPermissions()->sync($request->permissions ?? []);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
