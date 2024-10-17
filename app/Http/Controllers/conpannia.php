<?php

namespace App\Http\Controllers;

use App\Models\compannia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\usuarios;

class conpannia extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companias = compannia::all();
        return view('companias.index', compact('companias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios1 = DB::table('usuarios')->get();
        return view('companias.create', compact('usuarios1'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $c = new compannia;
        $c->nombre_empresa = $request->nombre;
        $c->dominio_empresa = $request->dominio;
        $c->propietario_id = $request->pro;
        $c->tipo = $request->tipo1;
        $c->ingresos_anuales = $request->ingresos;
        $c->save();
        return redirect()->route('companias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $com = compannia::findOrFail($id);
        return view('companias.show', compact('com'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(compannia $compannia)
    {
        return view('companias.edit', compact('compannia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, compannia $compannia)
    {
        $compannia->nombre_empresa = $request->nombre;
        $compannia->dominio_empresa = $request->dominio;
        $compannia->propietario_id = $request->pro;
        $compannia->tipo = $request->tipo1;
        $compannia->ingresos_anuales = $request->ingresos;
        $compannia->save();
        return redirect()->route('companias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
