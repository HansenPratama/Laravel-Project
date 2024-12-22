<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: white;
        }

        /* Header */
        header {
            background: linear-gradient(90deg, #4eaaa8, #3c8b87);
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            color: white;
            font-size: 26px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .menu-icon {
            font-size: 24px;
            color: white;
            cursor: pointer;
            position: absolute; /* Menempatkan ikon secara absolut */
            top: 10px; /* Menyesuaikan posisi vertikal */
            right: 20px; /* Menempatkan ikon ke sebelah kanan */
        }


        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background-color: #ffffff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
            transition: right 0.3s ease;
            z-index: 999;
        }

        .sidebar.active {
            right: 0;
        }

        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #333;
        }

        .sidebar .menu-item {
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sidebar .menu-item:hover {
            background-color: #eaeaea;
        }

        /* News Section */
        .news-updates {
            padding: 40px 20px;
            background-color: #76e0d3; /* Warna tosca cerah yang lebih terang */
            border-radius: 10px;
            max-width: 1450px;
            margin: 20px auto;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }

        .news-updates h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: white;
        }

        .news-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .news-item {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .news-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 4px solid #4eaaa8;
        }

        .news-item .news-title {
            padding: 20px;
            font-size: 16px;
            color: #555;
            background-color: white;
            text-align: center;
        }

        .news-item .news-title b {
            color: #333;
            font-size: 18px;
            display: block;
            margin-bottom: 5px;
        }

        .news-item a {
            text-decoration: none;
            color: inherit;
        }
        footer {
            margin-top: auto;
            background-color: #47b7b4; /* Biru tosca */
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="menu-icon" onclick="toggleSidebar()">☰</div>
    </header>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="bg11.png" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="bg22.png" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="bg3.jpg" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>
    /* Carousel Styling */
    .carousel-item img {
        object-fit: cover;
        height: 500px;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item:hover img {
        transform: scale(1.1);
    }

    .carousel-caption {
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        padding: 15px;
        border-radius: 5px;
    }

    .carousel-caption h5 {
        font-size: 2em;
        font-weight: bold;
        color: #ffffff;
    }

    .carousel-caption p {
        font-size: 1.2em;
        color: #ffffff;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: #4eaaa8; /* Color for the control icons */
    }
</style>


    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <!-- Back button -->
            <span class="back-icon" onclick="toggleSidebar()">&#8592;</span> 
        </div>
        <!-- Menu item with redirect to login -->
        <div class="menu-item" onclick="redirectToLogin()">Login</div>
    </div>

    <!-- Tambahkan JavaScript -->
    <script>
        function redirectToLogin() {
            // Redirect ke halaman login
            window.location.href = "{{ route('login') }}";
        }
    </script>


    <style>
        /* Sidebar Header Styling */
        .sidebar-header {
            display: flex;
            align-items: center;
            padding: 10px 0; /* Top and bottom padding */
            border-bottom: 2px solid #eaeaea; /* Bottom border for separation */
            margin-bottom: 20px; /* Add spacing below header */
        }

        /* Back Icon Styling */
        .back-icon {
            font-size: 24px;
            color: #4eaaa8;
            cursor: pointer;
            margin-right: 15px; /* Space between icon and text */
            transition: color 0.3s ease; /* Smooth color transition on hover */
        }

        .back-icon:hover {
            color: #3c8b87; /* Slightly darker green on hover */
        }

        /* Menu Text Styling */
        .sidebar-header h2 {
            font-size: 24px;
            color: #4eaaa8;
            margin: 0;
            font-weight: bold;
            letter-spacing: 1px;
        }
 
    /* Back Button Styling */
    .back-icon {
        font-size: 24px;
        color: #333;
        cursor: pointer;
        margin-right: 10px;
    }

    .back-icon:hover {
        color: #4eaaa8; /* Highlight color on hover */
    }
    </style>

    <!-- News Section -->
    <section class="news-updates">
        <h2>News & Updates</h2>
        <div class="news-container">
            <!-- Example of news items -->
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 1]) }}">
                    <img src="berita1.jpg" alt="Berita 1">
                    <div class="news-title">
                        <b>Class Meeting</b>
                        Class Meeting dalam Rangka Milad Prodi Manajemen Informatika
                    </div>
                </a>
            </div>
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 2]) }}">
                    <img src="berita2.jpg" alt="Berita 2">
                    <div class="news-title">
                        <b>Senam Pagi</b>
                        Senam Pagi Bersama Mahasiswa dan Dosen Prodi Manajemen Informatika
                    </div>
                </a>
            </div>
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 3]) }}">
                    <img src="berita3.jpg" alt="Berita 3">
                    <div class="news-title">
                        <b>Lomba Fotografi</b>
                        Mahasiswa Prodi Manajemen Informatika Raih Juara 2 Lomba Fotografi
                    </div>
                </a>
            </div>
        <!-- Berita 4 -->
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 4]) }}">
                    <img src="berita4.jpg" alt="Berita 4">
                    <div class="news-title">
                        <b>Futsal Rutin</b>
                        Mahasiswa Prodi Manajemen Informatika Gelar Futsal Rutin Seminggu Sekali
                    </div>
                </a>
            </div>

            <!-- Berita 5 -->
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 5]) }}">
                    <img src="berita5.jpg" alt="Berita 5">
                    <div class="news-title">
                        <b>Pemilihan Ketua HIMA</b>
                        Pemilihan Ketua HIMA Prodi Manajemen Informatika
                    </div>
                </a>
            </div>

            <!-- Berita 6 -->
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 6]) }}">
                    <img src="berita6.jpg" alt="Berita 6">
                    <div class="news-title">
                        <b>Takjil untuk Masyarakat</b>
                        Himpunan Mahasiswa Manajemen Informatika Bagikan Takjil untuk Masyarakat
                    </div>
                </a>
            </div>

            <!-- Berita 7 -->
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 7]) }}">
                    <img src="berita7.jpg" alt="Berita 7">
                    <div class="news-title">
                        <b>Study Week Mahasiswa Baru</b>
                        Mahasiswa Baru Manajemen Informatika Angkatan 17 Lakukan Study Week Rutin
                    </div>
                </a>
            </div>

            <!-- Berita 8 -->
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 8]) }}">
                    <img src="berita8.jpg" alt="Berita 8">
                    <div class="news-title">
                        <b>Kuliah Tamu</b>
                        Kuliah Tamu: Cyber Security & IoT
                    </div>
                </a>
            </div>

            <!-- Berita 9 -->
            <div class="news-item">
                <a href="{{ route('berita', ['id' => 9]) }}">
                    <img src="berita9.jpg" alt="Berita 9">
                    <div class="news-title">
                        <b>Tim Futsal Juara 1</b>
                        Tim Futsal Prodi D3 Manajemen Informatika Juara 1 di POM PSM
                    </div>
                </a>
            </div>
    </section>

    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>



