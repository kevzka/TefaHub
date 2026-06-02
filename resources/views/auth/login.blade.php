<!DOCTYPE html>
<html lang="id" class="dark"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Sistem Inventaris SMK Telkom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-slate-100 dark:bg-slate-950 min-h-screen text-slate-900 dark:text-slate-100 antialiased font-sans transition-colors duration-300">

    <div class="py-12 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            
            <div class="mb-6 flex justify-start">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800/60 shadow-indigo-950/10">
                
                <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-850 to-indigo-950 p-6 text-white text-center dark:from-slate-850 dark:to-slate-900 border-b border-slate-100 dark:border-slate-800/50">
                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-indigo-500/10 blur-xl"></div>
                    
                    <div class="relative">
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-indigo-400">Sistem Logistik</p>
                        <h2 class="mt-1 text-2xl font-extrabold tracking-tight">Selamat Datang</h2>
                        <p class="mt-1 text-xs text-slate-400">Silakan masuk menggunakan akun Anda</p>
                    </div>
                </div>

                <div class="p-8 bg-white dark:bg-slate-900">
                    
                    @if (session('status'))
                        <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-3.5 text-xs font-medium text-emerald-800 dark:border-emerald-800/30 dark:bg-emerald-900/30 dark:text-emerald-400">
                            <svg class="h-4 w-4 text-emerald-600 dark:text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('status') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">Alamat Email</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 dark:text-slate-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                    </svg>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@smktelkom.sch.id"
                                    class="w-full rounded-xl border border-slate-200 bg-white pl-10 pr-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 shadow-sm transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 dark:focus:border-indigo-500">
                            </div>
                            @if ($errors->has('email'))
                                <p class="mt-1.5 text-xs font-medium text-rose-600 dark:text-rose-400 flex items-center gap-1">
                                    <span class="inline-block w-1 h-1 rounded-full bg-rose-500"></span>
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div>
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">Kata Sandi (Password)</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 dark:text-slate-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••"
                                    class="w-full rounded-xl border border-slate-200 bg-white pl-10 pr-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 shadow-sm transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 dark:focus:border-indigo-500">
                            </div>
                            @if ($errors->has('password'))
                                <p class="mt-1.5 text-xs font-medium text-rose-600 dark:text-rose-400 flex items-center gap-1">
                                    <span class="inline-block w-1 h-1 rounded-full bg-rose-500"></span>
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex items-center justify-between text-xs font-medium">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                                <input id="remember_me" type="checkbox" name="remember" 
                                    class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-slate-700 dark:bg-slate-800 dark:focus:ring-offset-slate-900 h-4 w-4 transition">
                                <span class="ms-2 text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300">Ingat Saya</span>
                            </label>

                            {{-- @if (Route::has('password.request'))
                                <a class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 font-semibold" href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                            @endif --}}
                        </div>

                        <div class="pt-2 font-sans">
                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-600/30 transition-all hover:bg-indigo-500 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14" />
                                </svg>
                                Masuk ke Platform
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 border-t border-slate-100 dark:border-slate-800/80 pt-4 text-center">
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 font-bold ml-1">Daftar Sekarang</a>
                        </p>
                    </div>

                </div>

            </div>
            
            <p class="mt-8 text-center text-xs text-slate-400 dark:text-slate-500">
                &copy; {{ date('Y') }} SMK Telkom. Hak Cipta Dilindungi.
            </p>
        </div>
    </div>

</body>
</html>