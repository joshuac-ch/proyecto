<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Models\VentaHistorica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class datosHistoricosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ventasGanadasPorMes()
    {
        //Ventas ganadas por mes:
        $ventasGanadas = VentaHistorica::where('estado_oportunidad', 'Ganado')
            ->selectRaw('MONTH(created_at) as mes, SUM(monto_oportunidad) as total')
            ->groupBy('mes')
            ->get();
        // Preparar los datos para el gráfico
        $meses = $ventasGanadas->pluck('mes'); // Meses
        $totales = $ventasGanadas->pluck('total'); // Totales de ventas

        //return view('analisis.ventas_ganadas', compact('ventasGanadas'));
        return view('datoshistoricos.index', compact('meses', 'totales'));
    }
    public function Promedio()
    {
        // Calcular el promedio del monto de oportunidad
        $promedioMonto = VentaHistorica::avg('monto_oportunidad');

        // Pasar el resultado a la vista
        return view('datoshistoricos.promedio', compact('promedioMonto'));
    }
    public function sectorOportunidades()
    {
        $contador = VentaHistorica::select(DB::raw('COUNT(*) as cantidad'))
            ->get();
        $ventasHistoricas = VentaHistorica::all();
        //$sectores1 =  $ventasPorSectorEstado->pluck('sector_cliente')->unique();
        // $estados1 =  $ventasPorSectorEstado->pluck('estado_oportunidad')->unique();
        return view('datoshistoricos.actividadesOportunidades', compact('ventasHistoricas', 'contador'));
    }
    public function ventasPorCanalEstado()
    {
        $ventasPorCanalEstado = VentaHistorica::select('canal_contacto', 'estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('canal_contacto', 'estado_oportunidad')
            ->get();
        $ventasHistoricas = VentaHistorica::all();

        return view('datoshistoricos.canaloportunidades', compact('ventasPorCanalEstado', 'ventasHistoricas'));
    }
    public function ventasPorRegion()
    {
        // Obtener las ventas agrupadas por región
        $ventasPorRegion = VentaHistorica::select('region_cliente', DB::raw('SUM(monto_oportunidad) as total'))
            ->groupBy('region_cliente')
            ->get();
        $regiones = $ventasPorRegion->pluck('region_cliente');
        $ventasPorRegion = $ventasPorRegion->pluck('total');

        // Pasar el resultado a la vista
        return view('datoshistoricos.ventasregion', compact('ventasPorRegion', 'regiones'));
    }
    public function datoslogin(Request $request)
    {

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

        if ($usuario && $usuario->contrasenna === $request->pass) { //$usuario->contrasenna)) {
            // Redirige al dashboard si la autenticación es exitosa
            session(['usuario' => $usuario]);
            return view('datoshistoricos.dasboar_principal', compact('usuario', 'ventasHistoricas', 'ventasPorCanalEstado', 'ventasPorRegion'));
            //return view('layout.app', compact('usuario'));
        } else {
            // Redirige a la página de login con un mensaje de error
            return view('usuarios.login');
        }
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

    public function pvsg()
    {
        // Obtener el conteo de ventas por estado
        $ventasPorEstado = VentaHistorica::select('estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('estado_oportunidad')
            ->get();
        $estados = $ventasPorEstado->pluck('estado_oportunidad');
        $cantidadVentasPorEstado = $ventasPorEstado->pluck('cantidad');
        // Pasar el resultado a la vista
        return view('datoshistoricos.psg', compact('estados', 'cantidadVentasPorEstado'));
    }
    public function index()
    {
        return view('datoshistoricos.index');
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
