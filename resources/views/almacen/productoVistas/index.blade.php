@extends ('layouts.adminVista')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@include('almacen.productoVistas.search')
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
                @foreach ($productoVistas as $pro)
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
					
				</tr>
				@endforeach
			</table>
		</div>
		{{$productoVistas->render()}}
	</div>
</div>
@endsection