<?php

namespace supermercado\Http\Requests;

use supermercado\Http\Requests\Request;

class PersonaFormRequest extends Request
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
            'tipo_documento'=>'required|max:35',
            'num_documento'=>'required|max:10',
            'nombre'=>'required|max:30',
            'apellido'=>'required|max:30',
            'direccion'=>'required|max:55',
            'telefono'=>'required|max:10',
            'email'=>'required|max:255'
        ];
    }
}
