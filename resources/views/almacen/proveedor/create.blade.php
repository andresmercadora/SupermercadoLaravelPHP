@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
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
			{!!Form::open(array('url'=>'almacen/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="row">
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
            			<label>Tipo documento</label>
            			<select name="tipo_documento" class="form-control">
        					<option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                            <option value="Cédula de Extranjera">Cédula de Extranjera</option>
            			</select>
            		</div>
            	</div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Numero de documento</label>
                        <input type="text" name="num_documento" required value="{{old('num_documento')}}" class="form-control" placeholder="Numero documento...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Apellido</label>
                        <input type="text" name="apellido" required value="{{old('apellido')}}" class="form-control" placeholder="Apellido...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Direccion</label>
                        <input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Telefono</label>
                        <input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Email</label>
                        <input type="email" name="email" required value="{{old('email')}}" class="form-control" placeholder="Email...">
                    </div>
                </div>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<button class="btn btn-primary" type="submit">Guardar</button>
                	<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
            </div>
        	{!!Form::close()!!}		
@endsection