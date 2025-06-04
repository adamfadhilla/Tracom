<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Tracom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }
        .qr-img {
            border: 2px dashed #0d6efd;
            padding: 12px;
            border-radius: 12px;
            background: #fff;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">

    <div class="card p-4" style="max-width: 600px; width: 100%;">
        <h3 class="text-center mb-3">Checkout Pesanan</h3>

        {{-- Notifikasi error / sukses --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(empty($cart))
            <div class="alert alert-warning text-center">
                Keranjang masih kosong. <a href="{{ route('menu') }}">Kembali ke menu</a>
            </div>
        @else
            {{-- Daftar Item --}}
            <ul class="list-group mb-4">
                @foreach($cart as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item['nama'] }}</strong><br>
                            <small>Qty: {{ $item['qty'] }}</small>
                        </div>
                        <span class="text-success fw-semibold">Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>

            {{-- QRIS --}}
            <p class="text-center">Silakan scan QRIS di bawah ini untuk melakukan pembayaran.</p>
            <div class="text-center mb-4">
                <img src="{{ asset('img/qris.png') }}" alt="QRIS" class="qr-img" width="250">
            </div>

            {{-- Form Upload --}}
            <form action="{{ route('checkout.kirim') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti" name="bukti" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Kirim Bukti Pembayaran</button>
            </form>
        @endif
    </div>

</body>
</html>
