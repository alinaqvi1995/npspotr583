<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Activity;
use App\Models\VehicleMakeModel;

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

    public function activityLogs()
    {
        $logs = Activity::latest()->paginate(20);
        return view('dashboard.pages.activity_logs', compact('logs'));
    }
}
