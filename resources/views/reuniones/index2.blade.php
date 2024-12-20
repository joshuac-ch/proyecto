@extends('layout.app')
@section('contenido')
<div class="conteiner">
    <div class="container">
        <h1>Lista de Reuniones</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Anfitrión</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Ubicación</th>
                    <th>Contactos</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reuniones as $reunion)
                <tr>
                    <td>{{ $reunion->id }}</td>
                    <td>{{$reunion->usuarios ? $reunion->usuarios->nombre :"no encontrado"}}</td>

                    <td>{{ $reunion->titulo }}</td>
                    <td>{{ $reunion->descripcion }}</td>
                    <td>{{ $reunion->star_time }}</td>
                    <td>{{ $reunion->end_time }}</td>
                    <td>{{ ucfirst($reunion->ubicacion) }}</td>
                    <td>
                        <!-- Muestra los nombres de los contactos asociados -->
                        @foreach($reunion->contactos as $contacto)
                        {{ $contacto->nombre }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('editar.reunion',$reunion)}}"><i class='bx bx-edit-alt'></i></a>
                        <a href="{{route('adv.reunion',$reunion)}}"><i class='bx bxs-trash'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection