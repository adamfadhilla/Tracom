<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran - {{ $menu }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
        .qr-img {
            border: 2px dashed #0d6efd;
            padding: 10px;
            border-radius: 12px;
            background-color: #fff;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4" style="max-width: 500px; width: 100%;">
        <h3 class="text-center mb-3">Pembayaran untuk <span class="text-primary">{{ $menu }}</span></h3>
        <p class="text-center">Silakan scan QRIS di bawah ini untuk melakukan pembayaran.</p>

        <div class="text-center mb-4">
            <img src="{{ asset('img/qris.png') }}" alt="QRIS" class="qr-img" width="280">
        </div>

        <form method="POST" action="{{ route('checkout.kirim') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="menu" value="{{ $menu }}">
            <div class="mb-3">
                <label class="form-label">Nama Pemesan:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Upload Bukti Pembayaran:</label>
                <input type="file" name="bukti" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim Bukti Pembayaran</button>
        </form>
    </div>
</body>
</html>
