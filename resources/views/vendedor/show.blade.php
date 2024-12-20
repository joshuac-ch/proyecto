@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <label for="">llamar a la tabla a actividad para hacer seguimiento a cada vendedor</label>
    <h1>Historial del vendedor: {{$vendedor->user_id}}</h1>

    <h2>{{ $vendedor->usuario ? $vendedor->usuario->nombre : "no encontrado"}}</h2>

</div>

@endsection