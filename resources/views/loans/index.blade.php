<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <script>
                            alert("{{ session('success') }}")
                        </script>
                    @endif

                    <div id="app">

                        <header>
                            <h1>Sistem Peminjaman SMK Telkom</h1>
                            <p>Selamat datang di dashboard user.</p>
                        </header>

                        <nav>
                            
                            <ul>
                                <li><a href="{{ route('loans.create') }}">Tambah Peminjaman +</a></li>
                                <li><a href="{{ route('users.index') }}">Lihat User</a></li>
                                <li><a href="{{ route('items.index') }}">Lihat Barang</a></li>
                            </ul>
                        </nav>

                        <main>
                            <section class="table-container">
                                <h2>Daftar Peminjaman</h2>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>user</th>
                                            <th>item</th>
                                            <th>load date</th>
                                            <th>return date</th>
                                            <th>status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($loans as $loan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                {{-- <td>{{ $user['id'] }}</td> --}}
                                                <td>{{ $loan->user->name }}</td>
                                                <td>{{ $loan->item->name }}</td>
                                                <td>{{ $loan->loan_date }}</td>
                                                <td>{{ $loan->return_date }}</td>
                                                <td>{{ $loan->status }}</td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('loans.show', $loan->id) }}"
                                                            class="btn-show">Show</a>
                                                        <a href="{{ route('loans.edit', $loan->id) }}"
                                                            class="btn-show">Edit</a>

                                                        <form action="{{ route('loans.destroy', $loan->id) }}"
                                                            method="POST" class="form-delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Yakin ingin hapus?')">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </section>
                        </main>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
