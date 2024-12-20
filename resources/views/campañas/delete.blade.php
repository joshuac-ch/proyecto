@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <form method="post" action="{{route('campana.destroy',$campana_e->id)}}">
        @csrf
        @method('DELETE')
        <h3>Estas seguro que quieres borrar la campaña: "{{$campana_e->nombre}}"</h3><br>
        <button type="submit" class="btn btn-danger">Eliminar Campaña</button>
    </form>
    <a href="{{ route('campannas.index') }}">Cancelar</a>
</div>
@endsection