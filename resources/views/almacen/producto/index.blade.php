@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de productos<a href="producto/create"><button> Nuevo</button></a></h3>
		@include('almacen.producto.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Tipo de producto</th>
					<th>Precio</th>
					<th>Descripcion</th>
					<th>Proveedor</th>
					<th>Imagen</th>
					<th></th>
					<th></th>
				</thead>
                @foreach ($productos as $pro)
				<tr>
					<td>{{ $pro->cod_producto}}</td>
					<td>{{ $pro->nombre}}</td>
					<td>{{ $pro->tipo_productos}}</td>
					<td>{{ $pro->precio_venta}}</td>
					<td>{{ $pro->descripcion}}</td>
					<td>{{ $pro->proveedor}}</td>
					<td>
						<img src="{{asset('imagenes/'.$pro -> imagen)}}" alt="{{ $pro->nombre}}" height="100px" width="100px" class="img-thumbnail">	
					</td>
					<td>
						<a href="{{URL::action('ProductoController@edit',$pro->cod_producto)}}"><button class="btn btn-info">Editar</button></a>
					</td>
					<td>
						<a href="" data-target="#modal-delete-{{$pro->cod_producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.producto.modal')
				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>
@endsection