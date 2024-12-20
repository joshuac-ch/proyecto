<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\contacto;
use App\Models\noti_sis;
use App\Models\oportunidad as ModelsOportunidad;
use App\Models\vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class oportunidad extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oportunidades_tabla = ModelsOportunidad::all();
        $vendedores = vendedor::all();
        return view('oportunidades.index', ["oportunidades" => $oportunidades_tabla, "vendedores" => $vendedores]);
    }
    public function ca2mbiarEstado($id, $estado)
    {
        $oportunidad = ModelsOportunidad::find($id);

        // Llamar al método correspondiente para cambiar el estado
        switch ($estado) {
            case 'en_proceso':
                $oportunidad->marcarComoEnProceso();
                break;
            case 'en_negociacion':
                $oportunidad->marcarComoEnNegociacion();
                break;
            case 'ganada':
                $oportunidad->marcarComoGanada();
                break;
            case 'perdida':
                $oportunidad->marcarComoPerdida();
                break;
            case 'en_espera':
                $oportunidad->marcarComoEnEspera();
                break;
            case 'cancelada':
                $oportunidad->marcarComoCancelada();
                break;
            case 'reabierta':
                $oportunidad->marcarComoReabierta();
                break;
            default:
                return back()->with('error', 'Estado inválido');
        }

        return back()->with('success', 'Estado de la oportunidad actualizado');
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
        #VERIFICAR ESTA CONSULTA
        $contactos = contacto::with('contacto')->get();
        $consulta2 = DB::table('productos')->get(); //SE DEBE TRAER TODOS LOS PROUDCTOS
        //->join('vendedors', 'productos.id', '=', 'vendedors.id')
        //->select('vendedors.id', 'productos.nombre', 'productos.id')
        //->get();
        return view('oportunidades.create', ["vendedor" => $consulta, "producto" => $consulta2, "contactos" => $contactos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_oportunidad = new ModelsOportunidad;
        $new_oportunidad->descipcion = $request->des;
        $new_oportunidad->estado = $request->est;
        $new_oportunidad->fecha = "2024-09-04";
        $new_oportunidad->vendedor_id = $request->vendedor_id;
        $new_oportunidad->producto_id = $request->producto_id;
        $new_oportunidad->fecha_estimada_cierre = $request->estimacion;
        $new_oportunidad->cliente_id = $request->cliente;
        noti_sis::crearNotificacion("Oportunidad realizada por" . " " . session('usuario')->nombre, session('usuario')->id, $new_oportunidad->fecha_estimada_cierre);
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, "Crear", 'Oportunidad', $new_oportunidad->id, "Se creo una nueva oportunidiad $new_oportunidad->descipcion", $fecha);

        $new_oportunidad->save();
        return redirect()->route('oportunidades.index');
    }

    public function cambiarEstado($id, Request $request)
    {
        $oportunidad = ModelsOportunidad::findOrFail($id);
        $oportunidad->estado = $request->estado; // Actualiza el estado
        $oportunidad->save();

        // Opcional: notificar al vendedor o realizar otras acciones
        //$vendedor = $oportunidad->vendedor;
        // Puedes usar notificaciones aquí si lo deseas, por ejemplo:
        // $vendedor->notify(new OportunidadEstadoActualizado($oportunidad));

        return response()->json(['success' => true]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $opo1 = ModelsOportunidad::findOrFail($id);
        return view('oportunidades.show', compact("opo1"));
    }

    /**
     * DEBEN SER IGUALES AQUI EN SHOW Y EDIT PARA MOSTRARLO
     */
    public function edit(ModelsOportunidad $oportunidade)
    {

        return view('oportunidades.edit', compact("oportunidade"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsOportunidad $oportunidade)
    {

        $oportunidade->descipcion = $request->des;
        $oportunidade->estado = $request->est;
        $oportunidade->vendedor_id = $request->vendedor_id;
        $oportunidade->producto_id = $request->producto_id;
        $oportunidade->fecha_estimada_cierre = $request->estimacion;
        $oportunidade->cliente_id = $request->cliente;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, "Editar", 'Oportunidad', $oportunidade->id, "Se edito una oportunidiad $oportunidade->descipcion", $fecha);

        $oportunidade->save();
        return redirect()->route('opo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
