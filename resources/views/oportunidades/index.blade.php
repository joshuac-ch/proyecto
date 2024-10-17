@extends('layout.app')
@section('contenido')

<div class="conteiner">
    <h1>Bienvenido a Oportunidades</h1>
    <div>
        <a href="{{route('oportunidades.create')}}" class="creacion">Nueva Oportunidad</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#DESCRIPCION</th>
                <th scope="col">#ESTADO</th>
                <th scope="col">#FECHA</th>
                <th scope="col">#VENDEDOR_ID</th>
                <th scope="col">#PRODUCTO_ID</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($oportunidades as $o)

            <tr>
                <th scope="row">
                    {{$o->id}}
                </th>
                <td>
                    {{$o->descipcion}}
                </td>
                <td>
                    {{$o->estado}}
                </td>
                <td>
                    {{$o->fecha}}
                </td>
                <td>
                    {{$o->vendedor_id}}
                </td>
                <td>
                    {{$o->producto_id}}
                </td>

                <td>
                    <a href=""><i class='bx bx-edit-alt'></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection