<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\documentos as ModelsDocumentos;
use App\Models\usuarios;
use Illuminate\Http\Request;

class documentos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docu = ModelsDocumentos::all();
        return view('documentos.index', compact('docu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propietario = usuarios::all();
        return view('documentos.create', compact("propietario"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_docu = new ModelsDocumentos;
        $ruta = $request->file('archivo')->store('documentos', 'public'); // Almacena en storage/app/public/documentos
        $new_docu->nombre = $request->nombre;
        $new_docu->ruta = $ruta;
        $new_docu->id_propietario = $request->pro;
        $new_docu->save();
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Crear', 'Documento', $new_docu->id, 'Se creo un nuevo documento', $fecha);
        return redirect()->route('documento.index');
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
