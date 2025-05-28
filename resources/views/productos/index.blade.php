@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark"><i class="fas fa-box-open me-2"></i>Lista de Productos</h3>
        <a href="{{ route('productos.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-1"></i> Añadir Producto
        </a>
    </div>

    @if($productos->isEmpty())
        <div class="alert alert-info text-center">No hay productos disponibles.</div>
    @else
        <div class="row g-4">
            @foreach ($productos as $producto)
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
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                @if($producto->imagen_url)
                                    <a href="{{ $producto->imagen_url }}" target="_blank" class="btn btn-outline-info btn-sm" title="Ver imagen">
                                        <i class="fas fa-image"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="mt-auto d-grid gap-2">
                                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i> Ver
                                </a>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit me-1"></i> Editar
                                </a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt me-1"></i> Eliminar
                                    </button>
                                </form>
                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-cart-plus me-1"></i> Añadir al carrito
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
