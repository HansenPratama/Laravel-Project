<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HIMATIKA</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #4eaaa8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .login-wrapper {
            display: flex;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-right: 40px;
            border-right: 2px solid #ccc;
            flex-shrink: 0;
        }

        .logo-container img {
            width: 300px; /* Ukuran logo diperbesar */
            border-radius: 50%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .form-container {
            padding-left: 40px;
            width: 100%;
        }

        .form-container h1 {
            margin-bottom: 30px;
            font-size: 32px;
            color: #333;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            opacity: 0.9;
        }

        .form-container .login-button {
            background-color: #4eaaa8;
            color: white;
        }

        .form-container .login-button:hover {
            background-color: #3a8985;
        }

        .form-container .back-button {
            background-color: #ccc;
            color: #333;
        }

        .form-container .back-button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Logo -->
        <div class="logo-container">
            <img src="" alt="HIMATIKA Logo"> 
        </div>

        <!-- Form Login -->
        <div class="form-container">
            <h1>WELCOME</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <!-- Tombol Login -->
                <button type="submit" class="login-button">Login</button>
            </form>
            <!-- Tombol Back -->
            <button class="back-button" onclick="redirectToLanding()">Back</button>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function redirectToLanding() {
            // Redirect ke halaman landing
            window.location.href = "{{ route('landing') }}";
        }
    </script>
</body>
</html>
