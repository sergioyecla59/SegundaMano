<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Segunda Mano</title>




    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-header {
            background-color: firebrick !important;
            color: white;
        }

        .brand-text {
            color: white;
            font-weight: bold;
            font-size: 1.8rem;
            white-space:nowrap;
        }

        .navbar-brand img {
            height: 70px;
            filter: brightness(1.2);
        }

        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-link:hover {
            color: #ff4d4d;
        }

        /* Fondo con 2 imágenes solo en content-wrapper */
        .content-wrapper {
            background-image:
                url('https://media.istockphoto.com/id/1400086779/es/foto/interior-de-la-tienda-de-caridad-o-tienda-de-segunda-mano-que-vende-ropa-usada-y-sostenible-y.jpg?s=612x612&w=0&k=20&c=EVf4j-LDhDhmtPZ-XfzUxMx87-UNdQGhDU_Jcc9PSAA='),
                url('https://media.istockphoto.com/id/1400086779/es/foto/interior-de-la-tienda-de-caridad-o-tienda-de-segunda-mano-que-vende-ropa-usada-y-sostenible-y.jpg?s=612x612&w=0&k=20&c=EVf4j-LDhDhmtPZ-XfzUxMx87-UNdQGhDU_Jcc9PSAA=');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .content-wrapper::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        .btn-primary {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-primary:hover {
            background-color: #005cbf;
        }

        .btn-warning, .btn-danger, .btn-success {
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .table {
            background-color: #343a40;
            color: white;
        }

        .table th,
        .table td {
            border-color: #444;
        }

        h1, h2, h3 {
            color: #bd2130;
            font-weight: bold;
        }

        .btn-custom {
            background-color: firebrick;
            color: #D3D3D3;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            background-color: #D3D3D3;
            color: black;
        }
        @media (max-width: 768px) {
    .brand-text {
        font-size: 1.2rem;
    }
}

@media (max-width: 576px) {
    .brand-text {
        font-size: 1rem;
    }
}
    </style>
</head>
<body class="hold-transition layout-top-nav">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a href="{{ route('inicio_publico') }}" class="navbar-brand d-flex align-items-center">
                    <img src="https://www.zarla.com/images/zarla-cofre-secreto-1x1-2400x2400-20220216-7jf8k89h9g9wh8bgpjfq.png?crop=1:1,smart&width=250&dpr=2" alt="Logo">
                    <span class="brand-text ms-2">Mercado Segunda Mano</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inicio') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}">
                                <i class="fas fa-box"></i> Mis Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.index') }}">
                                <i class="fas fa-tags"></i> Categorías
                            </a>
                        </li>
                        <a href="{{ route('carrito.index') }}" class="btn btn-outline-warning btn-lg">
                            <i class="fas fa-shopping-cart"></i> Carrito
                        </a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inicio_publico') }}">
                                <i class="fas fa-sign-out-alt"></i> Salir
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content-wrapper">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>



     <!-- Footer -->
 <footer class="bg-secondary text-light py-4 mt-5">
    <div class="container">
        <div class="row footer-links">
            <div class="col-md-4 mb-3">
                <h5>Mercado Segunda Mano</h5>
                <p>Tu plataforma de compra y venta de segunda mano de confianza.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Contacto</h5>
                <p>Email: <a href="mailto:contacto@mercadosegundamano.com">contacto@mercadosegundamano.com</a></p>
                <p>Teléfono: <a href="tel:+34600000000">+34 600 000 000</a></p>
                <p>Horario: Lunes a Viernes, 9:00 - 18:00</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Dónde Estamos</h5>
                <p>Av. de Concha Espina, 1, Chamartín, 28036 Madrid, España</p>
                <p>CP: 28000</p>
                <p>Mapa: <a href="https://earth.google.com/web/@40.4530387,-3.6883337,688.11790253a,624.92085394d,35y,0h,0t,0r/data=ChUaDwoJL20vMDFneGx0GAIgAUICCAE6AwoBMEICCABKDQj___________8BEAA" target="_blank" rel="noopener noreferrer">Ver en Google Earth</a></p>
            </div>
        </div>
        <div class="text-center pt-3 border-top border-secondary">
            &copy; {{ date('Y') }} Mercado Segunda Mano. Todos los derechos reservados.
        </div>
    </div>
</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
