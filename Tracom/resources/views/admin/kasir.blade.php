<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Kasir - Tracom</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap');

    :root {
        --primary: #4361ee;
        --primary-light: #e0e7ff;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --danger: #f72585;
        --warning: #f8961e;
        --dark: #1a1a2e;
        --light: #f8f9fa;
        --gray: #6c757d;
        --gray-light: #e9ecef;
        --white: #ffffff;
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
        --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    * {
        margin: 0; 
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', 'Montserrat', sans-serif;
    }

    body {
        background-color: #f5f7ff;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        color: var(--dark);
    }

    /* Navbar */
    .navbar {
        background-color: var(--white);
        box-shadow: var(--shadow-md);
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo-icon {
        color: var(--primary);
        font-size: 1.8rem;
    }

    .logo-text {
        font-weight: 700;
        font-size: 1.4rem;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        position: relative;
    }

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--primary-light);
        transition: var(--transition);
    }

    .profile:hover .profile-img {
        border-color: var(--primary);
        transform: scale(1.05);
    }

    .profile-name {
        font-weight: 600;
        font-size: 0.95rem;
        color: var(--dark);
    }

    .profile-role {
        font-size: 0.75rem;
        color: var(--gray);
        margin-top: 2px;
    }

    /* Logout Button */
    .logout-btn {
        background: var(--primary);
        color: var(--white);
        border: none;
        padding: 0.6rem 1.5rem;
        font-weight: 600;
        font-size: 0.9rem;
        border-radius: 50px;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: var(--shadow-sm);
    }

    .logout-btn:hover {
        background: var(--secondary);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Container */
    .container {
        display: flex;
        flex: 1;
        padding: 1.5rem;
        gap: 1.5rem;
    }

    /* Sidebar */
    .sidebar {
        width: 300px;
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
        height: fit-content;
        position: sticky;
        top: 5rem;
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .sidebar-title {
        font-weight: 600;
        font-size: 1.2rem;
        color: var(--dark);
    }

    .order-count {
        background: var(--primary-light);
        color: var(--primary);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Order Buttons */
    .order-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .order-btn {
        width: 100%;
        background: transparent;
        border: none;
        text-align: left;
        padding: 1rem 1.25rem;
        border-radius: var(--radius-md);
        font-weight: 500;
        font-size: 0.95rem;
        color: var(--gray);
        cursor: pointer;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .order-btn::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: transparent;
        transition: var(--transition);
    }

    .order-btn:hover {
        background: var(--primary-light);
        color: var(--primary);
    }

    .order-btn:hover::before {
        background: var(--primary);
    }

    .order-btn.active {
        background: var(--primary-light);
        color: var(--primary);
        font-weight: 600;
    }

    .order-btn.active::before {
        background: var(--primary);
    }

    .order-name {
        display: block;
        margin-bottom: 0.25rem;
    }

    .order-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.85rem;
    }

    .order-price {
        font-weight: 600;
        color: var(--dark);
    }

    .order-time {
        color: var(--gray);
        font-size: 0.75rem;
    }

    /* Content */
    .content {
        flex: 1;
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-sm);
    }

    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .content-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
    }

    .search-bar {
        display: flex;
        align-items: center;
        background: var(--light);
        border-radius: 50px;
        padding: 0.5rem 1rem;
        width: 300px;
    }

    .search-bar input {
        border: none;
        background: transparent;
        padding: 0.5rem;
        width: 100%;
        outline: none;
    }

    .search-bar i {
        color: var(--gray);
        margin-right: 0.5rem;
    }

    /* Status Badges */
    .badge {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        color: var(--white);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .badge i {
        font-size: 0.7rem;
    }

    .badge.pending { 
        background-color: var(--warning);
    }
    .badge.sukses { 
        background-color: var(--success);
    }
    .badge.ditolak { 
        background-color: var(--danger);
    }

    /* Order Card */
    .order-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: var(--shadow-sm);
        border-left: 4px solid var(--primary);
        transition: var(--transition);
        display: none;
    }

    .order-card.active {
        display: block;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--gray-light);
    }

    .order-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--dark);
    }

    .order-details {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .detail-group {
        margin-bottom: 1rem;
    }

    .detail-label {
        font-size: 0.85rem;
        color: var(--gray);
        margin-bottom: 0.25rem;
        display: block;
    }

    .detail-value {
        font-weight: 500;
        color: var(--dark);
    }

    /* List Items */
    .items-list {
        background: var(--light);
        border-radius: var(--radius-md);
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .item {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px dashed var(--gray-light);
    }

    .item:last-child {
        border-bottom: none;
    }

    .item-name {
        font-weight: 500;
    }

    .item-qty {
        color: var(--gray);
        font-size: 0.9rem;
    }

    .item-price {
        font-weight: 600;
    }

    .total-price {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
        text-align: right;
        margin: 1.5rem 0;
    }

    /* Payment Proof */
    .payment-proof {
        margin: 1.5rem 0;
    }

    .proof-title {
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .proof-image {
        width: 100%;
        max-width: 300px;
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        cursor: pointer;
        border: 1px solid var(--gray-light);
    }

    .proof-image:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .no-proof {
        color: var(--gray);
        font-style: italic;
    }

    /* Status Form */
    .status-form {
        background: var(--light);
        padding: 1.5rem;
        border-radius: var(--radius-md);
        margin-top: 2rem;
    }

    .form-title {
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .form-group {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    select {
        padding: 0.75rem 1.25rem;
        border-radius: 50px;
        border: 1px solid var(--gray-light);
        font-size: 1rem;
        font-weight: 500;
        color: var(--dark);
        background: var(--white);
        cursor: pointer;
        min-width: 200px;
        transition: var(--transition);
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
    }

    select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    /* Update Button */
    .update-btn {
        background-color: var(--primary);
        color: var(--white);
        padding: 0.75rem 2rem;
        border-radius: 50px;
        border: none;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .update-btn:hover {
        background-color: var(--secondary);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .update-btn.loading {
        position: relative;
        pointer-events: none;
    }

    .update-btn.loading::after {
        content: '';
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: var(--white);
        animation: spin 1s linear infinite;
        margin-left: 0.5rem;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: var(--gray);
    }

    .empty-icon {
        font-size: 3rem;
        color: var(--gray-light);
        margin-bottom: 1rem;
    }

    .empty-text {
        font-size: 1.1rem;
    }

    /* Alert */
    .alert {
        padding: 1rem;
        border-radius: var(--radius-md);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .alert-success {
        background: rgba(76, 201, 240, 0.1);
        border-left: 4px solid var(--success);
        color: var(--dark);
    }

    .alert-icon {
        font-size: 1.5rem;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .container {
            flex-direction: column;
        }
        
        .sidebar {
            width: 100%;
            position: static;
        }
        
        .order-details {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 1rem;
        }
        
        .content {
            padding: 1.5rem;
        }
        
        .content-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .search-bar {
            width: 100%;
        }
    }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <i class="fas fa-cash-register logo-icon"></i>
            <span class="logo-text">Tracom Kasir</span>
        </div>
        <div class="nav-right">
            <form method="POST" action="{{ route('kasir.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
            <div class="profile" title="Profil Admin Kasir">
                <img src="https://i.pravatar.cc/150?u=kasir" alt="Profile Image" class="profile-img" />
                <div>
                    <div class="profile-name">Admin Kasir</div>
                    <div class="profile-role">Cashier</div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h3 class="sidebar-title">Daftar Pesanan</h3>
                <span class="order-count">{{ $orders->count() }} orders</span>
            </div>
            <div class="order-list">
                @foreach($orders as $index => $order)
                    <button class="order-btn {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}" type="button">
                        <span class="order-name">{{ $order->nama }}</span>
                        <div class="order-meta">
                            <span class="order-price">Rp {{ number_format($order->total,0,',','.') }}</span>
                            <span class="order-time">{{ $order->created_at->diffForHumans() }}</span>
                        </div>
                    </button>
                @endforeach
            </div>
        </aside>

        <main class="content">
            <div class="content-header">
                <h1 class="content-title">Dashboard Kasir</h1>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari pesanan...">
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle alert-icon"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($orders->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="far fa-folder-open"></i>
                    </div>
                    <p class="empty-text">Tidak ada data pesanan.</p>
                </div>
            @else
                @foreach ($orders as $index => $order)
                <div class="order-card {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                    <div class="order-header">
                        <h2 class="order-title">Pesanan #{{ $order->id }}</h2>
                        <span class="badge {{ strtolower(str_replace(' ', '-', $order->status)) }}">
                            <i class="fas fa-circle"></i>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="order-details">
                        <div class="detail-group">
                            <span class="detail-label">Nama Pelanggan</span>
                            <span class="detail-value">{{ $order->nama }}</span>
                        </div>
                        <div class="detail-group">
                            <span class="detail-label">Nomor Telepon</span>
                            <span class="detail-value">{{ $order->telepon }}</span>
                        </div>
                        <div class="detail-group">
                            <span class="detail-label">Tanggal Pesanan</span>
                            <span class="detail-value">{{ $order->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <div class="detail-group">
                            <span class="detail-label">Status Pembayaran</span>
                            <span class="detail-value">{{ ucfirst($order->status) }}</span>
                        </div>
                    </div>

                    <div class="items-list">
                        <h3 class="detail-label">Items Pesanan</h3>
                        @php
                            $cartItems = $order->cart;
                            if (is_string($order->cart)) {
                                $cartItems = json_decode($order->cart, true) ?: [];
                            } elseif (!is_array($order->cart)) {
                                $cartItems = [];
                            }
                        @endphp

                        @if(count($cartItems) > 0)
                            @foreach($cartItems as $item)
                                <div class="item">
                                    <div>
                                        <span class="item-name">{{ $item['name'] }}</span>
                                        <span class="item-qty">x{{ $item['quantity'] }}</span>
                                    </div>
                                    <span class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        @else
                            <p><em>Data item tidak valid atau kosong.</em></p>
                        @endif
                    </div>

                    <div class="total-price">
                        Total: Rp {{ number_format($order->total, 0, ',', '.') }}
                    </div>

                    <div class="payment-proof">
                        <h3 class="proof-title">Bukti Pembayaran</h3>
                        @if ($order->bukti_pembayaran)
                            <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" target="_blank" title="Lihat Bukti Pembayaran">
                                <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="proof-image" />
                            </a>
                        @else
                            <p class="no-proof">Belum diupload</p>
                        @endif
                    </div>

                    <form class="status-form" method="POST" action="{{ route('kasir.updateStatus', $order->id) }}">
                        @csrf
                        <h3 class="form-title">Update Status Pesanan</h3>
                        <div class="form-group">
                            <select name="status" id="status-{{ $order->id }}">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="sukses" {{ $order->status == 'sukses' ? 'selected' : '' }}>Sukses</option>
                                <option value="ditolak" {{ $order->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            <button type="submit" class="update-btn">
                                <i class="fas fa-save"></i> Update Status
                            </button>
                        </div>
                    </form>
                </div>
                @endforeach
            @endif
        </main>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderButtons = document.querySelectorAll('.order-btn');
        const orderCards = document.querySelectorAll('.order-card');
        const searchInput = document.querySelector('.search-bar input');

        // Switch between orders
        orderButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active from all buttons
                orderButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // Show the corresponding order card
                const index = button.getAttribute('data-index');
                orderCards.forEach(card => {
                    card.classList.remove('active');
                    if (card.getAttribute('data-index') === index) {
                        card.classList.add('active');
                    }
                });
            });
        });

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            orderButtons.forEach(button => {
                const orderName = button.querySelector('.order-name').textContent.toLowerCase();
                if (orderName.includes(searchTerm)) {
                    button.style.display = 'block';
                } else {
                    button.style.display = 'none';
                }
            });
        });

        // Loading state for forms
        document.querySelectorAll('form.status-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const btn = this.querySelector('button[type="submit"]');
                btn.innerHTML = '<i class="fas fa-spinner"></i> Memproses...';
                btn.classList.add('loading');
            });
        });
    });
</script>
</body>
</html>