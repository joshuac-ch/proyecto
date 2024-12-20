@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Eliminar Tarea</h1>
    <form action="{{route('tarea.destroy',$tarea_e)}}" method="post">
        @csrf
        @method('delete')
        <h2>Estas seguro de eleminar la tarea {{$tarea_e->nombre}}</h2>
        <button type="submit" class="btn btn-danger">eliminar tarea</button>
    </form>
</div>
@endsection