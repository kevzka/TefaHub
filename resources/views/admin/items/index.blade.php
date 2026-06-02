<x-app-layout>
    @if (session('success'))
        <div class="sr-only">{{ session('success') }}</div>
        <script>alert("{{ session('success') }}")</script>
    @endif

    <div class="py-10 bg-slate-100 dark:bg-slate-900 min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="grid gap-6 lg:grid-cols-[1.6fr_0.9fr]">
                <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 p-8 text-white shadow-xl ring-1 ring-white/10 flex flex-col justify-between dark:from-slate-800 dark:via-slate-800 dark:to-slate-900">
                    <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-indigo-500/10 blur-2xl"></div>
                    <div class="relative">
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-indigo-400">Sistem Inventaris</p>
                        <h1 class="mt-1 text-3xl font-extrabold tracking-tight sm:text-4xl">Data Barang</h1>
                        <p class="mt-2 max-w-xl text-sm leading-relaxed text-slate-300">
                            Pantau stok dan status barang inventaris dalam tampilan yang konsisten dan modern.
                        </p>
                    </div>

                    <div class="mt-6 flex flex-wrap gap-3 font-sans">
                        <a href="{{ route('admin.items.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition hover:bg-indigo-500 active:scale-95">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
                            Tambah Item
                        </a>
                        <a href="{{ route('admin.loans.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/5 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/10 active:scale-95">
                            Lihat Peminjaman
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Item</p>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-white">{{ number_format($items->count()) }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-3 text-slate-500 dark:bg-slate-700 dark:text-slate-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                        </div>
                    </div>

                    <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Stok</p>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-indigo-600 dark:text-indigo-400">{{ number_format($items->sum('amount')) }}</p>
                        </div>
                        <div class="rounded-2xl bg-indigo-50 p-3 text-indigo-600 dark:bg-indigo-900/50 dark:text-indigo-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                <div class="border-b border-slate-100 bg-slate-50 px-6 py-5 dark:border-slate-700 dark:bg-slate-900">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">Daftar Barang</h3>
                            <p class="mt-0.5 text-xs text-slate-500 dark:text-slate-400">Seluruh data barang inventaris ditampilkan di bawah ini.</p>
                        </div>
                        <a href="{{ route('admin.items.create') }}" class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                            Tambah Item
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-left">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50 text-xs font-bold uppercase tracking-wider text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400">
                                <th class="px-6 py-3.5 text-center w-12">No</th>
                                <th class="px-6 py-3.5">Image</th>
                                <th class="px-6 py-3.5">Name</th>
                                <th class="px-6 py-3.5">Amount</th>
                                <th class="px-6 py-3.5">Status</th>
                                <th class="px-6 py-3.5 text-center w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white dark:divide-slate-700 dark:bg-slate-800">
                            @forelse ($items as $item)
                                <tr class="group transition-colors hover:bg-slate-50 dark:hover:bg-slate-700">
                                    <td class="whitespace-nowrap px-6 py-4 text-center text-sm font-medium text-slate-400 dark:text-slate-500">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/item-placeholder.svg') }}"
                                            alt="{{ $item->name }}"
                                            class="h-14 w-14 rounded-2xl border border-slate-200 object-cover shadow-sm dark:border-slate-700">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-slate-900 dark:text-slate-200">{{ $item->name }}</div>
                                        <div class="text-xs text-slate-400 dark:text-slate-500">Item ID: #{{ $item->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 font-medium">{{ $item->amount }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300">{{ $item->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <a href="{{ route('admin.items.show', $item->id) }}" class="p-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-600 transition" title="Detail">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                            </a>
                                            <a href="{{ route('admin.items.edit', $item->id) }}" class="p-2 text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 rounded-xl hover:bg-indigo-50 dark:hover:bg-indigo-900/50 transition" title="Edit">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            </a>
                                            <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-rose-600 hover:text-rose-800 dark:text-rose-400 dark:hover:text-rose-300 rounded-xl hover:bg-rose-50 dark:hover:bg-rose-900/50 transition" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <div class="rounded-full bg-slate-100 p-3 text-slate-400 dark:bg-slate-700">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                                            </div>
                                            <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">Belum Ada Data Barang</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
