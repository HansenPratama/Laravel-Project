<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kas Bulanan</title>
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
        <h1>Edit Kas Bulanan</h1>

        <form action="{{ route('kas.update', $kas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $kas->tahun }}" required>
            </div>
            <div class="mb-3">
                <label for="bulan_id" class="form-label">Bulan</label>
                <select class="form-select" id="bulan_id" name="bulan_id" required>
                    @foreach ($bulan as $bulans)
                        <option value="{{ $bulans->id }}" {{ $bulans->id == $kas->bulan_id ? 'selected' : '' }}>
                            {{ $bulans->nama_bulan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $kas->jumlah }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kas.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
