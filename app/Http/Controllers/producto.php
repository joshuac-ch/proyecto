<?php

namespace App\Http\Controllers;

use App\Models\producto as ModelsProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class producto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabla_productos = ModelsProducto::all();
        return view('productos.index', ["productos" => $tabla_productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consulta = DB::table('usuarios')
            ->join('admins', 'usuarios.id', '=', 'admins.user_id')
            ->where('admins.rol', 'ventas')
            ->select('usuarios.id', 'usuarios.nombre', 'admins.rol')
            ->get();
        return view('productos.create', ["vendedor" => $consulta]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nuevo_producto = new ModelsProducto;
        $nuevo_producto->nombre = $request->producto1;
        $nuevo_producto->precio = $request->precio1;
        $nuevo_producto->descripcion = $request->des1;
        $nuevo_producto->stock = $request->stock1;
        $nuevo_producto->vendedor_id = $request->vendedor1;
        $nuevo_producto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = ModelsProducto::FindOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsProducto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    //NO DECLARAR LA MISMA VARIABLE A UNA FUNCION EN ESTA CASO $NUEVO_PRODUCTO AQUI PORQUE SINO LO CREARIA TAMBIEN
    public function update(Request $request, ModelsProducto $producto)
    {
        $producto->nombre = $request->producto1;
        $producto->precio = $request->precio1;
        $producto->descripcion = $request->des1;
        $producto->stock = $request->stock1;
        $producto->vendedor_id = $request->vendedor1;
        $producto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $producto_e = ModelsProducto::findOrFail($id);
        return view('productos.delete', compact('producto_e'));
    }
    public function destroy($id)
    {
        // Primero eliminamos las referencias en la tabla 'oportunidades'
        DB::table('oportunidads')->where('producto_id', $id)->delete();
        $producto_e = ModelsProducto::FindOrFail($id);
        $producto_e->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
