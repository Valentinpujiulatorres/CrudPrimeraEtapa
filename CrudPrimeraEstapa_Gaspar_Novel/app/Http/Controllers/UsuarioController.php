<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    // funcion que retorna todos los usuarios a través de una vista 
    public function index(Request $request)
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }
    // funcion que crea un usuario a través de una vista 
    public function create(Usuario $usuario)
    {
        Gate::authorize('comprobar_role');
        return view('usuarios.create', compact('usuario'));
    }
    // funcion que que utiliza un formrequest
    public function store(UsuarioRequest $request)
    {   // validamos el request
        $request->validated();
        // seleccionamos todos los datos
        $usuario = $request->all();
        // condicional para la subida de imagenes
        if($file = $request->file('imagen')){
            $path = public_path() . '/imagenes';
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);
            $usuario['imagen'] = "$fileName";
        }
        // creamos el usuario y devolvemos una vista
        Usuario::create($usuario);
        return redirect()->route('usuarios.index');
        
    }
    // fuincion que muestra un usuario utilizando autorizacion
    public function show(Usuario $usuario)
    {
        $this->authorize('view', $usuario);
        return view('usuarios.show', compact('usuario'));
    }
    // funcion que devuelve una vista
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }
    // fuincion que actualiza un usuario utilizando autorizacion
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $this->authorize('update', $usuario);
        $usuario->update($request->all());
        return redirect('usuarios');
    }
    // fuincion que elimina un usuario utilizando autorizacion
    public function destroy(Usuario $usuario)
    {
        $this->authorize('delete', $usuario);
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}