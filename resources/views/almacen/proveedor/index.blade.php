@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de proveedores<a href="proveedor/create"><button> Nuevo</button></a></h3>
		@include('almacen.proveedor.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Tipo de documento</th>
					<th>Numero de documento</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Direccion</th>
					<th></th>
					<th></th>
				</thead>
                @foreach ($personas as $per)
				<tr>
					<td>{{ $per->id_persona}}</td>
					<td>{{ $per->nombre}}</td>
					<td>{{ $per->tipo_documento}}</td>
					<td>{{ $per->num_documento}}</td>
					<td>{{ $per->telefono}}</td>
					<td>{{ $per->email}}</td>
					<td>{{ $per->direccion}}</td>
					<td>
						<a href="{{URL::action('ProveedorController@edit',$per->id_persona)}}"><button class="btn btn-info">Editar</button></a>
					</td>
					<td>
						<a href="" data-target="#modal-delete-{{$per->id_persona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.proveedor.modal')
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>
@endsection