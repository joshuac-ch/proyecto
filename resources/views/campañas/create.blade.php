@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Crear Campaña</h1>
    <div class="btn_regresar">
        <a href="{{route('campana.index')}}">Regresar</a>
    </div>
    <form method="post" action="{{route('campana.store')}}">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Inicio</label>
            <input type="text" class="form-control" name="inicio" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha Fin</label>
            <input type="text" class="form-control" name="fin" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select name="estado" id="">
                <option value="" disabled selected>Seleccionar estado de campaña</option>
                <option value="borrador">Borrador</option>
                <option value="pendiente">Pendiente</option>
                <option value="en curso">En curso</option>
                <option value="finalizada">Finalizada</option>
                <option value="suspendida">Suspendida</option>
                <option value="cancelada">Cancelada</option>
                <option value="archivada">Archivada</option>
                <option value="en revision">En revision</option>
                <option value="otro">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Admin id</label>
            <select name="admin" id="">
                <option value="" disabled selected>Seleccionar propietario campaña</option>
                @foreach ($consulta as $c)
                <option value="{{$c->id}}">{{$c->id}} || {{$c->rol}} </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection