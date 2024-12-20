@extends('layout.app')
@section('contenido')

<div class="container mt-5 p-4 shadow rounded bg-light">
    <h1 class="text-center text-primary mb-4">Detalles del Producto</h1>

    <!-- Nombre del producto -->
    <h2 class="text-center text-dark mb-4">Producto: <span class="text-secondary">{{$producto->nombre}}</span></h2>

    <!-- Imagen del producto -->
    <div class="text-center mb-4">
        <img src="{{asset($producto->imagen)}}" class="img-thumbnail"
            style="width: 300px; height: 300px; object-fit: cover;" alt="Imagen del producto">
    </div>

    <!-- Información del producto -->
    <div class="mb-4">
        <h4 class="text-dark"><strong>Precio:</strong> <span class="text-success">S/{{$producto->precio}}</span></h4>
        <h4 class="text-dark"><strong>Descripción:</strong> <span class="text-muted">{{$producto->descripcion}}</span></h4>
        <h4 class="text-dark"><strong>Stock:</strong> <span class="text-muted">{{$producto->stock}} unidades</span></h4>
        <h4 class="text-dark"><strong>Vendedor ID:</strong> <span class="text-muted">{{$producto->vendedor_id}}</span></h4>
    </div>

    <!-- Botón de edición -->
    <div class="text-center">
        <a href="{{route('productos.edit', $producto)}}" class="btn btn-primary btn-lg">
            <i class="fa-solid fa-pen-to-square"></i> Editar Producto
        </a>
    </div>
</div>

@endsection