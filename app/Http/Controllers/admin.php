<?php

namespace App\Http\Controllers;

use App\Models\admin as ModelsAdmin;
use App\Models\usuarios;
use App\Models\vendedor;
use Illuminate\Http\Request;

class admin extends Controller
{
    public function recogeruser()
    {
        $usuarios = usuarios::all();
        return view('admin.edit', compact('usuarios'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encargados = ModelsAdmin::all();
        return view('admin.index', compact("encargados"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = usuarios::all();
        return view('admin.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #$vendedor = new vendedor;
        #$vendedor->user_id = $request->user_id1;
        $newenca = new ModelsAdmin;
        $newenca->rol = $request->rol1;
        $newenca->user_id = $request->user_id1;
        $newenca->save();
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $encargados = ModelsAdmin::findOrFail($id);
        return view('admin.show', compact('encargados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsAdmin $admin)
    {
        $usuarios = usuarios::all();
        return view('admin.edit', compact('admin', "usuarios"));
    }
    public function search()
    {
        return view('busqueda');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsAdmin $admin)
    {

        $admin->rol = $request->rol1;
        $admin->user_id = $request->user_id1;
        $admin->save();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
