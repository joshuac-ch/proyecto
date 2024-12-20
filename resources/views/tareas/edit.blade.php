@extends('layout.app')
@section('contenido')

<div class="conteiner">
    <h2>Editar Tareas</h2>
    <form method="POST" action="{{route('tarea.update',$tarea)}}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nom" value="{{old('nom',$tarea->nombre)}}" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Actual Prioridad</label>
            <input class="form-control" readonly value="{{old('pri',$tarea->prioridad)}}" />

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cambiar la Prioridad</label>

            <select name="pri" class="form-control" id="">
                <option value="{{$tarea->prioridad}}" selected disabled> {{$tarea->prioridad}}</option>
                <option value="baja">baja</option>
                <option value="media">media</option>
                <option value="alta">alta</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Asociado Contacto</label>
            <select name="con" class="form-control" id="">
                <option value="" selected disabled> Selecionar Contacto</option>
                @foreach ($contactos as $c)
                <option value="{{$c->id}}">{{$c->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Asociado Propietario</label>
            <select name="propi" class="form-control" id="">
                <option value="{{$tarea->id}}">{{$tarea->asociado_propietario }}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha vencimiento</label>
            <input type="date" value="{{old('fecha',$tarea->fecha_vencimiento)}}" class="form-control" name="fecha" id="exampleInputEmail1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection