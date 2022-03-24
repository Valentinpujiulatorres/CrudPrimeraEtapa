<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // gate que comprueba el rol del usuario
    public function authorize()
    {
        return Gate::allows('comprobar_role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // validacion de los campos en servidor
    public function rules()
    {
        return [
            'nombre' => 'required|max:50', 
            'apellido' => 'required|max:50',  
            'telefono' => 'required|size:9', 
            'email' => 'required' 
                ];
    }
    // mensages de validacion
    public function messages() 
    {
        return [
            'nombre.required' => __('traduccion.A name is required'), 
            'apellido.required' => __('traduccion.A surname is required'),  
            'telefono.required' => __('traduccion.A 9-digit phone is required'), 
            'email.required' => __('traduccion.An email is needed eg: ejemplo@gmail.com') 
        ];
    }
}
