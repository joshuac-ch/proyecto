@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Bienvenido a productos</h1>
    <a href="{{route('productos.create')}}" class="creacion">Crear producto</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Productos</th>

                <th scope="col">Precio</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Stock</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $p)
            <tr>
                <th scope="row">{{$p->nombre}}</th>
                <td>{{$p->precio}}</td>
                <td>{{$p->descripcion}}</td>
                <td>{{$p->stock}}</td>
                <td>
                    <a href="{{route('productos.show',$p->id)}}"><i class='bx bx-edit-alt'></i></a>
                    <a href="{{route('productos.confirmDelete',$p->id)}}"><i class='bx bx-circle'></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection