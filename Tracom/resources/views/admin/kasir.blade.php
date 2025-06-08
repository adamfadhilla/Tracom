<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Kasir - NetRapi27Mhz</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f0f4f8;
            color: #333;
        }

        /* Header Kasir */
        .header {
            max-width: 1000px;
            margin: 0 auto 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 16px 20px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        .user-details strong {
            font-size: 1.2rem;
            color: #0d6efd;
        }
        .user-details small {
            color: #666;
            font-size: 0.9rem;
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

        h2 {
            margin-bottom: 25px;
            color: #0d6efd;
            text-align: center;
        }

        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }
        thead {
            background: #0d6efd;
            color: white;
            font-weight: 600;
        }
        th, td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }
        tbody tr:hover {
            background: #e9f1ff;
            cursor: pointer;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            color: white;
            min-width: 100px;
            text-align: center;
            text-transform: capitalize;
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

        .payment-proof img {
            width: 80px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.12);
            transition: transform 0.3s ease;
        }
        .payment-proof img:hover {
            transform: scale(1.1);
            cursor: pointer;
        }
        .payment-proof em {
            color: #888;
            font-size: 0.9rem;
        }

        form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        select {
            padding: 7px 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }
        select:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13,110,253,0.6);
        }
        button {
            background: #0d6efd;
            border: none;
            color: white;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: relative;
        }
        button:hover:not(:disabled) {
            background: #084ecf;
        }
        button:disabled {
            background: #6c757d;
            cursor: not-allowed;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid white;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            animation: spin 1s linear infinite;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            display: none;
        }
        button.loading .spinner {
            display: inline-block;
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }

        @media (max-width: 720px) {
            body {
                padding: 10px;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .table-container {
                border-radius: 0;
                box-shadow: none;
            }
            table {
                min-width: 600px;
            }
            th, td {
                padding: 12px 8px;
                font-size: 0.9rem;
            }
            select, button {
                font-size: 0.9rem;
                padding: 6px 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Kasir -->
    <div class="header">
        <div class="user-details">
            <strong>Admin Kasir</strong><br>
            <small>NetRapi27Mhz</small>
        </div>
       <form method="POST" action="{{ route('kasir.logout') }}">
    @csrf
    <button type="submit" style="background: none; border: none; color: red;">Logout</button>
</form>

    </div>

    <h2>Dashboard Kasir - NetRapi27Mhz</h2>

    @if(session('success'))
        <div style="max-width: 1000px; margin: 0 auto 25px; background: #d1e7dd; color: #0f5132; padding: 15px 20px; border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        @if($orders->isEmpty())
            <p style="padding: 20px; text-align: center; color: #666;">Tidak ada data pesanan.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->nama }}</td>
                    <td>{{ $order->telepon ?? '-' }}</td>
                    <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ strtolower($order->status) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="payment-proof">
                        @if($order->bukti_pembayaran)
                            <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" target="_blank" title="Lihat Bukti Pembayaran">
                                <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran {{ $order->nama }}">
                            </a>
                        @else
                            <em>Belum diupload</em>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('kasir.updateStatus', $order->id) }}" class="status-form">
                            @csrf
                            <select name="status" required>
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="sukses" {{ $order->status == 'sukses' ? 'selected' : '' }}>Sukses</option>
                                <option value="ditolak" {{ $order->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            <button type="submit">
                                Update
                                <span class="spinner"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <script>
        // Form loading saat update status
        document.querySelectorAll('.status-form').forEach(form => {
            form.addEventListener('submit', function(){
                const btn = this.querySelector('button');
                btn.disabled = true;
                btn.classList.add('loading');
            });
        });
    </script>
</body>
</html>
