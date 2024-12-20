<?php

namespace App\Http\Controllers;

use App\Models\campañas;
use App\Models\email;
use App\Models\publicacion;
use App\Models\formulario;
use Illuminate\Http\Request;

class campanna extends Controller
{
    /*
    public function agregarRecurso($campañaId, $recursoId, $recursoType)
    {
        $campaña = campañas::findOrFail($campañaId);
        $recurso = $this->getRecurso($recursoId, $recursoType);

        if ($recurso) {
            $campaña->recursos()->attach($recurso);
            return response()->json(['message' => 'Recurso agregado a la campaña']);
        }

        return response()->json(['message' => 'Recurso no encontrado'], 404);
    }

    public function eliminarRecurso($campañaId, $recursoId, $recursoType)
    {
        $campaña = campañas::findOrFail($campañaId);
        $recurso = $this->getRecurso($recursoId, $recursoType);

        if ($recurso) {
            $campaña->recursos()->detach($recurso);
            return response()->json(['message' => 'Recurso eliminado de la campaña']);
        }

        return response()->json(['message' => 'Recurso no encontrado'], 404);
    }
    
    private function getRecurso($recursoId, $recursoType)
    {
        switch ($recursoType) {
            case 'email':
                return email::find($recursoId);
            case 'publicacion':
                return publicacion::find($recursoId);
            case 'form':
                return formulario::find($recursoId);
            default:
                return null;
        }
    }*/

    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('campañas.index');
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
