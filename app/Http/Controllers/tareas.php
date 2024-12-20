<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\contacto;
use App\Models\tareas as ModelsTareas;
use App\Models\usuarios;
use Illuminate\Http\Request;

class tareas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function obtenerTareas()
    {
        $tareas = ModelsTareas::all();
        return $tareas;
    }
    public function index()
    {
        $t_tareas =  ModelsTareas::with(['contacto', 'propietario'])->get();
        // $t_tareas = ModelsTareas::with('usuario')->get();
        return view('tareas.index', compact('t_tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contactos = contacto::all();
        $propietarios = usuarios::all();
        return view('tareas.create', compact('contactos', 'propietarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_tarea = new ModelsTareas;
        $new_tarea->nombre = $request->nom;
        $new_tarea->prioridad = $request->pri;
        $new_tarea->asociado_contacto = $request->con;
        $new_tarea->asociado_propietario = $request->propi;
        $new_tarea->fecha_vencimiento = $request->fecha;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Crear', 'Tarea', $new_tarea->id, "Se creo una nueva Tarea $new_tarea->nombre prioridad: $new_tarea->prioridad", $fecha);

        $new_tarea->save();
        //return redirect()->route('tareas.index');
        return redirect()->back();
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
    public function edit(ModelsTareas $tarea)
    {
        $contactos = contacto::all();
        $propietarios = usuarios::all();
        return view('tareas.edit', compact('tarea', 'contactos', 'propietarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsTareas $tarea)
    {
        $tarea->nombre = $request->nom;
        $tarea->prioridad = $request->pri;
        $tarea->asociado_contacto = $request->con;
        $tarea->asociado_propietario = $request->propi;
        $tarea->fecha_vencimiento = $request->fecha;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Editar', 'Tarea', $tarea->id, "Se edito una Tarea $tarea->nombre prioridad: $tarea->prioridad", $fecha);

        $tarea->save();
        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function AdvEliminar($tarea)
    {
        $tarea_e = ModelsTareas::findOrFail($tarea);
        return view('tareas.delete', compact('tarea_e'));
    }
    public function destroy($tarea)
    {
        $eliminar = ModelsTareas::findOrFail($tarea);
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Eliminar', 'Tarea', $eliminar->id, "Se elimino una  Tarea $eliminar->nombre prioridad: $eliminar->prioridad", $fecha);

        $eliminar->delete();
        return redirect()->route('tarea.index');
    }
}
