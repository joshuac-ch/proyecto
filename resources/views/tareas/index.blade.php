@extends('layout.app')
@section('contenido')
<div class="conteiner" style="pointer-events: none">
    <h1>Tareas</h1>
    <clas class="btn">
        <a href="{{route('tarea.create')}}">Crear Tarea</a>
    </clas>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">#NOMBRE</th>
                <th scope="col">#PRIORIDAD</th>
                <th scope="col">#ASOCIADO CONTACTO</th>
                <th scope="col">#ASOCIADO PROPIETARIO</th>
                <th scope="col">#FECHA VENCIMIENTO</th>
                <th scope="col">#EDITAR</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($t_tareas as $t)
            <tr>
                <th scope="row">{{ $t->id }}</th>
                <td>{{ $t->nombre }}</td>
                <td>{{ $t->prioridad }}</td>
                <td>{{ $t->contacto ? $t->contacto->nombre : 'Sin contacto' }}</td> <!-- Nombre del contacto asociado -->
                <td>{{ $t->propietario ? $t->propietario->nombre : 'Sin propietario' }}</td> <!-- Nombre del propietario asociado -->
                <td>{{ $t->fecha_vencimiento }}</td>
                <td>
                    <a href="{{route('tarea.edit',$t)}}"><i class='bx bx-edit-alt'></i></a>
                    <a href="{{route('tarea.AdvEliminar',$t)}}"><i class='bx bxs-trash'></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
