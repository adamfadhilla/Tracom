<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu Tracom</title>

  <!-- Fonts & Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
:root {
  --hijau: #306F38;
  --hijau-muda: #4CAF50;
  --coklat-tua: #5E4118;
  --coklat-muda: #BB9479;
  --kuning-krem: #FCEFB4;
  --putih: #FFFFFF;
  --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  --shadow-hover: 0 10px 15px rgba(0, 0, 0, 0.1);
}

body {
  margin-top: 70px;
  background: var(--kuning-krem) !important;
  font-family: 'Poppins', sans-serif;
  color: var(--coklat-tua);
  overflow-x: hidden;
}

h1, h2, h3, h4, h5, .fw-bold {
  color: var(--coklat-tua);
  font-weight: 700 !important;
}

a, .text-muted {
  color: var(--coklat-tua) !important;
  text-decoration: none;
}

/* Header */
.menu-header {
  position: relative;
  margin-bottom: 60px;
  padding: 20px 0;
  text-align: center;
}

.menu-header::before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 150px;
  height: 4px;
  background: linear-gradient(90deg, var(--hijau), var(--coklat-muda));
  border-radius: 2px;
}

.mascot-container {
  position: absolute;
  top: -20px;
  right: 10%;
  display: flex;
  gap: 10px;
}

.mascot {
  width: 80px;
  height: 80px;
  object-fit: contain;
  filter: drop-shadow(var(--shadow));
  transition: all 0.3s ease;
}

.mascot:hover {
  transform: translateY(-5px) rotate(5deg);
}

/* Buttons */
.btn-custom,
.btn-success {
  background: linear-gradient(135deg, var(--hijau), var(--hijau-muda));
  color: var(--putih) !important;
  border: none;
  border-radius: 20px;
  transition: all 0.3s ease;
  font-weight: 600;
  padding: 10px 20px;
  box-shadow: var(--shadow);
  position: relative;
  overflow: hidden;
}

.btn-custom::after,
.btn-success::after {
  content: '';
  position: absolute;
  top: -50%;
  left: -60%;
  width: 200%;
  height: 200%;
  background: rgba(255,255,255,0.2);
  transform: rotate(30deg);
  transition: all 0.3s;
}

.btn-custom:hover::after,
.btn-success:hover::after {
  left: 100%;
}

.btn-custom:hover,
.btn-success:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-hover);
  background: linear-gradient(135deg, var(--hijau), var(--hijau-muda));
}

.btn-outline-secondary {
  border: 2px solid var(--coklat-muda);
  color: var(--coklat-tua) !important;
  transition: all 0.3s ease;
  border-radius: 16px;
  font-weight: 500;
  padding: 8px 16px;
}

.btn-outline-secondary:hover {
  background-color: var(--coklat-muda);
  color: var(--putih) !important;
  transform: translateY(-2px);
  box-shadow: var(--shadow);
}

/* Cards */
.card {
  position: relative;
  padding-top: 140px;
  border: none;
  border-radius: 20px;
  background-color: var(--putih);
  box-shadow: var(--shadow);
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  overflow: hidden;
  margin-bottom: 30px;
}

.card:hover {
  box-shadow: var(--shadow-hover);
  transform: translateY(-10px);
}

.card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 10px;
  background: linear-gradient(90deg, var(--hijau), var(--coklat-muda));
}

.circle-img {
  position: absolute;
  top: 50px;
  left: 50%;
  width: 100px;
  height: 100px;
  object-fit: cover;
  transform: translateX(-50%);
  border-radius: 50%;
  background-color: var(--putih);
  border: 5px solid var(--coklat-muda);
  box-shadow: var(--shadow-hover);
  transition: all 0.4s ease;
  z-index: 2;
}

.card:hover .circle-img {
  transform: translateX(-50%) scale(1.1);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.card-body {
  padding: 25px;
  position: relative;
  z-index: 1;
}

.card-body::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23FCEFB4" fill-opacity="0.1" d="M30,10L50,30L70,10L90,30L70,50L90,70L70,90L50,70L30,90L10,70L30,50L10,30L30,10Z"/></svg>');
  background-size: 100px;
  opacity: 0.1;
  z-index: -1;
}

