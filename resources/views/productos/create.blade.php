@extends('layout.app')
@section('contenido')

<div class="conteiner">

    <form action="{{route('productos.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Producto</label>
            <input type="text" class="form-control" name="producto1" id="">
            <label for="" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio1" id="">
            <label for="" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="des1" id="">
            <label for="" class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock1" id="">
            <select name="vendedor1">
                <option selected disabled>elige un vendedor</option>
                @foreach ($vendedor as $v )
                <option value="{{$v->id}}">{{$v->id}} {{$v->nombre}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>

@endsection