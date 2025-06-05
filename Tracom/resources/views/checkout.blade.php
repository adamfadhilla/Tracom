<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Checkout | Tracom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #FCEFB4;
      color: #5E4118;
    }

    .checkout-header {
      text-align: center;
      margin-top: 50px;
      margin-bottom: 40px;
    }

    .checkout-header h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #306F38;
    }

    .form-section, .summary-section {
      background-color: #ffffff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      margin-bottom: 25px;
    }

    .btn-confirm {
      background-color: #306F38;
      border: none;
      padding: 12px 30px;
      color: #fff;
      font-weight: 600;
      border-radius: 40px;
      transition: 0.3s ease;
      text-decoration: none;
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
  </style>
</head>
<body>

  {{-- Navbar --}}
  @include('partials.navbar')

  <div class="container">
    <div class="checkout-header">
      <h1>Checkout</h1>
      <p class="text-muted">Isi detail Anda dan bayar via QRIS.</p>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-section">
          <h5 class="mb-3">Informasi Pelanggan</h5>
          <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
              <label for="telepon" class="form-label fw-semibold">No. Telepon</label>
              <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>

            {{-- Metode pembayaran otomatis: QRIS --}}
            <input type="hidden" name="metode" value="qris">

            {{-- Kirim data cart --}}
            <input type="hidden" name="cart_data" id="cart_data" />

            <div class="text-end mb-5">
              <button type="submit" class="btn btn-confirm" id="btn-submit">Bayar dengan QRIS <i class="fas fa-qrcode ms-2"></i></button>
            </div>
          </form>
        </div>
      </div>

      {{-- Ringkasan Pesanan --}}
      <div class="col-md-6">
        <div class="summary-section">
          <h5 class="mb-3">Ringkasan Pesanan</h5>
          <div id="summary-list"></div>
          <hr />
          <div class="d-flex justify-content-between total-text">
            <span>Total</span>
            <span id="summary-total">Rp 0</span>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  const summaryList = document.getElementById('summary-list');
  const summaryTotal = document.getElementById('summary-total');
  const btnSubmit = document.getElementById('btn-submit');
  const cartDataInput = document.getElementById('cart_data');
  const checkoutForm = document.getElementById('checkout-form');

  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  function renderSummary() {
    let total = 0;
    summaryList.innerHTML = '';

    if (cart.length === 0) {
      summaryList.innerHTML = '<p class="text-muted">Tidak ada item dalam keranjang.</p>';
      btnSubmit.disabled = true;
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
    btnSubmit.disabled = false;
  }

  renderSummary();

  checkoutForm.addEventListener('submit', function(e) {
    if (cart.length === 0) {
      e.preventDefault();
      alert('Keranjang belanja kosong. Silakan tambah produk terlebih dahulu.');
      return;
    }

    cartDataInput.value = JSON.stringify(cart);
    localStorage.removeItem('cart');
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
