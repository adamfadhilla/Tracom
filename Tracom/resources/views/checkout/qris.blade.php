<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran QRIS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
:root {
  --kuning-krem: #FCEFB4;
  --coklat-tua: #5E4118;
  --putih: #FFFFFF;
  --shadow: rgba(94, 65, 24, 0.15);
}

body {
  font-family: 'Poppins', sans-serif;
  background: var(--kuning-krem);
  color: var(--coklat-tua);
  margin: 0;
  padding: 0;
  padding-top: 70px; /* Supaya konten tidak tertutup navbar */
  box-sizing: border-box;
  min-height: 100vh;
}

/* Navbar kecil dan elegan */
.navbar-custom {
  background-color: #FCEFB4;
  padding: 6px 20px; /* Kurangi padding atas & bawah */
  box-shadow: 0 2px 6px rgba(94, 65, 24, 0.15);
  height: 60px;
}

.navbar-custom .navbar-brand img {
  height: 36px; /* Ukuran logo */
  margin-right: 8px;
}

.navbar-custom .navbar-brand span {
  font-size: 1.2rem;
  font-weight: 600;
  color: #5E4118;
  vertical-align: middle;
}

.navbar-custom .nav-link {
  font-size: 0.95rem;
  padding: 8px 14px;
  color: #5E4118 !important;
}


.qris-box {
  background: var(--putih);
  max-width: 420px;
  margin: auto;
  padding: 40px 30px;
  border-radius: 20px;
  box-shadow: 0 10px 25px var(--shadow);
  text-align: center;
  transition: box-shadow 0.3s ease;
}

.qris-box:hover {
  box-shadow: 0 16px 35px var(--shadow);
}

.qris-box h3 {
  font-weight: 700;
  font-size: 1.75rem;
  margin-bottom: 18px;
  letter-spacing: 0.5px;
}

.qris-box p {
  font-size: 1rem;
  margin-bottom: 10px;
  line-height: 1.5;
}

.qris-box p strong {
  font-weight: 600;
}

img.qris-img {
  width: 280px;
  max-width: 100%;
  margin: 25px 0;
  border-radius: 12px;
  box-shadow: 0 6px 15px var(--shadow);
  transition: transform 0.3s ease;
}

img.qris-img:hover {
  transform: scale(1.05);
  box-shadow: 0 12px 25px var(--shadow);
}

.total-badge {
  display: inline-block;
  background-color: var(--kuning-krem);
  color: var(--coklat-tua);
  font-weight: 600;
  padding: 10px 18px;
  border-radius: 30px;
  box-shadow: 0 4px 12px var(--shadow);
  font-size: 1rem;
  margin-top: 10px;
}

.text-muted {
  color: #7a6b3a;
  font-size: 0.9rem;
  margin-top: 30px;
  font-style: italic;
}
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-custom fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tracom QRIS</a>
  </div>
</nav>

<!-- Konten QRIS -->
<div class="qris-box">
  <h3>Scan QRIS untuk Bayar</h3>
  <p>Atas nama: <strong>{{ $order->nama }}</strong></p>
  <p>No. Telepon: {{ $order->telepon }}</p>

  <img src="{{ asset('qris.png') }}" alt="QRIS" class="qris-img">

  @php
    $items = json_decode($order->cart, true);
    $total = collect($items)->sum(fn($item) => $item['price'] * $item['quantity']);
  @endphp

  <div class="total-badge">
    Total: Rp {{ number_format($total, 0, ',', '.') }}
  </div>

  <p class="text-muted">Setelah pembayaran, silakan konfirmasi ke admin.</p>
</div>

</body>
</html>
