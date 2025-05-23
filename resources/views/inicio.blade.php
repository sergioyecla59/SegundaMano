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

    /* Estilo para imágenes del carrusel */
.carousel-inner img {
    height: 400px;
    object-fit: cover;
}

/* Estilo para imágenes de productos */
.card-img-top {
    height: 180px;
    object-fit: cover;
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

<div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://st4.depositphotos.com/1006542/40923/i/450/depositphotos_409237196-stock-photo-woman-choosing-clothes-clothing-store.jpg"
                class="d-block w-100" alt="Ropa vintage">
        </div>
        <div class="carousel-item">
            <img src="https://us.123rf.com/450wm/alexmia/alexmia1910/alexmia191000012/132082958-ropa-de-mujer-a-la-moda-con-estilo-en-perchas-en-las-tiendas-concepto-de-compras-ventas-blanco.jpg?ver=6"
                class="d-block w-100" alt="Tecnología usada">
        </div>
        <div class="carousel-item">
            <img src="https://media.istockphoto.com/id/1415437494/es/foto/ropa-y-jeans-en-perchas-en-una-tienda-de-cerca.jpg?s=612x612&w=0&k=20&c=8EHUKqbck9qNbv4unl7vrbzUmA0x6FKrvakEySrgnh4="
                class="d-block w-100" alt="Objetos varios">
        </div>
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
