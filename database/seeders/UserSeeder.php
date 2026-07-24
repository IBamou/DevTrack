<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Maroua',
            'email' => 'maroua@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Youssef',
            'email' => 'youssef@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Fatima',
            'email' => 'fatima@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Omar',
            'email' => 'omar@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Salma',
            'email' => 'salma@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
    }
}
