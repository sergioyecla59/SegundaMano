@extends('layouts.app')

@section('content')

<style>
    .inicio-background {
        background-image: url('https://img.freepik.com/foto-gratis/escena-articulos-diversos-que-venden-venta-patio-ofertas_23-2151216773.jpg?ga=GA1.1.1972899165.1747238821&semt=ais_hybrid&w=740');
        background-size: cover;
        background-position: center;
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        border-radius: 10px;
        position: relative;
        padding-top: 60px;
    }

    .welcome-box {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        max-width: 600px;
        width: 100%;
    }

    .welcome-box h1 {
        font-family: 'Poppins', sans-serif;
        font-size: 2.5rem;
        color: darkorange;
        margin-bottom: 20px;
    }

    .welcome-box p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .btn-group-custom a {
        margin: 10px;
    }

    /* Estilo personalizado para los botones */
    .btn-custom {
        background-color: #D3D3D3;
        color: darkgoldenrod;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
        transition: background-color 0.3s ease, color 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-custom:hover {
        background-color: firebrick;
        color: black;
    }

    @media (max-width: 576px) {
        .welcome-box h1 {
            font-size: 1.8rem;
        }

        .btn-group-custom a {
            width: 100%;
        }
    }
</style>

<div class="inicio-background">
    <div class="welcome-box">
        <h1>Bienvenido al Mercado de Segunda Mano</h1>
        <p>Explora nuestros productos y categorías. ¡Encuentra las mejores ofertas de segunda mano!</p>
    </div>
</div>

<div class="bg-overlay py-5">
    <div class="container">


        @foreach($categorias as $categoria)
            <div class="categoria mb-5">
                <h2 class="categoria-title text-danger">{{ $categoria->nombre }}</h2>

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
                                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="fas fa-cart-plus"></i> Añadir al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-light">No hay productos en esta categoría.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
