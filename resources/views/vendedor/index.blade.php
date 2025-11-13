@extends('layout.app')
@section('contenido')

<div class="conteiner" style="pointer-events: none">
    <h1>Vendedores</h1>
    <label for="">Siempre crear el vendedor </label>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#USER</th>
                <th scope="col">#CORREO</th>
                <th scope="col">#ROL</th>
                <th scope="col">#USER_ID</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($vendedor as $c)
            <tr>
                <th scope="row">{{ $c->id }}</th>
                <td>{{ $c->nombre }}</td>
                <td>{{$c->correo}}</td>
                <td>{{$c->rol}}</td>

                <!-- Si ya tienes la relación en el modelo Vendedor -->
                <!--  <td>{{ $c->usuario->nombre ?? 'No asignado' }}</td>
                <td>{{ $c->usuario->correo ?? 'No asignado' }}</td>-->
                <td>{{ $c->id}}</td>
                <td>
                    <a href="{{route('vendedor1.show',$c->id)}}"><i class='bx bx-show'></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
