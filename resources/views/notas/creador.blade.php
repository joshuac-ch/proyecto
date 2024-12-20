@extends('layout.app')
@section('contenido')

<div class="conteiner">
    <h1>Crear nota</h1>
    <form action="{{route('nota.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Para: </label>
            <select name="para" class="form-control" id="">
                <option value="">selecionar el contacto</option>
                @foreach ($contactos as $c)
                <option value="{{$c->id}}">{{$c->nombre}} {{$c->id}}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nota </label>
            <textarea name="nota" class="form-control" id=""></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Creador: </label>
            <select name="creador" class="form-control" id="">
                <option value="">selecionar el creador</option>
                @foreach ($usuarios as $u)
                <option value="{{$u->id}}">{{$u->correo}} {{$u->id}}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection