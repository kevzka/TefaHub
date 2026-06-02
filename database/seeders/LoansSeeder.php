<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class LoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loan::insert([
            // 1. Rafli pinjam Laptop (Sudah Kembali)
            [
                'user_id' => 1,
                'item_id' => 1,
                'loan_date' => Carbon::now()->subDays(10),
                'return_date' => Carbon::now()->subDays(7),
                'status' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2. Siti pinjam PC Server (Sudah Kembali)
            [
                'user_id' => 2,
                'item_id' => 2,
                'loan_date' => Carbon::now()->subDays(8),
                'return_date' => Carbon::now()->subDays(5),
                'status' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 3. Budi pinjam MikroTik (Masih Dipinjam)
            [
                'user_id' => 3,
                'item_id' => 3,
                'loan_date' => Carbon::now()->subDays(3),
                'return_date' => null, // Belum kembali
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 4. Fauzi pinjam Monitor (Masih Dipinjam)
            [
                'user_id' => 4,
                'item_id' => 4,
                'loan_date' => Carbon::now()->subDays(2),
                'return_date' => null,
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5. Amanda pinjam Drawing Tablet (Sudah Kembali)
            [
                'user_id' => 5,
                'item_id' => 5,
                'loan_date' => Carbon::now()->subDays(5),
                'return_date' => Carbon::now()->subDays(4),
                'status' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 6. Rafli pinjam MikroTik lagi (Sudah Kembali)
            [
                'user_id' => 1,
                'item_id' => 3,
                'loan_date' => Carbon::now()->subDays(6),
                'return_date' => Carbon::now()->subDays(4),
                'status' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 7. Siti pinjam Laptop (Masih Dipinjam)
            [
                'user_id' => 2,
                'item_id' => 1,
                'loan_date' => Carbon::now()->subHours(5),
                'return_date' => null,
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 8. Budi pinjam PC Server (Masih Dipinjam)
            [
                'user_id' => 3,
                'item_id' => 2,
                'loan_date' => Carbon::now()->subDays(1),
                'return_date' => null,
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 9. Fauzi pinjam Drawing Tablet (Sudah Kembali)
            [
                'user_id' => 4,
                'item_id' => 5,
                'loan_date' => Carbon::now()->subDays(12),
                'return_date' => Carbon::now()->subDays(10),
                'status' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 10. Amanda pinjam Monitor (Sudah Kembali)
            [
                'user_id' => 5,
                'item_id' => 4,
                'loan_date' => Carbon::now()->subDays(15),
                'return_date' => Carbon::now()->subDays(12),
                'status' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
