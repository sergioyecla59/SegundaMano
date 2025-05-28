@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Categoría</h1>

    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="mb-3">
    <label for="imagen_url" class="form-label">URL de la imagen</label>
    <input type="url" name="imagen_url" id="imagen_url" class="form-control" value="{{ old('imagen_url', $categoria->imagen_url ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
