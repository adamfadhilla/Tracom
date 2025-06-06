<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran QRIS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f9f9f9; font-family: 'Segoe UI', sans-serif; }
    .qris-box {
      max-width: 500px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
    }
    img.qris-img { width: 300px; margin-bottom: 20px; }
  </style>
</head>
<body>

<div class="qris-box">
  <h3>Scan QRIS untuk Bayar</h3>
  <p>Atas nama: <strong>{{ $order->nama }}</strong></p>
  <p>No. Telepon: {{ $order->telepon }}</p>

  <img src="{{ asset('qris.png') }}" alt="QRIS" class="qris-img">

 @php
  $items = $order->cart;
  $total = collect($items)->sum(fn($item) => $item['price'] * $item['quantity']);
@endphp

<p>Total: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></p>


  <p class="mt-3 text-muted">Setelah pembayaran, silakan konfirmasi ke admin.</p>
</div>

</body>
</html>
