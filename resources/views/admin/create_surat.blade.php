<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif; /* Mengembalikan font ke Arial */
            background-color: #b2f4f0 !important; /* Soft light blue background */
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            flex-grow: 1;
        }
        h1 {
            color: #3b8a7f; /* Ganti warna teks judul */
        }
        .form-label {
            color: #3b8a7f; /* Ganti warna teks untuk label form */
        }
        footer {
            background-color: #47b7b4;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 30px; /* Spacing between content and footer */
        }
        footer p {
            margin: 0;
        }
        .btn-primary {
            background-color: #47b7b4;
            border-color: #47b7b4;
        }
        .btn-primary:hover {
            background-color: #3a9f98;
            border-color: #3a9f98;
        }
        .btn-secondary {
            background-color: #e0f7f7;
            border-color: #b2f4f0;
            color: #333;
        }
        .btn-secondary:hover {
            background-color: #b2f4f0;
            border-color: #47b7b4;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload Surat Baru</h1>

        <!-- Tampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tampilkan pesan error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4">
            <form action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Surat</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Surat</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori Surat</label>
                    <select class="form-select" id="kategori_id" name="kategori_id" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($kategoriSurats as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jenis_id" class="form-label">Jenis Surat</label>
                    <select class="form-select" id="jenis_id" name="jenis_id" required>
                        <option value="" disabled selected>Pilih Jenis</option>
                        @foreach ($jenisSurats as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File Surat</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <div class="d-flex justify-content-start gap-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('surats.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
