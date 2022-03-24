<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;




class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /** Index vista principal para ver el historico de contactos
     * 1. Hago un llamada a la base de datos (nombre de la tabla )->get donde optengo 
     * 2.Retorno la vista index  
     */
        $contactos=DB::table('contactos')->get();
        return view('Contacto.index',compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**Retorno la vista para crear contactos */
        return view('Contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Function store 
         * 1. Recibo una request a la que le pido que no retorne el token @crsf del formulario 
         * 2. Compruebo que la imagen llega a la repuesta, si llega la guardo en uploads en el directorio public 
         * 3. Sobre el modelo hago un insert a la base de datos con los datos del insert 
         * 4. Finalmente hago una redirección al index para ver el Storage 
        */
         $contacto=request()->except('_token');
         if($request->hasFile('Imagen')){
             $contacto['Imagen']=$request->file('Imagen')->store('uploads','public');
         }

        Contacto::insert($contacto);
        return redirect('contacto')->with('mensaje','El contacto ha sido creado correctamente ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        return view('Contacto.show',compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** 1. Filtro por id
         *  2.Creo una variable contacto que llama al modelo y filtro por id 
         *  3.Retorno la vista edit, compact (contacto)
         */ 
        $contacto=Contacto::find($id);
        return view('Contacto.edit',compact('contacto'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        /**1.Optengo una request,optengo el modulo contacto 
         * 2. Creo un array con nombre (contactoActualizado)
         * 3. Optengo el nombre de la columna de la base de datos 
         * 4. $request->atributo del arreglo 
         * 5. Creo una variable respuesta que tiene el valor de el contacto, uso el método update, con los datos de contacto actualizado. 
         * 6. Para la imagen confirmo que la respuesta es una imagen, esta respuesta estara guardada en el directorio uploads de public 
         */


        $contactoActualizado = ([

            'NombreContacto' => $request->NombreContacto ,
            'Apellidos' => $request->Apellidos,
            'Direccion' => $request->Direccion,
            'Edad'=>$request->Edad,
            // 'Imagen'=>$request->Imagen,



        ]);
        $respuesta=$contacto->update($contactoActualizado);

        

        if($request->hasFile('Imagen')){
            $contacto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        
    $contacto->update($contactoActualizado);

        


        return view('Contacto.edit',compact('contacto'));
            redirect('contacto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        /** 1.Metodo destroy que recibe como parámetro id, una vwz recibo, este parámetro  
         *  2.Accedo al directorio Storage:: disk directorio donde guardo las imagenes en el directorio public.
         *  3.Una vez dentro de public, hago uso del metódo delete para destruir la imagen. 
         *  4. Redireccionando a la raiz, este redirect tiene como función ir a index y mostrar los contactos actualizados despues de haber eliminado
        */

    Storage::disk('public')->delete('');
    return redirect('contacto')->with('mensaje','El contacto ha sido eliminado correctamente');
    }
}
