<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b2f4f0; /* Biru muda agak tosca */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Gradasi biru tosca */
            padding: 10px;
            color: white;
            text-align: center;
        }
        h1 {
            color: #f0f8ff; /* Warna putih untuk judul */
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .btn-primary, .btn-secondary {
            background-color: #47b7b4;
            border-color: #47b7b4;
        }
        .btn-primary:hover, .btn-secondary:hover {
            background-color: #3a9f98;
            border-color: #3a9f98;
        }
        .btn-warning {
            background-color: #f39c12;
            border-color: #e67e22;
        }
        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #f39c12;
        }
        .btn-danger {
            background-color: #e74c3c;
            border-color: #c0392b;
        }
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #e74c3c;
        }
        .form-label {
            color: #47b7b4; /* Warna label untuk form */
        }
        footer {
            background-color: #47b7b4;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }
        .table thead {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4);
            color: white;
        }
        .table tbody tr:hover {
            background-color: #d0f4f1;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manajemen Pengguna</h1>
    </header>

    <div class="container mt-4">
        <!-- Tombol Tambah Pengguna -->
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>

        <!-- Tombol Kembali ke Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <!-- Filter -->
        <form action="{{ route('users.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="usertype_id" class="form-label">Tipe Pengguna</label>
                    <select class="form-select" id="usertype_id" name="usertype_id">
                        <option value="">Pilih Tipe Pengguna</option>
                        @foreach ($usertype as $usertypes)
                            <option value="{{ $usertypes->id }}" {{ request('usertype_id') == $usertypes->id ? 'selected' : '' }}>
                                {{ $usertypes->type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-secondary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Pengguna -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Tipe Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->usertype->type ?? '-'}}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data pengguna tidak tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
