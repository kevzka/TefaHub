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
                'name' => 'Laptop ASUS ROG Core i7',
                'amount' => 10,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PC Server UNBK/TEFA',
                'amount' => 2,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MikroTik RouterBoard RB951',
                'amount' => 15,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Monitor LG 24 Inch',
                'amount' => 5,
                'status' => 'not available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Drawing Tablet Wacom',
                'amount' => 1,
                'status' => 'damaged',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
