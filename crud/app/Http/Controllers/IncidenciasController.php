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
        $incidencias = Incidencias::all();
        return view('incidencias.index', compact('incidencias'));
    }

    public function create(Incidencias $incidencia)
    {
        Gate::authorize('comprobar_role');
        return view('incidencias.create', compact('incidencia'));


    }

    public function store(IncidenciasRequest $request)
    {
        // Guardado de los datos de la incidencia
        $request->validate([
            'fecherror'=>'required',
            'error'=>'required',
            'tipoerror'=>'required',
            'descerror'=>'required',
            'imagen'=>'required',
        ]);

        $incidencia = $request->all();
        // Condicional para la subida de imagenes de la incidencia
        if($file = $request->file('imagen')){
            $path = public_path() . '/imagenes';
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $incidencia['imagen'] = "$fileName";
        }

        Incidencias::create($incidencia);

        // Redirección al index al crear
        return redirect()->route('incidencias.index');
    }

    public function show(Incidencias $incidencia)
    {
        return view('incidencias.show', compact('incidencia'));
    }

    public function edit($incidencias)
    {
        Gate::authorize('comprobar_role');
        $incidencias = Incidencias::find($incidencias);
        return view('incidencias.edit', compact('incidencias'));
    }

    public function update(Request $request, Incidencias $incidencia)
    {{
         //Funcion de update de productos, actualiza los campos exceptuando la imagen
        $request->validate([
            'fecherror'=>'required',
            'error'=>'required',
            'tipoerror'=>'required',
            'descerror'=>'required',
            'imagen'=>'required',
        ]);
        $incidencia->update($request->all());
        }
        // Condicional para actualizar la imagen de la incidencia
        if($file = $request->file('imagen')){
            $path = public_path() . '/imagenes';
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $incidencia['imagen'] = "$fileName";

        }
        $incidencia->update();

        // Redirección al index al actualizar
        return redirect()->route('incidencias.index');
    }

    public function destroy(Incidencias $incidencia)
    {
        Gate::authorize('comprobar_role');

        // If else para destruir la incidencia y eliminar la imagen del local tanto si tenemos esa imagen en local como si no
        $url = str_replace('storage', 'public', '../public/imagenes/' .$incidencia->imagen);
        if (isset($url) && file_exists($url)){
            unlink($url);
            $incidencia->delete();
            } else {
                $incidencia->delete();
        }

        // Redirección al index al destruir
        return redirect()->route('incidencias.index')->with('eliminar', 'ok');
    }
}
