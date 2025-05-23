<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir HP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E1EEBC; /* Latar belakang lembut */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #328E6E; /* Hijau gelap sebagai kontainer */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3, h4, h5 {
            color: #E1EEBC; /* Warna judul */
        }

        .btn-primary {
            background-color: #67AE6E;
            border: none;
        }

        .btn-primary:hover {
            background-color: #90C67C;
        }

        .btn-success {
            background-color: #328E6E;
            border: none;
        }

        .btn-success:hover {
            background-color: #67AE6E;
        }

        .btn-warning {
            background-color: #90C67C;
            border: none;
            color: #1b1b1b;
        }

        .btn-warning:hover {
            background-color: #67AE6E;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .table {
            background-color: #E1EEBC;
        }

        .form-control {
            background-color: #F5FFF1;
            border: 1px solid #90C67C;
        }

        label {
            font-weight: bold;
            color: #1b5e20;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        @yield('content') <!-- Konten dinamis yang akan ditampilkan di setiap halaman -->
    </div>

    @stack('scripts') <!-- Penting agar script dari child views dimuat -->
</body>
</html>
