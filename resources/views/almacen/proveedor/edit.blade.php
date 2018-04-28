@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo producto: {{$persona->nombre}}</h3>
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
			{!!Form::model($persona,['method'=>'PATCH','route'=>['almacen.proveedor.update',$persona->id_persona],'files'=>'true'])!!}
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Tipo documento</label>
                        <select name="tipo_documento" class="form-control">
                            @if($persona-> tipo_documento == 'Tarjeta de Identidad')
                                <option value="Tarjeta de Identidad" selected>Tarjeta de Identidad</option>
                                <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                <option value="Cédula de Extranjera">Cédula de Extranjera</option>
                            @elseif($persona-> tipo_documento == 'Cédula de Ciudadanía')
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Cédula de Ciudadanía" selected>Cédula de Ciudadanía</option>
                                <option value="Cédula de Extranjera">Cédula de Extranjera</option> 
                             @else ($persona-> tipo_documento == 'Cédula de Extranjera')
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                <option value="Cédula de Extranjera" selected>Cédula de Extranjera</option>  
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Numero de documento</label>
                        <input type="text" name="num_documento" required value="{{$persona->num_documento}}" class="form-control" placeholder="Numero documento...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Apellido</label>
                        <input type="text" name="apellido" required value="{{$persona->apellido}}" class="form-control" placeholder="Apellido...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Direccion</label>
                        <input type="text" name="direccion" required value="{{$persona->direccion}}" class="form-control" placeholder="Direccion...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Telefono</label>
                        <input type="text" name="telefono" required value="{{$persona->telefono}}" class="form-control" placeholder="Telefono...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Email</label>
                        <input type="email" name="email" required value="{{$persona->email}}" class="form-control" placeholder="Email...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
            {!!Form::close()!!}     
@endsection