@extends('layout.app')

@section('contenido')

<div class="conteiner" style="pointer-events: none">
    <h1>Administradores </h1>

    <div>
        <a href="{{route('admin.create')}}" class="creacion">Crear Administrador</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">ROL</th>
                <th scope="col">USER_ID</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($encargados as $c)

            <tr class="contenedor">
                <th scope="row">
                    <li >{{$c->id}}</li>
                </th>
                <td>
                    <li>{{$c->rol}}</li>
                </td>
                <td>
                    <li>{{$c->user_id}}</li>
                </td>

                <td>
                    <a href="{{route('admin.show',$c->id)}}"><i class='bx bx-edit-alt'></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
<style>
    .contenedor{
        td li{
            list-style: none;
        }}
</style>
