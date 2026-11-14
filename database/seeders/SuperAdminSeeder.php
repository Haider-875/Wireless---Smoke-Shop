<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@bugswireless.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('SuperAdmin@Bugs2026!'),
                'is_admin' => true,
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );

        // Also ensure existing admin has admin role
        User::where('email', 'admin@bugswireless.com')->update([
            'role' => 'admin',
        ]);
    }
}

