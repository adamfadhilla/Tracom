<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu Tracom</title>

  <!-- Fonts & Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

  <!-- Custom Styles -->
  <style>
    :root {
      --hijau: #306F38;
      --coklat-tua: #5E4118;
      --coklat-muda: #BB9479;
      --kuning-krem: #FCEFB4;
      --putih: #FFFFFF;
    }

    /* Base */
    body {
      background-color: var(--kuning-krem);
      font-family: 'Poppins', sans-serif;
      color: var(--coklat-tua);
    }

    h1,
    h5,
    .fw-bold {
      color: var(--coklat-tua);
    }

    a,
    .text-muted {
      color: var(--coklat-tua) !important;
    }

    /* Buttons */
    .btn-custom,
    .btn-success {
      background-color: var(--hijau);
      color: var(--putih);
      border: none;
      border-radius: 20px;
      transition: all .3s ease;
    }

    .btn-custom:hover,
    .btn-success:hover {
      background-color: #24582d;
      transform: scale(1.05);
    }

    .btn-outline-secondary {
      border-color: var(--coklat-muda);
      color: var(--coklat-tua);
      transition: all .3s ease;
    }

    .btn-outline-secondary:hover {
      background-color: var(--coklat-muda);
      color: var(--putih);
      transform: scale(1.05);
    }

    /* Cards */
    .card {
      position: relative;
      padding-top: 60px;
      border: none;
      border-radius: 20px;
      background-color: var(--putih);
      box-shadow: 0 4px 20px rgba(0, 0, 0, .05);
      transition: all .3s ease;
    }

    .card:hover {
      box-shadow: 0 12px 32px rgba(0, 0, 0, .15);
      transform: translateY(-8px);
    }

    .circle-img {
      position: absolute;
      top: -60px;
      left: 50%;
      width: 120px;
      height: 120px;
      object-fit: cover;
      transform: translateX(-50%);
      border-radius: 50%;
      background-color: transparent;
      border: 3px solid var(--coklat-muda);
      box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
    }

    .card-body { padding-top: 0; }

    /* Layout helpers */
    .menu-wrapper   { margin-top: 100px; }
    .order-summary  {
      max-width: 600px;
      margin: 50px auto 0;
      padding: 30px;
      background: var(--putih);
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(187, 148, 121, .25);
    }
    ul#cart-items li { color: var(--coklat-tua); }

    /* Footer */
    footer {
      margin-top: 60px;
      padding: 20px;
      background-color: var(--coklat-tua);
      color: var(--putih);
      text-align: center;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
    }
  </style>
