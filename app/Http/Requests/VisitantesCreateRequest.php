<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitantesCreateRequest extends FormRequest
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
        return [



            'numero_identificacion' => 'unique:habitantes',
            'numero_identificacion' => 'min:8',
            'numero_identificacion' => 'max:10',
            'temperatura' => 'max:2',
            'temperatura' => 'min:2',


        ];
    }
    public function messages()
    {
        return [

            'documento.min' => 'El documento debe tener minimo 8 caracteres',
            'documento.max' => 'El documento debe tener maximo 10 caracteres',
            'temperatura.min' => 'La temperatura debe tener minimo 2 caracteres',
            'temperatura.max' => 'La temperatura debe tener maximo 2 caracteres',

            'numero_identificacion.unique' => 'El numero de identificación ya se encuentra registrado en el sistema',




        ];
    }
}
