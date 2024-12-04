<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $adminUser = User::firstOrCreate(
            ['email' => 'maryse@example.com'],
            [
                'name' => 'Maryse',
                'password' => bcrypt('password123'),
            ]
        );

        $adminUser->assignRole($adminRole);
    }
}
