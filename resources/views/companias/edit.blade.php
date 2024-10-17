@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <form action="{{route('compannias.update',$compannia)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="" class="form-label">Nombrew de la empresa</label>
            <input type="text" class="form-control" id="" name="nombre" value="{{old('nombre',$compannia->nombre_empresa)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dominio de la empresa</label>
            <input type="text" class="form-control" id="" name="dominio" value="{{old('dominio',$compannia->dominio_empresa)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Propietario ID</label>
            <select name="pro" id="">
                <option value="{{old('pro',$compannia->propietario_id)}}">{{$compannia->propietario_id}}</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo</label>
            <select name="tipo1" id="">
                <option value="{{old('tipo1',$compannia->tipo)}}">{{old('tipo1',$compannia->tipo)}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ingresos ANUALES</label>
            <input type="text" class="form-control" id="" value="{{old('ingresos',$compannia->ingresos_anuales)}}" name="ingresos">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection