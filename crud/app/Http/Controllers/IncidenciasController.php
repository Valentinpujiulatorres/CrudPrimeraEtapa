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
        
        $request->validate([
            'fecherror'=>'required',
            'error'=>'required',
            'tipoerror'=>'required',
            'descerror'=>'required',
            'imagen'=>'required',
        ]);

        $incidencia = $request->all();
        // condicional para la subida de imagenes
        if($file = $request->file('imagen')){
            $path = public_path() . '/imagenes';
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $incidencia['imagen'] = "$fileName";
        }

        Incidencias::create($incidencia);

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
         //Funcion de update de productos , metodo PUT *(Para mas info mirar edit.blade.php)
        $request->validate([
            'fecherror'=>'required',
            'error'=>'required',
            'tipoerror'=>'required',
            'descerror'=>'required',
            'imagen'=>'required',
        ]);
        $incidencia->update($request->all());
        }
        if($file = $request->file('imagen')){
            $path = public_path() . '/imagenes';
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $incidencia['imagen'] = "$fileName";
            
        }
        $incidencia->update();

        //Asignamos una redireccion de el metodo a la paginacion de index *(Metodo de este controlador )
        return redirect()->route('incidencias.index');
    }

    public function destroy(Incidencias $incidencia)
    {
        Gate::authorize('comprobar_role');
        $url = str_replace('storage', 'public', '../public/imagenes/' .$incidencia->imagen);
        if (isset($url) && file_exists($url)){
            unlink($url);
            $incidencia->delete();
            } else {
                $incidencia->delete();
        }
    
        return redirect()->route('incidencias.index');
    }
}
