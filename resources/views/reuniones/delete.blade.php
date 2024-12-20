@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <form action="{{route('reunion.destroy',$reu_eliminar)}}" method="post">
        @csrf
        @method('delete')
        <h2>Deseas eliminar esta reunion: {{$reu_eliminar->titulo}}</h2>
        <button class="form-control" type="submit">eliminar reunion</button>
    </form>
</div>
@endsection