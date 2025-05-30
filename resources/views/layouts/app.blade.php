<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Segunda Mano</title>

    <!-- Bootstrap 5 + Bootstrap Icons + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- AdminLTE -->
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet">
<style>
 /* General */
body {
    background-color: #000;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

/* Fondo con imagen clara, sin oscurecerla */
.content-wrapper {
    background-image: url('https://images.unsplash.com/photo-1516912481808-3406841bd33c?auto=format&fit=crop&w=1470&q=80') ;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding: 0px;
    min-height: 0vh;
    padding-top: 80px; /* o prueba con 100px si el navbar es más alto */

}

/* NAVBAR */
.navbar {
    background-color: #000 !important;
    border-bottom: 1px solid #444;
}

.navbar-brand img {
    height: 50px;
    filter: brightness(1.2);
}

.navbar-brand .brand-text {
    color: #fff;
    font-weight: bold;
    font-size: 1.6rem;
    white-space: nowrap;
}

.navbar-nav .nav-link {
    color: #fff;
    font-size: 1rem;
    padding: 0.5rem 1rem;
}

.navbar-nav .nav-link:hover {
    color: #ccc;
}

/* BOTONES */
.btn,
button {
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    font-weight: 500;
    transition: 0.3s ease;
}

.btn-primary {
    background-color: #333;
    color: #fff;
}

.btn-primary:hover {
    background-color: #555;
}

.btn-custom {
    background-color: #111;
    color: #fff;
}

.btn-custom:hover {
    background-color: #fff;
    color: #000;
}

/* FORMULARIO DE BÚSQUEDA */
form input[type="text"] {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    width: 250px;
}

form button {
    margin-left: 10px;
}

/* TABLAS */
.table {
    background-color: #1a1a1a;
    color: #fff;
}

.table th,
.table td {
    border-color: #333;
}

/* TEXTOS DESTACADOS */
h1, h2, h3, h4 {
    color: #fff;
    font-weight: bold;
}

/* FOOTER */
footer {
    background-color: #111;
    color: #ddd;
    padding: 40px 0;
}

footer a {
    color: #bbb;
    text-decoration: none;
}

footer a:hover {
    color: #fff;
    text-decoration: underline;
}

.footer-links h5 {
    color: #fff;
    margin-bottom: 15px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .brand-text {
        font-size: 1.2rem;
    }
}

@media (max-width: 576px) {
    .brand-text {
        font-size: 1rem;
    }

    form input[type="text"] {
        width: 100%;
        margin-bottom: 10px;
    }

    form button {
        width: 100%;
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
        <!-- NAVBAR -->
        <!-- NAVBAR CON BOTÓN PARA OFFCANVAS -->
<nav class="navbar navbar-dark bg-black px-3">
  <div class="container-fluid d-flex align-items-center">
       <button class="btn btn-outline-light ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio_publico') }}">
      <img src="https://images.unsplash.com/photo-1646627928830-bfa637cd24f3?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjE1fHxsb2dvfGVufDB8fDB8fHww" alt="Logo" height="40" class="me-2">
      <span class="brand-text">Mercado Segunda Mano</span>
    </a>
<div class="mx-auto" style="max-width: 500px; width: 100%;">
  <form action="{{ route('inicio') }}" method="GET" class="d-flex">
    <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar productos..." value="{{ request('buscar') }}">
    <button type="submit" class="btn btn-outline-light"><i class="bi bi-search"></i></button>
  </form>
</div>


        <!-- Mini carrito a la derecha -->
<!-- Mini carrito a la derecha - botón que abre offcanvas -->
<button class="btn btn-outline-light position-relative ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCarrito" aria-controls="offcanvasCarrito">
    <i class="fas fa-shopping-cart fs-5"></i>
    @php
        $totalItems = 0;
        if(session()->has('carrito')){
            foreach(session('carrito') as $item){
                $totalItems += $item['cantidad'];
            }
        }
    @endphp
    @if($totalItems > 0)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $totalItems }}
            <span class="visually-hidden">productos en el carrito</span>
        </span>
    @endif
</button>

  </div>
</nav>


<!-- MENU LATERAL OFFCANVAS -->
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menú</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link text-white" href="{{ route('inicio') }}"><i class="fas fa-home"></i> Inicio</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="{{ route('productos.index') }}"><i class="fas fa-box"></i> Productos</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="{{ route('categorias.index') }}"><i class="fas fa-tags"></i> Categorías</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="{{ route('ventas.index') }}"><i class="fas fa-receipt"></i> Compras</a></li>
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="nav-link btn btn-link text-white text-start" type="submit">
            <i class="fas fa-sign-out-alt"></i> Salir
          </button>
        </form>
      </li>
    </ul>

    <!-- Buscador en Offcanvas -->
    <form action="{{ route('inicio') }}" method="GET" class="d-flex mt-4">
      <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar productos..." value="{{ request('buscar') }}">
      <button type="submit" class="btn btn-outline-light"><i class="bi bi-search"></i></button>
    </form>
  </div>
</div>


        <!-- CONTENIDO -->
        <div class="content-wrapper">
            <div class="container animate-fadein">
                @yield('content')
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="footer py-4 mt-5">
            <div class="container">
                <div class="row footer-links">
                    <div class="col-md-4 mb-3">
                        <h5>Mercado Segunda Mano</h5>
                        <p>Tu plataforma de compra y venta de segunda mano de confianza.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Contacto</h5>
                        <p>Email: <a href="mailto:contacto@mercadosegundamano.com">contacto@mercadosegundamano.com</a>
                        </p>
                        <p>Teléfono: <a href="tel:+34600000000">+34 600 000 000</a></p>
                        <p>Horario: Lunes a Viernes, 9:00 - 18:00</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Dónde Estamos</h5>
                        <p>Av. de Concha Espina, 1, Chamartín, 28036 Madrid, España</p>
                        <p>CP: 28000</p>
                        <p>Mapa: <a
                                href="https://www.google.com/maps/place/Estadio+Santiago+Bernab%C3%A9u/@40.4530428,-3.6909086,17z/data=!3m1!4b1!4m6!3m5!1s0xd4228e23705d39f:0xa8fff6d26e2b1988!8m2!3d40.4530387!4d-3.6883337!16zL20vMDFneGx0?entry=ttu&g_ep=EgoyMDI1MDUyNy4wIKXMDSoASAFQAw%3D%3D"
                                target="_blank">Ver en Google Maps</a></p>
                    </div>
                </div>
                <div class="text-center pt-3 border-top border-secondary mt-3">
                    &copy; {{ date('Y') }} Mercado Segunda Mano. Todos los derechos reservados.
                </div>
            </div>
        </footer>
    </div>

    <!-- Offcanvas carrito lateral derecha -->
<div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasCarrito" aria-labelledby="offcanvasCarritoLabel" style="width: 350px;">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasCarritoLabel">Carrito de compras</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>
  <div class="offcanvas-body">
    @if(session()->has('carrito') && count(session('carrito')) > 0)
        <ul class="list-group list-group-flush">
            @foreach(session('carrito') as $producto)
                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-secondary">
                    <div>
                        <strong>{{ $producto['nombre'] }}</strong><br>
                        Cantidad: {{ $producto['cantidad'] }}<br>
                        Precio: €{{ number_format($producto['precio'], 2) }}
                    </div>
                    <div>
                        <!-- Opcional: botón para eliminar producto del carrito -->
<form method="POST" action="{{ route('carrito.eliminar', $producto['id']) }}">
    @csrf
    <button class="btn btn-sm btn-danger" type="submit" title="Eliminar">
        <i class="fas fa-trash"></i>
    </button>
</form>

                    </div>
                </li>
            @endforeach
        </ul>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <strong>Total:</strong>
            <span>
                €{{ number_format(array_reduce(session('carrito'), fn($sum, $item) => $sum + $item['precio'] * $item['cantidad'], 0), 2) }}
            </span>
        </div>
        <div class="mt-3">
            <a href="{{ route('carrito.index') }}" class="btn btn-primary w-100">Ir al carrito completo</a>
        </div>
    @else
        <p>Tu carrito está vacío.</p>
    @endif
  </div>
</div>


    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>