</head>
<body class="py-5">
  {{-- Navbar --}}
  @include('partials.navbar')

  <div class="container text-center">
    <h1 class="mb-4 fw-bold">Menu Makanan Tracom</h1>
    <p class="text-muted mb-5">Makanan tradisional khas dengan rasa luar biasa 🍴</p>

    <div class="row justify-content-center menu-wrapper">
      <!-- Ketupat Babanci -->
      <div class="col-md-4 mb-5">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('img/ketupat.jpeg') }}" class="circle-img" alt="Ketupat Babanci" />
          <div class="card-body">
            <h5 class="fw-bold">Ketupat Babanci</h5>
            <p class="text-muted">Cita rasa khas Betawi yang kaya rempah dan nikmat.</p>
            <p class="fw-bold">Rp25.000</p>

            <button class="btn btn-custom w-100 btn-add"
                    data-name="Ketupat Babanci"
                    data-price="25000">
              Add
            </button>

            <div class="order-input mt-3 d-none">
              <input type="number" min="1" value="1" class="form-control mb-2 quantity-input" />
              <button class="btn btn-success w-100 btn-add-cart">Tambah ke Keranjang</button>
              <button class="btn btn-outline-secondary w-100 mt-2 btn-cancel">Batal</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Lontong Sayur -->
      <div class="col-md-4 mb-5">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('img/lontong.jpeg') }}" class="circle-img" alt="Lontong Sayur" />
          <div class="card-body">
            <h5 class="fw-bold">Lontong Sayur</h5>
            <p class="text-muted">Lontong empuk disajikan dengan kuah santan gurih.</p>
            <p class="fw-bold">Rp20.000</p>

            <button class="btn btn-custom w-100 btn-add"
                    data-name="Lontong Sayur"
                    data-price="20000">
              Add
            </button>

            <div class="order-input mt-3 d-none">
              <input type="number" min="1" value="1" class="form-control mb-2 quantity-input" />
              <button class="btn btn-success w-100 btn-add-cart">Tambah ke Keranjang</button>
              <button class="btn btn-outline-secondary w-100 mt-2 btn-cancel">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Order Summary -->
    <div class="order-summary">
      <h4 class="fw-bold">Keranjang Pesanan</h4>
      <ul id="cart-items" class="list-group mb-3">
        <li class="list-group-item">Belum ada pesanan</li>
      </ul>
      <a href="{{ route('keranjang') }}" class="btn btn-custom w-100">Lihat Keranjang</a>
    </div>

    <a href="#" class="btn btn-outline-secondary mt-4">← Kembali ke Beranda</a>
  </div>

  <footer>
    <p class="mb-0">&copy; 2025 Tracom. All rights reserved.</p>
  </footer>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
  /* Helpers ------------------------------------------------------------- */
  const CART_KEY = 'cart';

  const getCart = () => JSON.parse(localStorage.getItem(CART_KEY)) || [];
  const saveCart = (items) => localStorage.setItem(CART_KEY, JSON.stringify(items));

  const renderCart = () => {
    const cartList = document.getElementById('cart-items');
    const items = getCart();

    cartList.innerHTML = '';

    if (items.length === 0) {
      cartList.innerHTML = '<li class="list-group-item">Belum ada pesanan</li>';
      return;
    }

    items.forEach(({ name, price, quantity }) => {
      const li = document.createElement('li');
      li.className = 'list-group-item';
      li.textContent = `${name} x${quantity} - Rp${(price * quantity).toLocaleString()}`;
      cartList.appendChild(li);
    });
  };

  const updateCartCount = () => {
    const items = getCart();
    const totalQuantity = items.reduce((sum, item) => sum + item.quantity, 0);

    // Cari elemen badge di navbar (ubah sesuai ID/selector badge kamu)
    const cartCountEl = document.querySelector('.fa-shopping-cart + .badge');
    if (cartCountEl) {
      if (totalQuantity > 0) {
        cartCountEl.textContent = totalQuantity;
        cartCountEl.style.display = 'inline-block';
      } else {
        cartCountEl.style.display = 'none';
      }
    }
  };

  const addToCart = (name, price, quantity) => {
    const items = getCart();
    const exist = items.find(item => item.name === name);

    if (exist) exist.quantity += quantity;
    else items.push({ name, price, quantity });

    saveCart(items);
    renderCart();
    updateCartCount();
  };

  /* UI bindings --------------------------------------------------------- */
  document.querySelectorAll('.btn-add').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.classList.add('d-none');
      btn.parentElement.querySelector('.order-input').classList.remove('d-none');
    });
  });

  document.querySelectorAll('.btn-cancel').forEach(btn => {
    btn.addEventListener('click', () => {
      const orderInput = btn.closest('.order-input');
      orderInput.classList.add('d-none');
      orderInput.parentElement.querySelector('.btn-add').classList.remove('d-none');
    });
  });

  document.querySelectorAll('.btn-add-cart').forEach(btn => {
    btn.addEventListener('click', () => {
      const orderInput = btn.closest('.order-input');
      const qtyInput = orderInput.querySelector('.quantity-input');
      const quantity = parseInt(qtyInput.value, 10) || 0;

      if (quantity < 1) {
        alert('Masukkan jumlah minimal 1');
        return;
      }

      const cardBody = btn.closest('.card-body');
      const addBtn = cardBody.querySelector('.btn-add');
      const { name, price } = addBtn.dataset;

      addToCart(name, parseInt(price, 10), quantity);

      // Reset UI
      orderInput.classList.add('d-none');
      addBtn.classList.remove('d-none');
      qtyInput.value = 1;
    });
  });

  /* Init ---------------------------------------------------------------- */
  renderCart();
  updateCartCount();
</script>

</body>
</html>
