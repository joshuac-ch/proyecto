<?php

namespace App\Http\Controllers;

use App\Models\oportunidad as ModelsOportunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class oportunidad extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oportunidades_tabla = ModelsOportunidad::all();
        return view('oportunidades.index', ["oportunidades" => $oportunidades_tabla]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consulta = DB::table('usuarios')
            ->join('admins', 'usuarios.id', '=', 'admins.user_id')
            ->where('admins.rol', 'ventas')
            ->select('usuarios.id', 'usuarios.nombre', 'admins.rol')
            ->get();
        #VERIFICAR ESTA CONSULTA
        $consulta2 = DB::table('productos')
            ->join('vendedors', 'productos.id', '=', 'vendedors.id')

            ->select('vendedors.id', 'productos.nombre', 'productos.id')
            ->get();
        return view('oportunidades.create', ["vendedor" => $consulta, "producto" => $consulta2]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_oportunidad = new ModelsOportunidad;
        $new_oportunidad->descipcion = $request->des;
        $new_oportunidad->estado = $request->est;
        $new_oportunidad->fecha = "2024-09-04";
        $new_oportunidad->vendedor_id = $request->vendedor_id;
        $new_oportunidad->producto_id = $request->producto_id;
        $new_oportunidad->save();
        return redirect()->route('oportunidades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $opo1 = ModelsOportunidad::findOrFail($id);
        return view('oportunidades.show', compact("opo1"));
    }

    /**
     * DEBEN SER IGUALES AQUI EN SHOW Y EDIT PARA MOSTRARLO
     */
    public function edit(ModelsOportunidad $oportunidade)
    {

        return view('oportunidades.edit', compact("oportunidade"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsOportunidad $oportunidade)
    {

        $oportunidade->descipcion = $request->des;
        $oportunidade->estado = $request->est;
        $oportunidade->vendedor_id = $request->vendedor_id;
        $oportunidade->producto_id = $request->producto_id;
        $oportunidade->save();
        return redirect()->route('opo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
