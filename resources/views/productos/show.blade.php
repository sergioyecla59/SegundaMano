@extends('layouts.app')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h3>Detalle del Producto</h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">

                <li class="list-group-item"><strong>Nombre:</strong> {{ $producto->nombre }}</li>
                <li class="list-group-item"><strong>Precio:</strong> {{ $producto->precio }} €</li>
                <li class="list-group-item"><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</li>
                <li class="list-group-item">
                    <strong>Imagen:</strong><br>
                    @if ($producto->imagen_url)
                        <img src="{{ $producto->imagen_url }}" alt="Imagen del Producto" class="img-fluid mt-2" style="max-height: 300px;">
                    @else
                        <span class="text-muted">Sin imagen</span>
                    @endif
                </li>
            </ul>

            <div class="mt-4 text-center">
                <a href="{{ route('productos.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
@endsection
