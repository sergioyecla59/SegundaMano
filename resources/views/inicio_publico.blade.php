<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Mercado Segunda Mano</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div class="d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-warning btn-lg text-dark fw-bold">Registrarse</a>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
