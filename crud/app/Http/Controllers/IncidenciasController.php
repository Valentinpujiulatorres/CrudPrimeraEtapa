<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use Illuminate\Http\Request;
use App\Http\Requests\IncidenciasRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class IncidenciasController extends Controller
{
    public function index(Request $request)
    {
        $incidencias = Incidencias::latest()->paginate(7);

        return view('incidencias.index',compact('incidencias'))
        ->with('i',(request()->input('page',1)-1)*7);
    }

    public function create(Incidencias $incidencia)
    {
        Gate::authorize('comprobar_role');
        return view('incidencias.create', compact('incidencia'));
    }

    public function store(IncidenciasRequest $request)
    {
        Incidencias::create($request->validated());
        return redirect()->route('incidencias.index');
    }

    public function show(Incidencias $incidencias)
    {
        return view('incidencias.show', compact('incidencias'));
    }

    public function edit($incidencias)
    {
        $incidencias = Incidencias::find($incidencias);
        return view('incidencias.edit', compact('incidencias'));
    }

    public function update(Request $request, Incidencias $incidencia)
    {
         //Funcion de update de productos , metodo PUT *(Para mas info mirar edit.blade.php)
         $request->validate([
            'fecherror'=>'required',
            'error'=>'required',
            'tipoerror'=>'required',
            'descerror'=>'required',
        ]);

        $incidencia->update($request->all());
        
        //Asignamos una redireccion de el metodo a la paginacion de index *(Metodo de este controlador )
        return redirect()->route('incidencias.index')
                        ->with('success','Producto actualizado con exito');
    }

    public function destroy(Incidencias $incidencias)
    {
        $incidencias->delete();

        return redirect()->route('incidencias.index')->with('success', 'Producto Borrado con exito');
    }
}