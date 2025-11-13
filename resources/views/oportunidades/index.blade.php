@extends('layout.app')
@section('contenido')
<style>
    .table1 {
        table-layout: fixed;
        width: 100%;
        margin: 20px;



    }

    th,
    td {
        white-space: nowrap;
        /* Evita que el texto se rompa */
        overflow: hidden;
        /* Oculta el texto que excede el ancho */
        text-overflow: ellipsis;
        /* Agrega '...' al final del texto largo */
    }
</style>
<div class="conteiner" style="pointer-events: none">
    <h1>Oportunidades</h1>
    <div>
        <a href="{{route('oportunidades.create')}}" class="creacion">Nueva Oportunidad</a>
    </div>
    <div style="overflow-x: auto;">
        <table class="table1">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">#DESCRIPCION</th>
                    <th scope="col">#ESTADO</th>
                    <th scope="col">#VALOR</th>
                    <th scope="col">#FECHA</th>

                    <th scope="col">#VENDEDOR ID</th>
                    <th scope="col">#PRODUCTO ID</th>
                    <th scope="col">#FECHA ESTIMADA DE CIERRE</th>
                    <th scope="col">#CLIENTE ID</th>
                    <th scope="col">EDITAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($oportunidades as $o)

                <tr>
                    <th scope="row">
                        {{$o->id}}
                    </th>
                    <td class="des">
                        {{$o->descipcion}}
                    </td>
                    <td>
                        {{$o->estado}}
                    </td>
                    <td>
                        {{$o->valor}}
                    </td>
                    <td>
                        {{$o->fecha}}
                    </td>
                    <td>
                        {{$o->vendedor?$o->vendedor->id:"no se encontro un vendedor"}}
                    </td>
                    <td>
                        {{$o->producto?$o->producto->nombre:"no se encontro un producto"}}
                    </td>
                    <td>
                        {{$o->fecha_estimada_cierre}}
                    </td>
                    <td>

                        {{$o->contacto ?$o->contacto->nombre:"no ha encontrado ningun contacto"}}
                    </td>
                    <td>
                        <a href="{{route('oportunidad.edit',$o)}}">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>



    <div class="">

    </div>
    <style>
        #cicloVida {
            border-radius: 10px;
            box-shadow: 0px 0px 5px 2px black;
            padding: 10px;
            margin: 5px;
            gap: 2rem;
            justify-content: start;
            display: flex;
        }

        .clasep {
            border: 2px dashed #ccc;
            padding: 10px;
            width: 200px;
            min-height: 200px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }



        .e {
            border: 1px dashed #ccc;
            padding: 10px;
            font-size: 15px;
            border-radius: 8px;



        }


        .oportunidad {
            background-color: #fff;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: grab;
        }

        .oportunidad:active {
            cursor: grabbing;
        }

        .oportunidades-unicas {
            margin: 10px;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
        }

        .estados {
            display: flex;
            gap: 2rem;
        }
    </style>
    <div id="cicloVida">
        <!--Antiguo oportunidades <div class="estado clasep" id="oportunidad">
            <h3>Oportunidad</h3>


            @foreach ($oportunidades as $o)
            <div class="oportunidades-unicas" id="{{$o->id}}" data-id="{{$o->id}}" data-vendedor-id="{{$o->vendedor_id}}">
                <div class="header">
                    Oportunidad n°{{$o->id}}
                </div>
                <div class="body">
                    {{$o->descipcion}}
                </div>
            </div>
            @endforeach
        </div>-->

        <!--CAMPO OPORTUNIDADES <div class="estado clasep" id="oportunidad">
            <h3>Oportunidad</h3>
            @foreach ($oportunidades as $o)
            @if ($o->estado === 'oportunidad')
            <div class="oportunidades-unicas" id="{{$o->id}}" data-id="{{$o->id}}" data-vendedor-id="{{$o->vendedor_id}}">
                <div class="header">
                    Oportunidad n°{{$o->id}}
                </div>
                <div class="body">
                    {{$o->descripcion}}
                </div>
            </div>
            @endif
            @endforeach
        </div>-->

        <div class="estados">
            @foreach (['nuevo', 'en proceso', 'en negociacion', 'en espera', 'ganada', 'perdida', 'cancelada', 'reabierta'] as $estado)
            <div class="estado e" id="{{ $estado }}">
                <h3>{{ ucfirst($estado) }}</h3>
                @foreach ($oportunidades as $o)
                @if ($o->estado === $estado)
                <div class="oportunidades-unicas" id="{{$o->id}}" data-id="{{$o->id}}" data-vendedor-id="{{$o->vendedor_id}}">
                    <div class="header">
                        Oportunidad n°{{$o->id}}
                    </div>
                    <div class="body">
                        {{$o->descipcion}}
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
        <!-- ESTADOS ANTIGUOS
        <div class="estados">
            <div class="estado e" id="nuevo">
                <h3>Nuevo</h3>

            </div>
            <div class="estado e" id="en proceso">
                <h3>Proceso</h3>
            </div>
            <div class="estado e" id="en negociacion">
                <h3>Negociación</h3>
            </div>
            <div class="estado e" id="en espera">
                <h3>Espera</h3>
            </div>
            <div class="estado e" id="ganada">
                <h3>Ganada</h3>
            </div>
            <div class="estado e" id="perdida">
                <h3>Perdida</h3>
            </div>
            <div class="estado e" id="cancelada">
                <h3>Cancelada</h3>
            </div>
            <div class="estado e" id="reabierta">
                <h3>Reabierta</h3>
            </div>
        </div>-->

        <!---->
    </div>






</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hacemos las oportunidades dentro de cada estado arrastrables
        const estados = document.querySelectorAll('.estado');

        estados.forEach(estado => {
            new Sortable(estado, {
                group: 'estado', // Hacer que los elementos sean parte del mismo grupo
                animation: 150, // Animación para el movimiento
                onEnd: function(evt) {
                    const oportunidadId = evt.item.getAttribute('data-id');
                    const nuevoEstado = evt.to.id; // Obtener el estado del contenedor de destino

                    // Verificar que el id y estado no estén vacíos
                    if (!oportunidadId || !nuevoEstado) {
                        alert("Falta información para actualizar el estado");
                        return;
                    }

                    console.log(`Oportunidad ${oportunidadId} movida a ${nuevoEstado}`);
                    console.log("Nuevo estado a enviar:", nuevoEstado); // Agrega esto antes de fetch

                    // Actualizar el estado en la base de datos
                    fetch(`/oportunidades/${oportunidadId}/cambiarEstado`, {
                        method: 'POST',
                        body: JSON.stringify({
                            estado: nuevoEstado // Estado del que se movió
                        }),
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    }).then(response => {
                        if (!response.ok) {
                            alert("Hubo un error al actualizar el estado de la oportunidad");
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
