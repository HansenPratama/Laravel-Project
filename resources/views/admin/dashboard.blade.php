<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #b2f4f0; /* Biru muda agak tosca */
            overflow-x: hidden;
        }
        header {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Gradasi Biru Tosca */
            padding: 15px;
            color: white;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        header h1 {
            margin: 0;
        }
        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
            margin-bottom: 50px;
        }
        .card {
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
            margin-top: 140px;
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: 105px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex: 1 1 200px; /* Ensures cards wrap appropriately */
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 15px;
        }
        .card h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }
        .card p {
            color: #777;
            font-size: 14px;
        }
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .logout-btn:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }
        main {
            padding: 20px;
            text-align: center;
        }
        footer {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Gradasi Biru Tosca */
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
            bottom: 0;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .card {
                width: 100%;
                margin: 10px 0;
            }
            nav {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 18px;
            }
            .logout-btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </header>

    <nav>
        <div class="card" onclick="window.location.href='/users'">
            <img src="/images/USER_IMAGE.png" alt="User Management">
            <div class="card-content">
                <h3>User Management</h3>
            </div>
        </div>

        <div class="card" onclick="window.location.href='/surats'">
            <img src="/images/SURAT_IMAGE.png" alt="Surat Management">
            <div class="card-content">
                <h3>Surat Management</h3>
            </div>
        </div>

        <div class="card" onclick="window.location.href='/anggota'">
            <img src="/images/ANGGOTA_IMAGE.png" alt="Anggota Management">
            <div class="card-content">
                <h3>Anggota Management</h3>
            </div>
        </div>

        <div class="card" onclick="window.location.href='/kas'">
            <img src="/images/KAS_IMAGE.png" alt="Kas Management">
            <div class="card-content">
                <h3>Kas Management</h3>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; 2024 HIMATIKA</p>
    </footer>
</body>
</html>
