<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Indice de Paginacion de Productos , en este caso 7 pero pueden ser los que deseemos
        $productos = Producto::latest()->paginate(7);

        return view('Productos.index',compact('productos'))
        ->with('i',(request()->input('page',1)-1)*7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Creacion de Productos , en este caso el submit de datos se hara desde la vista en question (Creamos productos desde un formulario unico)
        return view('Productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Referente al guardado de datos en DB , este metodo es llamado desde el Post Submit de la plantilla > Productos.create


        //Requeriremos una validacion previa al envio de datos (Tambien podemos agregar Campos nullables en Db , cosa que opp no es recomendable )
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'stock'=>'required',
            'precio'=>'required',
            'procedencia'=>'required'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
        ->with('success','Producto agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //Para las imagenes (Irrelevante con show)
        //src="{{env('APP_URL_ADMIN').'/'.$anuncio->imagen}}"
        return view('Productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //Borrado de producto de la base de datos 

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto Borrado con exito');
    }
}
