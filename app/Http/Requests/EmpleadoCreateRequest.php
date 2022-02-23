<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoCreateRequest extends FormRequest
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

    public function rules()
    {
        return [



            'numero_identificacion' => 'unique:empleados',
            'correo' => 'email|unique:empleados',
            'numero_identificacion' => 'min:8',
            'numero_identificacion' => 'max:10',


        ];
    }
    public function messages()
    {
        return [


            'documento.min' => 'El documento debe tener minimo 8 caracteres',
            'documento.max' => 'El documento debe tener maximo 10 caracteres',
            'numero_identificacion.unique' => 'El numero de identificación ya se encuentra registrado en el sistema',
            'correo.unique' => 'El correo electronico ya se encuentra registrado en el sistema',



        ];
    }
}
