<?php

namespace supermercado\Http\Controllers;

use Illuminate\Http\Request;

use supermercado\Http\Requests;
use supermercado\Persona;
use Illuminate\Support\Facades\Redirect;
use supermercado\Http\Requests\PersonaFormRequest;
use DB;

class ProveedorVistasController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $proveedorVistas=DB::table('persona')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where('tipo_persona','=','proveedor')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where('tipo_persona','=','proveedor')
            ->orderBy('id_persona','desc')
            ->paginate(7);
            return view('almacen.proveedorVistas.index',["proveedorVistas"=>$proveedorVistas,"searchText"=>$query]);
        }
    }
}