.price-tag {
  position: absolute;
  top: 15px;
  right: 15px;
  background: linear-gradient(135deg, var(--hijau), var(--hijau-muda));
  color: white;
  padding: 6px 15px;
  border-radius: 20px;
  font-weight: 700;
  font-size: 0.9rem;
  box-shadow: var(--shadow);
  z-index: 3;
}

.menu-wrapper {
  margin-top: 80px;
  margin-bottom: 40px;
}

.badge {
  border-radius: 10px !important;
  padding: 6px 10px !important;
  font-weight: 500 !important;
  font-size: 0.75rem !important;
}

/* Order Summary */
.order-summary {
  max-width: 600px;
  margin: 50px auto 0;
  padding: 30px;
  background: var(--putih);
  border: 2px dashed var(--coklat-muda);
  border-radius: 16px;
  box-shadow: 0 8px 32px rgba(48, 111, 56, 0.15);
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease;
}

.order-summary:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 40px rgba(48, 111, 56, 0.2);
}

.order-summary::before {
  content: "";
  position: absolute;
  top: -10px;
  right: -10px;
  width: 60px;
  height: 60px;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23BB9479" opacity="0.2"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>');
  background-size: contain;
  background-repeat: no-repeat;
}

.order-summary::after {
  content: "";
  position: absolute;
  bottom: -10px;
  left: -10px;
  width: 60px;
  height: 60px;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23306F38" opacity="0.1"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>');
  background-size: contain;
  background-repeat: no-repeat;
}

ul#cart-items {
  max-height: 300px;
  overflow-y: auto;
  padding-right: 10px;
}

ul#cart-items::-webkit-scrollbar {
  width: 6px;
}

ul#cart-items::-webkit-scrollbar-track {
  background: rgba(0,0,0,0.05);
  border-radius: 10px;
}

ul#cart-items::-webkit-scrollbar-thumb {
  background: var(--coklat-muda);
  border-radius: 10px;
}

ul#cart-items li {
  background-color: var(--putih);
  border: 1px solid var(--coklat-muda);
  border-radius: 10px;
  margin-bottom: 10px;
  padding: 12px 15px;
  color: var(--coklat-tua);
  font-weight: 500;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: all 0.3s ease;
}

ul#cart-items li:hover {
  transform: translateX(5px);
  box-shadow: var(--shadow);
}

ul#cart-items li .item-quantity {
  background-color: var(--kuning-krem);
  padding: 4px 10px;
  border-radius: 10px;
  font-size: 0.8rem;
  font-weight: 600;
}

.empty-cart {
  padding: 20px;
  text-align: center;
  color: var(--coklat-muda);
}

.empty-cart i {
  font-size: 2rem;
  margin-bottom: 10px;
  display: block;
}

/* Footer */
footer {
  margin-top: 100px;
  padding: 30px 0;
  background: linear-gradient(135deg, var(--coklat-tua), #4a3515);
  color: var(--putih);
  text-align: center;
  border-top-left-radius: 30px;
  border-top-right-radius: 30px;
  position: relative;
  overflow: hidden;
}

footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23BB9479" fill-opacity="0.05" d="M20,20L40,40L20,60L40,80L60,60L80,80L60,40L80,20L60,20L40,40L20,20Z"/></svg>');
  background-size: 100px;
}

.social-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(255,255,255,0.1);
  color: var(--putih);
  margin: 0 5px;
  transition: all 0.3s ease;
}

.social-icon:hover {
  background: rgba(255,255,255,0.2);
  transform: translateY(-3px);
}

/* Animation */
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

.floating {
  animation: float 3s ease-in-out infinite;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.fade-in {
  animation: fadeIn 0.6s ease-out forwards;
}

/* Toast Notification */
.toast-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 9999;
}

.toast-custom {
  background: linear-gradient(135deg, var(--hijau), var(--hijau-muda));
  color: white;
  border-radius: 12px;
  box-shadow: var(--shadow-hover);
  border: none;
}

.toast-header-custom {
  background: rgba(0,0,0,0.1);
  color: white;
  border-bottom: 1px solid rgba(255,255,255,0.1);
  border-radius: 12px 12px 0 0 !important;
}

