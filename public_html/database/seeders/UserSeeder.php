<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@jeunesseaubinoise.be'],
            [
                'first_name' => 'Loïc',
                'last_name' => 'Carlier',
                'password' => 'password',
                'role' => 'member',
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@jeunesseaubinoise.be'],
            [
                'first_name' => 'Admin',
                'last_name' => 'Jeunesse',
                'password' => 'password',
                'role' => 'admin',
                'is_active' => true,
            ]
        );
    }
}
