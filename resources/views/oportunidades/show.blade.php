@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Oportunidad</h1>
    <h1>Descripcion: {{$opo1->descripcion}}</h1>
    <h3>Estado: {{$opo1->estado}}</h3>
    <h3>Fecha: {{$opo1->fecha}}</h3>
    <h3>Vendedor_id: {{$opo1->vendedor_id}}</h3>
    <h3>Producto_id: {{$opo1->producto_id}}</h3>
    <a href="{{route('oportunidad.edit',$opo1)}}">Editar Oportunidad</a>
</div>
@endsection