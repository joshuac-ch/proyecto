@extends('layout.app')
@section('contenido')
<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Mejor canal de contacto</p>
                <h5 class="font-weight-bolder">
                  {{ $insights['canal_mas_exitoso']['canal'] }} =>
                  {{ $insights['canal_mas_exitoso']['exitoso'] }} ganadas
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+55%</span>
                  desde ayer
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Oportunidades</p>
                <h5 class="font-weight-bolder">
                  {{ $insights['porcentaje_ganadas'] ?? 'N/A' }}% ganadas
                </h5>
                <p class="mb-0">
                  <span class="text-danger text-sm font-weight-bolder">-40%</span>
                  desde el ultimo mes
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Nuevos Clientes</p>
                <h5 class="font-weight-bolder">
                  +{{ $clientes }}

                </h5>
                <p class="mb-0">
                  <span class="text-danger text-sm font-weight-bolder">-2%</span>
                  desde el ultimo mes
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Ventas</p>
                <h5 class="font-weight-bolder">
                  {{$ventasConteo}}
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+5%</span> desde el ultimo año
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Resumen de ventas</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% mas</span> en 2023
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line2" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- 2 FORMAS PONER LOS CANALES DE CONTACTO, SECTORES EXITOSOS, MEJORES REGIONES-->
    <div class="col-lg-5">
      <div class="card card-carousel overflow-hidden h-100 p-0">
        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
          <div class="carousel-inner border-radius-lg h-100">
            <div class="carousel-item h-100 active" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');
      background-size: cover;">
              <!---->
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <h5 class="text-white mb-1">Canal de Contacto</h5>
                <div class="caja-2">
                  @include('datoshistoricos.canaloportunidades')
                </div>


              </div>
              <!---->
            </div>
            <div class="carousel-item h-100" style="background-image: url('{{asset('assets/img/carousel-2.jpg')}}');
      background-size: cover;">
              <!---->
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <h5 class="text-white mb-1">Canal de Regiones</h5>

                <div class="caja-2">
                  @include('datoshistoricos.sectoresmasexitosos')

                </div>


              </div>
              <!---->
            </div>
            <div class="carousel-item h-100" style="background-image: url('{{asset('assets/img/carousel-3.jpg')}}');
      background-size: cover;">
              <!---->
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-trophy text-dark opacity-10"></i>
                </div>
                <h5 class="text-white mb-1">Oportunidades de clientes</h5>
                <div class="caja-2">
                  @include('datoshistoricos.oportinidades')
                </div>
              </div>
              <!---->
            </div>
          </div>
          <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--
  <div class="card-body p-3">
    <div class="chart">
      <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
    </div>
  </div>
   -->


  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>

  <script>
    var ventas222 = @json($ventas222);
    var labels = ventas222.map(item => item.mes);
    var data = ventas222.map(item => item.ventas_totales);

    var ctx1 = document.getElementById("chart-line2").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Nov", "Dic"],
        datasets: [{
          label: "Ventas",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: data,
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
  <div class="row mt-4">
    <style>
      .dashboards {
        display: flex;

        align-items: start;
        justify-content: space-between;
        margin: 15px 0px;

        gap: 1rem;
      }

      .caja,
      .caja-2,
      .cajita {
        border: 2px solid white;
        background-color: white;
        padding: 20px;
        margin: 0px 5px;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 1px black;

      }
    </style>

    <div class="caja-3">
      <div class="container mt-5">
        <h2 class="text-center mb-4">Insights Generados por IA</h2>

        <div class="row">
          <!-- Total de Oportunidades -->
          <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
              <div class="card-body">
                <h5 class="card-title">Total de Oportunidades</h5>
                <p class="card-text">{{ $insights['total_oportunidades'] }}</p>
              </div>
            </div>
          </div>

          <!-- Oportunidades Ganadas -->
          <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
              <div class="card-body">
                <h5 class="card-title">Oportunidades Ganadas</h5>
                <p class="card-text">{{ $insights['oportunidades_ganadas'] }}</p>
              </div>
            </div>
          </div>
          <!-- Oportunidades Perdidas -->
          <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body">
                <h5 class="card-title">Oportunidades Perdidas</h5>
                <p class="card-text">{{ $insights['oportunidades_perdidas'] }}</p>
              </div>
            </div>
          </div>


        </div>

        <div class="row">

          <!-- Porcentaje de Oportunidades Ganadas -->
          <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
              <div class="card-body">
                <h5 class="card-title">Porcentaje Ganado</h5>
                <p>{{ $insights['porcentaje_ganadas'] ?? 'N/A' }}%</p>

              </div>
            </div>
          </div>


          <!-- Sectores exitosos -->

          <div class="col-md-4">
            <div class="card text-white bg-warning  mb-3">
              <div class="card-body">
                <h3>Top 3 Sectores Exitosos</h3>
                <ul>
                  @foreach ($insights["sectores_mas_exitosos"] as $s)
                  <li>{{$s["sector"]}} : {{$s["exitosas"]}} oportunidades ganadas</li>
                  @endforeach
                </ul>

              </div>
            </div>
          </div>

          <!-- Porcentaje de Oportunidades Perdidas -->
          <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
              <div class="card-body">
                <h5 class="card-title">Porcentaje Perdido</h5>
                <p>{{ $insights['porcentaje_perdido'] ?? 'N/A' }}%</p>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
    <!--RESUMEN DE INSIGTHS -->
    <div class="caja-4">

    </div>
    <h2>Ventas</h2>
    <div class="dashboards">
      <div class="caja">
        @include('datoshistoricos.actividadesOportunidades')

      </div>
      <div class="col-lg-4 cajita">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Categories</h6>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Devices</h6>
                    <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-tag text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                    <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-box-2 text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                    <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-satisfied text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                    <span class="text-xs font-weight-bold">+ 430</span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <h2>Ventas historicas</h2>
    <div class="dashboards">
      <div class="caja">
        @include('historia.actividades')

      </div>
      <div class="caja">
        @include('historia.canales')


      </div>

    </div>
    <!--
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Categories</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-mobile-button text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Devices</h6>
                  <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-tag text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                  <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-box-2 text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                  <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-satisfied text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                  <span class="text-xs font-weight-bold">+ 430</span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    -->
  </div>
  <footer class="footer pt-3  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            © <script>
              document.write(new Date().getFullYear())
            </script>,
            hecho por <a href="https://github.com/joshuac-ch" class="font-weight-bold" target="_blank">joshuaNK.dev</a>
            <i class="fa fa-heart"></i>
            para una mejor web.
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://github.com/joshuac-ch" class="nav-link text-muted" target="_blank">joshuaNK.dev</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/joshuac-ch" class="nav-link text-muted" target="_blank">Sobre Nosotros</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/joshuac-ch" class="nav-link text-muted" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/joshuac-ch" class="nav-link pe-0 text-muted" target="_blank">Licencia</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>

@endsection