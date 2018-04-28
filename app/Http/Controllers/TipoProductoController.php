<?php

namespace supermercado\Http\Controllers;

use Illuminate\Http\Request;
use supermercado\Http\Requests;
use supermercado\TipoProducto;
use Illuminate\Support\Facades\Redirect;
use supermercado\Http\Requests\TipoProductoFormRequest;
use DB;

class TipoProductoController extends Controller
{
    public function __construct()
    {
         $this -> middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tipoProductos=DB::table('tipo_producto')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id_tipo_producto','desc')
            ->paginate(7);
            return view('almacen.tipoProducto.index',["tipoProductos"=>$tipoProductos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.tipoProducto.create");
    }
    public function store (TipoProductoFormRequest $request)
    {
        $tipoProducto=new TipoProducto;
        $tipoProducto->nombre=$request->get('nombre');
        $tipoProducto->descripcion=$request->get('descripcion');
        $tipoProducto->save();
        return Redirect::to('almacen/tipoProducto');

    }
    public function show($id)
    {
       return view("almacen.tipoProducto.show",["tipoProducto"=>TipoProducto::findOrFail($id)]);
    }
    public function edit($id)
    {
       return view("almacen.tipoProducto.edit",["tipoProducto"=>TipoProducto::findOrFail($id)]);
    }
    public function update(TipoProductoFormRequest $request,$id)
    {
        $tipoProducto=TipoProducto::findOrFail($id);
        $tipoProducto->nombre=$request->get('nombre');
        $tipoProducto->descripcion=$request->get('descripcion');
        $tipoProducto->update();
        return Redirect::to('almacen/tipoProducto');
    }
    public function destroy($id)
    {
        $tipoProducto=TipoProducto::findOrFail($id);
        $tipoProducto->delete();
        return Redirect::to('almacen/tipoProducto');
    }
}
