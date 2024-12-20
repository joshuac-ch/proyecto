<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\contacto;
use App\Models\notas;
use App\Models\usuarios;
use Illuminate\Http\Request;

class notasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabla_n = notas::with(['parato', 'usuarios'])->get();
        return view('notas.index', compact('tabla_n'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contactos = contacto::all();
        $usuarios = usuarios::all();
        return view('notas.creador', compact('contactos', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_nota = new notas;
        $new_nota->para = $request->para;
        $new_nota->notas = $request->nota;
        $new_nota->creador = $request->creador;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Crear', 'Nota', $new_nota->id, "Se realizo una nota para $new_nota->para", $fecha);
        $new_nota->save();
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
