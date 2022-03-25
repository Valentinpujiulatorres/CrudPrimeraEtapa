<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IncidenciasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Comprueba el rol para permitir ciertas acciones: editar, crear y borrar
        return Gate::allows('comprobar_role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecherror' => 'required', 
            'error' => 'required|max:40',  
            'tipoerror' => 'required', 
            'descerror' => 'required',
            'imagen' => 'required',
        ];
    }
}
