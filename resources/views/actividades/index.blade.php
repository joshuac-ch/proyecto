@extends('layout.app')
@section('contenido')
<style>
    .acti {
        border: 2px solid whitesmoke;
        box-shadow: 0px 0px 14px 1px black;
        border-radius: 10px;
        padding: 20px;
        margin: 20px;

        .header {
            display: flex;
            justify-content: space-between;

            .header-pri {
                .crear {

                    box-shadow: 0px 0px 4px 1px black;
                    padding: 5px 10px;
                    background-color: #3395d6;
                    color: white;
                    border-radius: 5px;
                    font-size: 18px;
                }

                .editar {
                    box-shadow: 0px 0px 4px 1px black;
                    padding: 5px 10px;
                    background-color: #d6b033;
                    color: white;
                    border-radius: 5px;
                    font-size: 18px;
                }

                .eliminar {
                    box-shadow: 0px 0px 4px 1px black;
                    border: 2px solid black;
                    padding: 5px 10px;
                    background-color: red;
                    color: white;
                    border-radius: 5px;
                    font-size: 18px;
                }
            }
        }

        .body-a {
            display: flex;
            justify-content: space-between;
        }
    }
</style>
<div class="conteiner">
    <h1>Historial de Actividades</h1>
    <table class="table">
        <thead>

            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Acción</th>
                <th scope="col">Entidad</th>
                <th scope="col">ID de Entidad</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <!--  @foreach($actividades as $actividad)
            <tr scope="row">
                <td>{{ $actividad->user ?$actividad->user->nombre: "no encontrado"}}</td>
                <td>{{ $actividad->accion }}</td>
                <td>{{ $actividad->entidad }}</td>
                <td>{{ $actividad->id_entidad }}</td>
                <td>{{ $actividad->descripcion }}</td>
                <td>{{ $actividad->created_at->format('d/m/Y H:i') }}</td>
                
            </tr>

            @endforeach-->
            <div class="actividad">
                @foreach ($actividades as $actividad)
                <div class="acti">
                    <div class="header">
                        <div class="header-pri">
                            @if ($actividad->accion=="Crear")
                            <label for="" class="crear">C</label>
                            @elseif ($actividad->accion=="Editar")
                            <label for="" class="editar">U</label>
                            @elseif ($actividad->accion=="Eliminar")
                            <label for="" class="eliminar">D</label>
                            @elseif ($actividad->accion=="Enviar")

                            <img src="https://1000marcas.net/wp-content/uploads/2019/11/logo-Gmail-1.jpg" style="height:40px;" class="avatar avatar-xm me-3" alt="no encontrado">
                            @endif


                            <!-- <label for="">{{$actividad->accion}}</label>-->
                            <label for="">{{$actividad->entidad}}</label>
                        </div>
                        <div class="header-sec">
                            <label for="" class="fecha">{{$actividad->created_at}}</label>
                        </div>

                    </div>
                    <div class="body-a">
                        <label for="">{{$actividad->descripcion}}</label>
                        <label for=""><a href="{{route('actividad.show',$actividad)}}">ver</a></label>
                    </div>
                </div>
                @endforeach
            </div>
        </tbody>
    </table>


    <!--  {{ $actividades->links() }}-->
</div>
@endsection