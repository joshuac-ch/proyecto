@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Editar producto {{$producto->nombre}}</h1>
    <form action="{{route('productos.update',$producto)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="" class="form-label">Producto</label>
            <input type="text" class="form-control" name="producto1" value="{{old('productos1',$producto->nombre)}}" id="">
            <label for="" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio1" value="{{old('precio1',$producto->precio)}}" id="">
            <label for="" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="des1" id="" value="{{old('des1',$producto->descripcion)}}">
            <label for="" class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock1" id="" value="{{old('stock',$producto->stock)}}">
            <label for="">Vendedor ID</label>
            <select name="vendedor1">
                <option selected value="{{old('verdedor1',$producto->vendedor_id)}}">{{old('verdedor1',$producto->vendedor_id)}}</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Editar Producto</button>
    </form>
</div>
@endsection