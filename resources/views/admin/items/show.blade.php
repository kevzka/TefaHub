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
                        <h1 class="mt-1 text-3xl font-extrabold tracking-tight sm:text-4xl">Detail Item</h1>
                        <p class="mt-2 max-w-xl text-sm leading-relaxed text-slate-300">
                            Ringkasan informasi barang inventaris yang tersimpan di sistem.
                        </p>
                    </div>

                    <div class="mt-6 flex flex-wrap gap-3 font-sans">
                        <a href="{{ route('admin.items.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/5 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/10 active:scale-95">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" /></svg>
                            Kembali ke Daftar
                        </a>
                        <a href="{{ route('admin.items.edit', $item->id) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition hover:bg-indigo-500 active:scale-95">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            Edit Item
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Item ID</p>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-white">#{{ $item->id }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-3 text-slate-500 dark:bg-slate-700 dark:text-slate-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                        </div>
                    </div>

                    <div class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Status</p>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-indigo-600 dark:text-indigo-400">{{ $item->status }}</p>
                        </div>
                        <div class="rounded-2xl bg-indigo-50 p-3 text-indigo-600 dark:bg-indigo-900/50 dark:text-indigo-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                <div class="border-b border-slate-100 bg-slate-50 px-6 py-5 dark:border-slate-700 dark:bg-slate-900">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Rincian Item</h3>
                    <p class="mt-0.5 text-xs text-slate-500 dark:text-slate-400">Informasi lengkap barang ditampilkan dalam panel yang konsisten.</p>
                </div>

                <div class="grid gap-6 p-6 sm:p-8 md:grid-cols-2">
                    <div class="rounded-2xl bg-slate-50 p-5 dark:bg-slate-900/50">
                        <p class="text-sm text-slate-500 dark:text-slate-400">Name</p>
                        <p class="mt-1 text-lg font-semibold text-slate-900 dark:text-white">{{ $item->name }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5 dark:bg-slate-900/50">
                        <p class="text-sm text-slate-500 dark:text-slate-400">Amount</p>
                        <p class="mt-1 text-lg font-semibold text-slate-900 dark:text-white">{{ $item->amount }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5 md:col-span-2 dark:bg-slate-900/50">
                        <p class="text-sm text-slate-500 dark:text-slate-400">Status</p>
                        <p class="mt-1 text-lg font-semibold text-slate-900 dark:text-white">{{ $item->status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
