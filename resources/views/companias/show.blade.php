@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h3>Nombre: {{ $com->nombre_empresa}} </h3>
    <h3>Dominio: {{$com->dominio_empresa}}</h3>
    <h3>Propietario: {{$com->propietario_id}}</h3>
    <h3>Tipo: {{$com->tipo}}</h3>
    <h4>Ingresos: {{$com->ingresos_anuales}}</h4>
    <br>
    <a class="creacion" href="{{route('compannias.edit',$com)}}">editar compania</a>
</div>
@endsection