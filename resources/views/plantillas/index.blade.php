@extends('layout.app')
@section('contenido')

<div class="conteiner" style="pointer-events: none">
    <h1>Plantillas</h1>
    <div>
        <a href="{{route('plantillas.create')}}" class="creacion">Crear plantilla</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#NOMBRE DE LA PLANTILLA</th>
                <th scope="col">#ESTADISTICAS</th>
                <th scope="col">#CREACION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plantilla_Tabla as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->nombre}}</td>
                <td><a href="{{route('planti.show',$p)}}">Ver Estadisticas</a></td>
                <td>{{$p->created_at}}</td>
                <!--<td>{{!!$p->Descripcion!!}}</td>-->
            </tr>
            @endforeach


        </tbody>
    </table>


    @endsection
