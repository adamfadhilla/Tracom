<!DOCTYPE html>
<html lang="id">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8" />
    <title>Keranjang Belanja | Tracom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #FCEFB4; /* Warna kuning muda */
            color: #5E4118; /* Warna coklat gelap */
        }
=======
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
>>>>>>> 365768a367b9f0a8ad155c09ba3fc11c25c354eb

    .cart-header {
      text-align: center;
      margin-top: 50px;
      margin-bottom: 40px;
    }

<<<<<<< HEAD
        .cart-header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #306F38; /* Warna hijau tua */
        }

        .cart-item {
            background-color: #FFFFFF;
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
            color: #5E4118;
        }

        .cart-item .price {
            color: #BB9479; /* Warna coklat muda */
            font-weight: 600;
        }
=======
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
>>>>>>> 365768a367b9f0a8ad155c09ba3fc11c25c354eb

    .cart-footer {
      text-align: right;
      margin-top: 30px;
    }

<<<<<<< HEAD
        .btn-checkout {
            background-color: #306F38;
            border: none;
            padding: 12px 30px;
            color: #FFFFFF;
            font-weight: 600;
            border-radius: 40px;
            transition: 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #5E4118;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(94, 65, 24, 0.4);
        }

        footer {
            background-color: transparent;
            color: #5E4118;
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
            <h5>Total: <span style="color:#306F38;">Rp 60.000</span></h5>
            <a href="#" class="btn btn-checkout mt-3">Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center mt-5 py-4">
        &copy; 2025 Tracom. Semua Hak Dilindungi.
    </footer>
=======
    .btn-checkout {
      background-color: #e67e22;
      border: none;
      padding: 12px 30px;
      color: #fff;
      font-weight: 600;
      border-radius: 40px;
      transition: 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-checkout:hover {
      background-color: #d35400;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(211, 84, 0, 0.4);
      text-decoration: none;
      color: #fff;
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

    {{-- List Keranjang dari localStorage --}}
    <div id="cart-container"></div>
>>>>>>> 365768a367b9f0a8ad155c09ba3fc11c25c354eb

    {{-- Total & Checkout --}}
    <div class="cart-footer" id="cart-summary">
      <h5>Total: <span class="text-success">Rp 0</span></h5>
      <a href="{{ route('checkout') }}" class="btn btn-checkout mt-3" id="btn-checkout">Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i></a>
    </div>
  </div>

  <footer class="text-center mt-5 py-4 text-muted">
    &copy; 2025 Tracom. Semua Hak Dilindungi.
  </footer>

<script>
  const cartContainer = document.getElementById('cart-container');
  const cartSummary = document.getElementById('cart-summary');
  const totalText = document.querySelector('#cart-summary h5 span');

  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Simpan cart ke localStorage
  function updateLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
  }

  // Render ulang tampilan keranjang
  function updateCartDisplay() {
    cartContainer.innerHTML = '';
    let total = 0;

    if (cart.length === 0) {
      cartContainer.innerHTML = '<p class="text-center text-muted">Keranjang Anda kosong.</p>';
      cartSummary.style.display = 'none';
      return;
    }

    cartSummary.style.display = 'block';

    cart.forEach((item, index) => {
      const itemTotal = item.price * item.quantity;
      total += itemTotal;

      const div = document.createElement('div');
      div.classList.add('cart-item');
      div.innerHTML = `
        <div>
          <h5>${item.name}</h5>
          <div class="d-flex align-items-center gap-2">
            <button class="btn btn-sm btn-outline-danger btn-decrease" aria-label="Kurangi jumlah ${item.name}" data-index="${index}">−</button>
            <span class="fw-semibold">${item.quantity}</span>
            <button class="btn btn-sm btn-outline-success btn-increase" aria-label="Tambah jumlah ${item.name}" data-index="${index}">+</button>
          </div>
        </div>
        <div class="price">Rp ${itemTotal.toLocaleString('id-ID')}</div>
      `;
      cartContainer.appendChild(div);
    });

    totalText.textContent = `Rp ${total.toLocaleString('id-ID')}`;

    attachQuantityButtons();
  }

  // Pasang event listener tombol tambah/kurang
  function attachQuantityButtons() {
    document.querySelectorAll('.btn-increase').forEach(btn => {
      btn.onclick = () => {
        const i = btn.dataset.index;
        cart[i].quantity++;
        updateLocalStorage();
        updateCartDisplay();
      };
    });

    document.querySelectorAll('.btn-decrease').forEach(btn => {
      btn.onclick = () => {
        const i = btn.dataset.index;
        if (cart[i].quantity > 1) {
          cart[i].quantity--;
        } else {
          if (confirm(`Hapus ${cart[i].name} dari keranjang?`)) {
            cart.splice(i, 1);
          }
        }
        updateLocalStorage();
        updateCartDisplay();
      };
    });
  }

  updateCartDisplay();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
