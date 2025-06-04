<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Tracom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffaf5;
            font-family: 'Segoe UI', sans-serif;
        }

        .text-orange {
            color: #ff7f50;
        }

        .btn-custom {
            background-color: #ff7f50;
            color: white;
            border-radius: 20px;
        }

        .btn-custom:hover {
            background-color: #e5673a;
        }

        .card {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            padding-top: 60px;
            position: relative;
        }

        .card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .circle-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            background-color: transparent;
        }

        .card-body {
            padding-top: 0;
        }

        .menu-wrapper {
            margin-top: 100px;
        }
    </style>
</head>
<body class="py-5">

<div class="container text-center">
    <h1 class="mb-4 fw-bold text-orange">Menu Makanan Tracom</h1>
    <p class="text-muted mb-5">Makanan tradisional khas dengan rasa luar biasa 🍴</p>

    <div class="row justify-content-center menu-wrapper">
        <!-- Ketupat Babanci -->
        <div class="col-md-4 mb-5">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/ketupat.jpeg') }}" class="circle-img" alt="Ketupat Babanci">
                <div class="card-body">
                    <h5 class="fw-bold">Ketupat Babanci</h5>
                    <p class="text-muted">Cita rasa khas Betawi yang kaya rempah dan nikmat.</p>
                    <p class="fw-bold text-orange">Rp25.000</p>
                    <a href="{{ route('checkout', 'Ketupat Babanci') }}" class="btn btn-custom w-100">Pesan Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Lontong Sayur -->
        <div class="col-md-4 mb-5">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/lontong.jpeg') }}" class="circle-img" alt="Lontong Sayur">
                <div class="card-body">
                    <h5 class="fw-bold">Lontong Sayur</h5>
                    <p class="text-muted">Lontong empuk disajikan dengan kuah santan gurih.</p>
                    <p class="fw-bold text-orange">Rp20.000</p>
                    <a href="{{ route('checkout', 'Lontong Sayur') }}" class="btn btn-custom w-100">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-4">← Kembali ke Beranda</a>
</div>

</body>
</html>
