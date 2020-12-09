<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitantesCreateRequest extends FormRequest
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
            'correo' => 'email|unique:habitantes',


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

