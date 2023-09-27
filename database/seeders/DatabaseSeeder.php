<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleAndPermissionSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'controller',
            'surname' => 'controller',
            'email' => 'controller@controller.com',
            'password' => Hash::make('controller'),
        ])->assignRole('controller');
    }
}
