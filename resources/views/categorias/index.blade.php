@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-white text-center animate-fadein">Listado de Categorías</h1>

    <div class="text-center mb-4 animate-fadein">
        <a href="{{ route('categorias.create') }}" class="btn btn-success px-4 py-2">
            <i class="bi bi-plus-circle me-2"></i>Crear nueva categoría
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center animate-fadein">
            {{ session('success') }}
        </div>
    @endif

    @if($categorias->count())
        <div class="row g-4 justify-content-center animate-fadein">
            @foreach($categorias as $categoria)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow animate-hover">
                        <div class="card-body d-flex flex-column justify-content-between text-center">
                          <!-- Imagen desde URL -->
<div class="mb-3">
    @if($categoria->imagen_url)
        <img src="{{ $categoria->imagen_url }}" alt="{{ $categoria->nombre }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
    @else
        <i class="bi bi-folder-fill text-primary" style="font-size: 2.5rem;"></i>
    @endif
</div>


                            <!-- Nombre centrado -->
                            <h5 class="card-title text-dark fw-bold text-center mb-3">{{ $categoria->nombre }}</h5>

                            <!-- Botones -->
                            <div class="d-grid gap-2">
                                <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i>Editar
                                </a>
                                <a href="{{ route('categorias.productos', $categoria) }}" class="btn btn-outline-info btn-sm">
                                    <i class="bi bi-eye me-1"></i>Ver Categoría
                                </a>
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $categoria->id }}">
                                    <i class="bi bi-trash me-1"></i>Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Confirmación -->
                <div class="modal fade" id="deleteModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $categoria->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="deleteModalLabel{{ $categoria->id }}">Confirmar eliminación</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                ¿Seguro que quieres eliminar <strong>"{{ $categoria->nombre }}"</strong>?
                            </div>
                            <div class="modal-footer justify-content-center">
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Sí, eliminar</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary text-center text-dark mt-4 animate-fadein">
            No hay categorías registradas.
        </div>
    @endif
</div>
@endsection
