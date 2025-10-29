<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/jpg" href="{{asset('assets/img/nino.jpg')}}">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    <!-- Dependencia calendar-->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/5501ed0b56.js" crossorigin="anonymous"></script>
    <style>
        .sugerencia {
            background-color: #5e72e4;
            padding: 5px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
            color: white;
        }

        #sugerencias {
            z-index: 99;
            position: absolute;
            display: none;
            border: 1px solid #ddd;
            width: 300px;


        }

        .sugerencia:hover {
            background-color: white;
            color: #5e72e4;
        }

        .conteiner {

            margin-top: 230px;
            margin-left: 20px;
            margin-right: 0px;

        }

        .creacion {
            border: 2px solid cadetblue;
            border-radius: 10px;
            padding: 10px 20px;
            margin-left: 10px;
            background-color: cadetblue;
            color: white;
        }

        .creacion:hover {
            transition: all .5s ease;
            color: cadetblue;
            background-color: white;
        }

        .tablas {
            display: flex;
            justify-content: space-between;
        }

        .nino {
            border-radius: 50px;

        }

        .misrutas {
            display: none;
            transition: all .5s ease;
        }

        #misherra {
            display: none;
            transition: all .5s ease;
        }

        #resultados {
            color: black;
            position: absolute;
            top: 5rem;
            left: 50%;
        }

        .btn_regresar {
            text-align: center;
            border: 2px solid #5e72e4;
            padding: 5px 10px;
            margin: 10px;
            max-width: 110px;
            border-radius: 20px;

            a {
                color: #5e72e4;
            }
        }

        .btn_regresar:hover {
            background-color: #5e72e4;
            transition: all .5s ease;
            border-color: #344767;

            a {
                color: white;

            }
        }

        .perfil2 {
            padding: 15px 10px;
            gap: .5rem;
            font-size: 15px;
            text-align: center;

            display: flex;
            justify-content: space-between;
            border-radius: 17px;
            align-items: center;

            .perfil-name2 {
                border: 1px solid black;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 20px;
                width: 40px;
                height: 40px;



            }

            span {


                display: flex;
                flex-direction: column;
                justify-content: start;
                text-align: start;

            }
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <div class="d-flex justify-content-start perfil2">
                <!-- VERIFICA SI NO ESTRAS LOGUEADO O LA SESSION ESTA VACIA APARECERA COMO USUARIO NO AUTENTICADO-->
                @if (session('usuario')!=null)
                @if (session('usuario')->imagen !=null)

                <img src="{{session('usuario')->imagen}}" style="width:40px;height:40px;border-radius:50px" alt="no">
                @else
                <div class="perfil-name2">
                    {{ucfirst(substr(session('usuario')->nombre,0,1))}}
                </div>
                @endif
                <!--<span> {{session('usuario')->nombre}} <a href="{{route('usuarios.show',session('usuario'))}}"><i class='bx bx-show-alt'></i></a></span>-->
               <div class="d-flex flex-column">
                 <span class="font-weight-bold">
                    {{ session('usuario')->nombre }}

                </span>
                <span class=" font-weight-bold">
                     {{ session('usuario')->correo }}
                </span>
               </div>
                @else
                <p>Usuario no autenticado</p>
                @endif
            </div>

        </div>
        <hr class=" horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('dash.index')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>

                </li>
                <li class="nav-item tablas">
                    <a class="nav-link btn-tabla" href="{{route('usuarios.index')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1 tablas1">Gestionar <i class="fa-solid fa-chevron-right"></i>

                        </span>

                    </a>
                </li>

                <li class="nav-item misrutas">

                    <div class="nav-link">
                        <ul>
                            <li><a href="{{route('usuarios.index')}}">Usuarios</a></li>
                            <li><a href="{{route('admin.index')}}">Administradores</a></li>
                            <li><a href="{{route('vendedor.index')}}">Vendedores</a></li>
                            <li><a href="{{route('productos.index')}}">Productos</a></li>
                            <li><a href="{{route('compannias.index')}}">Compañias</a></li>
                            <li><a href="{{route('oportunidades.index')}}">Oportunidades</a></li>
                            <li><a href="{{route('social.index')}}">Redes Sociales</a></li>
                            <li><a href="{{route('contactos.index')}}">Contactos</a></li>
                            <li><a href="{{route('campana.index')}}">Campañas</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{route('actividad.index')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Actividades</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('mostrar.predicciones')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Prediccion</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link " href="../pages/rtl.html">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">RTL</span>
                    </a>
                </li>-->
                <li class="nav-item " id="herramientas">
                    <a class="nav-link btn_herramientas" href="{{route('usuarios.index')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Herramientas <i class="fa-solid fa-chevron-right btnmover"></i> </span>
                    </a>
                </li>
                <li class="nav-item " id="misherra">

                    <div class="nav-link">
                        <ul>
                            <li><a href="{{route('plantillas.index')}}">Plantillas</a></li>
                            <li><a href="{{route('tarea.index')}}">Tareas</a></li>
                            <li><a href="{{route('documento.index')}}">Documentos</a></li>
                            <li><a href="{{route('calendario.index')}}">Reuniones</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <!--SI NO ME REGISTRO ME LLEVA AL LOGIN--> <a class="nav-link " href="{{ session('usuario') ? route('perfil.user', session('usuario')->id) : route('user.login') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Perfil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('user.login')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Iniciar Session</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('log.login')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Cerrar session</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-plain shadow-none" id="sidenavCard">
                <img class="w-50 mx-auto" src="{{asset('assets/img/illustrations/icon-documentation.svg')}}" alt="sidebar_illustration">
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info">
                        <h6 class="mb-0">Necesitas ayuda</h6>
                        <p class="text-xs font-weight-bold mb-0">Por favor checa el tutorial</p>
                    </div>
                </div>
            </div>
            <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Tutorial</a>
            <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Ver mas</a>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="inpu-group">
                            <!--<span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>-->

                            <input type="text" class="form-control" id="buscador" onkeyup="buscarSugerencias(this.value)" placeholder="Type here...">
                            <div id="sugerencias"></div>
                        </div>

                    </div>



                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Sign In</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <style>
                            .navbar-nav>li>.dropdown-menu {
                                background-color: ghostwhite
                            }
                        </style>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{asset('assets/img/small-logos/sendcolorido.jpg')}}" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @if(isset($noti) && $noti->count())
                                @foreach ($noti as $n)
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{asset('assets/img/small-logos/campana6.png')}}" class="avatar avatar-sm me-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">{{$n->mensaje}} </span><br>
                                                    <!--USO DE CARBON EN LARAVEL EN VES DE @PHP-->
                                                    <span>La fecha de cierre es el {{ \Carbon\Carbon::parse($n->hora)->format('j F') }}</span>
                                                    <span>
                                                        Faltan {{ floor(\Carbon\Carbon::parse($n->hora)->diffInDays(\Carbon\Carbon::now())) }} días
                                                    </span>
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    {{ $n->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @else
                                <li class="mb-2 text-center">
                                    <span class="text-sm text-secondary">No hay notificaciones</span>
                                </li>
                                @endif

                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{asset('assets/img/small-logos/cinco.jpg')}}" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Gotobuen No Hanayome
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield("contenido")
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Argon Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="d-flex my-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
                <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('click', function(e) {
            let input = document.getElementById("buscador");
            let contenedor = document.getElementById('sugerencias')
            contenedor.style.display = 'none';


        });
        // Esta función simula la búsqueda de sugerencias en el backend (puedes adaptarlo para hacerlo dinámico desde el servidor)
        async function obtenerSugerencias() {
            try {
                const response = await fetch(`/sugerencias`);
                if (!response.ok) throw new Error("Error al obtener sugerencias");
                const sugerencias = await response.json();
                return sugerencias; // Retorna el listado completo de sugerencias
            } catch (error) {
                console.error("Error al obtener las sugerencias", error);
            }
        }

        async function buscarSugerencias(query) {
            // Obtiene todas las sugerencias al cargar (puedes mejorar para obtener solo la primera vez)
            const sugerencias = await obtenerSugerencias();

            // Filtra sugerencias en base al input
            if (query.length > 0) {
                const sugerenciasFiltradas = sugerencias.filter(sugerencia =>
                    sugerencia.toLowerCase().includes(query.toLowerCase())
                );

                mostrarSugerencias(sugerenciasFiltradas);
            } else {
                document.getElementById("sugerencias").innerHTML = "";
            }
        }

        function mostrarSugerencias(sugerencias) {
            const sugerenciasDiv = document.getElementById("sugerencias");
            sugerenciasDiv.innerHTML = "";

            if (sugerencias.length === 0) {
                sugerenciasDiv.style.display = 'none';
                return;
            }

            sugerenciasDiv.style.display = 'block';

            sugerencias.forEach(sugerencia => {
                const div = document.createElement("div");
                div.className = "sugerencia";
                div.innerText = sugerencia;

                div.onclick = function() {
                    document.getElementById("buscador").value = sugerencia;
                    window.location.href = `/${sugerencia}`;
                    sugerenciasDiv.innerHTML = "";
                };

                sugerenciasDiv.appendChild(div);
            });
        }
    </script>

    <script>
        function buscar() {
            // Obtiene el valor ingresado en el campo de búsqueda
            var query = document.getElementById("buscador").value;

            // Si hay un valor, redirige a la página de resultados con la query
            if (query) {
                window.location.href = "/admin?query=" + query;
            }
        }
        $(document).ready(function() {
            $('#buscador').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: "{{ route('admin.index') }}", // Ruta que manejará la búsqueda
                    type: "GET",
                    data: {
                        'query': query
                    },
                    success: function(data) {
                        $('#resultados').html(data); // Actualiza el div con los resultados
                    }
                });
            });
        });



        //let varejemplo = document.getElementById();
        let palanca = true;
        let btn_lef = document.querySelector(".fa-chevron-right");
        let btn_tabla = document.querySelector(".btn-tabla");
        let rutas = document.querySelector(".misrutas");
        btn_tabla.addEventListener('click', function(e) {
            e.preventDefault();

            if (palanca) {
                rutas.style.display = 'block';
                btn_lef.style.rotate = "90deg";
                palanca = false
            } else {
                rutas.style.display = 'none';
                btn_lef.style.rotate = "0deg";
                palanca = true
            }
        });

        let jala = true;
        let btn_gerramientas = document.querySelector(".btn_herramientas");
        let btn = document.querySelector(".btnmover");
        let herramientoas = document.getElementById("herramientas");
        let mostrarHerramientas = document.getElementById("misherra")
        btn_gerramientas.addEventListener('click', function(e) {
            e.preventDefault();
            if (jala) {
                mostrarHerramientas.style.display = "block";
                btn.style.rotate = "90deg";
                jala = false
            } else {
                mostrarHerramientas.style.display = "none"
                btn.style.rotate = "0deg";
                jala = true
            }
        });
    </script>


    <!-- ESTE SCRIPT ES EL PRINCIPAL
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Nov", "Dic"],
                datasets: [{
                    label: "ventas",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>_ -->
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>
