@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Editar Oportunidad</h1>
    <form action="{{route('oportunidades.update',$oportunidade)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="des" value="{{old('des',$oportunidade->descipcion)}}" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select name="est" id="">
                <option value="{{old('est',$oportunidade->estado)}}" selected>{{old('est',$oportunidade->estado)}}</option>
                <option value="nuevo">Nuevo</option>
                <option value="en proceso">En proceso</option>
                <option value="en negociacion">En negociacion</option>
                <option value="ganada">Ganada</option>
                <option value="perdida">Perdida</option>
                <option value="en espera">En espera</option>
                <option value="cancelada">Cancelada</option>
                <option value="reabierta">Reabierta</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="example" class="form-label">User_id</label>
            <select name="vendedor_id" id="vendedor_id">

                <option value="{{old('vendedor_id',$oportunidade->vendedor_id)}}">{{old('vendedor_id',$oportunidade->vendedor_id)}}</option>

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Producto_id</label>
            <select name="producto_id" id="">

                <option value="{{old('producto_id',$oportunidade->producto_id)}}" selected>{{old('producto_id',$oportunidade->producto_id)}}</option>

            </select>
        </div>


        <button type="submit" class="btn btn-primary">Editar Oportunidad</button>
    </form>
</div>
@endsection