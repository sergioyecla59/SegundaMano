@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h3><i class="fas fa-plus-circle"></i> Añadir Producto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio (€)</label>
                    <input type="number" name="precio" id="precio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="imagen_url" class="form-label">Imagen (URL)</label>
                    <input type="url" name="imagen_url" id="imagen_url" class="form-control" value="{{ old('imagen_url') }}">
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-select">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
