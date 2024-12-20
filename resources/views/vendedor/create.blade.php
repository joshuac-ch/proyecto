@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Crear nuevo Vendedor</h1>
    <div class="btn_regresar">
        <a href="{{route('vendedor.index')}}">Regresar</a>
    </div>
    <form action="{{route('vendedor.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="example" class="form-label">User_id</label>
            <select name="vendedor_id" id="vendedor_id">
                <option value="" selected disabled>Seleccione un vendedor</option>
                @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{$usuario->id}}</option>
                @endforeach
            </select>




        </div>


        <button type="submit" class="btn btn-primary">Crear Encargado</button>
    </form>
</div>
@endsection