<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanelType;
use App\Models\Permission;

class PanelTypeController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'index'   => 'view-panels',
            'store'   => 'create-panels',
            'duplicate' => 'create-panels',
            'update'  => 'edit-panels',
            'destroy' => 'delete-panels',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function index()
    {
        $panels = PanelType::with('permissions')->withCount('users')->orderBy('name')->get();
        $permissions = Permission::orderBy('name')->get();

        return view('dashboard.pages.panels', compact('panels', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:panel_types,name',
            'description' => 'nullable|string|max:1000',
            'permissions' => 'nullable|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        $panel = PanelType::create($request->only(['name', 'description']));

        if ($request->filled('permissions')) {
            $panel->permissions()->sync($request->permissions);
            $this->logPermissionChange($panel, [], $panel->permissions()->pluck('name')->all());
        }

        return redirect()->route('panels.index')->with('success', 'Panel created successfully.');
    }

    public function update(Request $request, PanelType $panel)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:panel_types,name,' . $panel->id,
            'description' => 'nullable|string|max:1000',
            'permissions' => 'nullable|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        // Capture the before state so the grant/revoke is auditable
        $before = $panel->permissions()->pluck('name')->all();

        $panel->update($request->only(['name', 'description']));
        $panel->permissions()->sync($request->permissions ?? []);

        $after = $panel->permissions()->pluck('name')->all();
        $this->logPermissionChange($panel, $before, $after);

        $affected = $panel->users()->count();

        return redirect()->route('panels.index')->with(
            'success',
            "Panel updated successfully. {$affected} user(s) in this panel are affected immediately."
        );
    }

    /**
     * Duplicate an existing panel with its permission set. Standard practice -
     * a new profile is almost always a variation of an existing one, and
     * cloning avoids rebuilding a permission set by hand (and mis-keying it).
     * Users are deliberately NOT copied.
     */
    public function duplicate(PanelType $panel)
    {
        $name = $panel->name . ' (Copy)';
        $suffix = 2;

        while (PanelType::where('name', $name)->exists()) {
            $name = $panel->name . " (Copy {$suffix})";
            $suffix++;
        }

        $copy = PanelType::create([
            'name' => $name,
            'description' => $panel->description,
        ]);

        $copy->permissions()->sync($panel->permissions()->pluck('permissions.id')->all());
        $this->logPermissionChange($copy, [], $copy->permissions()->pluck('name')->all());

        return redirect()->route('panels.index')
            ->with('success', "Panel cloned as \"{$name}\". It has no users assigned yet.");
    }

    public function destroy(PanelType $panel)
    {
        // A panel is a profile - deleting one that still has members would
        // silently strip access from every one of them. Require reassignment
        // first so the access change is a deliberate, visible act.
        $userCount = $panel->users()->count();

        if ($userCount > 0) {
            return redirect()->route('panels.index')->with(
                'error',
                "Cannot delete \"{$panel->name}\" - {$userCount} user(s) are still assigned to it. "
                    . 'Move them to another panel first.'
            );
        }

        $this->logPermissionChange($panel, $panel->permissions()->pluck('name')->all(), []);
        $panel->permissions()->detach();
        $panel->delete();

        return redirect()->route('panels.index')->with('success', 'Panel deleted successfully.');
    }

    /**
     * Record a permission grant/revoke in the activity log. Model events do not
     * fire on pivot syncs, so without this the audit trail cannot answer
     * "who gave this panel that permission, and when".
     */
    private function logPermissionChange(PanelType $panel, array $before, array $after): void
    {
        sort($before);
        sort($after);

        if ($before === $after) {
            return;
        }

        $panel->logCustomActivity(
            'permissions updated',
            ['permissions' => $before],
            ['permissions' => $after]
        );
    }
}
