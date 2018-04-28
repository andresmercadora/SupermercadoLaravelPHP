<?php

namespace supermercado;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table='tipo_producto';

    protected $primaryKey='id_tipo_producto';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'descripcion',
    ];

    protected $guarded =[

    ];
}
