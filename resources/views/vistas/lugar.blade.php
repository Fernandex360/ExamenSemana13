@extends('layouts.layout')
@section('titulo','Lugar')
@section('contenido')
<div class="container-fluid">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-md-3 ">
			<form action="{{route('lugar.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="nombre">Ingrese Nombre Del Estadio</label>
					<input class="form-control" type="text" name="nombre" id="nombre">
				</div>
				<input type="submit" name="btn" class="btn btn-primary btn-block" value="Guardar">
			</form>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<table class="mt-5 table table-hover table-striped table-sm col-8 ">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</thead>
			<tbody>
				@if(count($lugares)>0)
				@foreach($lugares as $lugar)
				<tr>
					<td>{{$lugar->id}}</td>
					<td>{{$lugar->nombre}}</td>
					<td><a href="{{action('lugarController@edit', $lugar->id)}}" class="btn btn-warning">Editar</a></td>
					<td class="text-center">
                    <form action="{{action('lugarController@destroy', $lugar->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                    </form>
                	</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td>No hay Registros</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection
