<?php

namespace supermercado;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='cod_producto';

    public $timestamps=false;


    protected $fillable =[
    	'tipo_producto_id',
        'persona_id',
    	'nombre',
        'precio_compra',
        'precio_venta',
    	'imagen',
    	'descripcion',
    ];

    protected $guarded =[

    ];
}

