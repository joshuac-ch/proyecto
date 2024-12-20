@extends('layout.app')
@section('contenido')
<style>
    div.conteiner-principal.contactos {
        display: flex;
        margin-top: 250px;
        gap: 2rem;
        margin-left: 20px;
    }

    .conteiner2 {}

    .imagen-contact {
        img {
            border-radius: 50px;
            width: 80px;
        }

        .perfil-icon {
            border-radius: 50px;
            padding: 5px 10px;
            border: 2px solid gray;
        }
    }

    .perfil {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    label {
        font-size: 21px;
        color: #5e72e4;
        font-weight: bold;
        margin: 0px;
        padding: 0px;
    }

    .about-contact {
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
    }

    .fa-copy {
        cursor: pointer;
    }

    .datos-contact {
        margin-left: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;

        h4 {
            font-weight: bold;
        }
    }

    .funciones-contact {
        display: flex;
        gap: 1rem;


        h6 {
            font-size: 14px;
        }

        .text {
            text-align: center;
        }
    }

    #btn_cerrar_correo {
        cursor: pointer;
    }


    #conteiner-secret {
        /*position: absolute; VER ESTOOOOOO*/
        z-index: 999;
        left: 870px;
        top: 350px;



        .conteiner-email {}

        .conteiner-e {

            border-bottom: 2px;
            border-left: 2px;
            border-right: 2px;
            border-top: 0px;
            border-color: black;
            border-style: solid;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;

        }

        .conteiner-banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid #5e72e4;
            padding: 12px 20px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;

        }

        .information-email {
            display: flex;
            justify-content: center;
            padding: 15px 20px;

            ul {
                gap: 4rem;
                display: flex;
                justify-content: center;
                list-style: none;


            }
        }

        .email-person {
            padding: 0px 20px;
        }

        .herramientas-email {
            display: flex;
            gap: 2rem;
            justify-content: start;
            align-items: center;
            padding-left: 30px;
            padding-top: 10px;

            i {
                cursor: pointer;
            }

            h5 {
                button {
                    border: 0px solid transparent;
                    color: #344767;
                    background-color: transparent;
                }
            }
        }



        .create-homework {
            display: flex;
            justify-content: space-around;
            padding: 0px 20px;
            gap: 1rem;

            .btn_enviar {
                background-color: #5e72e4;
                color: white;
                border: 2px solid #5e72e4;
                padding: 5px 7px;

                margin: 20px 0px;

            }

            .btn_enviar:hover {
                background-color: white;
                color: #5e72e4;
                transition: all .5s ease;
            }

            .homework {
                display: flex;
                justify-content: center;

            }

            .email-person {}
        }
    }


    #contenido-email {
        width: 650px;
        height: 200px;
        border: 1px solid #ccc;
        padding: 10px;
        overflow-y: auto;

        img {
            width: 100px;
        }
    }



    .herramientas-secret {
        margin: 20px;
    }

    .lista-plantillas {
        display: flex;
        justify-content: space-between;
        flex-direction: column;

    }

    .plantilla {
        border: 2px solid black;
        border-radius: 10px;
        padding: 10px 20px;
        margin: 20px 0px;

        .plantilla-selec {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        button {
            max-width: 100px;
        }

    }

    #contenidoDiv {
        overflow-y: scroll;
        height: 300px;
        border: 2px solid black;
        margin-bottom: 20px;
        max-width: 700px;

        img {
            width: 200px;
        }
    }

    .modelo-reunion {
        display: flex;

    }

    #calendar {
        width: 100%;
        margin: 20px;
        height: 600px;
    }

    .dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
    }
