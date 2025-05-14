@extends('layouts.app')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h3>Editar Producto</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}" required>
                </div>

                <div class="mb-3">
                    <label for="imagen_url" class="form-label">Imagen URL</label>
                    <input type="text" name="imagen_url" id="imagen_url" class="form-control" value="{{ $producto->imagen_url }}">
                </div>

                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-control">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary ms-2">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
