@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Documentos</h1>
    <form method="post" action="{{route('documento.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="archivo">Seleccionar Archivo:</label>
            <input type="file" name="archivo" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Propietario</label>
            <select class="form-control" name="pro" id="">
                <option value="" selected disabled>Selecione al propietario </option>
                @foreach ($propietario as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Subir documento</button>
    </form>
</div>
@endsection