<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\plantillas as ModelsPlantillas;
use Illuminate\Http\Request;

class plantillas extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //CUMPLE CON EL PRINCIPIO DE RESPONSABILIDAD UNICA
    public function obtenerPlantillas()
    {
        $plantillas = ModelsPlantillas::all();
        return $plantillas;
    }
    //-------------------------------------------------
    public function index()
    {
        $plantilla_Tabla = ModelsPlantillas::all();
        return view('plantillas.index', compact('plantilla_Tabla'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plantillas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contenido = nl2br($request->input('contenidoEmail')); // Convierte saltos de línea
        $new_plantilla = new ModelsPlantillas;
        $new_plantilla->nombre = $request->nombre;
        $new_plantilla->asunto = $request->asunto;
        $new_plantilla->Descripcion = $contenido; // $request->contenidoEmail;
        $new_plantilla->save();
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Crear', 'Plantilla', $new_plantilla->id, "Se creo una plantilla: $new_plantilla->nombre", $fecha);
        return redirect()->route('planti.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsPlantillas $plantilla)
    {
        return view('plantillas.show', compact('plantilla'));
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
