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
            background-color: #b2f4f0; /* Biru muda agak tosca */
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Gradasi Biru Tosca */
            padding: 15px;
            color: white;
            text-align: center;
        }
        h1 {
            color: #f0f8ff; /* Warna teks header */
        }
        .btn-secondary {
            background-color: #47b7b4;
            border-color: #47b7b4;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #3a9f98;
            border-color: #3a9f98;
        }
        .table {
            background-color: white; /* Pastikan tabel memiliki latar belakang putih */
            color: #333;
        }
        .table thead {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Gradasi untuk header tabel */
            color: white;
        }
        .table tbody tr:hover {
            background-color: #e0f7f7; /* Warna hover pada baris tabel */
        }
        .form-label {
            color: #47b7b4; /* Warna label untuk form */
        }
        footer {
            margin-top: auto;
            background-color: #47b7b4;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 16px;
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

        <a href="{{ route('anggotaa.dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Footer dengan HIMATIKA -->
    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
