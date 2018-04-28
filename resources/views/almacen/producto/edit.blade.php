@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo producto: {{$producto->nombre}}</h3>
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
			{!!Form::model($producto,['method'=>'PATCH','route'=>['almacen.producto.update',$producto->cod_producto],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="row">
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
                    	<label for="nombre">Nombre</label>
                    	<input type="text" name="nombre" required value="{{$producto -> nombre}}" class="form-control">
                    </div>
            	</div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_compra">Precio de compra por unidad</label>
                        <input type="text" name="precio_compra" required value="{{$producto -> precio_compra}}" class="form-control" placeholder="Precio...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_venta">Precio de venta por unidad</label>
                        <input type="text" name="precio_venta" required value="{{$producto -> precio_venta}}" class="form-control" placeholder="Precio...">
                    </div>
                </div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
            			<label>Producto</label>
            			<select name="tipo_producto_id" class="form-control">
            				@foreach ($tipoProductos as $tpd)
            					@if($tpd -> id_tipo_producto==$producto -> tipo_producto_id)
            						<option value="{{$tpd -> id_tipo_producto}}" selected>{{$tpd -> nombre}}</option>
            					@else
            						<option value="{{$tpd -> id_tipo_producto}}">{{$tpd -> nombre}}</option>
            					@endif	
            				@endforeach	
            			</select>
            		</div>
            	</div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" required value="{{$producto -> descripcion}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Proveedor</label>
                        <select name="persona_id" class="form-control">
                            @foreach ($personas as $per)
                                @if($per -> id_persona==$producto -> persona_id)
                                    <option value="{{$per -> id_persona}}" selected>{{$per -> nombre}}</option>
                                @else
                                    <option value="{{$per -> id_persona}}">{{$per -> nombre}}</option>
                                @endif  
                            @endforeach  
                        </select>
                    </div>
                </div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
                    	<label for="imagen">Imagen</label>
                    	<input type="file" name="imagen" class="form-control">
                    	@if(($producto -> imagen)!="")
                    	<img src="{{asset('imagenes/'.$producto -> imagen)}}" height="250px" width="250px">
                    	@endif
                    </div>
            	</div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<button class="btn btn-primary" type="submit">Guardar</button>
                	<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
            </div>
			{!!Form::close()!!}	
@endsection