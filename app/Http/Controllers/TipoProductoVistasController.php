<?php

namespace supermercado\Http\Controllers;


use Illuminate\Http\Request;
use supermercado\Http\Requests;
use supermercado\TipoProducto;
use Illuminate\Support\Facades\Redirect;
use supermercado\Http\Requests\TipoProductoFormRequest;
use DB;

class TipoProductoVistasController extends Controller
{
   public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tipoProductoVistas=DB::table('tipo_producto')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id_tipo_producto','desc')
            ->paginate(7);
            return view('almacen.tipoProductoVistas.index',["tipoProductoVistas"=>$tipoProductoVistas,"searchText"=>$query]);
        }
    }
}
