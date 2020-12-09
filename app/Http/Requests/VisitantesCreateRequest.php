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
           


        ];
    }
    public function messages()
    {
        return [



            'numero_identificacion.unique' => 'El numero de identificación ya se encuentra registrado en el sistema',
           



        ];
    }
}
