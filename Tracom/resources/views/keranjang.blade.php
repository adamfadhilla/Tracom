<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Keranjang Belanja | Tracom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    /* Animasi fade-in smooth untuk seluruh kontainer keranjang */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .container {
      animation: fadeInUp 0.8s ease-out;
    }

    :root {
      --kuning-krem: #FCEFB4;
      --primary: #306F38;
      --primary-dark: #1B5E20;
      --secondary: #5E4118;
      --secondary-light: #8D6E63;
      --accent: #FCEFB4;
      --light: #FFF9E6;
      --dark: #3A2C0D;
      --white: #FFFFFF;
      --border-radius: 12px;
      --box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
      margin-top: 70px;
      background: var(--kuning-krem) !important;
      font-family: 'Poppins', sans-serif;
      color: var(--dark);
      overflow-x: hidden;
    }

    .cart-header {
      text-align: center;
      margin-top: 50px;
      margin-bottom: 40px;
    }

    .cart-header h1 {
      font-size: 2.8rem;
      font-weight: 700;
      color: var(--primary);
      position: relative;
      display: inline-block;
    }

    .cart-header h1:after {
      content: '';
      position: absolute;
      bottom: -12px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 5px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      border-radius: 3px;
    }

    .cart-item {
      background-color: var(--white);
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      padding: 20px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: var(--transition);
    }

    .cart-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .food-image {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid var(--secondary-light);
      margin-right: 20px;
      transition: var(--transition);
    }

    .food-image:hover {
      transform: scale(1.05);
    }

    .cart-item h5 {
      margin: 0;
      font-weight: 600;
      color: var(--secondary);
    }

    .cart-item .price {
      color: var(--secondary-light);
      font-weight: 600;
    }

    /* Quantity buttons */
    .quantity-btn {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn-increase {
      background-color: var(--primary);
      color: white;
    }

    .btn-increase:hover {
      background-color: var(--primary-dark);
      transform: scale(1.1);
    }

    .btn-increase:active {
      transform: scale(0.95);
    }

    .btn-decrease {
      background-color: #f8f9fa;
      color: var(--secondary);
      border: 1px solid #dee2e6;
    }

    .btn-decrease:hover {
      background-color: #e9ecef;
      transform: scale(1.1);
    }

    .btn-decrease:active {
      transform: scale(0.95);
    }

    .quantity-value {
      min-width: 30px;
      text-align: center;
      font-weight: 600;
      color: var(--secondary);
    }

    /* Checkout button */
    .btn-checkout {
      background-color: var(--primary);
      border: none;
      padding: 14px 36px;
      color: var(--white);
      font-weight: 600;
      border-radius: 50px;
      transition: all 0.4s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(48, 111, 56, 0.2);
    }

    .btn-checkout:hover {
      background-color: var(--primary-dark);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(48, 111, 56, 0.3);
    }

    .btn-checkout:active {
      transform: translateY(0);
    }

    .btn-checkout::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: 0.5s;
    }

    .btn-checkout:hover::before {
      left: 100%;
    }

    .notes-area {
      background-color: rgba(255, 255, 255, 0.8);
      border: 2px dashed var(--secondary-light);
      padding: 15px;
      border-radius: var(--border-radius);
      margin-bottom: 25px;
      transition: var(--transition);
    }

    .notes-area:hover {
      background-color: rgba(255, 255, 255, 0.9);
      border-color: var(--primary);
    }

    .payment-details {
      background: var(--white);
      border-radius: var(--border-radius);
      padding: 20px;
      box-shadow: var(--box-shadow);
      margin-bottom: 20px;
      transition: var(--transition);
    }

    .payment-details:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .payment-details h5 {
      font-weight: 600;
      color: var(--secondary);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .payment-details h5 i {
      color: var(--primary);
    }

    .total-text {
      font-size: 1.4rem;
      font-weight: bold;
      color: var(--primary);
    }
/* Footer */
:root {
  --kuning-krem: #FCEFB4;
  --coklat-tua: #5E4118;
  --coklat-muda: #BB9479;
  --putih: #FFFFFF;
}

<<<<<<< HEAD
/* Footer */
footer {
  margin-top: 100px;
  padding: 30px 0;
  background: var(--coklat-tua);
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
  background: var(--putih);
  border: 2px solid var(--coklat-muda);
  color: var(--coklat-tua);
  margin: 0 5px;
  transition: all 0.3s ease;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  font-size: 18px;
}

.social-icon:hover {
  background: var(--coklat-muda);
  color: var(--putih);
  transform: translateY(-3px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  text-decoration: none;
}
=======
    footer {
      background-color: transparent;
      color: var(--secondary);
      padding: 20px 0;
      margin-top: 40px;
    }

    /* Pulse animation for attention */
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    .pulse {
      animation: pulse 2s infinite;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .cart-header h1 {
        font-size: 2rem;
      }
      
      .cart-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }
      
      .food-image {
        margin-right: 0;
        margin-bottom: 10px;
      }
      
      .btn-checkout {
        width: 100%;
        justify-content: center;
      }
    }
>>>>>>> b435892ac1dc7402345e52cd0e2cec7ad0783fdc
  </style>
</head>
<body>

  {{-- Navbar --}}
  @include('partials.navbar')

  <div class="container">
    <div class="cart-header">
      <h1>Keranjang Belanja Anda</h1>
      <p class="text-muted">Lihat daftar pesanan sebelum checkout.</p>
    </div>

    {{-- List Keranjang --}}
    <div id="cart-container"></div>

    {{-- Catatan --}}
    <div class="notes-area">
      <label for="catatan" class="form-label fw-semibold"><i class="fas fa-pen me-2"></i>Catatan untuk penjual</label>
      <textarea id="catatan" class="form-control" rows="3" placeholder="Contoh: tanpa pedas, pisahkan sambal, dsb."></textarea>
    </div>

    {{-- Rincian Pembayaran --}}
    <div class="payment-details">
      <h5><i class="fas fa-receipt"></i> Rincian Pembayaran</h5>
      <div class="d-flex justify-content-between mt-3">
        <span>Subtotal (<span id="total-items">0</span> menu)</span>
        <span id="subtotal-text">Rp 0</span>
      </div>
      <hr />
      <div class="d-flex justify-content-between">
        <span>Total</span>
        <span class="total-text" id="total-payment">Rp 0</span>
      </div>
    </div>

    {{-- Tombol Checkout --}}
    <div class="text-end mb-5">
      <a href="{{ route('checkout.form') }}" class="btn btn-checkout mt-3 pulse" id="btn-checkout">
        <i class="fas fa-arrow-right"></i> Lanjut ke Pembayaran
      </a>
    </div>
  </div>

<<<<<<< HEAD
<footer>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 text-md-start mb-3 mb-md-0">
        <p class="mb-0 text-white">&copy; 2025 Tracom. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-md-end">
        <a href="https://www.instagram.com/tracom.?igsh=b3g3NWZhZWJ1dmZ2" target="_blank" class="social-icon" title="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.tiktok.com/@tracom.?_t=ZS-8x4zfkuzt6f&_r=1" target="_blank" class="social-icon" title="TikTok">
          <i class="fab fa-tiktok"></i>
        </a>
        <a href="https://wa.me/628979567165" target="_blank" class="social-icon" title="WhatsApp">
          <i class="fab fa-whatsapp"></i>
        </a>
      </div>
    </div>
  </div>
</footer>
=======
  <footer class="text-center">
    &copy; 2025 Tracom. Semua Hak Dilindungi.
  </footer>

>>>>>>> b435892ac1dc7402345e52cd0e2cec7ad0783fdc
  <script>
    const cartContainer = document.getElementById('cart-container');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Fungsi untuk dapatkan gambar berdasarkan nama menu
    function getImageForItem(name) {
      name = name.toLowerCase();
      if (name.includes("lontong")) return "{{ asset('img/lontong.jpeg') }}";
      if (name.includes("ketupat")) return "{{ asset('img/ketupat.jpeg') }}";
      if (name.includes("nasi")) return "{{ asset('img/nasi.jpeg') }}";
      return "{{ asset('img/ketupat.jpeg') }}"; // default
    }

    function updateLocalStorage() {
      localStorage.setItem('cart', JSON.stringify(cart));
    }

    function updateCartDisplay() {
      cartContainer.innerHTML = '';
      let total = 0;

      if (cart.length === 0) {
        cartContainer.innerHTML = '<div class="text-center py-4"><i class="fas fa-shopping-cart fa-3x mb-3" style="color: var(--secondary-light);"></i><p class="text-muted">Keranjang Anda kosong.</p></div>';
        document.querySelector('.payment-details').style.display = 'none';
        document.querySelector('.notes-area').style.display = 'none';
        document.querySelector('.btn-checkout').style.display = 'none';
        return;
      }

      document.querySelector('.payment-details').style.display = 'block';
      document.querySelector('.notes-area').style.display = 'block';
      document.querySelector('.btn-checkout').style.display = 'inline-flex';

      cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const imgSrc = getImageForItem(item.name);

        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = `
          <div class="d-flex align-items-center flex-grow-1">
            <img src="${imgSrc}" class="food-image" alt="${item.name}" />
            <div class="flex-grow-1">
              <h5>${item.name}</h5>
              <div class="d-flex align-items-center gap-2 mt-2">
                <button class="quantity-btn btn-decrease" data-index="${index}">
                  <i class="fas fa-minus"></i>
                </button>
                <span class="quantity-value">${item.quantity}</span>
                <button class="quantity-btn btn-increase" data-index="${index}">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="price">Rp ${itemTotal.toLocaleString('id-ID')}</div>
        `;
        cartContainer.appendChild(div);
      });

      document.getElementById('total-items').textContent = cart.length;
      document.getElementById('subtotal-text').textContent = `Rp ${total.toLocaleString('id-ID')}`;
      document.getElementById('total-payment').textContent = `Rp ${total.toLocaleString('id-ID')}`;

      attachQuantityButtons();
    }

    function attachQuantityButtons() {
      document.querySelectorAll('.btn-increase').forEach(btn => {
        btn.onclick = (e) => {
          e.preventDefault();
          const i = btn.dataset.index;
          cart[i].quantity++;
          updateLocalStorage();
          updateCartDisplay();
          
          // Add animation feedback
          btn.classList.add('animate');
          setTimeout(() => {
            btn.classList.remove('animate');
          }, 300);
        };
      });

      document.querySelectorAll('.btn-decrease').forEach(btn => {
        btn.onclick = (e) => {
          e.preventDefault();
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
          
          // Add animation feedback
          btn.classList.add('animate');
          setTimeout(() => {
            btn.classList.remove('animate');
          }, 300);
        };
      });
    }

    updateCartDisplay();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>