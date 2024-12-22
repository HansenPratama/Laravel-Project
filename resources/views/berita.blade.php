<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background: #4eaaa8;
            color: white;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .news-info {
            text-align: center;
            color: #555;
            font-size: 14px;
            margin-bottom: 20px;
        }

        img {
            display: block;
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 0 auto 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            text-align: justify;
        }

        footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 30px;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        /* Style for Back Button */
        .back-button {
            background-color: white; /* Warna putih */
            color: #4eaaa8; /* Warna teks sesuaikan dengan header */
            border: 2px solid #4eaaa8; /* Border sesuaikan dengan header */
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: fixed;
            top: 20px;
            left: 20px;
        }

        .back-button:hover {
            background-color: #4eaaa8; /* Warna saat hover */
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Detail Berita</h1>
    </header>

    <!-- Berita Content -->
    <section class="container">
        <h2>{{ $berita['title'] }}</h2>
        <div class="news-info">
            <span>Kategori: {{ $berita['category'] }}</span> |
            <span>{{ $berita['date'] }}</span>
        </div>
        <img src="{{ asset('images/' . $berita['image']) }}" alt="{{ $berita['title'] }}" class="img-fluid">
        
        @foreach ($berita['content'] as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </section>

    <!-- Back Button -->
    <button class="back-button" onclick="window.history.back()">Kembali</button>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Landing Page. All rights reserved.</p>
    </footer>
</body>
</html>
