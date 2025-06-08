<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Checkout & Pembayaran QRIS | Tracom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #FCEFB4;
      color: #5E4118;
    }
    .container {
      max-width: 900px;
      margin-top: 50px;
      margin-bottom: 50px;
    }
    .section-box {
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }
    .btn-confirm {
      background-color: #306F38;
      border: none;
      padding: 12px 30px;
      color: #fff;
      font-weight: 600;
      border-radius: 40px;
      transition: 0.3s ease;
      display: inline-block;
    }
    .btn-confirm:hover {
      background-color: #5E4118;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(94, 65, 24, 0.4);
    }
    .total-text {
      font-size: 1.4rem;
      font-weight: bold;
      color: #306F38;
    }
    img.qris-img {
      max-width: 300px;
      margin: 15px 0;
    }
  </style>
</head>
<body>

@include('partials.navbar')

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


<div class="container">
  <h1 class="mb-4 text-center">Checkout & Pembayaran QRIS</h1>

  <form action="{{ route('checkout.process') }}" method="POST" enctype="multipart/form-data" id="checkout-form">
    @csrf

    <div class="row">
      <!-- Form Data Pelanggan -->
      <div class="col-md-6">
        <div class="section-box">
          <h4>Informasi Pelanggan</h4>
          <div class="mb-3">
            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}">
          </div>
          <div class="mb-3">
            <label for="telepon" class="form-label fw-semibold">No. Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required value="{{ old('telepon') }}">
          </div>

          <div class="mb-3">
            <label for="bukti_pembayaran" class="form-label fw-semibold">Upload Bukti Pembayaran (setelah bayar)</label>
            <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" required>
            <div class="form-text">Upload foto/scan bukti pembayaran QRIS Anda.</div>
          </div>
        </div>
      </div>

      <!-- Ringkasan Pesanan & QRIS -->
      <div class="col-md-6">
        <div class="section-box text-center">
          <h4>Ringkasan Pesanan</h4>
          <div id="summary-list" class="mb-3 text-start"></div>
          <hr />
          <div class="d-flex justify-content-between total-text mb-4">
            <span>Total</span>
            <span id="summary-total">Rp 0</span>
          </div>

          <h5>Scan QRIS untuk Bayar</h5>
          <img src="{{ asset('qris.png') }}" alt="QRIS" class="qris-img" />

          <p class="text-muted">Setelah membayar, upload bukti pembayaran di kiri.</p>
        </div>
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn-confirm btn-lg">Konfirmasi dan Bayar</button>
    </div>
  </form>
</div>

<script>
  const summaryList = document.getElementById('summary-list');
  const summaryTotal = document.getElementById('summary-total');
  const checkoutForm = document.getElementById('checkout-form');

  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  function renderSummary() {
    let total = 0;
    summaryList.innerHTML = '';

    if (cart.length === 0) {
      summaryList.innerHTML = '<p class="text-muted">Tidak ada item dalam keranjang.</p>';
      return;
    }

    cart.forEach(item => {
      const itemTotal = item.price * item.quantity;
      total += itemTotal;

      const div = document.createElement('div');
      div.classList.add('d-flex', 'justify-content-between', 'mb-2');
      div.innerHTML = `
        <span>${item.name} x ${item.quantity}</span>
        <span>Rp ${itemTotal.toLocaleString('id-ID')}</span>
      `;
      summaryList.appendChild(div);
    });

    summaryTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`;
  }

  renderSummary();

  checkoutForm.addEventListener('submit', function(e) {
    if (cart.length === 0) {
      e.preventDefault();
      alert('Keranjang belanja kosong. Silakan tambah produk terlebih dahulu.');
      return;
    }
    // Kirim data cart sebagai JSON string lewat input hidden (bisa kamu tambahkan)
    let inputCart = document.createElement('input');
    inputCart.type = 'hidden';
    inputCart.name = 'cart_data';
    inputCart.value = JSON.stringify(cart);
    checkoutForm.appendChild(inputCart);

    localStorage.removeItem('cart');
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
