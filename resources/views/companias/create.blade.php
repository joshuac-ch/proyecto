@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <form action="{{route('compannias.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombrew de la empresa</label>
            <input type="text" class="form-control" id="" name="nombre">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dominio de la empresa</label>
            <input type="text" class="form-control" id="" name="dominio">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Propietario ID</label>
            <select name="pro" id="">
                <option value="" selected disabled>elija el propietario</option>
                @foreach($usuarios1 as $user)
                <option value="{{$user->id}}">{{$user->id}}||{{$user->nombre}}||{{$user->correo}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo</label>
            <select name="tipo1" id="">
                <option value="tecnologia">Tecnologia</option>
                <option value="medicina">Medicina</option>
                <option value="negocios">Negocios</option>
                <option value="otro">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ingresos ANUALES</label>
            <input type="text" class="form-control" id="" name="ingresos">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection