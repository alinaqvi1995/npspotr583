<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PanelType;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PanelRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Panel Types
        $panel1 = PanelType::create(['name' => 'Panel Type 1', 'description' => 'Full Access']);
        $panel2 = PanelType::create(['name' => 'Panel Type 2', 'description' => 'Limited Access']);
        $panel3 = PanelType::create(['name' => 'Panel Type 3', 'description' => 'Custom Access']);

        // Create Roles
        $roleAdmin      = Role::create(['name' => 'Admin', 'slug' => 'admin']);
        $roleManager    = Role::create(['name' => 'Manager', 'slug' => 'manager']);
        $roleDispatcher = Role::create(['name' => 'Dispatcher', 'slug' => 'dispatcher']);
        $roleOrderTaker = Role::create(['name' => 'Order Taker', 'slug' => 'order_taker']);

        // Create Permissions
        $permManageQuotes        = Permission::create(['name' => 'Manage Quotes', 'slug' => 'manage-quotes']);
        $permViewQuotes          = Permission::create(['name' => 'View Quotes', 'slug' => 'view-quotes']);
        $permViewSubcategories   = Permission::create(['name' => 'View Subcategories', 'slug' => 'view-subcategories']);
        $permCreateSubcategories = Permission::create(['name' => 'Create Subcategories', 'slug' => 'create-subcategories']);

        // Assign Permissions to Roles (except Admin, because they bypass)
        $roleManager->permissions()->attach([$permViewQuotes->id]);
        $roleDispatcher->permissions()->attach([$permViewQuotes->id]);
        $roleOrderTaker->permissions()->attach([$permViewQuotes->id]);

        // Create Users for each role
        $users = [
            ['name' => 'Super Admin', 'email' => 'admin@mail.com', 'password' => '12345678', 'role' => $roleAdmin, 'panels' => [$panel1, $panel2, $panel3], 'permissions' => [$permManageQuotes, $permViewQuotes, $permViewSubcategories, $permCreateSubcategories]],
            ['name' => 'Manager User', 'email' => 'manager@mail.com', 'password' => '12345678', 'role' => $roleManager, 'panels' => [$panel2]],
            ['name' => 'Dispatcher User', 'email' => 'dispatcher@mail.com', 'password' => '12345678', 'role' => $roleDispatcher, 'panels' => [$panel2]],
            ['name' => 'Order Taker User', 'email' => 'ordertaker@mail.com', 'password' => '12345678', 'role' => $roleOrderTaker, 'panels' => [$panel3]],
        ];

        foreach ($users as $u) {
            $user = User::firstOrCreate(
                ['email' => $u['email']],
                ['name' => $u['name'], 'password' => Hash::make($u['password'])]
            );

            // Attach panels
            if (isset($u['panels'])) {
                $user->panelTypes()->sync(collect($u['panels'])->pluck('id')->toArray());
            }

            // Attach role
            $user->roles()->sync([$u['role']->id]);

            // For admin, attach all permissions explicitly
            if ($u['role']->slug === 'admin' && isset($u['permissions'])) {
                $user->permissions()->sync(collect($u['permissions'])->pluck('id')->toArray());
            }
        }

        $this->command->info('✅ Panel types, roles, permissions, and all users seeded successfully. Admin has full access.');
    }
}
