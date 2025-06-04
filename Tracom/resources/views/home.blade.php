<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tracom - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff8f0, #f0f4ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
        }
        h1 {
            font-weight: 600;
            font-size: 3rem;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1.2rem;
            color: #555;
        }
        .btn-custom {
            background-color: #2e86de;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
            font-size: 1rem;
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #1e60b1;
        }
        .container-box {
            background-color: white;
            padding: 3rem 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            animation: fadeIn 1s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container-box">
        <h1>Selamat Datang di <span class="text-primary">Tracom</span></h1>
        <p>Menyajikan <strong>Ketupat Babanci</strong> dan <strong>Lontong Sayur</strong> otentik khas <em>Betawi</em> 🍽️</p>
        <a href="{{ route('menu') }}" class="btn btn-custom mt-4">Lihat Menu</a>
    </div>
</body>
</html>
