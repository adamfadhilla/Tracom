<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Kasir - Tracom</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f0f4f8;
            color: #333;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Navbar atas */
        .navbar {
            background: white;
            padding: 14px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
        }
        .navbar .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }
        .navbar .profile img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #0d6efd;
        }
        .navbar .profile span {
            font-weight: 600;
            color: #0d6efd;
            user-select: none;
        }
        .logout-btn {
            background: #dc3545;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background: #bb2d3b;
        }

        /* Layout sidebar + content */
        .container {
            display: flex;
            flex-grow: 1;
            max-width: 1200px;
            margin: 20px auto;
            gap: 20px;
            padding: 0 20px;
            width: 100%;
        }

        /* Sidebar order */
        .sidebar {
            width: 260px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .sidebar h3 {
            margin-top: 0;
            margin-bottom: 18px;
            color: #0d6efd;
            font-weight: 700;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 8px;
        }
        .order-list {
            flex-grow: 1;
            overflow-y: auto;
        }
        .order-list button {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 10px;
            border: none;
            background: #e9f1ff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            color: #0d6efd;
            text-align: left;
            transition: background-color 0.3s ease;
        }
        .order-list button.active,
        .order-list button:hover {
            background: #0d6efd;
            color: white;
            box-shadow: 0 4px 10px rgba(13,110,253,0.4);
        }

        /* Main content */
        .content {
            flex-grow: 1;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            padding: 24px 30px;
            overflow-y: auto;
            max-height: 80vh;
        }
        .content h2 {
            margin-top: 0;
            margin-bottom: 25px;
            color: #0d6efd;
            text-align: center;
        }

        .order-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
            transition: box-shadow 0.3s ease;
        }
        .order-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }
        .order-header strong {
            font-size: 1.3rem;
            color: #0d6efd;
        }
        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            text-transform: capitalize;
            min-width: 110px;
            text-align: center;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
        }
        .badge.pending {
            background: #ffc107;
            color: #3a3a00;
        }
        .badge.sukses {
            background: #198754;
        }
        .badge.ditolak {
            background: #dc3545;
        }
        p {
            margin: 6px 0;
        }
        .items-list ul {
            margin: 6px 0 12px 20px;
            padding-left: 0;
        }
        .items-list li {
            margin-bottom: 4px;
            font-size: 1rem;
            color: #555;
        }
        /* Payment proof styling */
.payment-proof img {
    width: 150px;
    max-width: 100%;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    cursor: pointer;
    display: block;
    margin-bottom: 12px;
}
.payment-proof img:hover {
    transform: scale(1.05);
}

/* Order card */
.order-card {
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 30px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    transition: box-shadow 0.3s ease;
}
.order-card:hover {
    box-shadow: 0 12px 36px rgba(0,0,0,0.15);
}

/* Item list */
.items-list ul, .order-card ul {
    margin: 10px 0 20px 20px;
    padding-left: 0;
    list-style-type: disc;
}
.items-list li, .order-card li {
    margin-bottom: 6px;
    font-size: 1rem;
    color: #444;
    line-height: 1.4;
}

/* Update button */
.update-btn {
    background: #0d6efd;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 1rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(13,110,253,0.4);
}
.update-btn:hover:not(:disabled) {
    background-color: #084ecf;
    box-shadow: 0 6px 15px rgba(8,78,207,0.6);
}

/* Form select */
select {
    padding: 10px 16px;
    border-radius: 8px;
    border: 1.5px solid #ccc;
    font-size: 1rem;
    min-width: 180px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}
select:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 8px rgba(13,110,253,0.7);
}

/* Container improvements */
.container {
    max-width: 1140px;
    margin: 30px auto;
    gap: 25px;
    padding: 0 25px;
}

/* Responsive tweaks */
@media (max-width: 900px) {
    .sidebar {
        width: 100%;
        flex-direction: row;
        overflow-x: auto;
        padding: 10px 5px;
        border-radius: 0;
    }
    .order-list button {
        min-width: 160px;
        margin-right: 12px;
        margin-bottom: 0;
        padding: 12px 16px;
        font-size: 0.95rem;
    }
    .content {
        max-height: none;
        margin-top: 25px;
        padding: 20px;
        border-radius: 12px;
    }
}

    </style>
