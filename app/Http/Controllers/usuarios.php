<?php

namespace App\Http\Controllers;

use App\Models\usuarios as ModelsUsuarios;
use Illuminate\Http\Request;

class usuarios extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conexion = ModelsUsuarios::all();
        return view('usuarios.index', compact("conexion"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newuser = new ModelsUsuarios;
        $newuser->nombre = $request->nombre;
        $newuser->correo = $request->email;
        $newuser->contrasenna = $request->pass;
        $newuser->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = ModelsUsuarios::findOrFail($id);
        return view("usuarios.show", compact("usuario"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsUsuarios $usuario)
    {
        return view("usuarios.edit", compact("usuario"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsUsuarios $usuario)
    {
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->email;
        $usuario->contrasenna = $request->pass;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
