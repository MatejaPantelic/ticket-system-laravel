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

        $adminRole->syncPermissions([
            'create-ticket',
        ]);
        $controllerRole->syncPermissions([
            'information-ticket',
            'check-ticket',
        ]);
    }
}
