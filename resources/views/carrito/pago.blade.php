@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">💳 Confirmar Compra</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $producto['nombre'] }}</td>
                <td>{{ $producto['precio'] }} €</td>
                <td>{{ $producto['cantidad'] }}</td>
                <td>{{ $total }} €</td>
            </tr>
        </tbody>
    </table>

    <h4 class="mt-4">💳 Datos de pago (simulado)</h4>
    <form action="{{ route('carrito.finalizar', $id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="card_number" class="form-label">Número de tarjeta</label>
            <input type="text" class="form-control" name="card_number" id="card_number" placeholder="4242 4242 4242 4242" required>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="expiry" class="form-label">Fecha de expiración</label>
                <input type="text" class="form-control" name="expiry" id="expiry" placeholder="MM/AA" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="cvc" class="form-label">CVC</label>
                <input type="text" class="form-control" name="cvc" id="cvc" placeholder="123" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="name" class="form-label">Titular</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Juan Pérez" required>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Finalizar compra</button>
        <a href="{{ route('carrito.index') }}" class="btn btn-secondary">Volver al carrito</a>
    </form>
</div>
@endsection
