<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'procedencia'=>'required',
            'imagen'=>'required'
        ]);

        $producto = $request->all();

        if($imagen = $request->file('imagen')){
            $rutaGuardarImagen = 'imagenes/' ;
            //Ademas de la ruta por convenio queremos llamar a las imagaenes de cierta manera = Fecha + nombre + tipo de Archivo
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenProducto);

            $producto['imagen'] = "$imagenProducto";
        }

        Producto::create($producto);

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
        return view('Productos.edit',compact('producto'));
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
         //Funcion de update de productos , metodo PUT *(Para mas info mirar edit.blade.php)
         $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'stock'=>'required',
            'precio'=>'required',
            'procedencia'=>'required'
        ]);

        //En este caso debemos asignar a una variable externa al producto la request ya que sino no deja modificar los campos de la request
        //Y podemos encontrar que deberemos crear un recipiente local de metodo para poder modificar el campo en DB
        $UpdatedRequest = $request->all();
        

        if($imagen = $request->file('imagen')){
            $rutaGuardarImagen = 'imagenes/' ;
            //Ademas de la ruta por convenio queremos llamar a las imagaenes de cierta manera = Fecha + nombre + tipo de Archivo
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenProducto);

            $UpdatedRequest['imagen'] = "$imagenProducto";
        }

        $producto->update($UpdatedRequest);
        
        //Asignamos una redireccion de el metodo a la paginacion de index *(Metodo de este controlador )
        return redirect()->route('productos.index')
                        ->with('success','Producto actualizado con exito');
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
        //Storage::disk('public/imagenes/')->delete($producto->image); 

       

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto Borrado con exito');
    }
}
