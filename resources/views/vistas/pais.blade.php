@extends('layouts.layout')
@section('titulo','Pais')
@section('contenido')
<div class="container-fluid">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-md-4 ">
			<form action="{{route('pais.store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="nombre">Ingrese Nombre Del Pais</label>
					<input class="form-control" type="text" name="nombre" id="nombre">
				</div>
				<div class="form-group">
    				<label for="grupo">Seleccione el grupo</label>
    				<select class="form-control" id="grupo" name="grupo">
      				@foreach($grupos as $grupo)	
      				<option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
      				@endforeach
    				</select>
  				</div>
				<div class="form-group">
    				<label for="foto">Seleccione Imagen</label>
    				<input type="file" class="form-control-file" id="foto" name="foto">
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
				<th>Grupo</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</thead>
			<tbody>
				@if(count($paises)>0)
				@foreach($paises as $pais)
				<tr>
					<td>{{$pais->id}}</td>
					<td>{{$pais->nombre}}</td>
					<td>{{$pais->grupo}}</td>
					<td><img src="img/{{$pais->foto}}" width="80"></td>
					<td><a href="{{action('paisController@edit', $pais->id)}}" class="btn btn-warning">Editar</a></td>
					<td class="text-center">
                    <form action="{{action('paisController@destroy', $pais->id)}}" method="post">
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