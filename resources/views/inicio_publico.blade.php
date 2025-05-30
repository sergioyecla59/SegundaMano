<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Mercado Segunda Mano</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">

    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1516912481808-3406841bd33c?auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', sans-serif;
            color: #f8f9fa;
        }

        .categoria-title {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 20px;
            color: #ffffff; /* cambiado a blanco */
        }

        .card {
            background-color: #1f1f1f;
            color: #fff;
            border: 1px solid #333;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .navbar-custom {
            background-color: rgba(33, 33, 33, 0.95);
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .navbar-custom .btn {
            margin-left: 10px;
        }

        input[type="text"] {
            background-color: #333;
            border: 1px solid #666;
            color: #fff;
        }

        input[type="text"]::placeholder {
            color: #bbb;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-light {
            border-color: #fff;
            color: #fff;
        }

        .btn-outline-warning {
            color: #ffffff; /* cambiado a blanco */
            border-color: #ffffff; /* cambiado a blanco */
        }

        .btn-warning {
            background-color: #ffffff; /* cambiado a blanco */
            color: #000;
        }

        footer {
            background-color: #121212;
            color: #ccc;
        }

        footer a {
            color: #90ee90;
        }

        .footer-links h5 {
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center py-3">
            <a class="navbar-brand fs-2 fw-bold d-flex align-items-center" href="#">
                <img src="https://images.unsplash.com/photo-1646627928830-bfa637cd24f3?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjE1fHxsb2dvfGVufDB8fDB8fHww" alt="Logo" height="40" class="me-2">
                Mercado Segunda Mano
            </a>
            <div style="text-align:center; margin-top: 20px;">
                <form action="{{ route('inicio_publico') }}" method="GET">
                    <input type="text" name="buscar" placeholder="Buscar productos..." value="{{ request('buscar') }}" style="padding: 10px; width: 250px; border-radius: 5px;">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-warning btn-lg text-dark fw-bold">Registrarse</a>
                <a href="{{ route('login') }}" class="btn btn-outline-warning btn-lg">
                    <i class="fas fa-shopping-cart"></i> Carrito
                </a>
            </div>
        </div>
    </nav>

    <div class="bg-overlay">
        <div class="container">
            <h1 class="text-center mb-4">Explora las categorías</h1>

            @foreach($categorias as $categoria)
                <div class="categoria">
                    <h2 class="categoria-title">{{ $categoria->nombre }}</h2>
                    <div class="row">
                        @forelse($categoria->productos as $producto)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <img src="{{ $producto->imagen_url ?? 'https://via.placeholder.com/300x180' }}" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                        <p class="card-text">{{ Str::limit($producto->descripcion, 60) }}</p>
                                        <p class="card-text fw-bold text-warning">{{ $producto->precio }} €</p>
                                        <div class="mt-3">
                                            <a href="{{ route('login') }}" class="btn btn-warning w-100">
                                                <i class="fas fa-cart-plus"></i> Añadir al carrito
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No hay productos en esta categoría.</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 mt-5">
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
                    <p>Mapa: <a href="https://www.google.com/maps/place/Estadio+Santiago+Bernab%C3%A9u/@40.4530428,-3.6909086,17z/data=!3m1!4b1!4m6!3m5!1s0xd4228e23705d39f:0xa8fff6d26e2b1988!8m2!3d40.4530387!4d-3.6883337!16zL20vMDFneGx0?entry=ttu&g_ep=EgoyMDI1MDUyNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer">Ver en Google Maps</a></p>
                </div>
            </div>
            <div class="text-center pt-3 border-top border-secondary">
                &copy; {{ date('Y') }} Mercado Segunda Mano. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
