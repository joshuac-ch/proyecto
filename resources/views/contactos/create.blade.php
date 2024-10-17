@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Bienvenido a Crear Contacto</h1>
    <form action="{{route('contactos.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nom" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="app" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Correo</label>
            <input type="text" class="form-control" name="cor" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Propietario ID</label>
            <select name="propi" id="">
                <option value="" selected disabled>Seleccionar propietario del contacto</option>
                @foreach ($propietarios as $p)
                <option value="{{$p->id}}">{{$p->nombre}} {{$p->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="tel" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado Lead</label>
            <select name="est" id="">
                <option value="" selected disabled>Selecionar estado del lead</option>
                <option value="nuevo">nuevo</option>
                <option value="calificado">calificado</option>
                <option value="en contacto">en contacto</option>
                <option value="interesado">interesado</option>
                <option value="no interesado">no interesado</option>
                <option value="en espera">en espera</option>
                <option value="cliente">cliente</option>
                <option value="archivado">archivado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection