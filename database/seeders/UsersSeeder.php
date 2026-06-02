<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Muhammad Rafli',
                'class' => 'XII PPLG 1',
                'role' => 'user',
                'email' => 'rafli@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aminah',
                'class' => 'XII PPLG 1',
                'role' => 'user',
                'email' => 'siti@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Setiawan',
                'class' => 'XII PPLG 2',
                'role' => 'user',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ahmad Fauzi',
                'class' => 'XI PPLG 1',
                'role' => 'user',
                'email' => 'fauzi@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amanda Putri',
                'class' => 'XI PPLG 2',
                'role' => 'user',
                'email' => 'amanda@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin',
                'class' => 'admin',
                'role' => 'admin', 
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user',
                'class' => 'user',
                'role' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('user123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
