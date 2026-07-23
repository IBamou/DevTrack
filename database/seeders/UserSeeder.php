<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Ilyas',
            'email' => 'ilyas@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Ahmed',
            'email' => 'ahmed@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
        ]);
    }
}
