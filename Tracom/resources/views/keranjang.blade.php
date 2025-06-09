<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Keranjang Belanja | Tracom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
 :root {
  --kuning-krem: #FCEFB4;
  --hijau-gelap: #306F38;
  --coklat-lembut: #BB9479;
  --coklat-tua: #5E4118;
  --putih: #ffffff;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background: var(--kuning-krem) !important;
  color: var(--coklat-tua);
  margin: 0;
  padding: 0;
}

.cart-header {
  text-align: center;
  margin-top: 60px;
  margin-bottom: 40px;
}

.cart-header h1 {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--hijau-gelap);
}

.cart-header p {
  font-size: 1rem;
  color: #7a6d57;
}

.cart-item {
  background-color: var(--putih);
  border-radius: 16px;
  box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
  padding: 20px;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  transition: transform 0.2s ease;
}

.cart-item:hover {
  transform: scale(1.01);
}

.food-image {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 10px;
  border: 2px solid var(--coklat-lembut);
  margin-right: 20px;
}

.cart-item h5 {
  margin: 0;
  font-weight: 600;
  color: var(--coklat-tua);
  font-size: 1.1rem;
}

.cart-item .price {
  color: var(--coklat-lembut);
  font-weight: bold;
  font-size: 1.1rem;
}
.btn-checkout {
  background: linear-gradient(135deg, #306F38, #5E4118);
  color: #fff !important; /* pastikan !important benar penulisannya */
  padding: 14px 36px;
  font-size: 1rem;
  font-weight: 600;
  border: none;
  border-radius: 40px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 14px rgba(94, 65, 24, 0.2);
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
}

.btn-checkout:hover {
  background: linear-gradient(135deg, #5E4118, #306F38); /* balik arah gradasi saat hover */
  transform: translateY(-3px);
  box-shadow: 0 6px 18px rgba(94, 65, 24, 0.35);
  color: #fff; !important;
}

.btn-checkout i {
  transition: transform 0.3s ease;
}

.btn-checkout:hover i {
  transform: translateX(5px); /* efek panah maju saat hover */
}

.notes-area {
  background-color: var(--putih);
  border: 2px dashed var(--coklat-lembut);
  padding: 20px;
  border-radius: 12px;
  margin-bottom: 30px;
}

.notes-area label {
  color: var(--coklat-tua);
  font-weight: 600;
  margin-bottom: 8px;
}

.payment-details {
  background: var(--putih);
  border-radius: 16px;
  padding: 20px 24px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
  margin-bottom: 24px;
}

.payment-details h5 {
  font-weight: 600;
  color: var(--coklat-tua);
  font-size: 1.2rem;
}

.total-text {
  font-size: 1.4rem;
  font-weight: bold;
  color: var(--hijau-gelap);
}

footer {
  background-color: transparent;
  color: var(--coklat-tua);
  font-size: 0.95rem;
}

button.btn-sm {
  font-size: 0.85rem;
  border-radius: 8px;
  padding: 4px 10px;
  font-weight: 600;
}

button.btn-outline-success {
  border-color: var(--hijau-gelap);
  color: var(--hijau-gelap);
}

button.btn-outline-success:hover {
  background-color: var(--hijau-gelap);
  color: #fff;
}

button.btn-outline-danger {
  border-color: #bb5a5a;
  color: #bb5a5a;
}

button.btn-outline-danger:hover {
  background-color: #bb5a5a;
  color: #fff;
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

  <footer class="text-center mt-5 py-4">
    &copy; 2025 Tracom. Semua Hak Dilindungi.
  </footer>

  <script>
    const cartContainer = document.getElementById('cart-container');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Fungsi untuk dapatkan gambar berdasarkan nama menu
    function getImageForItem(name) {
      name = name.toLowerCase();
      if (name.includes("lontong")) return "{{ asset('img/lontong.jpeg') }}";
      if (name.includes("ketupat")) return "{{ asset('img/ketupat.jpeg') }}";
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
