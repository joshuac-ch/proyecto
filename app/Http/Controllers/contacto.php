<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\contacto as ModelsContacto;
use App\Models\documentos;
use App\Models\producto;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contacto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabla_contactos = ModelsContacto::all();
        return view('contactos.index', ["contactos" => $tabla_contactos]);
    }
    //-------------------------------SRP--------------------------------
    public function mostrarContactosConPlantillas()
    {
        $contactos = ModelsContacto::all();
        $plantillas = app(plantillas::class)->obtenerPlantillas();
        return view('contactos.create', compact('contactos', 'plantillas'));
    }
    public function mostrarTareasContacto()
    {
        $contactos = ModelsContacto::all();
        $tareas = app(tareas::class)->obtenerTareas();
        return view('contactos.create', compact('contactos', 'tarea'));
    }
    //-------------------------------SRP--------------------------------
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propietarios = DB::table('usuarios')->get();
        return view('contactos.create', compact("propietarios"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_contacto = new ModelsContacto;
        if ($request->hasFile("image1")) {
            $imagen = $request->file('image1');
            $nombreImagen = time() . "." . $imagen->getClientOriginalExtension();
            $imagen->move(public_path("perfiles"), $nombreImagen);
            $new_contacto->imagen = "perfiles/" . $nombreImagen;
        }

        //if ($request->hasFile("image1")) {
        //    $new_contacto->imagen = "perfiles/" . $nombreImagen;
        // }
        $new_contacto->nombre = $request->nom;
        $new_contacto->apellido = $request->app;
        $new_contacto->correo = $request->cor;
        $new_contacto->propietario_id = $request->propi;
        $new_contacto->telefono = $request->tel;
        $new_contacto->estado_lead = $request->est;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Crear', 'Contacto', $new_contacto->id, 'Se creo un nuevo contacto', $fecha);
        $new_contacto->save();
        return redirect()->route('contactos.index');
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        //$tabla_plantillas = DB::table('plantillas')->get();
        $tabla_plantillas = app(plantillas::class)->obtenerPlantillas();
        //$tabla_tareas = app(tareas::class)->obtenerTareas();
        $micontacto = ModelsContacto::findOrFail($id);
        $contactos = ModelsContacto::all();
        $propietarios = usuarios::all();
        $usuarios = usuarios::all();
        $docu = documentos::all();
        //productos
        $miproducto = producto::findOrFail($id);
        //$tarea = ModelsContacto::with('tareas')->findOrFail($id);
        return view('contactos.show', [
            'micontacto' => $micontacto,
            'tabla_plantillas' => $tabla_plantillas,
            //'tabla_tareas' => $tabla_tareas,
            'contactos' => $contactos,
            'propietarios' => $propietarios,
            'usuarios' => $usuarios,
            'docu' => $docu,
            'miproducto' => $miproducto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsContacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsContacto $contacto)
    {
        if ($request->hasFile("image1")) {
            $Imgagen = $request->file("image1");
            $nombreImg = time() . "." . $Imgagen->getClientOriginalExtension();
            $Imgagen->move(public_path("editados-perfil"), $nombreImg);
        }
        $contacto->imagen = "editados-perfil/" . $nombreImg;
        $contacto->nombre = $request->nom;
        $contacto->apellido = $request->app;
        $contacto->correo = $request->cor;
        $contacto->propietario_id = $request->propi;
        $contacto->telefono = $request->tel;
        $contacto->estado_lead = $request->est;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Editar', 'Conctacto', $contacto->id, 'Se edito un contacto', $fecha);
        $contacto->save();
        return redirect()->route('contactos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
