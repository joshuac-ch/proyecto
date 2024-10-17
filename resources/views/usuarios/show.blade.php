@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Usuario: {{$usuario->id}}</h1>
    NOMBRE <h3>{{$usuario->nombre}}</h3><br>
    CORREO <h3>{{$usuario->correo}}</h3><br>
    CONTRASEÑA <h3>{{$usuario->contrasenna}}</h3><br>
    <a href="{{route('usuarios.edit',$usuario)}}">editar</a>
</div>
@endsection