/* Responsive */
@media (max-width: 768px) {
  .mascot-container {
    position: static;
    justify-content: center;
    margin-bottom: 20px;
  }
  
  .menu-header::before {
    width: 100px;
  }
  
  .card {
    padding-top: 100px;
  }
  
  .circle-img {
    width: 100px;
    height: 100px;
    top: 40px;
  }
  
  .order-summary {
    padding: 20px;
  }
}

@media (max-width: 576px) {
  body {
    margin-top: 60px;
  }
  
  .menu-wrapper {
    margin-top: 40px;
  }
  
  .card-body {
    padding: 15px;
  }
}
  </style>
</head>
<body>

  {{-- Navbar --}}
  @include('partials.navbar')

  <div class="container text-center">
    <div class="menu-wrapper">
      <div class="menu-header" data-aos="fade-down">
        <h1 class="mb-3 fw-bold">Menu Makanan Tracom</h1>
        <p class="text-muted mb-4">Makanan tradisional khas dengan rasa luar biasa 🍴</p>
        <div class="mascot-container">
          <img src="{{ asset('img/maskot ketupat.png') }}" class="mascot floating" alt="Maskot Ketupat" style="animation-delay: 0.2s;">
          <img src="{{ asset('img/maskot lontong.png') }}" class="mascot floating" alt="Maskot Lontong" style="animation-delay: 0.5s;">
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Ketupat Babanci -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card h-100">
          <span class="price-tag">Rp25.000</span>
          <img src="{{ asset('img/ketupat.jpeg') }}" class="circle-img" alt="Ketupat Babanci" />
          <div class="card-body">
            <h5 class="fw-bold">Ketupat Babanci</h5>
            <p class="text-muted">Cita rasa khas Betawi yang kaya rempah dan nikmat dengan sentuhan modern.</p>
            <div class="d-flex justify-content-center gap-2 mb-3 flex-wrap">
              <span class="badge bg-light text-dark"><i class="fas fa-star text-warning"></i> 4.9</span>
              <span class="badge bg-light text-dark"><i class="fas fa-fire text-danger"></i> Pedas</span>
              <span class="badge bg-light text-dark"><i class="fas fa-leaf text-success"></i> Halal</span>
              <span class="badge bg-light text-dark"><i class="fas fa-clock text-info"></i> 15 menit</span>
            </div>

            <button class="btn btn-custom w-100 btn-add"
                    data-name="Ketupat Babanci"
                    data-price="25000">
              <i class="fas fa-plus me-2"></i> Tambah
            </button>

            <div class="order-input mt-3 d-none">
              <div class="input-group mb-3">
                <button class="btn btn-outline-secondary btn-minus" type="button">
                  <i class="fas fa-minus"></i>
                </button>
                <input type="number" min="1" value="1" class="form-control text-center quantity-input" />
                <button class="btn btn-outline-secondary btn-plus" type="button">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <button class="btn btn-success w-100 btn-add-cart">
                <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
              </button>
              <button class="btn btn-outline-secondary w-100 mt-2 btn-cancel">
                <i class="fas fa-times me-2"></i> Batal
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Lontong Sayur -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card h-100">
          <span class="price-tag">Rp20.000</span>
          <img src="{{ asset('img/lontong.jpeg') }}" class="circle-img" alt="Lontong Sayur" />
          <div class="card-body">
            <h5 class="fw-bold">Lontong Sayur</h5>
            <p class="text-muted">Lontong empuk disajikan dengan kuah santan gurih dan pelengkap lengkap.</p>
            <div class="d-flex justify-content-center gap-2 mb-3 flex-wrap">
              <span class="badge bg-light text-dark"><i class="fas fa-star text-warning"></i> 4.8</span>
              <span class="badge bg-light text-dark"><i class="fas fa-leaf text-success"></i> Halal</span>
              <span class="badge bg-light text-dark"><i class="fas fa-clock text-info"></i> 10 menit</span>
              <span class="badge bg-light text-dark"><i class="fas fa-utensils text-primary"></i> Sarapan</span>
            </div>

            <button class="btn btn-custom w-100 btn-add"
                    data-name="Lontong Sayur"
                    data-price="20000">
              <i class="fas fa-plus me-2"></i> Tambah
            </button>

            <div class="order-input mt-3 d-none">
              <div class="input-group mb-3">
                <button class="btn btn-outline-secondary btn-minus" type="button">
                  <i class="fas fa-minus"></i>
                </button>
                <input type="number" min="1" value="1" class="form-control text-center quantity-input" />
                <button class="btn btn-outline-secondary btn-plus" type="button">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <button class="btn btn-success w-100 btn-add-cart">
                <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
              </button>
              <button class="btn btn-outline-secondary w-100 mt-2 btn-cancel">
                <i class="fas fa-times me-2"></i> Batal
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Order Summary -->
    <div class="order-summary" data-aos="fade-up" data-aos-delay="300">
      <h4 class="fw-bold mb-4"><i class="fas fa-shopping-basket me-2"></i> Keranjang Pesanan</h4>
      <ul id="cart-items" class="list-group mb-4">
        <li class="empty-cart"><i class="fas fa-shopping-basket"></i> Belum ada pesanan</li>
      </ul>
      <div class="d-flex gap-2">
        <a href="{{ route('keranjang') }}" class="btn btn-custom flex-grow-1">
          <i class="fas fa-shopping-cart me-2"></i> Lihat Keranjang
        </a>
        <button class="btn btn-outline-secondary" id="clear-cart">
          <i class="fas fa-trash-alt me-2"></i> Kosongkan
        </button>
      </div>
    </div>

    <a href="#" class="btn btn-outline-secondary mt-4 mb-5" data-aos="fade-up" data-aos-delay="400">
      <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
    </a>
  </div>

  <footer>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-md-start mb-3 mb-md-0">
          <p class="mb-0">&copy; 2025 Tracom. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Toast Notification Container -->
  <div class="toast-container"></div>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Initialize AOS animations
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true
    });

    const CART_KEY = 'cart';

    const getCart = () => JSON.parse(localStorage.getItem(CART_KEY)) || [];
    const saveCart = (items) => localStorage.setItem(CART_KEY, JSON.stringify(items));

    const renderCart = () => {
      const cartList = document.getElementById('cart-items');
      const items = getCart();

      cartList.innerHTML = '';

      if (items.length === 0) {
        cartList.innerHTML = '<li class="empty-cart"><i class="fas fa-shopping-basket"></i> Belum ada pesanan</li>';
        return;
      }

      let total = 0;
      
      items.forEach(({ name, price, quantity }) => {
        const subtotal = price * quantity;
        total += subtotal;
        
        const li = document.createElement('li');
        li.className = 'fade-in';
        li.innerHTML = `
          <span>${name}</span>
          <div>
            <span class="item-quantity">x${quantity}</span>
            <span class="ms-2 fw-bold">Rp${subtotal.toLocaleString('id-ID')}</span>
          </div>
        `;
        cartList.appendChild(li);
      });

      // Add total row
      const totalLi = document.createElement('li');
      totalLi.className = 'fade-in bg-light';
      totalLi.innerHTML = `
        <span class="fw-bold">TOTAL</span>
        <div>
          <span class="ms-2 fw-bold text-success">Rp${total.toLocaleString('id-ID')}</span>
        </div>
      `;
      cartList.appendChild(totalLi);
    };

    const updateCartCount = () => {
      const items = getCart();
      const totalQuantity = items.reduce((sum, item) => sum + item.quantity, 0);
      const cartCountEl = document.querySelector('.cart-count');
      
      if (cartCountEl) {
        if (totalQuantity > 0) {
          cartCountEl.textContent = totalQuantity;
          cartCountEl.classList.remove('d-none');
        } else {
          cartCountEl.classList.add('d-none');
        }
      }
    };

    const showToast = (message, type = 'success') => {
      const toastContainer = document.querySelector('.toast-container');
      const toastId = 'toast-' + Date.now();
      
      const toast = document.createElement('div');
      toast.id = toastId;
      toast.className = `toast show fade-in toast-custom`;
      toast.role = 'alert';
      toast.setAttribute('aria-live', 'assertive');
      toast.setAttribute('aria-atomic', 'true');
      toast.innerHTML = `
        <div class="toast-header toast-header-custom">
          <strong class="me-auto">${type === 'success' ? 'Berhasil!' : 'Info'}</strong>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          ${message}
        </div>
      `;
      
      toastContainer.appendChild(toast);
      
      // Auto remove after 3 seconds
      setTimeout(() => {
        const toastElement = document.getElementById(toastId);
        if (toastElement) {
          toastElement.classList.remove('show');
          setTimeout(() => toastElement.remove(), 300);
        }
      }, 3000);
    };

    const addToCart = (name, price, quantity) => {
      const items = getCart();
      const existingItem = items.find(item => item.name === name);
      
      if (existingItem) {
        existingItem.quantity += quantity;
      } else {
        items.push({ name, price, quantity });
      }

      saveCart(items);
      renderCart();
      updateCartCount();
      
      showToast(`${quantity} ${name} telah ditambahkan ke keranjang!`);
    };

    const clearCart = () => {
      if (getCart().length === 0) {
        showToast('Keranjang sudah kosong', 'info');
        return;
      }
      
      if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
        saveCart([]);
        renderCart();
        updateCartCount();
        showToast('Keranjang telah dikosongkan', 'info');
      }
    };

    // Event Delegation for Quantity Controls
    document.addEventListener('click', (e) => {
      // Plus button
      if (e.target.classList.contains('btn-plus') || e.target.closest('.btn-plus')) {
        const btn = e.target.classList.contains('btn-plus') ? e.target : e.target.closest('.btn-plus');
        const input = btn.closest('.input-group').querySelector('.quantity-input');
        input.value = parseInt(input.value) + 1;
      }
      
      // Minus button
      if (e.target.classList.contains('btn-minus') || e.target.closest('.btn-minus')) {
        const btn = e.target.classList.contains('btn-minus') ? e.target : e.target.closest('.btn-minus');
        const input = btn.closest('.input-group').querySelector('.quantity-input');
        if (parseInt(input.value) > 1) {
          input.value = parseInt(input.value) - 1;
        }
      }
      
      // Add button (show quantity controls)
      if (e.target.classList.contains('btn-add') || e.target.closest('.btn-add')) {
        const btn = e.target.classList.contains('btn-add') ? e.target : e.target.closest('.btn-add');
        btn.classList.add('d-none');
        btn.parentElement.querySelector('.order-input').classList.remove('d-none');
      }
      
      // Cancel button
      if (e.target.classList.contains('btn-cancel') || e.target.closest('.btn-cancel')) {
        const btn = e.target.classList.contains('btn-cancel') ? e.target : e.target.closest('.btn-cancel');
        const orderInput = btn.closest('.order-input');
        orderInput.classList.add('d-none');
        orderInput.parentElement.querySelector('.btn-add').classList.remove('d-none');
      }
      
      // Add to cart button
      if (e.target.classList.contains('btn-add-cart') || e.target.closest('.btn-add-cart')) {
        const btn = e.target.classList.contains('btn-add-cart') ? e.target : e.target.closest('.btn-add-cart');
        const orderInput = btn.closest('.order-input');
        const qtyInput = orderInput.querySelector('.quantity-input');
        const quantity = parseInt(qtyInput.value, 10) || 0;

        if (quantity < 1) {
          showToast('Masukkan jumlah minimal 1', 'info');
          return;
        }

        const cardBody = btn.closest('.card-body');
        const addBtn = cardBody.querySelector('.btn-add');
        const { name, price } = addBtn.dataset;

        addToCart(name, parseInt(price, 10), quantity);

        orderInput.classList.add('d-none');
        addBtn.classList.remove('d-none');
        qtyInput.value = 1;
      }
    });

    // Clear cart button
    document.getElementById('clear-cart')?.addEventListener('click', clearCart);

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
      renderCart();
      updateCartCount();
      
      // Add ripple effect to buttons
      document.querySelectorAll('.btn-custom, .btn-success').forEach(btn => {
        btn.addEventListener('click', function(e) {
          const rect = this.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;
          
          const ripple = document.createElement('span');
          ripple.className = 'ripple';
          ripple.style.left = `${x}px`;
          ripple.style.top = `${y}px`;
          
          this.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 1000);
        });
      });
    });
  </script>
</body>
</html>