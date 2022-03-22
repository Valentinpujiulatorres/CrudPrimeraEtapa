<?php

namespace App\Http\Controllers;
use App\Http\Requests\IncidenciasRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Incidencias;

class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
     $incidencias = Incidencias::all();
        return view('incidencias.index', compact('incidencias'));
    }

    public function create(Incidencias $incidencia)
    {
        return view('incidencias.create', compact('incidencia'));
    }

    public function store(IncidenciasRequest $request)
    {
        Incidencias::create($request->validated());
        return redirect()->route('incidencias.index');
    }

    public function show(Incidencias $incidencia)
    {
        $this->authorize('view', $incidencia);
        return view('incidencias.show', compact('incidencia'));
    }

    public function edit($incidencia)
    {
        $incidencia = Incidencias::find($incidencia);
        return view('incidencias.edit', compact('incidencia'));
    }

    public function update(IncidenciasRequest $request, Incidencias $incidencia)
    {
        $this->authorize('update', $incidencia);
        $incidencia->update($request->all());
        return redirect('incidencias');
    }

    public function destroy(Incidencias $incidencia)
    {
        $this->authorize('delete', $incidencia);
        $incidencia->delete();
        return redirect()->route('incidencia.index');
    }
}
