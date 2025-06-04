<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Tracom</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
:root {
  --hijau: #306F38;
  --coklat-tua: #5E4118;
  --coklat-muda: #BB9479;
  --kuning-krem: #FCEFB4;
  --putih: #FFFFFF;
}

body {
  background-color: var(--kuning-krem);
  font-family: 'Poppins', sans-serif;
  color: var(--coklat-tua);
}

h1, h5, .fw-bold {
  color: var(--coklat-tua);
}

a, p, .text-muted {
  color: var(--coklat-tua) !important;
}

.btn-custom {
  background-color: var(--hijau);
  color: white;
  border-radius: 20px;
  border: none;
  transition: all 0.3s ease;
}
.btn-custom:hover {
  background-color: #24582d;
  transform: scale(1.05);
}

a.btn-custom {
  color: white !important;
}

.btn-success {
  background-color: var(--hijau) !important;
  border: none;
  transition: all 0.3s ease;
}
.btn-success:hover {
  background-color: #24582d !important;
  transform: scale(1.05);
}

.btn-outline-secondary {
  border-color: var(--coklat-muda);
  color: var(--coklat-tua);
  transition: all 0.3s ease;
}
.btn-outline-secondary:hover {
  background-color: var(--coklat-muda);
  color: white;
  transform: scale(1.05);
}

.card {
  border: none;
  border-radius: 20px;
  transition: all 0.3s ease;
  padding-top: 60px;
  position: relative;
  background-color: var(--putih);
  box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}
.card:hover {
  box-shadow: 0 12px 32px rgba(0,0,0,0.15);
  transform: translateY(-8px);
}

.circle-img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  position: absolute;
  top: -60px;
  left: 50%;
  transform: translateX(-50%);
  background-color: transparent;
  border: 3px solid var(--coklat-muda);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.card-body {
  padding-top: 0;
}



.menu-wrapper {
  margin-top: 100px;
}

.order-summary {
  margin-top: 50px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
  background: var(--putih);
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 8px 32px rgba(187, 148, 121, 0.25);
}

ul#cart-items li {
  color: var(--coklat-tua);
}

p {
    text-align: center;
    color: white !important
}

footer {
  margin-top: 60px;
  padding: 20px;
  background-color: var(--coklat-tua);
  color: white;
  text-align: center;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}
  </style>
</head>
<body class="py-5">

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
          <p class="fw-bold text-coklat">Rp25.000</p>
          <button class="btn btn-custom w-100 btn-add" data-name="Ketupat Babanci" data-price="25000">Add</button>
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
          <p class="fw-bold text-coklat">Rp20.000</p>
        <button class="btn btn-custom w-100 btn-add" data-name="Lontong Sayur" data-price="20000">Add</button>
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
    <a href="#" class="btn btn-custom w-100">Lihat Keranjang</a>
  </div>

  <a href="#" class="btn btn-outline-secondary mt-4">← Kembali ke Beranda</a>
</div>

<footer>
  <p>&copy; 2025 Tracom. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.querySelectorAll('.btn-add').forEach(button => {
  button.addEventListener('click', () => {
    const cardBody = button.parentElement;
    button.classList.add('d-none');
    cardBody.querySelector('.order-input').classList.remove('d-none');
  });
});

document.querySelectorAll('.btn-cancel').forEach(button => {
  button.addEventListener('click', () => {
    const orderInput = button.closest('.order-input');
    orderInput.classList.add('d-none');
    orderInput.parentElement.querySelector('.btn-add').classList.remove('d-none');
  });
});

document.querySelectorAll('.btn-add-cart').forEach(button => {
  button.addEventListener('click', () => {
    const orderInput = button.closest('.order-input');
    const quantity = parseInt(orderInput.querySelector('.quantity-input').value);
    if (quantity < 1) {
      alert('Masukkan jumlah minimal 1');
      return;
    }

    const cardBody = button.closest('.card-body');
    const name = cardBody.querySelector('.btn-add').dataset.name;
    const price = parseInt(cardBody.querySelector('.btn-add').dataset.price);

    addToCart(name, price, quantity);
    orderInput.classList.add('d-none');
    cardBody.querySelector('.btn-add').classList.remove('d-none');
    orderInput.querySelector('.quantity-input').value = 1;
  });
});

let cart = [];

function addToCart(name, price, quantity) {
  const existing = cart.find(item => item.name === name);
  if (existing) {
    existing.quantity += quantity;
  } else {
    cart.push({ name, price, quantity });
  }
  updateCartItems();
}

function updateCartItems() {
  const cartList = document.getElementById('cart-items');
  cartList.innerHTML = '';
  if (cart.length === 0) {
    cartList.innerHTML = '<li class="list-group-item">Belum ada pesanan</li>';
    return;
  }

  cart.forEach(item => {
    const li = document.createElement('li');
    li.classList.add('list-group-item');
    li.textContent = `${item.name} x${item.quantity} - Rp${(item.price * item.quantity).toLocaleString()}`;
    cartList.appendChild(li);
  });
}
</script>
</body>
</html>
