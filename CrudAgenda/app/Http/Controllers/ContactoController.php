<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /**Creo una variable datosContacto, sobre la tabla contacto,llamo al modelo Contacto 
     * y doy un retorno de la vista index que es el historico con datosContactos con paginación de 5 es decir 
     * limitador de 5 registros. 
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
        /**dd($request) dd es un debuger para valorar los datos de respuesta de la petición; 
         * $contacto=request()->all(); 
            Con request all retorna todos los datos y tambien el token de seguridad
    */ 


         $contacto=request()->except('_token');
         if($request->hasFile('Imagen')){
             $contacto['Imagen']=$request->file('Imagen')->store('uploads','public');
         }
         
        Contacto::insert($contacto);       
        return redirect('contacto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto=Contacto::find($id);


        return view('Contacto.edit',compact('contacto'));
            redirect('contacto');
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        /**Llamo al módelo Contacto donde llamo la método destroy al que le paso 
         * como parámetro el identificador de cada contacto, y realizo redirect a ruta contacto que corresponde 
         * a la vista index
         */

        Contacto::destroy($id); 
        return redirect('contacto'); 
    }
}
