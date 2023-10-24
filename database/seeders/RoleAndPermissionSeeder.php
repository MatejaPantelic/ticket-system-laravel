<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $controllerRole = Role::create(['name' => 'controller']);

        Permission::create(['name' => 'create-ticket']);
        Permission::create(['name' => 'information-ticket']);
        Permission::create(['name' => 'check-ticket']);
        Permission::create(['name' => 'show-users-list']);

        $adminRole->syncPermissions([
            'create-ticket',
            'show-users-list',
        ]);
        $controllerRole->syncPermissions([
            'information-ticket',
            'check-ticket',
        ]);
    }
}
