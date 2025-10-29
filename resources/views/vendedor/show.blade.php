@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <label for="">llamar a la tabla a actividad para hacer seguimiento a cada vendedor</label>
    <h1>Historial del vendedor: {{$vendedor->user_id}}</h1>

    <h2>Actividades realizadas por: {{ $vendedor->usuario ? $vendedor->usuario->nombre : "no encontrado"}}</h2>
    @foreach ($actividades as $acti)
    <div class="card shadow-sm p-4 mb-4 bg-white rounded">
        <div class="card-body">
            <h2 class="text-primary">Actividad N°: {{$acti->id}}</h2>
            <p class="text-muted mb-3">
                <i class="fa fa-user me-2"></i>
                El creador de la acción fue <strong>{{$acti->nombre }}</strong>
            </p>
            <hr>
            <p>
                <i class="fa fa-calendar me-2"></i>
                <strong>Fecha:</strong> {{$acti->fecha}}
            </p>
            <p>
                <i class="fa fa-tasks me-2"></i>
                <strong>Acción:</strong> {{$acti->accion}}
            </p>
            <p>
                <i class="fa fa-sitemap me-2"></i>
                <strong>Sección del sistema:</strong> {{$acti->entidad}}
            </p>
            <hr>
            <h5 class="text-secondary">Descripción</h5>
            <p>{{$acti->descripcion}}</p>
            <p class="text-muted">
                Creada el <strong>{{$acti->created_at}}</strong> | Última actualización: <strong>{{$acti->updated_at}}</strong>
            </p>
        </div>
    </div>
    @endforeach

</div>

@endsection