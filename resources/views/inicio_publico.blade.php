<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Mercado Segunda Mano</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">

    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1714939978924-d0c291256cb7?w=1920');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
        }

        .bg-overlay {
            background-color: rgba(0, 0, 0, 0.7);
            min-height: 100vh;
            padding: 50px 0;
        }

        .categoria-title {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 20px;
            color: #ffc107;
        }

        .card {
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
            background-color: rgba(255, 255, 255, 0.95);
        }

        .navbar-custom .nav-link {
            color: #000;
            font-weight: bold;
        }

        .navbar-custom .btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #1f2937;">
        <div class="container-fluid d-flex justify-content-between align-items-center py-3">
            <a class="navbar-brand text-white fs-2 fw-bold d-flex align-items-center" href="#">
                <img src="https://www.zarla.com/images/zarla-cofre-secreto-1x1-2400x2400-20220216-7jf8k89h9g9wh8bgpjfq.png?crop=1:1,smart&width=250&dpr=2"
                     alt="Logo"
                     style="height: 50px; background-color: yellow; border-radius: 10px; padding: 4px;"
                     class="me-2">
                Mercado Segunda Mano
            </a>
            <div style="text-align:center; margin-top: 20px;">
                <form action="{{ route('inicio_publico') }}" method="GET">
                    <input type="text" name="buscar" placeholder="Buscar productos..." value="{{ request('buscar') }}" style="padding: 10px; width: 250px; border-radius: 5px; border: 1px solid #ccc;">
                    <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px;">Buscar</button>
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
                                <div class="card bg-light text-dark h-100">
                                    <img src="{{ $producto->imagen_url ?? 'https://via.placeholder.com/300x180' }}" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                        <p class="card-text">{{ Str::limit($producto->descripcion, 60) }}</p>
                                        <p class="card-text fw-bold text-primary">{{ $producto->precio }} €</p>
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
 <footer class="bg-secondary text-light py-4 mt-5">
    <div class="container">
        <div class="row footer-links">
            <div class="col-md-4 mb-3">
                <h5>Mercado Segunda Mano</h5>
                <p>Tu plataforma de compra y venta de segunda mano de confianza.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Contacto</h5>
                <p>Email: <a style="color: #cfeeb2" href="mailto:contacto@mercadosegundamano.com">contacto@mercadosegundamano.com</a></p>
                <p>Teléfono: <a style="color: #cfeeb2" href="tel:+34600000000">+34 600 000 000</a></p>
                <p>Horario: Lunes a Viernes, 9:00 - 18:00</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Dónde Estamos</h5>
                <p>Av. de Concha Espina, 1, Chamartín, 28036 Madrid, España</p>
                <p>CP: 28000</p>
                <p>Mapa: <a style="color: #cfeeb2" href="https://earth.google.com/web/@40.4530387,-3.6883337,688.11790253a,624.92085394d,35y,0h,0t,0r/data=ChUaDwoJL20vMDFneGx0GAIgAUICCAE6AwoBMEICCABKDQj___________8BEAA" target="_blank" rel="noopener noreferrer">Ver en Google Earth</a></p>
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
