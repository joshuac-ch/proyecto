@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Documentos</h1>
    <div class="btn">
        <a href="{{route('documento.create')}}">Crear Documento</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#NOMBRE</th>
                <th scope="col">#RUTA</th>
                <th scope="col">#PROPIETARIO ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($docu as $d)
            <tr>
                <th scope="row">{{$d->id}}</th>
                <td>{{$d->nombre}}</td>
                <td><a href="{{ asset('storage/' . $d->ruta) }}" target="_blank">Ver Documento</a></td>

                <td>{{$d->usuarios ?$d->usuarios->nombre :"no asignado"}}</td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>
@endsection