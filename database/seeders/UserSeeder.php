<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@aus.com',
            'password' => 'superadmin@aus.com',
        ]);
       User::create([
            'name' => 'Admin',
            'email' => 'admin@aus.com',
            'password' => 'admin@aus.com',
        ]);
    }
}
