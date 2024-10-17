@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Bienvenidos a Crear Usuario</h1>
    <form action="{{route('vendedor.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="example" class="form-label">NOMBRE</label>
            <input type="text" class="form-control" id="example" name="nombre">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">EMAIL</label>
            <input type="text" class="form-control" id="example" name="email">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">CONTRASEÑA</label>
            <input type="text" class="form-control" id="example" name="pass">
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>

@endsection