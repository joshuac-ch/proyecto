@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Crear Tareas</h1>
    <form method="post" action="{{route('tarea.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nom" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prioridad</label>

            <select name="pri" class="form-control" id="">
                <option value="" selected disabled> Selecionar prioridad</option>
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
                <option value="" selected disabled> Selecionar propietario</option>
                @foreach ($propietarios as $p)
                <option value="{{$p->id}}">{{$p->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha vencimiento</label>
            <input type="date" class="form-control" name="fecha" id="exampleInputEmail1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection