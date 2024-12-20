<?php

namespace App\Http\Controllers;

use App\Models\contacto;
use App\Models\historias;
use App\Models\noti_sis;
use App\Models\oportunidad;
use App\Models\prediccion;
use App\Models\usuarios;
use App\Models\VentaHistorica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $contadorh = historias::select(DB::raw('COUNT(*) as cantidad'))
            ->get();
        $historias = historias::all();
        $Canalhistoria = historias::select('canal_contacto', 'estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('canal_contacto', 'estado_oportunidad')
            ->get();
        $ventashistoria = historias::all();


        //$sectores1 =  $ventasPorSectorEstado->pluck('sector_cliente')->unique();
        // $estados1 =  $ventasPorSectorEstado->pluck('estado_oportunidad')->unique();

        // Ejemplo de datos obtenidos del modelo
        //$oportunidades = oportunidad::with('cliente', 'vendedor')->get();
        $oportunidades = prediccion::all();
        //porcentaje ganado 
        $oportunidades_ganadas = $oportunidades->where('estado_predicho', '>=', 50)->count();
        $total_oportunidades = $oportunidades->count();
        $porcentaje_ganadas = $total_oportunidades > 0 ? round(($oportunidades_ganadas / $total_oportunidades) * 100) : 0;
        //porcentaje perdido
        $oportunidades_perdidas = $oportunidades->where('estado_predicho', '<', 50)->count();
        $total_oportunidades = $oportunidades->count();
        $porcentaje_perdido = $total_oportunidades > 0 ? round(($oportunidades_perdidas / $total_oportunidades) * 100, 2) : 0;
        // Insights simples
        $condicion = $oportunidades->where('estado_predicho') == "50" ? "ganado" : "perdido";
        $insights = [
            'total_oportunidades' => $oportunidades->count(), //total de oportunidadess
            'oportunidades_ganadas' => $oportunidades->where('estado_predicho', '>=', 50)->count(),
            'oportunidades_perdidas' => $oportunidades->where('estado_predicho', '<', 50)->count(),
            'promedio_monto' => $oportunidades->avg('monto_oportunidad'),
            'porcentaje_ganadas' => $porcentaje_ganadas,
            'porcentaje_perdido' => $porcentaje_perdido,
            'sectores_mas_exitosos' => $oportunidades->groupBy('sector_cliente')
                ->map(fn($sector) => [ //ponemos para que recorra todo en un array
                    'sector' => $sector->first()->sector_cliente, //el nombre del sector
                    'exitosas' => $sector->where('estado_predicho', '>=', 50)->count() //el conteo 
                ])
                ->sortByDesc('exitosas')
                ->take(3)
                ->values(),
            'canal_mas_exitoso' => $oportunidades->groupBy('canal_contacto')
                ->map(fn($canal) => [
                    'canal' => $canal->first()->canal_contacto,
                    'exitoso' => $canal->where('estado_predicho', '>=', 50)->count()
                ])
                ->sortByDesc('exitoso')
                ->take(1) //solo dame un valor
                ->first()

        ];


        // Retornar insights a la vista
        $noti = noti_sis::all();
        $ventasPorRegion = VentaHistorica::select('region_cliente', DB::raw('SUM(monto_oportunidad) as total'))
            ->groupBy('region_cliente')
            ->get();
        $regiones = $ventasPorRegion->pluck('region_cliente');
        $ventasPorRegion = $ventasPorRegion->pluck('total');
        //ventasPorCanalEstado();
        $ventasPorCanalEstado = VentaHistorica::select('canal_contacto', 'estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('canal_contacto', 'estado_oportunidad')
            ->get();
        //--------------------
        $ventaRegional = VentaHistorica::select('region_cliente', 'estado_oportunidad', DB::raw('COUNT(*) as Cantidad'))
            ->groupBy('region_cliente', 'estado_oportunidad')
            ->get();
        //--------------

        $ventasHistoricas = VentaHistorica::all();
        $clientes = contacto::count();
        $ventasConteo = prediccion::select(DB::raw('SUM(monto_oportunidad) as Conteo'))->get();
        $ventas222 = DB::table('prediccions')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS mes"), DB::raw("SUM(monto_oportunidad) AS ventas_totales"))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        $oportunidadesh = oportunidad::select('id', 'estado')->get();
        return view("layout.dashboard", compact('clientes', 'ventasHistoricas', 'ventasPorCanalEstado', 'ventasPorRegion', 'insights', 'noti', 'historias', 'contadorh', 'Canalhistoria', 'ventashistoria', "ventas222", 'ventaRegional', 'oportunidadesh', 'ventasConteo'));
    }
    public function VentasMensuales()
    {
        $ventas222 = DB::table('prediccions')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS mes"), DB::raw("SUM(monto_oportunidad) AS ventas_totales"))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        $ventaRegional = VentaHistorica::select('region_cliente', 'estado_oportunidad', DB::raw('COUNT(*) as Cantidad'))
            ->groupBy('region_cliente', 'estado_oportunidad')
            ->get();
        $ventasHistoricas = VentaHistorica::all();
        return view('datoshistoricos.line', compact('ventas222', 'ventaRegional', 'ventasHistoricas'));
    }

    public function datoslogin(Request $request)
    {
        $ventasConteo = prediccion::select(DB::raw('SUM(monto_oportunidad) as Conteo'))->get();
        $oportunidadesh = oportunidad::select('id', 'estado')->get();
        $ventas222 = DB::table('prediccions')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS mes"), DB::raw("SUM(monto_oportunidad) AS ventas_totales"))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        $contadorh = historias::select(DB::raw('COUNT(*) as cantidad'))
            ->get();
        $ventaRegional = VentaHistorica::select('region_cliente', 'estado_oportunidad', DB::raw('COUNT(*) as Cantidad'))
            ->groupBy('region_cliente', 'estado_oportunidad')
            ->get();
        $historias = historias::all();
        $Canalhistoria = historias::select('canal_contacto', 'estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('canal_contacto', 'estado_oportunidad')
            ->get();
        $ventashistoria = historias::all();
        $noti = noti_sis::all();
        $oportunidades = prediccion::all();
        $oportunidades_ganadas = $oportunidades->where('estado_predicho', '>=', 50)->count();
        $total_oportunidades = $oportunidades->count();
        $porcentaje_ganadas = $total_oportunidades > 0 ? round(($oportunidades_ganadas / $total_oportunidades) * 100, 2) : 0;


        //$oportunidades = oportunidad::with('cliente', 'vendedor')->get();
        $oportunidades = prediccion::all();
        $oportunidades_ganadas = $oportunidades->where('estado_predicho', '>=', 50)->count();
        $total_oportunidades = $oportunidades->count();
        $porcentaje_ganadas = $total_oportunidades > 0 ? round(($oportunidades_ganadas / $total_oportunidades) * 100, 2) : 0;
        //porcentaje perdido
        $oportunidades_perdidas = $oportunidades->where('estado_predicho', '<', 50)->count();
        $total_oportunidades = $oportunidades->count();
        $porcentaje_perdido = $total_oportunidades > 0 ? round(($oportunidades_perdidas / $total_oportunidades) * 100, 2) : 0;
        // Insights simples
        $condicion = $oportunidades->where('estado_predicho') == "50" ? "ganado" : "perdido";
        $insights = [
            'total_oportunidades' => $oportunidades->count(), //total de oportunidadess
            'oportunidades_ganadas' => $oportunidades->where('estado_predicho', '>=', 50)->count(),
            'oportunidades_perdidas' => $oportunidades->where('estado_predicho', '<', 50)->count(),
            'promedio_monto' => $oportunidades->avg('monto_oportunidad'),
            'porcentaje_ganadas' => $porcentaje_ganadas,
            'porcentaje_perdido' => $porcentaje_perdido,
            'sectores_mas_exitosos' => $oportunidades->groupBy('sector_cliente')
                ->map(fn($sector) => [ //ponemos para que recorra todo en un array
                    'sector' => $sector->first()->sector_cliente, //el nombre del sector
                    'exitosas' => $sector->where('estado_predicho', '>=', 50)->count() //el conteo 
                ])
                ->sortByDesc('exitosas')
                ->take(3)
                ->values(),
            'canal_mas_exitoso' => $oportunidades->groupBy('canal_contacto')
                ->map(fn($canal) => [
                    'canal' => $canal->first()->canal_contacto,
                    'exitoso' => $canal->where('estado_predicho', '>=', 50)->count()
                ])
                ->sortByDesc('exitoso')
                ->take(1)
                ->first()
        ];
        $ventasPorRegion = VentaHistorica::select('region_cliente', DB::raw('SUM(monto_oportunidad) as total'))
            ->groupBy('region_cliente')
            ->get();
        $regiones = $ventasPorRegion->pluck('region_cliente');
        $ventasPorRegion = $ventasPorRegion->pluck('total');
        //ventasPorCanalEstado();
        $ventasPorCanalEstado = VentaHistorica::select('canal_contacto', 'estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('canal_contacto', 'estado_oportunidad')
            ->get();
        $ventasHistoricas = VentaHistorica::all();
        $usuario = usuarios::where('correo', $request->correo)->first();
        $clientes = contacto::count();

        if ($usuario && $usuario->contrasenna === $request->pass) { //$usuario->contrasenna)) {
            // Redirige al dashboard si la autenticación es exitosa
            session(['usuario' => $usuario]);

            //$notificaciones = $usuario->notificaciones()->where('leida', false)->get();
            return view('layout.dashboard', compact('usuario', 'ventasConteo', 'oportunidadesh', 'ventasHistoricas', 'ventasPorCanalEstado', 'ventasPorRegion', 'clientes', 'insights', 'noti', 'historias', 'Canalhistoria', 'ventashistoria', 'ventas222', 'ventaRegional'));
            //return view('layout.app', compact('usuario'));
        } else {
            // Redirige a la página de login con un mensaje de error
            return view('usuarios.login');
        }
    }



    public function appnoti()
    {
        $noti = noti_sis::all();
        return view('layout.app', compact('noti'));
    }












    public function VentasTotales()
    {
        //ventasPorRegion();

        $ventasPorRegion = VentaHistorica::select('region_cliente', DB::raw('SUM(monto_oportunidad) as total'))
            ->groupBy('region_cliente')
            ->get();
        $regiones = $ventasPorRegion->pluck('region_cliente');
        $ventasPorRegion = $ventasPorRegion->pluck('total');
        //ventasPorCanalEstado();
        $ventasPorCanalEstado = VentaHistorica::select('canal_contacto', 'estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('canal_contacto', 'estado_oportunidad')
            ->get();
        $ventasHistoricas = VentaHistorica::all();
        return view('datoshistoricos.dasboar_principal', compact('ventasHistoricas', 'ventasPorCanalEstado', 'ventasPorRegion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
