@extends('layout.app')
@section('contenido')
<style>
    .prediccion {
        max-width: 500px;
    }

    .explicacion {
        display: flex;
        flex-direction: column;
    }

    .dultima-prediccion {
        border: 2px solid black;
        box-shadow: 0px 0px 15px 1px black;
        max-width: 500px;
        margin: 20px 10px 20px 0px;
        padding: 10px;
        border-radius: 10px;
    }

    #prediccion-texto {
        border: 2px solid whitesmoke;
        border-radius: 10px;
        box-shadow: 0px 0px 6px 1px black;
        padding: 20px;
        margin: 10px;
        max-width: 1500px;
    }
</style>
<div class="conteiner">
    <h1>Predicciones de Venta</h1>
    <div class="btn">
        <a href="{{route('prediccion.create')}}">Crear Prediccion</a>
    </div>
    <button type="button" class="btn btn-primary plantilla" data-bs-toggle="modal" data-bs-target="#cotizacion">
        Lista de Predicciones
    </button>

    <!-- Modal -->
    <div class="modal fade" id="cotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Predicciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">MONTO</th>
                                <th scope="col">TIEMPO</th>
                                <th scope="col">NUMERO DE INTERACCIONES</th>
                                <th scope="col">SECTOR</th>
                                <th scope="col">PRODUCTOS</th>
                                <th scope="col">REGION CLIENTE</th>
                                <th scope="col">CANAL CONTACTO</th>
                                <th scope="col">INTERACCIONES PREVIAS</th>
                                <th scope="col">PRESUPUESTO CLIENTE</th>
                                <th scope="col">PREDICCION</th>
                                <th scope="col">CREADO</th>
                                <th scope="col">EDITAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($predi_table as $pe)
                            <tr>
                                <th scope="row">{{$pe->id}}</th>
                                <td>{{$pe->monto_oportunidad}}</td>
                                <td>{{$pe->tiempo_oportunidad_dias}}</td>
                                <td>{{$pe->numero_interacciones}}</td>
                                <td>{{$pe->sector_cliente}}</td>
                                <td>{{$pe->productos_ofrecidos}}</td>
                                <td>{{$pe->region_cliente}}</td>
                                <td>{{$pe->canal_contacto}}</td>
                                <td>{{$pe->interacciones_previas}}</td>
                                <td>{{$pe->presupuesto_cliente}}</td>
                                <td>{{$pe->estado_predicho}}</td>
                                <td>{{$pe->created_at}}</td>

                                <td>
                                    <a href=""><i class='bx bx-edit-alt'></i></a>
                                    <a href=""><i class="fa-solid fa-eye"></i></a>
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

    <div class="ultima-prediccion">
        @foreach ($predi_table as $index => $p)
        @if ($loop->last) <!-- Verifica si es el último elemento del bucle -->
        <h4>Última predicción realizada: {{ $p->id }} en el sector {{$p->sector_cliente}}</h4>
        @endif
        @endforeach

        <ul id="predicciones-list">
            @if(!empty($datos))
            @foreach($datos as $item)
            <li>
                <div id="prediccion-texto"></div>
            </li>

            @endforeach
            @else
            <li>No hay datos disponibles.</li>
            @endif
        </ul>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

<script>
    const texto = `

                <div class="card-body">
                    <h3 class="mb-3" style="color: #2C3E50;">Información de la Oportunidad</h3>

                    <p class="mb-2">
                        <strong>Sector del Cliente:</strong>
                        <span style="color: #34495E;">{{ $item['sector_cliente'] }}</span>
                    </p>
                    <p class="mb-2">
                        <strong>Monto de la Oportunidad:</strong>
                        <span style="color: #27AE60;">{{ number_format($item['monto_oportunidad'], 2) }} soles</span>
                    </p>
                    <p class="mb-2">
                        <strong>Canal de Contacto:</strong>
                        <span style="color: #2980B9;">{{ ucfirst($item['canal_contacto']) }}</span>
                    </p>
                    <p class="mb-2">
                        <strong>Número de Interacciones:</strong>
                        {{ $item['numero_interacciones'] }}
                    </p>
                    <p class="mb-2">
                        <strong>Probabilidad de Éxito:</strong>
                        <span style="color: {{ $item['probabilidad_exito'] >= 50 ? '#27AE60' : '#C0392B' }};">
                            {{ round($item['probabilidad_exito']) }}%
                        </span>
                    </p>

                    <hr style="border-top: 1px solid #D1D5DB;">

                    <h5 class="mb-3" style="color: #2C3E50;">Explicación Detallada de la Predicción</h5>
                    <ul style="padding-left: 15px; color: #34495E;">
                        <li><strong>Monto de la oportunidad:</strong> Contribuyó en un <span style="color: #27AE60;">+15%</span> al éxito.</li>
                        <li><strong>Número de interacciones:</strong> Aumentó la probabilidad en un <span style="color: #27AE60;">+10%</span>.</li>
                        <li><strong>Canal de contacto:</strong> ({{ ucfirst($item['canal_contacto']) }}) Redujo la probabilidad en un <span style="color: #C0392B;">-5%</span>.</li>
                        <li><strong>Sector del cliente:</strong> ({{ ucfirst($item['sector_cliente']) }}) Impacto neutro en la predicción.</li>
                    </ul>

                    <hr style="border-top: 1px solid #D1D5DB;">

                    <h5 class="mb-3" style="color: #2C3E50;">Resultado de la Predicción</h5>
                    <p style="font-size: 1.1rem; font-weight: bold; color: {{ $item['probabilidad_exito'] >= 50 ? '#27AE60' : '#C0392B' }};">
                        {{ $item['probabilidad_exito'] >= 50 ? 'Ganado' : 'Perdido' }}
                    </p>
                </div>

    `
    const texto2 = `
        <div class="prediccion">

        Cliente en {{ $item['sector_cliente'] }} - Predicción: De acuerdo a la predicción de los datos del cliente {{ $item['sector_cliente'] }},
        el monto de esta oportunidad es de {{ $item['monto_oportunidad'] }} soles. Fue contactado por el canal {{ $item['canal_contacto'] }}
        con un número de interacciones {{ $item['numero_interacciones'] }}. Dado estos datos, la probabilidad sería de
        {{ round($item['probabilidad_exito']) }}%.

        <br>**Explicación detallada de la predicción:**<br>
        1. **Monto de la oportunidad** contribuyó en un +15% al éxito de la predicción.<br>
        2. **Número de interacciones** aumentó la probabilidad de éxito en un +10%.<br>
        3. **Canal de contacto** (correo electrónico) redujo la probabilidad en -5%.<br>
        4. **Sector del cliente** (Textil) tuvo un impacto neutro en la predicción.<br>
        Predicción: {{ $item['probabilidad_exito'] >= 50 ? 'Ganado' : 'Perdido' }}
        </div>
        `;

    const options = {
        strings: [texto],
        typeSpeed: 1, // Velocidad de escritura
        backSpeed: 0, // Sin retroceso
        showCursor: true, // Mostrar el cursor parpadeante
        cursorChar: "|", // Caracter del cursor
    };

    const typed = new Typed("#prediccion-texto", options);
</script>

@endsection
