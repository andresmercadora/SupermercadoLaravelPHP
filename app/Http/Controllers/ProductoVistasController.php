<?php

namespace supermercado\Http\Controllers;

use Illuminate\Http\Request;

use supermercado\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use supermercado\Http\Requests\ProductoFormRequest;
use supermercado\Producto;
use DB;

class ProductoVistasController extends Controller
{
    public function __construct()
    {
       
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $productoVistas=DB::table('producto as p')
            ->join('tipo_producto as t','p.tipo_producto_id','=','t.id_tipo_producto')
            ->join('persona as per','p.persona_id','=','per.id_persona')
            ->select('p.cod_producto','p.nombre','p.precio_compra','p.precio_venta','t.nombre as tipo_productos','p.descripcion','per.nombre as proveedor','p.imagen')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('p.cod_producto','desc')
            ->paginate(7);
            return view('almacen.productoVistas.index',["productoVistas"=>$productoVistas,"searchText"=>$query]);
        }
    }
}
