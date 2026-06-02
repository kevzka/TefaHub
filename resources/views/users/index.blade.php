<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Peminjaman SMK Sukamaju</title>
</head>

<body>
    @if (session('success'))
        <script>alert("{{session('success')}}")</script>
    @endif

    <div id="app">
        
        <header>
            <h1>Sistem Peminjaman SMK Telkom</h1>
            <p>Selamat datang di dashboard user.</p>
        </header>

        <nav>
            <ul>
                <li><a href="{{ route('users.create') }}">Tambah user +</a></li>
                <li><a href="{{ route('loans.index') }}">Lihat Peminjaman</a></li>
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
                            <th>name</th>
                            <th>class</th>
                            <th>email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                {{-- <td>{{ $user['id'] }}</td> --}}
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->class }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn-show">Show</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn-show">Edit</a>
                                        
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Delete</button>
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
</body>

</html>