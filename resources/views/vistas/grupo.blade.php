@extends('layouts.layout')
@section('titulo','Grupo')
@section('contenido')
<div class="container-fluid">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-md-3 ">
			<form action="{{route('grupo.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="nombre">Ingrese Nombre Del Grupo</label>
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
				@if(count($grupos)>0)
				@foreach($grupos as $grupo)
				<tr>
					<td>{{$grupo->id}}</td>
					<td>{{$grupo->nombre}}</td>
					<td><a href="{{action('grupoController@edit', $grupo->id)}}" class="btn btn-warning">Editar</a></td>
					<td class="text-center">
                    <form action="{{action('grupoController@destroy', $grupo->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                    </form>
                	</td>
				</tr>
				@endforeach
				@else
				<tr>
					<tr>
						<td>No hay Registros</td>
					</tr>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection
