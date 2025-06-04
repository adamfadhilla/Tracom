<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Keranjang Belanja | Tracom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fdfaf7;
            color: #333;
        }

        .cart-header {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 40px;
        }

        .cart-header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #e67e22;
        }

        .cart-item {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cart-item h5 {
            margin: 0;
            font-weight: 600;
        }

        .cart-item .price {
            color: #e67e22;
            font-weight: 600;
        }

        .cart-footer {
            text-align: right;
            margin-top: 30px;
        }

        .btn-checkout {
            background-color: #e67e22;
            border: none;
            padding: 12px 30px;
            color: #fff;
            font-weight: 600;
            border-radius: 40px;
            transition: 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #d35400;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(211, 84, 0, 0.4);
        }
    </style>
</head>
<body>

    {{-- Navbar include --}}
   @include('partials.navbar')


    <div class="container">
        <div class="cart-header">
            <h1>Keranjang Belanja Anda</h1>
            <p class="text-muted">Lihat daftar pesanan sebelum checkout.</p>
        </div>

        {{-- List Keranjang --}}
        <div class="cart-item">
            <div>
                <h5>Ketupat Babanci</h5>
                <small>Qty: 2</small>
            </div>
            <div class="price">Rp 40.000</div>
        </div>

        <div class="cart-item">
            <div>
                <h5>Lontong Sayur</h5>
                <small>Qty: 1</small>
            </div>
            <div class="price">Rp 20.000</div>
        </div>

        {{-- Total & Checkout --}}
        <div class="cart-footer">
            <h5>Total: <span class="text-success">Rp 60.000</span></h5>
            <a href="#" class="btn btn-checkout mt-3">Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center mt-5 py-4 text-muted">
        &copy; 2025 Tracom. Semua Hak Dilindungi.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
