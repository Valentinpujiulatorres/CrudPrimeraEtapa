<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class GaleriaController extends Controller
{
    /**
     * Esta es la página principal de la galería. He implementado Vue con Inertia.js para la parte de front.
     * Desde aquí también se hace posible la funcionalidad del datatable para 
     * También se pagina y muestra 5 resultados por página.
     */
    public function index()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:id,titulo']
        ]);

        $query = Imagen::query();

        if (request('search')) {
            // Hago que la query sea case-insensitive y esta solución debería servir tanto para MySQL como PSQL
            $query->where(DB::raw('lower(titulo)'), 'LIKE', '%'.strtolower(request('search')).'%');
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Galeria', [
            // Envía estos parámetros hacia el lado del cliente, a Galeria.vue
            'imgs' => $query->latest()->paginate(5)->withQueryString(), 
            // Según el IDE y tu intelliphense, se puede marcar withQueryString como error (pero funciona correctamente).
            'filters' => request()->all(['search', 'field', 'direction']),
        ]);
    }

    /**
     * Carga el formulario para crear y subir una imagen a la galería
     */
    public function create()
    {
        return Inertia::render('Create');
    }

    /**
     * Después de pulsar el botón de "subir", se valida la imagen y se guarda en la ruta adecuada
     */
    public function store(Request $request)
    {
        $imagen = Imagen::create(
            $request->validate([
                'titulo' => 'required|max:30|min:2',
                'descripcion' => 'required|min:5',
                'imagen' => 'required|mimes:png,jpg|file|max:500',
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
     * Muestra un resultado de la galería de forma más detallada
     */
    public function show(Imagen $img)
    {
        return Inertia::render('Show', [
            'img' => $img
        ]);
    }

    /**
     * Carga el formulario para editar una imagen a la galería
     */
    public function edit(Imagen $img)
    {
        return Inertia::render('Edit', [
            'imgs' => $img
        ]);
    }

    /**
     * Aquí se hace efectiva la actualización de la entrada en la galería.
     * La validación en este caso para la imagen se realiza solo cuando el usuario quiere actualizar
     * la imagen en cuestión, si no, se mantiene la anterior la cual no debe validarse otra vez.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Imagen $img, Request $request)
    {
        // Asignamos en este caso una variable externa a la request ya que si no, da problemas para actualizar los campos de la tabla
        $updatedRequest = $request->all();

        if ($updatedRequest) {
            $request->validate([
                'titulo' => 'required|max:30|min:2',
                'descripcion' => 'required|min:5',
            ]);

            $img->update($request->except('_method'));
        }

        if($request->file('imagen')) {
            Storage::delete('public/images/'. $img->imagen); // Elimina la imagen antigua en caso de que se vaya a subir una nueva
            $rutaGuardarImagen = 'storage/images';
            $request->validate([
                'imagen' => 'mimes:jpg,png|max:500',
            ]);
            // Podemos llamar a las imágenes con un nombre más sencillo
            $imagenNombre = date('YmdHis'). "." . $img->imagen->getClientOriginalExtension();
            $img->imagen->move($rutaGuardarImagen, $imagenNombre);

            $updatedRequest['imagen'] = "$imagenNombre";
        }

        $img->update($updatedRequest);

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
        Storage::delete('public/images/'. $img->imagen);
        //$request->session()->flash('success', 'Post deleted successfully!');
        return Redirect::route('imgs.index');
    }
}