</style>
<div class="conteiner-principal contactos">
    <div class="conteiner2">
        <h1>Bienvenido a Show del Contacto N°{{$micontacto->id}}</h1>
        <div class="perfil">
            <div class="imagen-contact">
                <!--<img src="{{asset('assets/img/nino.jpg')}}" alt="">-->
                @if ($micontacto->imagen==null)
                <div class="perfil-icon">
                    {{ucfirst(substr($micontacto->nombre,0,1))}}{{ucfirst(substr($micontacto->apellido,0,1))}}
                </div>
                @else

                <img src="{{asset($micontacto->imagen)}}" style="width:40px;height:40px;border-radius:50px" alt="">
                @endif


            </div>
            <div class="datos-contact">
                <h4>{{$micontacto->nombre}} {{$micontacto->apellido}}</h4>
                <h6 id="contenido-correo">{{$micontacto->correo}} <span><i onclick="CopyPapel()" class="fa-solid fa-copy"></i></span></h6>
            </div>
        </div>
        <div class="funciones-contact">
            <div class="box">
                <div class="btn">
                    <!--<a href="{{route('auth.google')}}"><i class="fa-solid fa-envelope"></i></a> TODABIA NO EJECUTAR-->
                    <!--<a href="" id="BTN-CORREO" onclick="mostrarCorreo()"><i class="fa-solid fa-envelope"></i></a>-->
                    <i onclick="mostrarCorreo()" class="fa-solid fa-envelope"></i>
                </div>
                <div class="text">
                    <h6>Correo</h6>
                </div>
            </div>
            <div class="box">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#notas">
                    <i class="fa-solid fa-note-sticky"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="notas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Crear Nota
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--Contenedor de notas-->
                                <form action="{{route('nota.store')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Para: </label>
                                        <select name="para" class="form-control" id="">
                                            <option value="">selecionar el contacto</option>
                                            @foreach ($contactos as $c)
                                            <option value="{{$c->id}}">{{$c->nombre}} {{$c->id}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nota </label>
                                        <textarea name="nota" class="form-control" id=""></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Creador: </label>
                                        <select name="creador" class="form-control" id="">
                                            <option value="">selecionar el creador</option>
                                            @foreach ($usuarios as $u)
                                            <option value="{{$u->id}}">{{$u->correo}} {{$u->id}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text">
                    <h6>Nota</h6>
                </div>
            </div>
            <div class="box">

                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#tareas"><!-- SIEMPRE CAMBIAR EL IDENTIFICADOR A SU MODAL-->
                    <i class="fa-duotone fa-solid fa-calendar"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="tareas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Crear Tarea
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('tarea.store')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nom" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Prioridad</label>

                                        <select name="pri" class="form-control" id="">
                                            <option value="" selected disabled> Selecionar prioridad</option>
                                            <option value="baja">baja</option>
                                            <option value="media">media</option>
                                            <option value="alta">alta</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Asociado Contacto</label>
                                        <select name="con" class="form-control" id="">
                                            <option value="" selected disabled> Selecionar Contacto</option>
                                            @foreach ($contactos as $c)
                                            <option value="{{$c->id}}">{{$c->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Asociado Propietario</label>
                                        <select name="propi" class="form-control" id="">
                                            <option value="" selected disabled> Selecionar propietario</option>
                                            @foreach ($propietarios as $p)
                                            <option value="{{$p->id}}">{{$p->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Fecha vencimiento</label>
                                        <input type="date" class="form-control" name="fecha" id="exampleInputEmail1">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="text">
                    <h6>Tarea</h6>
                </div>
            </div>
            <div class="box">

                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#reunion">
                    <i class="fa-solid fa-calendar-days"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="reunion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="max-width: 50vw; height: 100vh;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Reunion</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body modelo-reunion">
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
                                    <!-- Dropdown para los contactos -->
                                    <label>Contactos:</label>
                                    <div class="dropdown">
                                        <br>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Seleccionar Contactos
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach($contactos as $contacto)
                                            <li>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="contactos[]" value="{{ $contacto->id }}" id="contacto-{{ $contacto->id }}">
                                                    <label class="form-check-label" for="contacto-{{ $contacto->id }}">{{ $contacto->nombre }}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <!-- Botón para Enviar -->
                                    <button type="submit" class="btn btn-primary mt-3">Guardar Reunión</button>
                                </form>
                                <div id="calendar"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text">
                    <h6>Reunion</h6>
                </div>
            </div>

        </div>

        <div class="about-contact">
            <div class="about">
                <h4>Acerca de este contacto</h4>
            </div>
            <div class="more">
                <div class="email">
                    <label for="">Contacto</label>
                    <h4>{{$micontacto->correo}}</h4>
                </div>
                <div class="tel">
                    <label for="">Telefono</label>
                    <h4> {{$micontacto->telefono}}</h4>
                </div>
                <div class="estado">
                    <label for="">Estado Lead</label>
                    <h4>{{$micontacto->estado_lead}}</h4>
                </div>
                <div class="propi">
                    <label for="">Propietario del contacto</label>
                    <h4>{{$micontacto->propietario_id}}</h4>
                </div>
            </div>
        </div>


        <br>
        <a href="{{route('contactos.edit',$micontacto)}}">Editar Contacto</a>
    </div>

    <div class="mb-3 herramientas-secret">

        <div id="conteiner-secret" class="mb-3">

            <div class="conteiner-email">
                <div class="conteiner-banner">
                    <label for="">Correo</label>
                    <i onclick="ocultarCorreo()" id="btn_cerrar_correo" class="fa-solid fa-x"></i></button>
                </div>

                <div class="conteiner-e">

                    <form action="{{route('google.enviarEmail')}}" id="tuFormulario" method="post"><!-- onsubmit="capturarContenidoEmail()">-->
                        @csrf
                        <div class="information-email">
                            <ul>
                                <li>
                                    <button type="button" class="btn btn-primary plantilla" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Plantillas
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="lista-plantillas">
                                                        @foreach ($tabla_plantillas as $pla)
                                                        <div class="plantilla">
                                                            <div class="plantilla-selec">
                                                                <a href="{{route('plantillas.create')}}">{{$pla->asunto}}</a>
                                                                <!-- Reemplaza CON STR_REPLACE $micontacto->nombre dentro de $pla->Descripcion -->
                                                                @php
                                                                $descripcionConDatos = str_replace(
                                                                ['NOMBRE', 'APELLIDO','CORREO','TELEFONO','PRODUCTO'],
                                                                [$micontacto->nombre, $micontacto->apellido,$micontacto->correo,$micontacto->telefono,],
                                                                $pla->Descripcion
                                                                );
                                                                $asuntocorreo=$pla->asunto;

                                                                @endphp

                                                                <button type="button" class="form-control" onclick="CopiarPlantilla(`{{$asuntocorreo}}`,`{!! addslashes($descripcionConDatos) !!}`)">Seleccionar</button>

                                                            </div>
                                                            <div class="plantilla-des">
                                                                <label for="">{{!!$pla->Descripcion!!}}</label>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary plantilla" data-bs-toggle="modal" data-bs-target="#documentos2">
                                        Documentos
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="documentos2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Subir documento
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#NOMBRE</th>
                                                                <th scope="col">#SELECIONAR</th>
                                                                <th scope="col">#RUTA</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($docu as $d)
                                                            <tr>
                                                                <td>{{$d->nombre}} <br>
                                                                    Propietario: {{$d->usuarios ?$d->usuarios->nombre :"no asignado"}}
                                                                </td>
                                                                <td>
                                                                    <button type="button" onclick="seleccionarDocumento(`{{$d->nombre}}`, `{{ asset('storage/' . $d->ruta) }}`)" class="form-control">Seleccionar</button>
                                                                    <!--<button type="button" onclick="subirDFocumento(`{{$d->nombre}}`)" id="seleccionar_documento" class="form-control">seleccionar</button>-->
                                                                </td>
                                                                <td><a href="{{ asset('storage/' . $d->ruta) }}" target="_blank">Ver Documento</a></td>


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
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary plantilla" data-bs-toggle="modal" data-bs-target="#reunion">
                                        Reuniones
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="reunion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Reunion</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

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


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><button type="button" class="btn btn-primary plantilla" data-bs-toggle="modal" data-bs-target="cotizacion">
                                        Cotizaciones
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="cotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{route('admin.create')}}">dd</a>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="email-person">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Para:</label>
                                <div class="col-sm-10">
                                    <input type="email" readonly class="form-control-plaintext" id="destinatario" name="destinatario" value="{{$micontacto->correo}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">De:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ session('usuario')->correo }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Asunto</label>
                                <div class="col-sm-10">
                                    <input type="text" name="asunto" placeholder="ingrese asunto" class="form-control-plaintext" id="staticEmail">
                                </div>
                            </div>
                            <div class="email-data">
                                <!--<textarea rows="4" class="form-control" name="contenidoEmail" id="contenido-email"></textarea>-->
                                <!--<div id="contenido-email" contenteditable="true" name="contenidoEmail">-->
                                <div id="contenidoDiv" contenteditable="true"></div>
                                <!-- Campo oculto para enviar el contenido al backend -->
                                <input type="hidden" name="contenidoEmail" id="contenidoEmail">
                            </div>
                        </div>

                        <div id="editor" class="herramientas-email">
                            <h5><button type="button" title="Negrita" onclick="Negrita()"><i class="fa-solid fa-b"></i></button></h5>
                            <h5><button type="button" title="Italica" onclick="Italic()"><i class="fa-solid fa-italic"></i></button></h5>
                            <h5><button type="button" title="Crear enlace" onclick="crearEnlace()"><i class="fa-solid fa-a"></i></button></h5>
                            <h5><button type="button" title="Subrayar" onclick="subrayarTexto()"> <i class="fa-solid fa-subscript"></i></button></h5>
                            <h5><button type="button" title="Insertar" onclick="insertarImagen()"><i class="fa-regular fa-image"></i></button></h5>
                            <h5><i class="fa-solid fa-paperclip"></i></h5>
                        </div>
                        <div class="create-homework">
                            <button type="submit" onclick="enviarCorreo()" class="btn_enviar">Enviar</button>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Crear tarea de correo para hacer seguimento en ||N Dias
                                </label>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        // Crear el calendario
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Vista inicial del calendario
            events: '/mostrar/reunion/', // Asegúrate de que la URL esté correcta
            eventClick: function(info) {
                alert('Evento: ' + info.event.title);
                // Aquí puedes agregar más lógica para mostrar detalles del evento
            },
            // Puedes añadir más opciones según tu caso, como configuración de eventos, etc.
        });

        // Asegurarse de que el calendario se renderice después de que el modal sea visible
        $('#reunion').on('shown.bs.modal', function() {
            calendar.render();
            calendar.updateSize();
        });

        // Función para actualizar los eventos sin recargar la página (si se agregan nuevos eventos)
        function actualizarEventos() {
            calendar.refetchEvents();
        }

        // Llamar a la función para renderizar el calendario al cargar la página
        calendar.render();

        // Si deseas actualizar el calendario después de agregar una reunión, puedes llamar a actualizarEventos
        // Ejemplo de llamada cuando se agrega un evento (esto dependerá de tu implementación)
        // actualizarEventos();
    });
</script>
<script>
    //CKEDITOR.replace('editor'); // Esto aplicará CKEditor solo al textarea con el nombre 'editor'
</script>
<script>
    // function capturarContenidoEmail() {
    //    let contenido = document.getElementById('contenido-email').innerHTML;
    //    document.getElementById('contenidoEmailInput').value = contenido;
    //}
    function enviarCorreo() {
        // Obtén el contenido del div y colócalo en el campo oculto
        document.getElementById('contenidoEmail').value = document.getElementById('contenidoDiv').innerHTML;

        // Envía el formulario
        document.getElementById('tuFormulario').submit(); // Asegúrate de tener un id para el formulario
    }
    //CREAR TAREA
    function seleccionarDocumento(nombre, ruta) {
        // Crear un nuevo elemento de lista
        const li = document.createElement('li');
        li.textContent = nombre + ' - ';
        const link = document.createElement('a');
        link.href = ruta;
        console.log(ruta)
        link.textContent = 'Ver Documento';
        link.target = '_blank'; // Para abrir en una nueva pestaña
        li.appendChild(link);

        // Agregar el elemento a la lista de documentos seleccionados
        document.getElementById('contenidoDiv').appendChild(li);
    }
    async function subirDFocumento(contenido) {
        let mostarr = document.getElementById('contenido-email')
        mostarr.innerHTML = contenido
    }
    async function CrearTarea() {

    }
    //--------------------------

    async function CopiarPlantilla(asunto, contenido) {
        let asuntito = document.getElementById('staticEmail');
        asuntito.value = asunto;

        //este era el antiguo let mostrarAqui = document.getElementById("contenido-email");
        let mostrarAqui = document.getElementById("contenidoDiv");

        mostrarAqui.innerHTML = contenido
    }
    async function mostrarCorreo() {
        let btn_correo = document.getElementById("BTN-CORREO");
        let conteiner_secret = document.getElementById("conteiner-secret")
        conteiner_secret.innerHTML = `
         
        `
        /*let create_div = document.createElement('div');
        let create_banner = document.createElement('div');
        let text_banner = document.createElement('label');
        text_banner.textContent = "Correo"
        let icon_banner = document.createElement('a');
        icon_banner.innerHTML = `<i class="fa-solid fa-x"></i>`
        let conteiner_email = document.createElement('div');
        conteiner_email.appendChild(text_banner)
        conteiner_email.appendChild(icon_banner);
        create_div.appendChild(conteiner_email)
        conteiner_secret.appendChild(create_div)*/



    }
    async function ocultarCorreo() {
        let btn_ocult = document.getElementById("ocult-email");
        let conteiner_secret = document.getElementById("conteiner-secret")
        conteiner_secret.innerHTML = ""
    }
    async function Negrita() {
        //let btn = document.getElementById('fa-solid');
        let textarea = document.getElementById("contenido-email");
        // Alternar entre negrita y normal
        if (textarea.style.fontWeight === "bold") {
            textarea.style.fontWeight = "normal";
        } else {
            textarea.style.fontWeight = "bold";
        }
    }
    async function Italic() {
        let textarea = document.getElementById("contenido-email");
        if (textarea.style.fontStyle == "italic") {
            textarea.style.fontStyle = "normal"
        } else {
            textarea.style.fontStyle = "italic"
        }
    }

    function crearEnlace() {
        let url = prompt("Introduce la URL del enlace:");
        if (url) {
            document.execCommand("createLink", false, url);
        }
    }

    function subrayarTexto() {
        document.execCommand("underline", false, null); // Aplica subrayado al texto seleccionado
    }


    function CopyPapel() {
        let contenido = document.getElementById('contenido-correo').innerText;
        navigator.clipboard.writeText(contenido)
            .then(() => {
                alert("Texto copiado al portapapeles!");
            })
            .catch(err => {
                console.error('Error al copiar al portapapeles: ', err);
            });
    }

    function insertarImagen() {
        let url = prompt("inserte la url de la imagen");
        if (url) {
            document.execCommand('insertImage', false, url);
        }
    }
</script>
@endsection