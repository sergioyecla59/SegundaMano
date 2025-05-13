@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Categoría</h1>

    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $categoria->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
