<!-- login.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1516912481808-3406841bd33c?auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            color: #fff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }

        .logo {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: white;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1e7e34;
        }

        p {
            margin-top: 15px;
        }

        a {
            color: #ffffff;
            font-weight: bold;
            text-decoration: underline;
        }
        a:hover {
            color: #ffd700;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://images.unsplash.com/photo-1646627928830-bfa637cd24f3?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjE1fHxsb2dvfGVufDB8fDB8fHww" alt="Logo" height="40" class="me-2">
        <h1>Iniciar sesión</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>

        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>

        <form action="{{ route('inicio_publico') }}" method="GET" style="margin-top: 15px;">
            <button type="submit" style="background-color: #6c757d;">Inicio</button>
        </form>
    </div>
</body>
</html>
