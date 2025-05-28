@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">🛒 Tu carrito de la compra</h2>

    @if(count($carrito) > 0)
        @php $total = 0; @endphp
        <div class="d-flex flex-column gap-4">
            @foreach($carrito as $id => $item)
                @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                <div class="card shadow-sm rounded-4 d-flex flex-row align-items-center p-3" style="max-width: 800px;">
                    {{-- Imagen producto --}}
                    @if(!empty($item['imagen_url']))
                        <a href="{{ $item['imagen_url'] }}" target="_blank" rel="noopener noreferrer" class="me-4" style="flex-shrink: 0;">
                            <img src="{{ $item['imagen_url'] }}" alt="{{ $item['nombre'] }}" style="width: 140px; height: 140px; object-fit: cover; border-radius: .5rem;">
                        </a>
                    @else
                        <div class="bg-light text-muted d-flex justify-content-center align-items-center me-4"
                            style="width: 140px; height: 140px; border-radius: .5rem;">
                            Sin imagen
                        </div>
                    @endif

                    {{-- Datos y acciones --}}
                    <div class="flex-grow-1 d-flex flex-column justify-content-between h-100">
                        <div>
                            <h5 class="card-title">{{ $item['nombre'] }}</h5>
                            <p class="mb-1">Precio unitario: <strong>{{ number_format($item['precio'], 2) }} €</strong></p>
                            <p class="mb-1">Cantidad: <strong>{{ $item['cantidad'] }}</strong></p>
                            <p class="mb-0">Subtotal: <strong>{{ number_format($subtotal, 2) }} €</strong></p>
                        </div>
                        <div class="mt-3 d-flex gap-2">
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <form action="{{ route('carrito.pago', $id) }}" method="GET" class="m-0">
                                <button type="submit" class="btn btn-primary btn-sm">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Total general --}}
            <div class="text-end fw-bold fs-4" style="max-width: 800px;">
                Total: {{ number_format($total, 2) }} €
            </div>
        </div>
    @else
        <p>No hay productos en el carrito.</p>
    @endif
</div>
@endsection
