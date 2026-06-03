<x-app-layout>
    @if (session('success'))
    <script>alert("{{ session('success') }}")</script>
@endif
    <div class="py-10 bg-slate-100 dark:bg-slate-900 min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="grid gap-6 lg:grid-cols-[1.6fr_0.9fr]">
                <div
                    class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 p-8 text-white shadow-xl ring-1 ring-white/10 flex flex-col justify-between dark:from-slate-800 dark:via-slate-800 dark:to-slate-900">
                    <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-indigo-500/10 blur-2xl"></div>
                    <div class="relative">
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-indigo-400">Sistem Inventaris
                        </p>
                        <h1 class="mt-1 text-3xl font-extrabold tracking-tight sm:text-4xl">Tambah Peminjaman</h1>
                        <p class="mt-2 max-w-xl text-sm leading-relaxed text-slate-300">
                            Isi data peminjaman baru dengan format yang konsisten agar alur inventaris tetap rapi dan
                            mudah dipantau.
                        </p>
                    </div>

                    <div class="mt-6 flex flex-wrap gap-3 font-sans">
                        <a href="{{ route('admin.loans.index') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/5 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition-all hover:bg-white/10 active:scale-95">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <div
                        class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Form Baru</p>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-white">Loan</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-3 text-slate-500 dark:bg-slate-700 dark:text-slate-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-between rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Status Default</p>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-amber-600 dark:text-amber-400">Pilih
                            </p>
                        </div>
                        <div
                            class="rounded-2xl bg-amber-50 p-3 text-amber-600 dark:bg-amber-900/50 dark:text-amber-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-200 dark:bg-slate-800 dark:ring-slate-700">
                <div class="border-b border-slate-100 px-6 py-5 dark:border-slate-700 bg-slate-50 dark:bg-slate-900">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Form Peminjaman</h3>
                    <p class="mt-0.5 text-xs text-slate-500 dark:text-slate-400">Lengkapi data user, barang, tanggal,
                        dan status peminjaman.</p>
                </div>

                <form action="{{ route('admin.loans.store') }}" method="POST" class="space-y-6 p-6">
                    @csrf

                    <div class="grid gap-6 md:grid-cols-2">
                        <label class="block">
                            <span class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">User</span>
                            <input type="text" name="user_id" value="{{ Auth::user()->id }}"
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                                readonly hidden>
                            @if (!Auth::user()->is_admin)
                            <input type="text" name="user_name" value="{{ Auth::user()->name }}"
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                                readonly>
                            @endif
                            @if (Auth::user()->is_admin)
                                <select name="user_id"
                                    class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Item</span>
                            <select name="item_id"
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} | Stok: {{ $item->amount }} | Status: {{ $item->status }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Amount</span>
                            <input type="number" name="amount" min="1" value="1" placeholder="Jumlah"
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Loan
                                Date</span>
                            <input type="date" name="loan_date"
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark;border-slate-600 dark:bg-slate-900 dark:text-white">
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Return
                                Date</span>
                            <input type="date" name="return_date"
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                        </label>
                    </div>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Status</span>
                        @if (!Auth::user()->is_admin)
                        <input type="text" name="status" value="dipinjam"
                            class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                            readonly>
                        @endif
                        @if (Auth::user()->is_admin)
                            <select name="status"
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm shadow-sm focus:border-slate-900 focus:ring-slate-900 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        @endif
                    </label>

                    <div class="flex flex-wrap items-center gap-3">
                        <button type="submit"
                            class="inline-flex items-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-500 active:scale-95">
                            Tambahkan
                        </button>
                        <a href="{{ route('admin.loans.index') }}"
                            class="inline-flex items-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-700">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>