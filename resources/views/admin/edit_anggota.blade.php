<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b2f4f0; /* Biru muda agak tosca */
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
            color: #47b7b4; /* Warna tosca untuk judul */
        }
        .form-label {
            color: #47b7b4; /* Warna label untuk form */
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
        /* Style untuk footer */
        footer {
            background-color: #47b7b4;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Anggota</h1>
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" value="{{ $anggota->angkatan }}" required>
            </div>
            <div class="mb-3">
                <label for="jabatan_id" class="form-label">Jabatan</label>
                <select class="form-control" id="jabatan_id" name="jabatan_id">
                    <option value="">Pilih Jabatan</option>
                    @foreach ($jabatan as $jab)
                        <option value="{{ $jab->id }}" {{ (old('jabatan_id', $anggota->jabatan_id ?? '') == $jab->id) ? 'selected' : '' }}>
                            {{ $jab->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="departemen_id" class="form-label">Departemen</label>
                <select class="form-control" id="departemen_id" name="departemen_id">
                    <option value="">Pilih Departemen</option>
                    @foreach ($departemen as $dept)
                        <option value="{{ $dept->id }}" {{ (old('departemen_id', $anggota->departemen_id ?? '') == $dept->id) ? 'selected' : '' }}>
                            {{ $dept->nama_departemen }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
