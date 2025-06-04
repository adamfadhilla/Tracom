<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Keranjang Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="py-5">
<div class="container">
    <h1 class="mb-4">Keranjang Pesanan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($cart) === 0)
        <p>Keranjang Anda kosong.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
    @else
        <ul class="list-group mb-4">
            @foreach($cart as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} x{{ $item['quantity'] }}
                    <span>Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('checkout') }}" class="btn btn-success mb-3">Lanjut ke Pembayaran</a>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Tambah Pesanan</a>
    @endif
</div>
</body>
</html>
