@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Historial de Ventas</h2>

    <table class="table table-bordered bg-white mt-4">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Titular</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->producto }}</td>
                    <td>{{ $venta->precio }} €</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->total }} €</td>
                    <td>{{ $venta->titular }}</td>
                    <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