</head>
<body>
    <nav class="navbar">
        <form method="POST" action="{{ route('kasir.logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        <div class="profile" title="Profil Admin Kasir">
            <img src="https://i.pravatar.cc/150?u=kasir" alt="Profile Image" />
            <span>Admin Kasir</span>
        </div>
    </nav>

    <div class="container">
        <aside class="sidebar">
            <h3>Pesanan</h3>
            <div class="order-list">
                @foreach($orders as $index => $order)
                    <button
                        class="{{ $index === 0 ? 'active' : '' }}"
                        data-index="{{ $index }}"
                        type="button"
                    >
                        {{ $order->nama }} <br>
                        <small style="font-weight:400; font-size:0.8rem; color:#666;">
                            Rp {{ number_format($order->total,0,',','.') }}
                        </small>
                    </button>
                @endforeach
            </div>
        </aside>

        <main class="content">
            <h2>Dashboard Kasir - NetRapi27Mhz</h2>

            @if(session('success'))
                <div style="background: #d1e7dd; color: #0f5132; padding: 15px 20px; border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($orders->isEmpty())
                <p style="text-align: center; color: #666; font-size: 1.1rem;">Tidak ada data pesanan.</p>
            @else
              @foreach ($orders as $index => $order)
<div class="order-card" data-index="{{ $index }}" style="{{ $index === 0 ? '' : 'display:none;' }}">
    <h4>Status: 
        <span class="badge {{ strtolower(str_replace(' ', '-', $order->status)) }}">
            {{ ucfirst($order->status) }}
        </span>
    </h4>
    <p>Telepon: {{ $order->telepon }}</p>

    @php
        $cartItems = $order->cart;

        if (is_string($order->cart)) {
            $cartItems = json_decode($order->cart, true) ?: [];
        } elseif (!is_array($order->cart)) {
            $cartItems = [];
        }
    @endphp

    @if(count($cartItems) > 0)
        <ul>
            @foreach($cartItems as $item)
                <li>{{ $item['name'] }} ({{ $item['quantity'] }}) - Rp {{ number_format($item['price'], 0, ',', '.') }}</li>
            @endforeach
        </ul>
    @else
        <p><em>Data item tidak valid atau kosong.</em></p>
    @endif

    <p><strong>Total: Rp {{ number_format($order->total, 0, ',', '.') }}</strong></p>
<div class="order-card" data-index="{{ $index }}" style="{{ $index === 0 ? '' : 'display:none;' }}">
    ...
    @if ($order->bukti_pembayaran)
        <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" target="_blank" title="Lihat Bukti Pembayaran" class="payment-proof">
            <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran" />
        </a>
    @else
        <em>Belum diupload</em>
    @endif
<form class="status-form" method="POST" action="{{ route('kasir.updateStatus', $order->id) }}">
    @csrf

    <label for="status-{{ $order->id }}">Ubah Status:</label>
    <select name="status" id="status-{{ $order->id }}">
        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="sukses" {{ $order->status == 'sukses' ? 'selected' : '' }}>Sukses</option>
        <option value="ditolak" {{ $order->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
    </select>

    <button type="submit" class="update-btn">Update</button>
</form>

</div>
    @endforeach


            @endif
        </main>
    </div>

<script>
    const orderButtons = document.querySelectorAll('.order-list button');
    const orderCards = document.querySelectorAll('.order-card');

    orderButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active from all buttons
            orderButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            // Show the corresponding order card
            const index = button.getAttribute('data-index');
            orderCards.forEach(card => {
                card.style.display = card.getAttribute('data-index') === index ? 'block' : 'none';
            });
        });
    });

    // Handle loading spinner on form submit
    document.querySelectorAll('form.status-form').forEach(form => {
        form.addEventListener('submit', e => {
            const btn = form.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.classList.add('loading');
        });
    });
</script>
</body>
</html>