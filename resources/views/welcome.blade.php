<!DOCTYPE html>
<html lang="id" class="dark"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Inventaris SMK Telkom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-slate-100 dark:bg-slate-950 min-h-screen text-slate-900 dark:text-slate-100 antialiased font-sans transition-colors duration-300">

    <div class="py-10 bg-slate-100 dark:bg-slate-950 min-h-screen flex items-center justify-center">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 w-full">
            
            <div class="overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800/60 shadow-indigo-950/20">
                
                <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-850 to-indigo-950 p-8 text-white sm:p-12 border-b border-slate-100 dark:border-slate-800/50">
                    <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-indigo-500/15 blur-2xl"></div>
                    <div class="absolute -left-10 -bottom-10 h-40 w-40 rounded-full bg-emerald-500/10 blur-2xl"></div>
                    
                    <div class="relative text-center max-w-2xl mx-auto">
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-indigo-400">Sistem Inventaris</p>
                        <h1 class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl">
                            Sistem Peminjaman <br class="hidden sm:inline"><span class="text-indigo-400">&</span> Logistik Barang
                        </h1>
                        
                        <p class="mt-6 text-sm leading-relaxed text-slate-300 sm:text-base">
                            Selamat datang di platform resmi manajemen logistik SMK Telkom. Alur data inventarisasi, sirkulasi peminjaman, serta pelacakan aset sekolah kini terintegrasi secara praktis, akurat, dan real-time dalam satu pintu.
                        </p>
                    </div>
                </div>

                <div class="p-8 bg-slate-50 dark:bg-slate-900/40 sm:p-12 flex flex-col items-center justify-center">
                    
                    <div class="mb-8 inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800 dark:bg-emerald-950/50 dark:text-emerald-400 border dark:border-emerald-800/30">
                        <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Sistem Siap Digunakan
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 w-full max-w-md justify-center">
                        
                        <a href="{{ route('login') }}" class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-600/30 transition-all hover:bg-indigo-500 hover:shadow-indigo-500/40 active:scale-95 text-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Masuk / Login
                        </a>

                        <a href="{{ route('register') }}" class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-6 py-3.5 text-sm font-bold text-slate-700 shadow-sm transition-all hover:bg-slate-50 active:scale-95 text-center dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-750">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Daftar Akun
                        </a>

                    </div>

                    <p class="mt-8 text-center text-xs text-slate-400 dark:text-slate-500">
                        &copy; {{ date('Y') }} SMK Telkom. Hak Cipta Dilindungi.
                    </p>
                </div>

            </div>
        </div>
    </div>

</body>
</html>