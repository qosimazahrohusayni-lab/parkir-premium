<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Owner Parkir',
            'email' => 'owner@parkirpremium.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
            'status' => 'active',
            'phone' => '081234567890',
        ]);

        User::create([
            'name' => 'Admin Parkir',
            'email' => 'admin@parkirpremium.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '081234567891',
        ]);

        User::create([
            'name' => 'Petugas Parkir',
            'email' => 'petugas@parkirpremium.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
            'status' => 'active',
            'phone' => '081234567892',
        ]);
    }
}
