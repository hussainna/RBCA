<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create-role', 'guard_name' => 'web'],
            ['name' => 'view-role', 'guard_name' => 'web'],
            ['name' => 'edit-role', 'guard_name' => 'web'],
            ['name' => 'delete-role', 'guard_name' => 'web'],

            ['name' => 'create-permission', 'guard_name' => 'web'],
            ['name' => 'view-permission', 'guard_name' => 'web'],
            ['name' => 'edit-permission', 'guard_name' => 'web'],
            ['name' => 'delete-permission', 'guard_name' => 'web'],

        ];

        foreach ($permissions as $role) {
            Permission::create($role);
        }

        // Create Super Admin Role
        $superAdminRole = Role::firstOrCreate(['name' => 'admin']);

        $PermissionNames = array_column($permissions, 'name');

        $superAdminRole->syncPermissions($PermissionNames);

    }
}
