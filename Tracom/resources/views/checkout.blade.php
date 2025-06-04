<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran - {{ $menu }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <h2>Bayar untuk: {{ $menu }}</h2>
    <p>Silakan scan QRIS di bawah untuk membayar.</p>
    <img src="{{ asset('img/qris.png') }}" width="300" alt="QRIS" class="my-3">
    <form method="POST" action="{{ route('checkout.kirim') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="menu" value="{{ $menu }}">
        <div class="mb-3">
            <label>Nama Pemesan:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Upload Bukti Pembayaran:</label>
            <input type="file" name="bukti" class="form-control" required>
        </div>
        <button class="btn btn-primary">Kirim Bukti</button>
    </form>
</body>
</html>
