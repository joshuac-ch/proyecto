<?php

namespace App\Http\Controllers;

use App\Models\historias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class historiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sectorOportunidades()
    {
        $contadorh = historias::select(DB::raw('COUNT(*) as cantidad'))
            ->get();
        $historias = historias::all();
        //$sectores1 =  $ventasPorSectorEstado->pluck('sector_cliente')->unique();
        // $estados1 =  $ventasPorSectorEstado->pluck('estado_oportunidad')->unique();
        return view('historia.actividades', compact('historias', 'contadorh'));
    }
    public function ventasPorCanalEstado()
    {
        $Canalhistoria = historias::select('canal_contacto', 'estado_oportunidad', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('canal_contacto', 'estado_oportunidad')
            ->get();
        $ventashistoria = historias::all();

        return view('historia.canales', compact('Canalhistoria', 'ventashistoria'));
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
