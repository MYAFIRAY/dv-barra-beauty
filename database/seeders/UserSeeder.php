<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1. Akun Pemilik (Owner)
        User::create([
            'name'     => 'M Yafi Ray (Owner)',
            'email'    => 'owner@dvbarra.com',
            'password' => Hash::make('password123'),
            'role'     => 'owner',
        ]);

        // 2. Akun Admin / Kasir
        User::create([
            'name'     => 'Kasir DV Barra',
            'email'    => 'admin@dvbarra.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);
        
        // 3. Akun Dummy Pelanggan (Customer)
        User::create([
            'name'     => 'Pelanggan Setia',
            'email'    => 'customer@gmail.com',
            'password' => Hash::make('password123'),
            'role'     => 'customer',
        ]);
    }
}