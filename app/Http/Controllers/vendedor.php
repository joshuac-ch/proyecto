<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\usuarios;
use App\Models\vendedor as ModelsVendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vendedor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #$user = usuarios::all();
        $vendedor = DB::table('usuarios')
            ->join('admins', 'usuarios.id', '=', 'admins.user_id')
            ->where('admins.rol', 'ventas')
            ->select('usuarios.id', 'usuarios.nombre', 'usuarios.correo', 'admins.rol')
            ->get();
        //este es el antiguo $vendedor = ModelsVendedor::all();
        // ESTE ES EL ANTIGUO return view('vendedor.index', compact('vendedor', "usuarios"));
        return view('vendedor.index', compact('vendedor'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        $usuarios = DB::table('usuarios')
            ->join('admins', 'usuarios.id', '=', 'admins.user_id')
            ->where('admins.rol', 'ventas')
            ->select('usuarios.id', 'usuarios.nombre', 'admins.rol')
            ->get();
        return view('vendedor.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_vendedor = new ModelsVendedor;
        $new_vendedor->user_id = $request->vendedor_id;
        $new_vendedor->save();
        return redirect()->route('vendedor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vendedor = ModelsVendedor::findOrFail($id);
        return  view('vendedor.show', compact('vendedor'));
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
