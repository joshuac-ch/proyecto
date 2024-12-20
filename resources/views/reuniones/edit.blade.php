@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <h2>Editar Reunion</h2>
    <form class="form-control" action="{{ route('reunion.update',$reunion) }}" method="POST">
        @csrf
        @method('put')
        <!-- Campo para el Anfitrión -->

        <label for="">Anfitrion actual:</label>
        <input type="text" class="form-control" name="anfi" readonly value="{{old('anfi',$reunion->anfitrion)}}">
        <label for="">Cambiar a:</label>
        <select name="anfi" class="form-control">
            @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{$usuario->id}} {{ $usuario->nombre }}</option>
            @endforeach
        </select>

        <!-- Campo para el Título -->
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="{{old('titulo',$reunion->titulo)}}" class="form-control">

        <!-- Campo para la Descripción -->
        <label for="des">Descripción:</label>
        <textarea name="des" class="form-control" rows="3">{{ old('des', $reunion->descripcion) }}</textarea>

        <!-- Campo para la Fecha de Inicio -->
        <label for="star_time">Fecha de Inicio:</label>
        <input type="datetime-local" name="star" value="{{old('star',$reunion->star_time)}}" class="form-control">

        <!-- Campo para la Fecha de Fin -->
        <label for="end_time">Fecha de Fin:</label>
        <input type="datetime-local" name="end" value="{{old('end',$reunion->end_time)}}" class="form-control">

        <!-- Campo para la Ubicación -->

        <label for="ubicacion">Ubicación Actual:</label>
        <input type="text" class="form-control" readonly name="ubi" value="{{old('ubi',$reunion->ubicacion)}}">
        <label for="">Cambiar a:</label>
        <select name="ubi" class="form-control">
            <option value="presencial">Presencial</option>
            <option value="llamada">Llamada</option>
            <option value="virtual">Virtual</option>
        </select>

        <!-- Campo para Seleccionar Múltiples Contactos -->
        <label>Contactos Actuales:</label>
        @foreach($reunion->contactos as $contacto)
        {{ $contacto->nombre }}{{ !$loop->last ? ',' : '' }}
        @endforeach
        <div class="form-control">
            @foreach($contactos as $contacto)
            <div>
                <input type="checkbox" name="contactos[]" value="{{ $contacto->id }}" id="contacto-{{ $contacto->id }}">
                <label for="contacto-{{ $contacto->id }}">{{ $contacto->nombre }}</label>
            </div>
            @endforeach
        </div>
        <!-- Botón para Enviar -->
        <button type="submit" class="btn btn-primary mt-3">Guardar Reunión</button>
    </form>
</div>
@endsection