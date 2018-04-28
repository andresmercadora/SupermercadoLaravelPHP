@extends ('layouts.adminVista')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@include('almacen.tipoProductoVistas.search')
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
                @foreach ($tipoProductoVistas as $tiP)
				<tr>
					<td>{{ $tiP->id_tipo_producto}}</td>
					<td>{{ $tiP->nombre}}</td>
					<td>{{ $tiP->descripcion}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$tipoProductoVistas->render()}}
	</div>
</div>
@endsection