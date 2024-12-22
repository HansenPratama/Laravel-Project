<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Surat</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1>Daftar Surat</h1>
    </header>

    <div class="container mt-4">
        <!-- Tampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('surats.create') }}" class="btn btn-primary mb-3">Upload Surat Baru</a>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <!-- Filter kategori -->
        <form action="{{ route('surats.index') }}" method="GET" class="row g-2 mb-3">
            <div class="col-md-3">
                <!-- Dropdown Kategori -->
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoriSurats as $kategoriSurat)
                        <option value="{{ $kategoriSurat->nama }}" {{ request('kategori') == $kategoriSurat->nama ? 'selected' : '' }}>
                            {{ $kategoriSurat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <!-- Dropdown Jenis Surat -->
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" class="form-select">
                    <option value="">Pilih Jenis Surat</option>
                    @foreach ($jenisSurats as $jenisSurat)
                        <option value="{{ $jenisSurat->nama }}" {{ request('jenis') == $jenisSurat->nama ? 'selected' : '' }}>
                            {{ $jenisSurat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-secondary">Filter</button>
            </div>
        </form>

        @if ($surats->isEmpty())
            <div class="alert alert-warning">
                Tidak ada surat yang tersedia.
            </div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $index => $surat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $surat->judul }}</td>
                            <td>{{ $surat->deskripsi }}</td>
                            <td>{{ $surat->kategori->nama }}</td>
                            <td>{{ $surat->jenis->nama }}</td>
                            <td>
                                <a href="{{ asset($surat->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat File</a>
                            </td>
                            <td>
                                <a href="{{ route('surats.edit', $surat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('surats.destroy', $surat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Footer HIMATIKA -->
    <footer class="text-center mt-5">
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
