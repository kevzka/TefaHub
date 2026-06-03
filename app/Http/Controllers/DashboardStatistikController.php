<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardStatistikController extends Controller
{
    public function index()
    {
        // 1. Hitung Statistik Ringkas untuk Counter Cards
        $stats = [
            'total_users'     => User::count(),
            'total_items'     => Item::count(),
            'total_loans'     => Loan::count(),
            'active_loans'    => Loan::where('status_peminjaman', 'dipinjam')->count(),
            'dikembalikan_loans'  => Loan::where('status_peminjaman', 'dikembalikan')->count(),
            'total_item_qty'  => Item::sum('stok'),
        ];

        // 2. Data Grafik: Tren Peminjaman 7 Hari Terakhir
        $days = collect(range(6, 0))->map(function ($i) {
            return now()->subDays($i)->format('Y-m-d');
        });

        $loanTrends = Loan::where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->pluck('total', 'date');

        $chartTrendData = $days->map(function ($date) use ($loanTrends) {
            return $loanTrends->get($date, 0);
        });

        $chartTrendLabels = $days->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d M');
        });

        // 3. Data Grafik: Top 5 Barang yang Paling Sering Dipinjam
        $topItems = Loan::select('barang_id', DB::raw('count(*) as total'))
            ->groupBy('barang_id')
            ->with('barang')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        $chartItemLabels = $topItems->map(fn($l) => $l->barang->nama_barang ?? 'Dihapus');
        $chartItemData = $topItems->map(fn($l) => $l->total);

        // 4. Ambil 5 Aktivitas Log Peminjaman Terbaru
        $recentLoans = Loan::with(['peminjam', 'barang'])->latest()->take(5)->get();

        return view('admin.statistic.index', compact('stats', 'chartTrendLabels', 'chartTrendData', 'chartItemLabels', 'chartItemData', 'recentLoans'));
    }
}
