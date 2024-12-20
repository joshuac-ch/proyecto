<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\contacto;
use App\Models\reuniones;
use App\Models\usuarios;
use App\Notifications\ReunionImportanteNotificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class reunionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function calendario()
    {
        $usuarios = usuarios::all();
        $reuniones = reuniones::all();
        $contactos = contacto::all();
        return view('reuniones.calendario', compact('usuarios', 'reuniones', 'contactos'));
    }


    public function obtenerReuniones()
    {
        //$reuniones = reuniones::with('contactos')->get(); // Obtener reuniones con contactos si es necesario
        $reuniones = reuniones::all(); // Obtener reuniones con contactos si es necesario

        return response()->json($reuniones->map(function ($reunion) {
            return [
                'id' => $reunion->id,
                'title' => $reunion->titulo,
                'start' => $reunion->star_time,
                'end' => $reunion->end_time,
                'description' => $reunion->descripcion,
                'contactos' => $reunion->contactos
            ];
        }));
    }
    public function index()
    {
        //$contactos = reuniones::with(['contactos'])->get();

        $reuniones = reuniones::all();
        // $reuniones = reuniones::with(['contactos', 'usuarios'])->get(); //ESTO ES LO MISMO

        return view('reuniones.index2', compact('reuniones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = usuarios::all();

        $contactos = contacto::all();
        return view('reuniones.create', compact('contactos', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_reu = new reuniones;
        $new_reu->anfitrion = $request->anfi;
        $new_reu->titulo = $request->titulo;
        $new_reu->descripcion = $request->des;
        $new_reu->star_time = $request->star;
        $new_reu->end_time = $request->end;
        $new_reu->ubicacion = $request->ubi;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Crear', 'Reunion', $new_reu->id, "Se creo una nueva reunion $new_reu->titulo", $fecha);
        $new_reu->save();
        if ($request->has('contactos')) {
            $new_reu->contactos()->attach($request->contactos);
        }
        $user = usuarios::find(5); // Busca al usuario específico
        $user->notify(new ReunionImportanteNotificacion($new_reu->descripcion));

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
    public function edit(reuniones $reunion)
    {
        $usuarios = usuarios::all();

        $contactos = contacto::all();
        return view('reuniones.edit', compact('reunion', 'usuarios', 'contactos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reuniones $reunion)
    {

        $reunion->anfitrion = $request->anfi;
        $reunion->titulo = $request->titulo;
        $reunion->descripcion = $request->des;
        $reunion->star_time = $request->star;
        $reunion->end_time = $request->end;
        $reunion->ubicacion = $request->ubi;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Editar', 'Reunion', $reunion->id, "Se edito una reunion $reunion->titulo", $fecha);

        $reunion->save();
        if ($request->has('contactos')) {
            $reunion->contactos()->attach($request->contactos);
        }

        return redirect()->route('calendario.index');
    }
    public function adventercia($id)
    {
        $reu_eliminar = reuniones::findOrFail($id);
        return view('reuniones.delete', compact('reu_eliminar'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $eliminar = reuniones::findOrFail($id);
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Eliminar', 'Reunion', $eliminar->id, "Se elimino una reunion $eliminar->titulo", $fecha);

        $eliminar->delete();
        return redirect()->route('calendario.index');
    }
}
