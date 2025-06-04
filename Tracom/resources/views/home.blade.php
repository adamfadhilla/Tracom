<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tracom - Kuliner Khas Betawi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }
        .navbar-brand {
            font-weight: 600;
            color: #2c3e50 !important;
        }
        .hero {
            background: linear-gradient(to right, #fff8f0, #f0f4ff);
            padding: 80px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
            color: #555;
        }
        .btn-primary {
            background-color: #e67e22;
            border: none;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #d35400;
        }
        .about {
            padding: 60px 15px;
            background-color: #ffffff;
        }
        .about h2 {
            font-weight: 600;
            margin-bottom: 20px;
        }
        .footer {
            padding: 20px;
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Tracom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Rasa Tradisi Betawi, Kini Lebih Dekat</h1>
            <p>Kami menyajikan Ketupat Babanci dan Lontong Sayur otentik dengan cita rasa turun temurun.</p>
            <a href="{{ route('menu') }}" class="btn btn-primary btn-lg mt-3">Lihat Menu</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container text-center">
            <h2>Tentang Tracom</h2>
            <p class="lead">Tracom adalah rumah makan yang berfokus pada sajian khas Betawi, terutama <strong>Ketupat Babanci</strong> dan <strong>Lontong Sayur</strong>. Kami mengedepankan rasa otentik dengan bahan segar dan resep tradisional yang diwariskan dari generasi ke generasi.</p>
            <p>Dengan suasana modern dan layanan ramah, kami siap menyambut Anda yang rindu cita rasa khas Jakarta tempo dulu.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            &copy; 2025 Tracom. Semua Hak Dilindungi.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
