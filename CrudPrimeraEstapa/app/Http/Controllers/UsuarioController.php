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
    public function index(Request $request)
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create(Usuario $usuario)
    {
        Gate::authorize('comprobar_role');
        return view('usuarios.create', compact('usuario'));
    }

    public function store(UsuarioRequest $request)
    {

        Usuario::create($request->validated());
        return redirect()->route('usuarios.index');
        
    }

    public function show(Usuario $usuario)
    {
        $this->authorize('view', $usuario);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $this->authorize('update', $usuario);
        $usuario->update($request->all());
        return redirect('usuarios');
    }

    public function destroy(Usuario $usuario)
    {
        $this->authorize('delete', $usuario);
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}