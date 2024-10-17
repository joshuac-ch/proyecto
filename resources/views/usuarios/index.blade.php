@extends('layout.app')
@section('contenido')

<div class="conteiner">
    <h1>Bienvenido a usuarios</h1>
    <div>
        <a href="{{route('usuarios.create')}}" class="creacion">Crear Usuario</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">CONTRASEÑA</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conexion as $c)

            <tr>
                <th scope="row">
                    <li>{{$c->id}}</li>
                </th>
                <td>
                    <li>{{$c->nombre}}</li>
                </td>
                <td>
                    <li>{{$c->correo}}</li>
                </td>
                <td>
                    <li>{{$c->contrasenna}}</li>
                </td>
                <td>
                    <a href="{{route('usuarios.show',$c->id)}}"><i class='bx bx-edit-alt'></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection