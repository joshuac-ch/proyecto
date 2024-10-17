@extends('layout.app')
@section('contenido')

<div class="conteiner">
    <h1>Bienvenido a Vendedores</h1>
    <a class="creacion" href="{{route('vendedor.create')}}">Crear Vendedor</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">USER_ID</th>
                <th scope="col">USER</th>
                <th scope="col">CORREO</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendedor as $c)
            <tr>
                <th scope="row">{{ $c->id }}</th>
                <td>{{ $c->user_id }}</td>


                <!-- Si ya tienes la relación en el modelo Vendedor -->
                <td>{{ $c->usuario->nombre ?? 'No asignado' }}</td>
                <td>{{ $c->usuario->correo ?? 'No asignado' }}</td>
                <td>
                    <a href=""><i class='bx bx-show'></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection