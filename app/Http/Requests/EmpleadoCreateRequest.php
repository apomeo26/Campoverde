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


        ];
    }
    public function messages()
    {
        return [



            'numero_identificacion.unique' => 'El numero de identificación ya se encuentra registrado en el sistema',
            'correo.unique' => 'El correo electronico ya se encuentra registrado en el sistema',



        ];
    }
}
