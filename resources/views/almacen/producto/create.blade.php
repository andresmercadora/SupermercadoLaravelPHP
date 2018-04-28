@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>	
			{!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="row">
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
                    	<label for="nombre">Nombre</label>
                    	<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
                    </div>
            	</div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_compra">Precio de compra por unidad</label>
                        <input type="text" name="precio_compra" required value="{{old('precio_compra')}}" class="form-control" placeholder="Precio...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_venta">Precio de venta por unidad</label>
                        <input type="text" name="precio_venta" required value="{{old('precio_venta')}}" class="form-control" placeholder="Precio...">
                    </div>
                </div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
            			<label>Producto</label>
            			<select name="tipo_producto_id" class="form-control">
            				@foreach ($tipoProductos as $tpd)
            					<option value="{{$tpd -> id_tipo_producto}}">{{$tpd -> nombre}}</option>
            				@endforeach	
            			</select>
            		</div>
            	</div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
                    	<label for="descripcion">Descripcion</label>
                    	<textarea type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion del producto..."></textarea>
                    </div>
            	</div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Proveedor</label>
                        <select name="persona_id" class="form-control">
                            @foreach ($personas as $per)
                                <option value="{{$per -> id_persona}}">{{$per -> nombre}}   {{$per -> tipo_persona}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
                    	<label for="imagen">Imagen</label>
                    	<input type="file" name="imagen" class="form-control">
                    </div>
            	</div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<button class="btn btn-primary" type="submit">Guardar</button>
                	<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
            </div>
        	{!!Form::close()!!}		
@endsection