<?php

namespace supermercado\Http\Controllers;

use Illuminate\Http\Request;

use supermercado\Http\Requests;
use supermercado\Persona;
use Illuminate\Support\Facades\Redirect;
use supermercado\Http\Requests\PersonaFormRequest;
use DB;

class ProveedorController extends Controller
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
            $personas=DB::table('persona')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where('tipo_persona','=','proveedor')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where('tipo_persona','=','proveedor')
            ->orderBy('id_persona','desc')
            ->paginate(7);
            return view('almacen.proveedor.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.proveedor.create");
    }
    public function store (PersonaFormRequest $request)
    {
        $persona=new Persona;
        $persona->tipo_persona='proveedor';
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();
        return Redirect::to('almacen/proveedor');

    }
    public function show($id)
    {
       return view("almacen.proveedor.show",["persona"=>Persona::findOrFail($id)]);
    }
    public function edit($id)
    {
    	 return view("almacen.proveedor.edit",["persona"=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request,$id)
    {
        $persona=Persona::findOrFail($id);

        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        
        $persona->update();
        return Redirect::to('almacen/proveedor');
    }
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->delete();
        return Redirect::to('almacen/proveedor');
    }
}
