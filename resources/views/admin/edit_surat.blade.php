<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b2f4f0; /* Light blue-green background */
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h1 {
            color: #47b7b4; /* Tosca color for the title */
        }
        .form-label {
            color: #47b7b4; /* Tosca color for form labels */
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
        <h1 class="text-center mb-4">Edit Surat</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('surats.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Surat</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $surat->judul) }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi', $surat->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" id="kategori_id" name="kategori_id" required>
                    @foreach ($kategoriSurats as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id == $surat->kategori_id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jenis_id" class="form-label">Jenis</label>
                <select class="form-select" id="jenis_id" name="jenis_id" required>
                    @foreach ($jenisSurats as $jenis)
                        <option value="{{ $jenis->id }}" {{ $jenis->id == $surat->jenis_id ? 'selected' : '' }}>
                            {{ $jenis->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">File Surat</label>
                <input type="file" class="form-control" id="file" name="file">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah file.</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('surats.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
