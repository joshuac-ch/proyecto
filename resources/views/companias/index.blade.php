@extends('layout.app')
@section('contenido')

<div class="conteiner">
    <h1>Bienvenido a Compañias</h1>
    <div>
        <a href="{{route('compannias.create')}}" class="creacion">Crear Compañia</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#NOMBRE EMPRESA</th>
                <th scope="col">#DOMINIO</th>
                <th scope="col">#PROPIETARIO ID</th>
                <th scope="col">#TIPO</th>
                <th scope="col">#INGRESOS ANUALES</th>
                <th scope="col">#CREACION</th>
                <th scope="col">#EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companias as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->nombre_empresa}}</td>
                <td>{{$c->dominio_empresa}}</td>
                <td>{{$c->propiedatio_id}}</td>
                <td>{{$c->tipo}}</td>
                <td>{{$c->ingresos_anuales}}</td>
                <td>{{$c->created_at}}</td>
                <td>
                    <a href="{{route('compannias.show',$c->id)}}"><i class="bx bx-circle"></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>


</div>
@endsection