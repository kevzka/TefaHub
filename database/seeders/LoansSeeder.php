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
                'peminjam_id' => 1,
                'barang_id' => 1,
                'tanggal_pinjam' => Carbon::now()->subDays(10),
                'tanggal_kembali' => Carbon::now()->subDays(7),
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2. Siti pinjam PC Server (Sudah Kembali)
            [
                'peminjam_id' => 2,
                'barang_id' => 2,
                'tanggal_pinjam' => Carbon::now()->subDays(8),
                'tanggal_kembali' => Carbon::now()->subDays(5),
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 3. Budi pinjam MikroTik (Masih Dipinjam)
            [
                'peminjam_id' => 3,
                'barang_id' => 3,
                'tanggal_pinjam' => Carbon::now()->subDays(3),
                'tanggal_kembali' => null,
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 4. Fauzi pinjam Monitor (Masih Dipinjam)
            [
                'peminjam_id' => 4,
                'barang_id' => 4,
                'tanggal_pinjam' => Carbon::now()->subDays(2),
                'tanggal_kembali' => null,
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5. Amanda pinjam Drawing Tablet (Sudah Kembali)
            [
                'peminjam_id' => 5,
                'barang_id' => 5,
                'tanggal_pinjam' => Carbon::now()->subDays(5),
                'tanggal_kembali' => Carbon::now()->subDays(4),
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 6. Rafli pinjam MikroTik lagi (Sudah Kembali)
            [
                'peminjam_id' => 1,
                'barang_id' => 3,
                'tanggal_pinjam' => Carbon::now()->subDays(6),
                'tanggal_kembali' => Carbon::now()->subDays(4),
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 7. Siti pinjam Laptop (Masih Dipinjam)
            [
                'peminjam_id' => 2,
                'barang_id' => 1,
                'tanggal_pinjam' => Carbon::now()->subHours(5),
                'tanggal_kembali' => null,
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 8. Budi pinjam PC Server (Masih Dipinjam)
            [
                'peminjam_id' => 3,
                'barang_id' => 2,
                'tanggal_pinjam' => Carbon::now()->subDays(1),
                'tanggal_kembali' => null,
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 9. Fauzi pinjam Drawing Tablet (Sudah Kembali)
            [
                'peminjam_id' => 4,
                'barang_id' => 5,
                'tanggal_pinjam' => Carbon::now()->subDays(12),
                'tanggal_kembali' => Carbon::now()->subDays(10),
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 10. Amanda pinjam Monitor (Sudah Kembali)
            [
                'peminjam_id' => 5,
                'barang_id' => 4,
                'tanggal_pinjam' => Carbon::now()->subDays(15),
                'tanggal_kembali' => Carbon::now()->subDays(12),
                'jumlah_pinjam' => 1,
                'status_peminjaman' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
