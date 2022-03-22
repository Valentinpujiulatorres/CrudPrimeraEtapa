<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgs = Imagen::latest()->paginate(5);

        return Inertia::render('Galeria', ['imgs' => $imgs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = Imagen::create(
            $request->validate([
                'titulo' => ['required', 'max:90'],
                'descripcion' => ['required'],
                'imagen' => ['required'],
            ])
        );

        $imagen->imagen = $request->file('imagen')->store('public/images');
        $imagen->imagen = $request->file('imagen')->hashName();

        $imagen->save();

        return Redirect::route('imgs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $img)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagen $img)
    {
        return Inertia::render('Edit', [
            'img' => [
                'id' => $img->id,
                'titulo' => $img->titulo,
                'descripcion' => $img->descripcion
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $img)
    {
        $data = Request::validate([
                'title' => ['required', 'max:90'],
                'description' => ['required'],
            ]);
        $img->update($data);
        

        return Redirect::route('imgs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $img)
    {
        $img->delete();
        
        return Redirect::route('imgs.index');
    }
}
