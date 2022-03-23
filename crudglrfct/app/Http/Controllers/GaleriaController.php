<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class GaleriaController extends Controller
{
    /**
     * Esta es la página principal de la galería
     * He implementado Vue con Inertia.js para la parte de front
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgs = Imagen::latest()->paginate(5);

        return Inertia::render('Galeria', ['imgs' => $imgs]);
    }

    /**
     * Carga el formulario para crear y subir una imagen a la galería
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Create');
    }

    /**
     * Después de pulsar el botón de "subir", se valida la imagen y se guarda en la ruta adecuada
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = Imagen::create(
            $request->validate([
                'titulo' => ['required', 'max:30'],
                'descripcion' => ['required'],
                'imagen' => ['required'],
            ])
        );

        // Para conseguir la ruta correcta sigo dos pasos. Aquí guardo la imagen
        $imagen->imagen = $request->file('imagen')->store('public/images');

        // Y aquí hago que se guarde el nombre correcto del archivo en la BBDD, porque si no, 
        // se incluye el nombre de la carpeta public/images en la columna imagen de la BBDD (y así no se puede encontrar la imagen)
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
            'imgs' => $img
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Imagen $img, Request $request)
    {
        //$imgs = $img->imagen;
        if ($request->file('imagen')) {
            Storage::delete('public/'. $img->imagen);
            
            $img->imagen = $request->file('imagen')->store('public/images');
            $img->imagen = $request->file('imagen')->hashName();
            
            $img->update($request->except('_method'));
            
        }

        /* $data = Request::validate([
                'title' => ['required', 'max:90'],
                'description' => ['required'],
            ]); */

        return Redirect::route('imgs.index');
    }

    /**
     * Eliminar una imagen de la galería es lo más sencillo del crud, solo debe detectar la 
     * imagen correspondiente a su botón de eliminar, que se recibe desde la vista Galeria.vue
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Imagen $img)
    {
        $img->delete();
        //$request->session()->flash('success', 'Post deleted successfully!');
        return Redirect::route('imgs.index');
    }
}
