<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Segunda Mano</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: gray; /* Fondo oscuro */
            color: white;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40; /* Fondo oscuro en la navbar */
            padding: 15px;
        }

        .navbar-brand, .nav-link {
            color: red;
            font-weight: bold;
        }

        .container {
            background-color: #1c1c1c; /* Fondo oscuro para el contenedor principal */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #444444; /* Botones de color negro */
            border-color: #000000;
            color: white;
        }

        .btn-primary:hover {
            background-color: green; /* Efecto hover para los botones */
            border-color: #444444;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        .form-control {
            border-radius: 5px;
            background-color: #333; /* Fondo de los inputs en oscuro */
            color: white; /* Texto blanco en los inputs */
        }

        .form-control:focus {
            background-color: #555;
            border-color: #007bff;
            color: white;
        }

        .table {
            background: #2d2d2d; /* Fondo oscuro para la tabla */
            color: white; /* Texto blanco en la tabla */
            border-radius: 10px;
            overflow: hidden;
        }

        .table th, .table td {
            border-color: #444; /* Borde oscuro en la tabla */
        }
        h1{
            color: red;
            font-weight: bold;            
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <h1>Mercado Segunda Mano</h1>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <!-- Botones de navegación -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.create') }}">Añadir Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>



