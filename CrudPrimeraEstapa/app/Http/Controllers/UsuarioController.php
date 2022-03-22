<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index(Request $request) {
        $usuarios = Usuario::all();
        return view('usuario.index', compact('usuarios'));
    }
}
