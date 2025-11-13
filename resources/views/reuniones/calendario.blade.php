@extends('layout.app')

@section('contenido')
<style>
    #calendar {}
</style>
<div class="conteiner" style="pointer-events: none">
    <button type="button" class="btn btn-primary plantilla" data-bs-toggle="modal" data-bs-target="#lista-reu">
        Lista-Reuniones
    </button>

    <!-- Modal -->
    <div class="modal fade" id="lista-reu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">lista de reuniones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary plantilla" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Crear Reunion
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Reunion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div id="calendar"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // vista inicial del calendario
            events: 'mostrar/reunion', // URL para cargar los eventos
            eventClick: function(info) {
                alert('Evento: ' + info.event.title);
                // Aquí puedes agregar más lógica, como mostrar detalles de la reunión
            }
        });

        calendar.render();
    });
</script>
@endsection

</html>
