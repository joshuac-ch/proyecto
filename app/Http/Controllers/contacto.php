<?php

namespace App\Http\Controllers;

use App\Models\contacto as ModelsContacto;
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
        $new_contacto->nombre = $request->nom;
        $new_contacto->apellido = $request->app;
        $new_contacto->correo = $request->cor;
        $new_contacto->propietario_id = $request->propi;
        $new_contacto->telefono = $request->tel;
        $new_contacto->estado_lead = $request->est;
        $new_contacto->save();
        return redirect()->route('contactos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $micontacto = ModelsContacto::findOrFail($id);
        return view('contactos.show', compact('micontacto'));
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
        $contacto->nombre = $request->nom;
        $contacto->apellido = $request->app;
        $contacto->correo = $request->cor;
        $contacto->propietario_id = $request->propi;
        $contacto->telefono = $request->tel;
        $contacto->estado_lead = $request->est;
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
