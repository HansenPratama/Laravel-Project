<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kas Bulanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
            text-align: center;
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
        footer {
            background-color: #47b7b4;
            color: white;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Kas Bulanan</h1>

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

        <form action="{{ route('kas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" required>
            </div>
            <div class="mb-3">
                <label for="bulan_id" class="form-label">Bulan</label>
                <select class="form-select" id="bulan_id" name="bulan_id" required>
                    <option value="">Pilih Bulan</option>
                    @foreach ($bulan as $bulans)
                        <option value="{{ $bulans->id }}">{{ $bulans->nama_bulan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>

            <div class="d-flex justify-content-start gap-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kas.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
