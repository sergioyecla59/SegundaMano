@extends('layouts.app') {{-- usa tu layout base si lo tienes --}}

@section('content')
<div class="container py-5">
    <h2 class="mb-4">🛒 Tu carrito de la compra</h2>



    @if(count($carrito) > 0)
        <table class="table table-striped bg-white text-dark">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($carrito as $id => $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item['nombre'] }}</td>
                        <td>{{ $item['precio'] }} €</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>{{ $subtotal }} €</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('carrito.pago', $id) }}" method="GET">
                                <button type="submit" class="btn btn-primary btn-sm">Comprar</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="3" class="text-end">Total:</td>
                    <td>{{ $total }} €</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No hay productos en el carrito.</p>
    @endif
</div>
@endsection
