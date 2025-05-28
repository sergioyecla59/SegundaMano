@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Productos en la Categoría: <span class="text-primary">{{ $categoria->nombre }}</span></h1>

    @if($productos->isEmpty())
        <div class="alert alert-warning text-center">No hay productos en esta categoría.</div>
    @else
        <div class="row g-4">
            @foreach($productos as $producto)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm rounded-4">
                        @if($producto->imagen_url)
                            <img src="{{ $producto->imagen_url }}" class="card-img-top" alt="Imagen de {{ $producto->nombre }}" style="object-fit: cover; height: 180px;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light" style="height: 180px;">
                                <span class="text-muted">Sin imagen</span>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $producto->nombre }}</h5>
                            <p class="card-text text-center fw-semibold text-success fs-5">{{ number_format($producto->precio, 2) }} €</p>
                            <div class="mt-auto d-grid gap-2">
                                <a href="{{ route('productos.show', $producto) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-eye me-1"></i> Ver
                                </a>
                                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i> Editar
                                </a>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash me-1"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary px-4">
            <i class="bi bi-arrow-left-circle me-2"></i> Volver a Categorías
        </a>
    </div>
</div>
@endsection
