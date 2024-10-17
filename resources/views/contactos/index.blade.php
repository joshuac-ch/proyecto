@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Bienvenidos a Contactos</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#NOMBRE</th>
                <th scope="col">#APELLIDO</th>
                <th scope="col">#CORREO</th>
                <th scope="col">#PROPIETARIO ID</th>
                <th scope="col">#TELEFONO</th>
                <th scope="col">#ESTADO LEAD</th>
                <th scope="col">#EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactos as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->nombre}}</td>
                <td>{{$c->apellido}}</td>
                <td>{{$c->correo}}</td>
                <td>{{$c->propietario_id}}</td>
                <td>{{$c->telefono}}</td>
                <td>{{$c->estado_lead}}</td>
                <td>
                    <a href="{{route('contactos.edit',$c)}}"><i class='bx bx-edit-alt'></i></a>
                    <a href=""><i class='bx bxs-trash'></i></a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

</div>
@endsection