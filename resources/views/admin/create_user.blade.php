<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
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
            text-align: center; /* Menyelaraskan teks ke tengah */
            margin-bottom: 40px; /* Memberikan jarak bawah pada judul */
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
        <h1 class="mb-4">Tambah Pengguna</h1>

        <!-- Error Handling -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="mb-3">
                <label for="usertype_id" class="form-label">Tipe Pengguna</label>
                <select class="form-control" id="usertype_id" name="usertype_id" required>
                    <option value="">Pilih Tipe Pengguna</option>
                    @foreach ($usertype as $usertypes)
                        <option value="{{ $usertypes->id }}" {{ (old('usertype_id') == $usertypes->id) ? 'selected' : '' }}>
                            {{ $usertypes->type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-start gap-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
