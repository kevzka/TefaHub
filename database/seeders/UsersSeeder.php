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
                'nama_peminjam' => 'Ahmad Fauzan',
                'kelas' => 'XII PPLG 1',
                'jurusan' => 'PPLG',
                'no_hp' => '081234567801',
                'role' => 'user',
                'email' => 'rafli@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Rizky Pratama',
                'kelas' => 'XII PPLG 2',
                'jurusan' => 'PPLG',
                'no_hp' => '081234567802',
                'role' => 'user',
                'email' => 'siti@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Dinda putri',
                'kelas' => 'XII PPLG 1',
                'jurusan' => 'PPLG',
                'no_hp' => '081234567803',
                'role' => 'user',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Ahmad Fauzi',
                'kelas' => 'XI PPLG 1',
                'jurusan' => 'PPLG',
                'no_hp' => '081234567804',
                'role' => 'user',
                'email' => 'fauzi@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'Amanda Putri',
                'kelas' => 'XI PPLG 2',
                'jurusan' => 'PPLG',
                'no_hp' => '081234567805',
                'role' => 'user',
                'email' => 'amanda@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'admin',
                'kelas' => 'admin',
                'jurusan' => 'admin',
                'no_hp' => '081234567806',
                'role' => 'admin', 
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_peminjam' => 'user',
                'kelas' => 'user',
                'jurusan' => 'user',
                'no_hp' => '081234567807',
                'role' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('user123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
