@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Encargado: {{$encargados->id}}</h1>
    ROL <h3>{{$encargados->rol}}</h3><br>
    USER_ID <h3>{{$encargados->user_id}}</h3><br>

    <a href="{{route('admin.edit',$encargados)}}">editar</a>
</div>
@endsection