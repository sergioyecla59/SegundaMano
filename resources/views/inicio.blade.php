<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Mercado de Segunda Mano</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Roboto', sans-serif;
        }

        .background {
            background-image: url('https://images.unsplash.com/photo-1612703769284-0103b1e5ef70?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGllbmRhJTIwb25saW5lfGVufDB8fDB8fHww');
            background-size: cover;
            background-position: center;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .welcome-container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
        }

        h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 36px;
            margin-bottom: 20px;
            color: #fff;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #fff;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .btn {
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
            width: 200px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn:focus {
            outline: none;
        }

        @media (max-width: 600px) {
            .button-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="welcome-container">
            <h1>Bienvenido al Mercado de Segunda Mano</h1>
            <p>Explora nuestras categorías, productos y ventas. ¡Encuentra increíbles ofertas y productos de segunda mano!</p>
            <div class="button-container">
                <a href="{{ route('productos.index') }}" class="btn">Productos</a>
            </div>
            <div class="button-container">
                <a href="{{ route('categorias.index') }}" class="btn">Categorias</a>
            </div>
        </div>
    </div>
</body>
</html>
