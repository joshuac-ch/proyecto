@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Crear Administrador</h1>
    <div class="btn_regresar">
        <a href="{{route('admin.index')}}">Regresar</a>
    </div>

    <form action="{{route('admin.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="example" class="form-label">ROL</label>

            <select name="rol1" id="">
                <option value="" selected disabled></option>
                <option value="ventas">ventas</option>
                <option value="marketing">marketin</option>
                <option value="TI">TI</option>
                <option value="comercio">comercio</option>
                <option value="servicios">servicios</option>
                <option value="admin usuarios" disabled>usuarios</option>
                <option value="vendedor">vendedor</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">USER_ID</label>

            <select name="user_id1" id="">
                @foreach ($user as $u)
                <option value="" selected disabled></option>
                <option value="{{$u->id}}">{{$u->nombre}}</option>
                @endforeach


            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Encargado</button>
    </form>
</div>
@endsection
