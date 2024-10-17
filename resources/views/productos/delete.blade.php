@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>¿Estás seguro que quieres eliminar el producto {{ $producto_e->nombre }}?</h1>

    <form action="{{ route('productos.destroy', $producto_e->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Eliminar</button>
    </form>

    <a href="{{ route('productos.index') }}">Cancelar</a>
</div>
@endsection