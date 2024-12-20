<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\usuarios;
use Illuminate\Http\Request;

class actividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$actividades = actividades::all();
        // $t_tareas =  ModelsTareas::with(['contacto', 'propietario'])->get();
        $actividades = actividades::with(['user'])->latest()->paginate(10);
        // $usuarios = usuarios::all();
        return view('actividades.index', compact('actividades'));
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
    public function show($id)
    {
        $acti = actividades::findOrFail($id);

        return view('actividades.show', compact('acti'));
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
