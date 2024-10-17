@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Editar Admin</h1>
    <form action="{{route('admin.update',$admin)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="example" class="form-label">ROL</label>
            <input disabled type="text" class="form-control" id="example" name="rol1" value="{{old('rol1',$admin->rol)}}">
            <label>Cambiar Rol</label>
            <select name="rol1" id="">
                <option value="" selected disabled></option>
                <option value="ventas">ventas</option>
                <option value="marketing">marketing</option>
                <option value="TI">TI</option>
                <option value="comercio">comercio</option>
                <option value="servicios">servicios</option>
                <option value="admin usuarios" disabled>admin usuarios</option>
            </select>

        </div>
        <div class="mb-3">
            <label for="example" class="form-label">USER_ID</label>
            <input type="text" disabled class="form-control" id="example" name="user_id1" value="{{old('user_id1',$admin->user_id)}}">
            <label>Cambiar Usuario_id</label>
            <select name="user_id1" id="">
                @foreach ($usuarios as $user)
                <option value="{{ $user->id }}">{{$user->nombre}}</option>

                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">editar Usuario</button>
    </form>
</div>
@endsection