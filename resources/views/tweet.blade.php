@extends('layout.app')

@section('contenido')
<div class="conteiner">
    
    <h1>Publicar Tweet</h1>
    <form action="{{route('post.tweet')}}" method="POST">
        @csrf
        <input type="text" name="tweet" required>
        <button type="submit">Publicar Tweet</button>

    </form>
</div>
@endsection