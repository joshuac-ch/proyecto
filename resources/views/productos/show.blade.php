@extends('layout.app')
@section('contenido')

<div class="conteiner">
    <h1>Mostar producto</h1>
    <h1>Producto: {{$producto->nombre}}</h1>
    <h3>Precio: {{$producto->precio}}</h3>
    <h3>Descripcion: {{$producto->descripcion}}</h3>
    <h3>Stock: {{$producto->stock}} </h3>
    <h3>VENDEDOR_ID: {{$producto->vendedor_id}}</h3>
    <a href="{{route('productos.edit',$producto)}}" class="creacion">editar producto</a>
</div>
@endsection