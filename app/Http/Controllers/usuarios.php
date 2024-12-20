<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use Illuminate\Support\Facades\Hash;
use App\Models\usuarios as ModelsUsuarios;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class usuarios extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexLogin()
    {
        $usuarios = ModelsUsuarios::all();
        return view('usuarios.login', compact('usuarios'));
    }
    public function datoslogin(Request $request)
    {
        $usuario = ModelsUsuarios::where('correo', $request->correo)->first();

        if ($usuario && $usuario->contrasenna === $request->pass) { //$usuario->contrasenna)) {
            // Redirige al dashboard si la autenticación es exitosa
            session(['usuario' => $usuario]);
            return view('layout.dashboard', compact('usuario'));
            //return view('layout.app', compact('usuario'));
        } else {
            // Redirige a la página de login con un mensaje de error
            return view('usuarios.login');
        }
    }
    public function logOut()
    {
        session()->forget('usuario');
        return redirect()->route('user.login');
    }
    public function VerificarUsuarios($id)
    {
        $usuarios = ModelsUsuarios::findOrFail($id);
        if (!$usuarios) {
            return view('usuarios.login');
        }
        return view('layout.dashboard');
    }
    public function perfil($id)
    {
        $usuario = ModelsUsuarios::FindOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

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
        if ($request->hasFile("imagen")) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . "." . $imagen->getClientOriginalExtension();
            $imagen->move(public_path("perfiles"), $nombreImagen);
            $newuser->imagen = "perfiles/" . $nombreImagen;
        }


        $newuser->nombre = $request->nombre;
        $newuser->correo = $request->email;
        $newuser->contrasenna = $request->pass; //Hash::make($request->pass); //$request->pass;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Crear', 'Usuario', $newuser->id, "Se creo un nuevo usuario $newuser->nombre", $fecha);
        //registrar($userId, $accion, $entidad, $entidadId = null, $descripcion = null, $fecha)
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
        if ($request->hasFile("imagen")) {
            $Imgagen = $request->file("imagen");
            $nombreImg = time() . "." . $Imgagen->getClientOriginalExtension();
            $Imgagen->move(public_path("usuarios-editados"), $nombreImg);
            $usuario->imagen = "usuarios-editados/" . $nombreImg;
        }


        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->email;
        $usuario->contrasenna = $request->pass;
        $fecha = date("Y-m-d");
        actividades::registrar(session('usuario')->id, 'Editar', 'Usuario', $usuario->id, "Se edito un Usuario: $usuario->nombre", $fecha);
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
