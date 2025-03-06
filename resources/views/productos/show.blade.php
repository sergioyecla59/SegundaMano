@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Detalle del Producto</h1>
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Precio:</strong> {{ $producto->precio }} €</p>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@endsection