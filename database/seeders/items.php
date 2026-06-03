<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class items extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::insert([
            [
                'nama_barang' => 'Laptop ASUS ROG Core i7',
                'kategori_barang' => 'Laptop',
                'stok' => 10,
                'kondisi_barang' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Mouse Logitech',
                'kategori_barang' => 'Aksesoris',
                'stok' => 15,
                'kondisi_barang' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Keyboard Mechanical',
                'kategori_barang' => 'Aksesoris',
                'stok' => 8,
                'kondisi_barang' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Monitor LG 24 Inch',
                'kategori_barang' => 'Monitor',
                'stok' => 5,
                'kondisi_barang' => 'not available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Drawing Tablet Wacom',
                'kategori_barang' => 'Aksesoris',
                'stok' => 1,
                'kondisi_barang' => 'damaged',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
