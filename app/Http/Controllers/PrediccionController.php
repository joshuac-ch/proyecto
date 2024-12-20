<?php

namespace App\Http\Controllers;

use App\Jobs\datoshistoricos;
use App\Jobs\GeneratePrediction;
use App\Models\actividades;
use App\Models\oportunidad;
use App\Models\prediccion;
use App\Models\VentaHistorica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PrediccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarPredicciones()
    {
        // Leer el archivo JSON
        $predi_table = prediccion::all();
        $json = Storage::get('predicciones.json');

        // Decodificar el JSON
        $datos = json_decode($json, true);
        //dd($datos); //es para mostrar si agarra los datos
        // Retornar los datos como JSON o en una vista
        return view('predicciones', compact('datos', 'predi_table')); // Asegúrate de que estás pasando $datos a la vista
    }
    //Esto ofalta arreglar 
    public function predecirOportunidad(Request $request)
    {
        // Validar los datos del cliente
        $validatedData = $request->validate([
            'monto_oportunidad' => 'required|numeric',
            'tiempo_oportunidad_dias' => 'required|numeric',
            'numero_interacciones' => 'required|numeric',
            'sector_cliente' => 'required|string',
            'productos_ofrecidos' => 'required|string',
            'region_cliente' => 'required|string',
            'canal_contacto' => 'required|string',
            'interacciones_previas' => 'required|numeric',
            'presupuesto_cliente' => 'required|numeric',
        ]);

        // URL del servicio Flask
        $flaskUrl = 'http://127.0.0.1:5000/alerta_venta';  // Cambia esta URL si Flask está en otro servidor

        // Enviar la solicitud al servicio Flask
        $response = Http::post($flaskUrl, $validatedData);

        // Comprobar si la solicitud fue exitosa
        if ($response->successful()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json(['error' => 'Error en el servicio de predicción'], 500);
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opt = [
            "Agua y Saneamiento",
            "Alimentos",
            "Automotriz",
            "Comercio",
            "Educación",
            "Entretenimiento",
            "Finanzas",
            "Hotelería",
            "Industria",
            "Retail",
            "Salud",
            "Servicios",
            "Tecnología",
            "Telecomunicaciones",
            "Textil",
            "Transporte",
            "Turismo"
        ];
        $region = [
            "Amazonas",
            "Apurímac",
            "Arequipa",
            "Ayacucho",
            "Callao",
            "Chiclayo",
            "Cusco",
            "Huancavelica",
            "Huánuco",
            "Ica",
            "Junín",
            "Lima",
            "Madre de Dios",
            "Moquegua",
            "Pasco",
            "Piura",
            "Piura",
            "San Martín",
            "Tacna",
            "Trujillo",
            "Tumbes",
            "Ucayali",
            "Lambayeque"
        ];
        $social = ["Email", "Llamada", "Redes Sociales", "Teléfono"];
        return view('predicciones.create', compact('opt', "region", "social"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validar los datos del formulario
        $data = $request->validate([
            'monto_oportunidad' => 'required|numeric',
            'tiempo_oportunidad_dias' => 'required|numeric',
            'numero_interacciones' => 'required|numeric',
            'sector_cliente' => 'required|string',
            'productos_ofrecidos' => 'required|string',
            'region_cliente' => 'required|string',
            'canal_contacto' => 'required|string',
            'interacciones_previas' => 'required|numeric',
            'presupuesto_cliente' => 'required|numeric',
        ]);
        // Convertir a tipos numéricos si es necesario
        $data['monto_oportunidad'] = floatval($data['monto_oportunidad']);
        $data['tiempo_oportunidad_dias'] = intval($data['tiempo_oportunidad_dias']);
        $data['numero_interacciones'] = intval($data['numero_interacciones']);
        $data['productos_ofrecidos'] = intval($data['productos_ofrecidos']);
        $data['interacciones_previas'] = intval($data['interacciones_previas']);
        $data['presupuesto_cliente'] = floatval($data['presupuesto_cliente']);
        // Guardar datos en JSON para enviar al script Python
        Storage::put('entrada_prediccion.json', json_encode($data, JSON_PRETTY_PRINT));
        // Ejecutar el script de Python
        GeneratePrediction::dispatch($data);
        // Asegúrate de tener la ruta correcta a tu script de Python
        //$command = 'Python C:\www\Apache24\htdocs\c403laravel\storage\app\generar_predicciones.py';
        //$output = shell_exec($command);

        // Opcional: captura el código de salida
        //$returnVar = null;
        //exec($command, $output, $returnVar);



        if (Storage::exists('entrada_prediccion.json')) {
            $predicciones = json_decode(Storage::get('predicciones.json'), true);
            $ultima_prediccion = end($predicciones);


            //if (Storage::exists('predicciones.json')) {
            //   $predicciones = json_decode(Storage::get('predicciones.json'), true);
            //  $ultima_prediccion = end($predicciones);

            // Almacenar el resultado en la base de datos
            $prediccion = new \App\Models\Prediccion();
            $prediccion->monto_oportunidad = $data['monto_oportunidad'];
            $prediccion->tiempo_oportunidad_dias = $data['tiempo_oportunidad_dias'];
            $prediccion->numero_interacciones = $data['numero_interacciones'];
            $prediccion->sector_cliente = $data['sector_cliente'];
            $prediccion->productos_ofrecidos = $data['productos_ofrecidos'];
            $prediccion->region_cliente = $data['region_cliente'];
            $prediccion->canal_contacto = $data['canal_contacto'];
            $prediccion->interacciones_previas = $data['interacciones_previas'];
            $prediccion->presupuesto_cliente = $data['presupuesto_cliente'];
            $prediccion->estado_predicho = $ultima_prediccion['probabilidad_exito']; // Almacena la predicción
            //$prediccion->estado_predicho = $ultima_prediccion['prediccion']; // Almacena la predicción
            //areglar el id del modelo
            // Guardar la nueva oportunidad en la base de datos

            $fecha = date("Y-m-d");
            actividades::registrar(session('usuario')->id, 'Crear', 'Prediccion', $prediccion->id, "Se realizo una prediccion de oportunidad para $prediccion->sector_cliente", $fecha);
            $prediccion->save();
            //datoshistoricos::dispatch($data);
            $estadoPredicho = ($prediccion->estado_predicho >= 50) ? 1 : 0;  // Devuelve 1 si la predicción es alta, 0 si es baja
            $estadoValor = ($estadoPredicho == 1 ? "Ganado" : "Perdido");

            VentaHistorica::registrarGrafico(
                $prediccion->monto_oportunidad,
                $prediccion->tiempo_oportunidad_dias,
                $prediccion->numero_interacciones,
                $prediccion->sector_cliente,
                $prediccion->productos_ofrecidos,
                $prediccion->region_cliente,
                $estadoValor, //$prediccion->estado_predicho,
                $prediccion->canal_contacto,
                $prediccion->interacciones_previas,
                $prediccion->presupuesto_cliente
            );
            return redirect()->back()->with('status', 'Predicción generada y almacenada correctamente.');
        } else {
            return redirect()->back()->withErrors(['error' => 'No se pudo encontrar el archivo de predicciones.']);
        }
    }
    public function generarInsights(Request $request)
    {
        // Ejemplo de datos obtenidos del modelo
        //$oportunidades = oportunidad::with('cliente', 'vendedor')->get();
        $oportunidades = prediccion::all();

        // Determina los estados según el porcentaje
        $insights = [
            'total_oportunidades' => $oportunidades->count(),
            'oportunidades_ganadas' => $oportunidades->where('estado_predicho', '>=', 50)->count(),
            'oportunidades_perdidas' => $oportunidades->where('estado_predicho', '<', 50)->count(),
            'porcentaje_ganadas' => $oportunidades->count() > 0
                ? round(($oportunidades->where('estado_predicho', '>=', 50)->count() / $oportunidades->count()) * 100, 2)
                : 0,
        ];

        // Retornar insights a la vista
        return view('predicciones.in', compact('insights'));
    }

    public function store1(Request $request)
    {
        $predi = new prediccion();
        $predi->monto_oportunidad = $request->monto;
        $predi->tiempo_oportunidad_dias = $request->tiempo;
        $predi->numero_interacciones = $request->inte;
        $predi->sector_cliente = $request->sector;
        $predi->productos_ofrecidos = $request->productos;
        $predi->region_cliente = $request->region;
        $predi->canal_contacto = $request->contacto;
        $predi->interacciones_previas = $request->previas;
        $predi->presupuesto_cliente = $request->presu;
        $predi->save();
        return redirect()->route('mostrar.predicciones');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
