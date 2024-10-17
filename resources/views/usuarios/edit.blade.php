@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Editar usurio</h1>
    <form action="{{route('usuarios.update',$usuario)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="example" class="form-label">NOMBRE</label>
            <input type="text" class="form-control" id="example" name="nombre" value="{{old('nombre',$usuario->nombre)}}">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">EMAIL</label>
            <input type="text" class="form-control" id="example" name="email" value="{{old('email',$usuario->correo)}}">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">CONTRASEÑA</label>
            <input type="text" class="form-control" id="example" name="pass" value="{{old('pass',$usuario->contrasenna)}}">
        </div>
        <button type="submit" class="btn btn-primary">editar Usuario</button>
    </form>
</div>
@endsection