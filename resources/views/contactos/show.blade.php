@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Bienvenido a Show del Contacto N°{{$micontacto->id}}</h1>

    <h3>Nombre: {{$micontacto->nombre}}</h3>
    <h3>Apellido: {{$micontacto->apellido}}</h3>
    <h3>Correo: {{$micontacto->correo}}</h3>
    <h3>Propietario ID: {{$micontacto->propietario_id}}</h3>
    <h3>Telefono: {{$micontacto->telefono}}</h3>
    <h3>Estado_lead: {{$micontacto->estado_lead}}</h3>
    <br>
    <a href="{{route('contactos.edit',$micontacto)}}">Editar Contacto</a>
</div>
@endsection