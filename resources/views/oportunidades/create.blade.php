@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h1>Bienvenidos a Crear Oportunidades</h1>
    <form action="{{route('oportunidades.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="des" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select name="est" id="">
                <option value="" disabled selected>Selecionar un Estado</option>
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
                <option value="" selected disabled>Seleccione vendedor responsable</option>
                @foreach ($vendedor as $v)
                <option value="{{ $v->id }}">{{ $v->nombre }} {{$v->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Producto_id</label>
            <select name="producto_id" id="">
                <option value="" disabled selected>seleccione producto</option>
                @foreach ($producto as $p)
                <option value="{{$p->id}}">{{$p->nombre}} {{$p->id}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Crear Oportunidad</button>
    </form>
</div>
@endsection