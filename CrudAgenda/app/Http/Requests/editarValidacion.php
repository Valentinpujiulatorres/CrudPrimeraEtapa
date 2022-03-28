<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editarValidacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /**Todos los campos son requeridos menos el campo imagen 
         * 1- NombreContacto es requerido de tipo string con un mínimo de 3 y máximo 10 caracteres
         * 2- Apellido es requerido tipo string minimo de 4 y maximo de 20 caracterees 
         * 3- Direccion es requerido de tipo string, con minimo de 5 y un máximo de 30 carácteres 
         * 4-Edad es requerido es tipo string minimo de 1 y máximo de 3 
         *      4.1 Tener en cuenta que edad esta regulado por caracteres  es decir, como mínimo 1 caracter (1 a 9 )
         *      Y  max:3 es por ejemplo 100
         */
        return [
        'NombreContacto'=>'required|string|min:3|max:10', 
         'Apellidos'=>'required|string|min:4|max:20',
         'Direccion'=> 'required|string|min:5|max:30',
         'Edad'=>'required|string|min:1|max:3',
         'TipoContacto'=>'required|string',
         'Imagen'=>'required|image|mimes:jpeg,jpg,png,gif,webp',
        ];
    }
}
