@extends('layout.app')
@section('contenido')
<div class="container mt-5 p-4 shadow rounded bg-light text-center">
    <h1 class="text-danger mb-4">Confirmar Eliminación</h1>
    <p class="text-dark fs-5">
        ¿Estás seguro que quieres eliminar el producto
        <span class="text-primary fw-bold">"{{ $producto_e->nombre }}"</span>?
    </p>

    <form action="{{ route('productos.destroy', $producto_e->id) }}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')

        <!-- Botón de eliminación -->
        <button type="submit" class="btn btn-danger btn-lg me-3">
            <i class="fa-solid fa-trash"></i> Eliminar
        </button>
    </form>

    <!-- Botón de cancelación -->
    <a href="{{ route('productos.index') }}" class="btn btn-secondary btn-lg">
        <i class="fa-solid fa-arrow-left"></i> Cancelar
    </a>
</div>

@endsection