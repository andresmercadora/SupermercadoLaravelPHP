<?php

namespace supermercado\Http\Requests;

use supermercado\Http\Requests\Request;

class ProductoFormRequest extends Request
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
            'tipo_producto_id'=>'required',
            'persona_id'=>'required',
            'nombre'=>'required|max:55',
            'precio_compra'=>'required',
            'precio_venta'=>'required',
            'imagen'=>'mimes:jpeg,bmp,png,jpg',
            'descripcion'=>'required'

        ];
    }
}
