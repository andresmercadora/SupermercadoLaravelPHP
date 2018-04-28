<?php

namespace supermercado;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey='id_persona';

    public $timestamps=false;


    protected $fillable =[
    	'tipo_persona',
    	'tipo_documento',
    	'num_documento',
    	'nombre',
    	'apellido',
    	'direccion',
    	'telefono',
    	'email',
    ];

    protected $guarded =[

    ];
}
