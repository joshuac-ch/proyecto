@extends('layout.app')

@section('contenido')
<div class="container">
    <h1>Crear Nueva Reunión</h1>
    <form class="form-control" action="{{ route('reunion.store') }}" method="POST">
        @csrf

        <!-- Campo para el Anfitrión -->
        <label for="anfitrion">Anfitrión:</label>
        <select name="anfi" class="form-control">
            @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
            @endforeach
        </select>

        <!-- Campo para el Título -->
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" class="form-control" required>

        <!-- Campo para la Descripción -->
        <label for="des">Descripción:</label>
        <textarea name="des" class="form-control" rows="3"></textarea>

        <!-- Campo para la Fecha de Inicio -->
        <label for="star_time">Fecha de Inicio:</label>
        <input type="datetime-local" name="star" class="form-control" required>

        <!-- Campo para la Fecha de Fin -->
        <label for="end_time">Fecha de Fin:</label>
        <input type="datetime-local" name="end" class="form-control" required>

        <!-- Campo para la Ubicación -->
        <label for="ubicacion">Ubicación:</label>
        <select name="ubi" class="form-control" required>
            <option value="presencial">Presencial</option>
            <option value="llamada">Llamada</option>
            <option value="virtual">Virtual</option>
        </select>

        <!-- Campo para Seleccionar Múltiples Contactos -->
        <label>Contactos:</label>
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