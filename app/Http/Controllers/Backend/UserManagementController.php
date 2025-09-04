<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Role;
use App\Models\PanelType;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'allUsers' => 'view-users',
            'userUpdate' => 'edit-users',
            'userDestroy' => 'delete-users',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function allUsers()
    {
        $users = User::with('detail')->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    public function userCreate()
    {
        $roles = Role::all();
        $panelTypes = PanelType::all();
        $permissions = Permission::all();
        $users = User::all(); // For referral dropdown

        return view('dashboard.users.create', compact('roles', 'panelTypes', 'permissions', 'users'));
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
            'referral_code' => 'nullable|string|unique:user_details,referral_code',
        ]);

        // Track uploaded files for rollback cleanup
        $uploadedFiles = [];

        try {
            DB::beginTransaction();

            /** ✅ Create User */
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);

            /** ✅ File Upload Handling (store in public/userDocs) */
            $uploadPath = public_path('userDocs');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $profileImage = $this->moveFile($request->file('profile_image'), $uploadPath, $uploadedFiles);
            $resumePath   = $this->moveFile($request->file('resume_path'), $uploadPath, $uploadedFiles);
            $cnicFront    = $this->moveFile($request->file('cnic_front_path'), $uploadPath, $uploadedFiles);
            $cnicBack     = $this->moveFile($request->file('cnic_back_path'), $uploadPath, $uploadedFiles);

            /** ✅ Create UserDetail */
            $user->detail()->create([
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'emergency_contact_name' => $request->emergency_contact_name,
                'emergency_contact_phone' => $request->emergency_contact_phone,
                'emergency_contact_relation' => $request->emergency_contact_relation,

                // Personal
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'spouse_name' => $request->spouse_name,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'marital_status' => $request->marital_status,
                'religion' => $request->religion,
                'cnic' => $request->cnic,
                'nationality' => $request->nationality,

                // Education
                'highest_qualification' => $request->highest_qualification,
                'previous_company' => $request->previous_company,
                'previous_designation' => $request->previous_designation,
                'experience_years' => $request->experience_years,
                'skills' => $request->skills,

                // Employment
                'employee_code' => $request->employee_code,
                'department' => $request->department,
                'designation' => $request->designation,
                'date_of_joining' => $request->date_of_joining,
                'date_of_resignation' => $request->date_of_resignation,
                'employment_status' => $request->employment_status ?? 'Active',

                // Financial
                'basic_salary' => $request->basic_salary,
                'allowance' => $request->allowance,
                'bonus' => $request->bonus,
                'commission' => $request->commission,
                'margin' => $request->margin,
                'discount' => $request->discount,
                'bank_name' => $request->bank_name,
                'bank_account_number' => $request->bank_account_number,
                'iban' => $request->iban,
                'tax_number' => $request->tax_number,

                // Referral (safe handling)
                'referral_code' => $request->referral_code,
                'referred_by' => $request->filled('referred_by') && User::where('id', $request->referred_by)->exists() ? $request->referred_by : null,
                'referral_bonus' => $request->referral_bonus ?? 0,

                // Documents
                'profile_image' => $profileImage,
                'resume_path' => $resumePath,
                'cnic_front_path' => $cnicFront,
                'cnic_back_path' => $cnicBack,

                // Misc
                'blood_group' => $request->blood_group,
                'is_remote' => $request->is_remote ? 1 : 0,
                'shift_timings' => $request->shift_timings,
                'working_hours_per_week' => $request->working_hours_per_week,
                'leave_balance' => $request->leave_balance,
                'notes' => $request->notes,

                // Flags
                'can_login' => $request->can_login ? 1 : 0,
                'two_factor_enabled' => $request->two_factor_enabled ? 1 : 0,
            ]);

            /** ✅ Sync Roles, Panels, Permissions */
            $user->roles()->sync($request->roles);
            $user->panelTypes()->sync($request->panel_types ?? []);
            $user->directPermissions()->sync($request->permissions ?? []);

            DB::commit();

            return redirect()->route('dashboard.users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Delete uploaded files
            foreach ($uploadedFiles as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            Log::error('User creation failed: ' . $e->getMessage());

            return back()->with('error', 'Failed to create user. ' . $e->getMessage());
        }
    }

    /**
     * Move file to destination and track it for rollback
     */
    private function moveFile($file, $destinationPath, &$uploadedFiles)
    {
        if (!$file) return null;

        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        $fullPath = $destinationPath . '/' . $fileName;
        $uploadedFiles[] = $fullPath;

        return 'userDocs/' . $fileName;
    }

    public function userEdit($id)
    {
        $user = User::with('detail')->findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        $panelTypes = PanelType::all();
        $users = User::all(); // For referral selection

        return view('dashboard.users.edit', compact('user', 'roles', 'permissions', 'panelTypes', 'users'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'roles' => 'required|array',
            'panel_types' => 'nullable|array',
            'permissions' => 'nullable|array',
            'referral_code' => 'nullable|string|unique:user_details,referral_code,' . ($user->detail->id ?? 'NULL'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Update core user info
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);

            // Get existing detail or create new with defaults
            $detail = $user->detail ?: new UserDetail([
                'user_id' => $user->id,
                'commission' => 0.00,
                'margin' => 0.00,
                'discount' => 0.00,
                'referral_bonus' => 0.00,
            ]);

            // Ensure upload path exists
            $uploadPath = public_path('userDocs');
            if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

            $uploadedFiles = [];

            // Handle file uploads
            foreach (['profile_image', 'resume_path', 'cnic_front_path', 'cnic_back_path'] as $fileField) {
                if ($file = $request->file($fileField)) {
                    if ($detail->$fileField && file_exists(public_path($detail->$fileField))) {
                        unlink(public_path($detail->$fileField));
                    }
                    $detail->$fileField = $this->moveFile($file, $uploadPath, $uploadedFiles);
                }
            }

            // Fill other fields except excluded
            $detail->fill($request->except([
                'name',
                'email',
                'password',
                'roles',
                'panel_types',
                'permissions',
                'profile_image',
                'resume_path',
                'cnic_front_path',
                'cnic_back_path'
            ]));

            // Ensure NOT NULL columns are set
            $detail->commission = is_numeric($request->commission) ? $request->commission : 0.00;
            $detail->margin = is_numeric($request->margin) ? $request->margin : 0.00;
            $detail->discount = is_numeric($request->discount) ? $request->discount : 0.00;
            $detail->referral_bonus = is_numeric($request->referral_bonus) ? $request->referral_bonus : 0.00;

            $detail->save();

            // Sync roles, panels, permissions
            $user->roles()->sync($request->roles);
            $user->panelTypes()->sync($request->panel_types ?? []);
            $user->directPermissions()->sync($request->permissions ?? []);

            return redirect()->route('dashboard.users.index')
                ->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // public function userUpdate(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:6',
    //         'roles' => 'required|array',
    //         'panel_types' => 'nullable|array',
    //         'permissions' => 'nullable|array',
    //         'referral_code' => 'nullable|string|unique:user_details,referral_code,' . ($user->detail->id ?? 'NULL'),
    //     ]);

    //     /** ✅ Update User */
    //     $user->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
    //         'is_active' => $request->has('is_active') ? 1 : 0,
    //     ]);

    //     /** ✅ Update or Create UserDetail */
    //     $detail = $user->detail ?: new UserDetail(['user_id' => $user->id]);
    //     $detail->fill($request->except(['name', 'email', 'password', 'roles', 'panel_types', 'permissions']));
    //     $detail = $user->detail ?: new UserDetail(['user_id' => $user->id]);

    //     $uploadPath = public_path('userDocs');
    //     if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);

    //     if ($file = $request->file('profile_image')) {
    //         if ($detail->profile_image && file_exists(public_path($detail->profile_image))) {
    //             unlink(public_path($detail->profile_image));
    //         }
    //         $detail->profile_image = $this->moveFile($file, $uploadPath, $uploadedFiles = []);
    //     }

    //     if ($file = $request->file('resume_path')) {
    //         if ($detail->resume_path && file_exists(public_path($detail->resume_path))) {
    //             unlink(public_path($detail->resume_path));
    //         }
    //         $detail->resume_path = $this->moveFile($file, $uploadPath, $uploadedFiles = []);
    //     }

    //     if ($file = $request->file('cnic_front_path')) {
    //         if ($detail->cnic_front_path && file_exists(public_path($detail->cnic_front_path))) {
    //             unlink(public_path($detail->cnic_front_path));
    //         }
    //         $detail->cnic_front_path = $this->moveFile($file, $uploadPath, $uploadedFiles = []);
    //     }

    //     if ($file = $request->file('cnic_back_path')) {
    //         if ($detail->cnic_back_path && file_exists(public_path($detail->cnic_back_path))) {
    //             unlink(public_path($detail->cnic_back_path));
    //         }
    //         $detail->cnic_back_path = $this->moveFile($file, $uploadPath, $uploadedFiles = []);
    //     }

    //     $detail->fill($request->except([
    //         'name',
    //         'email',
    //         'password',
    //         'roles',
    //         'panel_types',
    //         'permissions',
    //         'profile_image',
    //         'resume_path',
    //         'cnic_front_path',
    //         'cnic_back_path'
    //     ]));
    //     $detail->save();

    //     /** ✅ Sync Roles, Panels, Permissions */
    //     $user->roles()->sync($request->roles);
    //     $user->panelTypes()->sync($request->panel_types ?? []);
    //     $user->directPermissions()->sync($request->permissions ?? []);

    //     return redirect()->route('dashboard.users.index')->with('success', 'User updated successfully.');
    // }

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
