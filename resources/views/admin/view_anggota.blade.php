<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
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
        <h1>Daftar Anggota</h1>
    </header>

    <div class="container mt-4">
        <!-- Tombol Tambah Anggota -->
        <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>

        <!-- Tombol Kembali ke Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <!-- Filter -->
        <form action="{{ route('anggota.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="number" class="form-control" id="angkatan" name="angkatan" value="{{ request('angkatan') }}">
                </div>
                <div class="col-md-3">
                    <label for="jabatan_id" class="form-label">Jabatan</label>
                    <select class="form-control" id="jabatan_id" name="jabatan_id">
                        <option value="">Pilih Jabatan</option>
                        @foreach ($jabatan as $jab)
                            <option value="{{ $jab->id }}" {{ request('jabatan_id') == $jab->id ? 'selected' : '' }}>
                                {{ $jab->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="departemen_id" class="form-label">Departemen</label>
                    <select class="form-control" id="departemen_id" name="departemen_id">
                        <option value="">Pilih Departemen</option>
                        @foreach ($departemen as $dept)
                            <option value="{{ $dept->id }}" {{ request('departemen_id') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
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

        <!-- Tabel Daftar Anggota -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggota as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->angkatan }}</td>
                    <td>{{ $item->jabatan->nama_jabatan ?? '-' }}</td>
                    <td>{{ $item->departemen->nama_departemen ?? '-' }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data anggota tidak tersedia</td>
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
