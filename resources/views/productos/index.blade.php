@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0"><i class="fas fa-box-open"></i> Lista de Productos</h3>
                <a href="{{ route('productos.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Añadir Producto
                </a>
            </div>
            <div class="card-body">
                @if($productos->isEmpty())
                    <div class="alert alert-info">No hay productos disponibles.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                    <th>Imagen URL</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->precio }} €</td>

                                        {{-- Miniatura --}}
                                        <td>
                                            @if($producto->imagen_url)
                                                <img src="{{ $producto->imagen_url }}" alt="Imagen del producto"
                                                    style="max-width: 100px; height: auto;">
                                            @else
                                                <span class="text-muted">Sin imagen</span>
                                            @endif
                                        </td>

                                        {{-- Texto "Ver imagen" como enlace --}}
                                        <td>
                                            @if($producto->imagen_url)
                                                <a href="{{ $producto->imagen_url }}" target="_blank" class="text-info">
                                                    <i class="fas fa-image"></i> Ver imagen
                                                </a>
                                            @else
                                                <span class="text-muted">Sin imagen</span>
                                            @endif
                                        </td>

                                        {{-- Acciones --}}
                                        <td>
                                            <a href="{{ route('productos.show', $producto->id) }}"
                                                class="btn btn-sm btn-primary mb-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('productos.edit', $producto->id) }}"
                                                class="btn btn-sm btn-warning mb-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="fas fa-cart-plus"></i> Añadir al carrito
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
