<?php

namespace App\Http\Controllers;

use App\Models\campañas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class campanna_recurso extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campañas = campañas::all();
        return view('campañas.index', compact('campañas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consulta = DB::table('admins')->get();
        return view('campañas.create', compact('consulta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_camp = new campañas;
        $new_camp->nombre = $request->nombre;
        $new_camp->fechainicio = $request->inicio;
        $new_camp->fechafin = $request->fin;
        $new_camp->estado = $request->estado;
        $new_camp->admin_id = $request->admin;
        $new_camp->save();
        return redirect()->route('campannas.index');
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
    public function edit(campañas $campana)
    {
        return view('campañas.edit', compact('campana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, campañas $campana)
    {
        $campana->nombre = $request->nombre;
        $campana->fechainicio = $request->inicio;
        $campana->fechafin = $request->fin;
        $campana->estado = $request->estado;
        $campana->admin_id = $request->admin;
        $campana->save();
        return redirect()->route('campannas.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function avisoDelet($id)
    {
        $campana_e = campañas::findOrFail($id);
        return view('campañas.delete', compact('campana_e'));
    }
    public function destroy($id)
    {
        // DB::table('oportunidads')->where('producto_id', $id)->delete();
        $campana_e = campañas::findOrfail($id);
        $campana_e->delete();
        return redirect()->route('campannas.index');
    }
}
