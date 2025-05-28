@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Historial de Compras</h2>

    @if($ventas->isEmpty())
        <div class="alert alert-warning text-center">No hay compras registradas.</div>
    @else
        <div class="d-flex flex-column gap-4">
            @foreach($ventas as $venta)
                <div class="card shadow-sm rounded-4 d-flex flex-row align-items-center p-3" style="max-width: 900px;">
                    {{-- Imagen producto
@if($venta->producto && $venta->producto->imagen_url)
    <img src="{{ $venta->producto->imagen_url }}" alt="{{ $venta->producto->nombre }}" style="width: 140px; height: 140px; object-fit: cover; border-radius: .5rem;">
@else
    <div class="bg-light text-muted d-flex justify-content-center align-items-center" style="width: 140px; height: 140px; border-radius: .5rem;">
        Sin imagen
    </div>
@endif --}}




                    {{-- Detalles compra --}}
                    <div class="flex-grow-1 d-flex flex-column justify-content-between h-100">
                        <h5 class="card-title fw-bold mb-3">{{ $venta->producto }}</h5>
                        <ul class="list-unstyled mb-0" style="font-size: 0.95rem;">
                            <li><strong>Precio:</strong> <span class="text-success">{{ number_format($venta->precio, 2) }} €</span></li>
                            <li><strong>Cantidad:</strong> {{ $venta->cantidad }}</li>
                            <li><strong>Total:</strong> {{ number_format($venta->total, 2) }} €</li>
                            <li><strong>Titular:</strong> {{ $venta->titular }}</li>
                            <li><strong>Fecha:</strong> {{ $venta->created_at->format('d/m/Y H:i') }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
