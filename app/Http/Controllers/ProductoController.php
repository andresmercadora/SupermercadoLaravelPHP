<?php

namespace supermercado\Http\Controllers;

use Illuminate\Http\Request;

use supermercado\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use supermercado\Http\Requests\ProductoFormRequest;
use supermercado\Producto;
use DB;

class ProductoController extends Controller
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
            $productos=DB::table('producto as p')
            ->join('tipo_producto as t','p.tipo_producto_id','=','t.id_tipo_producto')
            ->join('persona as per','p.persona_id','=','per.id_persona')
            ->select('p.cod_producto','p.nombre','p.precio_compra','p.precio_venta','t.nombre as tipo_productos','p.descripcion','per.nombre as proveedor','p.imagen')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('p.cod_producto','desc')
            ->paginate(7);
            return view('almacen.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }
    public function create()
    {
    	$tipoProductos=DB::table('tipo_producto')->get();
        $personas=DB::table('persona')->get();
        return view("almacen.producto.create",["tipoProductos" => $tipoProductos],["personas" => $personas]);
    }
    public function store (ProductoFormRequest $request)
    {
        $producto=new Producto;
        $producto->tipo_producto_id=$request->get('tipo_producto_id');
        $producto->persona_id=$request->get('persona_id');
        $producto->nombre=$request->get('nombre');
        $producto->precio_compra=$request->get('precio_compra');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
        	$file = Input::file('imagen');
        	$file -> move(public_path().'/imagenes/',$file->getClientOriginalName());
        	$producto -> imagen=$file->getClientOriginalName();
        }
        $producto->save();
        return Redirect::to('almacen/producto');

    }
    public function show($id)
    {
       return view("almacen.producto.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$producto = Producto::findOrFail($id);
    	$tipoProductos=DB::table('tipo_producto')->get();
        $personas=DB::table('persona')->get();
       return view("almacen.producto.edit",["producto"=>$producto,"tipoProductos"=>$tipoProductos,"personas"=>$personas]);
    }
    public function update(ProductoFormRequest $request,$id)
    {
        $producto=Producto::findOrFail($id);
        $producto->tipo_producto_id=$request->get('tipo_producto_id');
        $producto->persona_id=$request->get('persona_id');
        $producto->nombre=$request->get('nombre');
        $producto->precio_compra=$request->get('precio_compra');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
        	$file = Input::file('imagen');
        	$file -> move(public_path().'/imagenes/',$file->getClientOriginalName());
        	$producto -> imagen=$file->getClientOriginalName();
        }
        $producto->update();
        return Redirect::to('almacen/producto');
    }
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        $producto->delete();
        return Redirect::to('almacen/producto');
    }
}
