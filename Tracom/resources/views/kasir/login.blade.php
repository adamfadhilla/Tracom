<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Kasir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f3f3;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            max-width: 400px;
            margin: 80px auto;
            padding: 2rem;
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .login-box h2 {
            color: #306F38;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }

        .form-label {
            color: #5E4118;
            font-weight: 600;
        }

        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #BB9479;
        }

        .btn-login {
            background-color: #306F38;
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
            border-radius: 0.5rem;
        }

        .btn-login:hover {
            background-color: #1E4D24;
        }

        .error-message {
            color: red;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login Kasir</h2>

        @if ($errors->any())
            <div class="error-message">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('kasir.login.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" name="name" id="name" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
        </form>
    </div>

</body>
</html>
