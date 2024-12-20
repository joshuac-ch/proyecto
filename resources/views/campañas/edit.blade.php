@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <form method="post" action="{{route('campana.update',$campana)}}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{old('nombre',$campana->nombre)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Inicio</label>
            <input type="text" class="form-control" name="inicio" value="{{old('inicio',$campana->fechainicio)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Fin</label>
            <input type="text" class="form-control" name="fin" value="{{old('fin',$campana->fechafin)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <input type="text" class="form-control" name="estado" value="{{old('estado',$campana->estado)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Admin id</label>
            <input type="text" class="form-control" name="admin" value="{{old('admin',$campana->admin_id)}}" id="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection