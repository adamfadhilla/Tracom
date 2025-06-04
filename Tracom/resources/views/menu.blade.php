<!DOCTYPE html>
<html>
<head>
    <title>Menu Tracom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <h2>Menu Makanan</h2>
    <ul class="list-group my-3">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Ketupat Babanci
            <a href="{{ route('checkout', 'Ketupat Babanci') }}" class="btn btn-success btn-sm">Pesan</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Lontong Sayur
            <a href="{{ route('checkout', 'Lontong Sayur') }}" class="btn btn-success btn-sm">Pesan</a>
        </li>
    </ul>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali</a>
</body>
</html>
