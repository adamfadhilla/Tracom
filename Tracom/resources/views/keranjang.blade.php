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
    }

    body {
      margin-top: 70px;
      background: var(--kuning-krem) !important;
      font-family: 'Poppins', sans-serif;
      color: var(--coklat-tua);
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
      color: #306F38;
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

    .food-image {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #BB9479;
      margin-right: 20px;
    }

    .cart-item h5 {
      margin: 0;
      font-weight: 600;
      color: #5E4118;
    }

    .cart-item .price {
      color: #BB9479;
      font-weight: 600;
    }

    .btn-checkout {
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

    .btn-checkout:hover {
      background-color: #5E4118;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(94, 65, 24, 0.4);
      color: #fff;
    }

    .notes-area {
      background-color: #fff6de;
      border: 2px dashed #BB9479;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 25px;
    }

    .payment-details {
      background: #FFFFFF;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      margin-bottom: 20px;
    }

    .payment-details h5 {
      font-weight: 600;
      color: #5E4118;
    }

    .total-text {
      font-size: 1.4rem;
      font-weight: bold;
      color: #306F38;
    }
/* Footer */
:root {
  --kuning-krem: #FCEFB4;
  --coklat-tua: #5E4118;
  --coklat-muda: #BB9479;
  --putih: #FFFFFF;
}

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
      <h5>Rincian Pembayaran</h5>
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
      <a href="{{ route('checkout.form') }}" class="btn btn-checkout mt-3" id="btn-checkout">Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i></a>
    </div>
  </div>

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
  <script>
    const cartContainer = document.getElementById('cart-container');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Fungsi untuk dapatkan gambar berdasarkan nama menu
    function getImageForItem(name) {
      name = name.toLowerCase();
      if (name.includes("lontong")) return "{{ asset('img/lontong.jpeg') }}";
      if (name.includes("ketupat")) return "{{ asset('img/ketupat.jpeg') }}";
      if (name.includes("nasi")) return "{{ asset('img/nasi.jpeg') }}";
      // Tambahkan menu lain jika ada
      return "{{ asset('img/ketupat.jpeg') }}"; // default
    }

    function updateLocalStorage() {
      localStorage.setItem('cart', JSON.stringify(cart));
    }

    function updateCartDisplay() {
      cartContainer.innerHTML = '';
      let total = 0;

      if (cart.length === 0) {
        cartContainer.innerHTML = '<p class="text-center text-muted">Keranjang Anda kosong.</p>';
        document.querySelector('.payment-details').style.display = 'none';
        document.querySelector('.btn-checkout').style.display = 'none';
        return;
      }

      document.querySelector('.payment-details').style.display = 'block';
      document.querySelector('.btn-checkout').style.display = 'inline-block';

      cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const imgSrc = getImageForItem(item.name);

        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = `
          <div class="d-flex align-items-center">
            <img src="${imgSrc}" class="food-image" alt="${item.name}" />
            <div>
              <h5>${item.name}</h5>
              <div class="d-flex align-items-center gap-2 mt-2">
                <button class="btn btn-sm btn-outline-danger btn-decrease" data-index="${index}">−</button>
                <span class="fw-semibold">${item.quantity}</span>
                <button class="btn btn-sm btn-outline-success btn-increase" data-index="${index}">+</button>
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