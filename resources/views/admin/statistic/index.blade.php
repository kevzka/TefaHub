<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="py-10 bg-slate-100 dark:bg-slate-900 min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 p-8 text-white shadow-xl ring-1 ring-white/10 dark:from-slate-800 dark:via-slate-800 dark:to-slate-900">
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-indigo-500/10 blur-2xl"></div>
                <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-indigo-400">Panel Ringkasan</p>
                        <h1 class="mt-1 text-3xl font-extrabold tracking-tight sm:text-4xl">Statistik Analisis Inventaris</h1>
                        <p class="mt-2 max-w-xl text-sm leading-relaxed text-slate-300">
                            Pantau metrik performa sirkulasi barang logistik, grafik peminjaman aktif, dan utilisasi barang SMK Telkom.
                        </p>
                    </div>
                    <div class="shrink-0">
                        <span class="inline-flex items-center gap-1.5 rounded-2xl bg-white/10 px-4 py-2.5 text-sm font-semibold text-white backdrop-blur-md">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Sistem Real-Time
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Transaksi</p>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-white">{{ number_format($stats['total_loans']) }}</p>
                    </div>
                    <div class="rounded-2xl bg-indigo-50 p-3 dark:bg-indigo-950 text-indigo-600 dark:text-indigo-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>

                <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Sedang Dipinjam</p>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-amber-600 dark:text-amber-400">{{ number_format($stats['active_loans']) }}</p>
                    </div>
                    <div class="rounded-2xl bg-amber-50 p-3 dark:bg-amber-950 text-amber-600 dark:text-amber-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Unit Barang</p>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-emerald-600 dark:text-emerald-400">{{ number_format($stats['total_item_qty']) }}</p>
                    </div>
                    <div class="rounded-2xl bg-emerald-50 p-3 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>

                <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">User Terdaftar</p>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-white">{{ number_format($stats['total_users']) }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-3 dark:bg-slate-700 text-slate-500 dark:text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-[1.5fr_1fr]">
                <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                    <div class="mb-4">
                        <h3 class="text-base font-bold text-slate-900 dark:text-white">Tren Aktivitas Peminjaman</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Statistik frekuensi peminjaman dalam 7 hari terakhir.</p>
                    </div>
                    <div class="h-64 relative">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>

                <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                    <div class="mb-4">
                        <h3 class="text-base font-bold text-slate-900 dark:text-white">5 Barang Paling Sering Dipinjam</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Rasio utilisasi barang inventaris teratas.</p>
                    </div>
                    <div class="h-64 relative flex justify-center">
                        <canvas id="itemChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                <div class="border-b border-slate-100 px-6 py-4 dark:border-slate-700 bg-slate-50 dark:bg-slate-900">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Log Aktivitas Terbaru</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">5 transaksi peminjaman mutakhir yang masuk sistem.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-left">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50 text-xs font-bold uppercase tracking-wider text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400">
                                <th class="px-6 py-3">Nama Peminjam</th>
                                <th class="px-6 py-3">Barang</th>
                                <th class="px-6 py-3">Jumlah</th>
                                <th class="px-6 py-3">Tgl Pinjam</th>
                                <th class="px-6 py-3 text-center w-28">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white dark:divide-slate-700 dark:bg-slate-800">
                            @forelse ($recentLoans as $loan)
                                <tr class="transition-colors hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                    <td class="px-6 py-3.5 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-slate-900 dark:text-slate-200">{{ $loan->user->name ?? 'N/A' }}</div>
                                        <div class="text-xs text-slate-400 dark:text-slate-500">Role: {{ ucfirst($loan->user->role ?? '-') }}</div>
                                    </td>
                                    <td class="px-6 py-3.5">
                                        <span class="inline-flex items-center rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-800 dark:bg-slate-900 dark:text-slate-300">
                                            {{ $loan->item->name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3.5 text-sm text-slate-600 dark:text-slate-300 font-medium">
                                        {{ $loan->amount }} Unit
                                    </td>
                                    <td class="px-6 py-3.5 text-sm text-slate-500 dark:text-slate-400">
                                        {{ $loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-3.5 whitespace-nowrap text-center">
                                        @if ($loan->status === 'dipinjam')
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-semibold text-amber-800 dark:bg-amber-900/50 dark:text-amber-400">
                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                                Dipinjam
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-semibold text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-400">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Kembali
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-sm text-slate-400">Belum ada rekaman aktivitas log terbaru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Deteksi Mode Gelap untuk warna grid & font default
            const isDarkMode = document.documentElement.classList.contains('dark');
            const textColor = isDarkMode ? '#94a3b8' : '#64748b';
            const gridColor = isDarkMode ? '#334155' : '#e2e8f0';

            // 1. Inisialisasi Trend Peminjaman (Line Chart)
            const ctxTrend = document.getElementById('trendChart').getContext('2d');
            new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartTrendLabels) !!},
                    datasets: [{
                        label: 'Jumlah Peminjaman',
                        data: {!! json_encode($chartTrendData) !!},
                        borderColor: '#6366f1',
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.3,
                        pointBackgroundColor: '#6366f1'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { color: 'transparent' }, ticks: { color: textColor, font: { size: 11 } } },
                        y: { grid: { color: gridColor }, ticks: { color: textColor, font: { size: 11 }, stepSize: 1 } }
                    }
                }
            });

            // 2. Inisialisasi Top Barang (Doughnut Chart)
            const ctxItem = document.getElementById('itemChart').getContext('2d');
            new Chart(ctxItem, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($chartItemLabels) !!},
                    datasets: [{
                        data: {!! json_encode($chartItemData) !!},
                        backgroundColor: ['#6366f1', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
                        borderWidth: isDarkMode ? 3 : 1,
                        borderColor: isDarkMode ? '#1e293b' : '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: textColor, boxWidth: 12, padding: 15, font: { size: 11 } }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>