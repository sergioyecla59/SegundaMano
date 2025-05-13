@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Productos en la Categoría: {{ $categoria->nombre }}</h1>

    @if($productos->isEmpty())
        <div class="alert alert-warning">No hay productos en esta categoría.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Volver a Categorías</a>
</div>
@endsection
