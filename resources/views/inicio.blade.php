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
        <div class="btn-group-custom d-flex justify-content-center flex-wrap">
            <a href="{{ route('productos.index') }}" class="btn-custom">Ver Productos</a>
            <a href="{{ route('categorias.index') }}" class="btn-custom">Ver Categorías</a>
        </div>
    </div>
</div>
@endsection
