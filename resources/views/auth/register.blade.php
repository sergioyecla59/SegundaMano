<!-- register.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://media.istockphoto.com/id/522001766/photo/woman-standing-near-big-tropical-river.jpg?b=1&s=612x612&w=0&k=20&c=pg0EDjiCd-CMXenj0EAXQIzyLnd90OzaiSBTeEiJeD4=') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 450px;
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

        input[type="text"],
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
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
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

        .inicio_publico {
            background-color: #ffd700;
        }

        .inicio_publico:hover {
            background-color: darkslategray;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <img src="https://www.zarla.com/images/zarla-cofre-secreto-1x1-2400x2400-20220216-7jf8k89h9g9wh8bgpjfq.png?crop=1:1,smart&width=250&dpr=2" alt="Logo" class="logo">
        <h1>Registrar Cuenta</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Nombre completo" value="{{ old('name') }}" required>
            <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
            <button type="submit">Registrar</button>
        </form>

        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>

        <form action="{{ route('inicio_publico') }}" method="GET" style="margin-top: 15px;">
            <button type="submit" class="inicio_publico">Inicio</button>
        </form>
    </div>
</body>
</html>
