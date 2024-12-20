@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Campañas</h1>
    <a href="{{route('campannas.create')}}">Crear Campaña</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#NOMBRE</th>
                <th scope="col">#FECHA INICIO</th>
                <th scope="col">#FECHA FIN</th>
                <th scope="col">#ESTADO</th>
                <th scope="col">#PROPIETARIO ID</th>
                <th scope="col">#CREACION</th>
                <th scope="col">#EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campañas as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->nombre}}</td>
                <td>{{$c->fechainicio}}</td>
                <td>{{$c->fechafin}}</td>
                <td>{{$c->estado}}</td>
                <td>{{$c->admin_id}}</td>
                <td>{{$c->created_at}}</td>
                <td>
                    <a href="{{route('campannas.edit',$c)}}"><i class='bx bx-edit-alt'></i></a>
                    <a href="{{route('camapanas.confirmDelete',$c)}}"><i class='bx bx-trash'></i></a>

                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>
@endsection