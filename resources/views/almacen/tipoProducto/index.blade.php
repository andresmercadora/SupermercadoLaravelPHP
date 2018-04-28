@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de tipos de productos<a href="tipoProducto/create"><button> Nuevo</button></a></h3>
		@include('almacen.tipoProducto.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th></th>
					<th></th>
				</thead>
                @foreach ($tipoProductos as $tiP)
				<tr>
					<td>{{ $tiP->id_tipo_producto}}</td>
					<td>{{ $tiP->nombre}}</td>
					<td>{{ $tiP->descripcion}}</td>
					<td>
						<a href="{{URL::action('tipoProductoController@edit',$tiP->id_tipo_producto)}}"><button class="btn btn-info">Editar</button></a>
					</td>
					<td>
						<a href="" data-target="#modal-delete-{{$tiP->id_tipo_producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.tipoProducto.modal')
				@endforeach
			</table>
		</div>
		{{$tipoProductos->render()}}
	</div>
</div>
@endsection