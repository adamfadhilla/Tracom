<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Menu Tracom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #fffaf5;
            font-family: 'Segoe UI', sans-serif;
        }
        .text-orange {
            color: #ff7f50;
        }
        .btn-custom {
            background-color: #ff7f50;
            color: white;
            border-radius: 20px;
        }
        .btn-custom:hover {
            background-color: #e5673a;
        }
        .card {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            padding-top: 60px;
            position: relative;
        }
        .card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
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
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 20px rgb(0 0 0 / 0.1);
        }
    </style>
</head>
<body class="py-5">

<div class="container text-center">
    <h1 class="mb-4 fw-bold text-orange">Menu Makanan Tracom</h1>
    <p class="text-muted mb-5">Makanan tradisional khas dengan rasa luar biasa 🍴</p>

    <div class="row justify-content-center menu-wrapper">
        <!-- Ketupat Babanci -->
        <div class="col-md-4 mb-5">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/ketupat.jpeg') }}" class="circle-img" alt="Ketupat Babanci" />
                <div class="card-body">
                    <h5 class="fw-bold">Ketupat Babanci</h5>
                    <p class="text-muted">Cita rasa khas Betawi yang kaya rempah dan nikmat.</p>
                    <p class="fw-bold text-orange">Rp25.000</p>
                    
                    <!-- Add button -->
                    <button class="btn btn-custom w-100 btn-add" data-name="Ketupat Babanci" data-price="25000">Add</button>
                    
                    <!-- Hidden form for quantity -->
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
                    <p class="fw-bold text-orange">Rp20.000</p>
                    
                    <!-- Add button -->
                    <button class="btn btn-custom w-100 btn-add" data-name="Lontong Sayur" data-price="20000">Add</button>
                    
                    <!-- Hidden form for quantity -->
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
        <h4>Keranjang Pesanan</h4>
        <ul id="cart-items" class="list-group mb-3">
            <li class="list-group-item">Belum ada pesanan</li>
        </ul>
        <a href="{{ route('keranjang') }}" class="btn btn-primary w-100">Lihat Keranjang</a>
    </div>

    <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-4">← Kembali ke Beranda</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Ambil semua tombol Add
    document.querySelectorAll('.btn-add').forEach(button => {
        button.addEventListener('click', () => {
            const cardBody = button.parentElement;
            button.classList.add('d-none');
            cardBody.querySelector('.order-input').classList.remove('d-none');
        });
    });

    // Cancel button: sembunyikan form, munculkan tombol Add
    document.querySelectorAll('.btn-cancel').forEach(button => {
        button.addEventListener('click', () => {
            const orderInput = button.closest('.order-input');
            orderInput.classList.add('d-none');
            orderInput.parentElement.querySelector('.btn-add').classList.remove('d-none');
        });
    });

    // Tambah ke keranjang
    document.querySelectorAll('.btn-add-cart').forEach(button => {
        button.addEventListener('click', async () => {
            const orderInput = button.closest('.order-input');
            const quantity = parseInt(orderInput.querySelector('.quantity-input').value);
            if (quantity < 1) {
                alert('Masukkan jumlah minimal 1');
                return;
            }

            const cardBody = button.closest('.card-body');
            const name = cardBody.querySelector('.btn-add').dataset.name;
            const price = parseInt(cardBody.querySelector('.btn-add').dataset.price);

            try {
                // Kirim data ke server via AJAX (Laravel route: /cart/add)
                const response = await axios.post('/cart/add', {
                    name: name,
                    price: price,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                });

                if (response.data.success) {
                    alert('Pesanan berhasil ditambahkan ke keranjang!');

                    // Update tampilan keranjang di halaman ini
                    updateCartItems(response.data.cart);
                    
                    // Reset dan sembunyikan form input jumlah
                    orderInput.classList.add('d-none');
                    cardBody.querySelector('.btn-add').classList.remove('d-none');
                    orderInput.querySelector('.quantity-input').value = 1;
                } else {
                    alert('Gagal menambahkan pesanan.');
                }
            } catch (error) {
                alert('Terjadi kesalahan. Coba lagi.');
                console.error(error);
            }
        });
    });

    // Fungsi update tampilan keranjang
    function updateCartItems(cart) {
        const cartList = document.getElementById('cart-items');
        cartList.innerHTML = ''; // Kosongkan dulu
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

    // Saat halaman load, bisa request keranjang dulu untuk tampilkan (opsional)
    async function fetchCart() {
        try {
            const response = await axios.get('/cart');
            if (response.data.success) {
                updateCartItems(response.data.cart);
            }
        } catch (error) {
            console.error(error);
        }
    }
    fetchCart();
</script>

</body>
</html>
