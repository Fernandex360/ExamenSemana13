@extends('layouts.layout')
@section('titulo','Partido')
@section('contenido')
<div class="container-fluid">
	<div class="row d-flex justify-content-center mt-1">
		<div class="col-md-5 ">
			<form action="{{route('partido.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="nombre">Ingrese Fecha Del Partido</label>
					<input type="date" class="form-control" id="fecha" name="fecha">
				</div>	
				<div class="form-group">
					<label for="nombre">Ingrese Hora Del Encuentro</label>
					<input type="time" class="form-control" id="hora" name="hora">
				</div>
				<div class="form-row ">
					<div class="form-group col-md-5">
    				<label for="equipo1">Equipo 1</label>
    				<select class="form-control" id="equipo1" name="equipo1">
    				@foreach($paises as $pais)	
      				<option value="{{$pais->id}}">{{$pais->nombre}}</option>
      				@endforeach
    				</select>
    				
  				</div>
					<label class="text-center col-2 ">VS</label>
				<div class="form-group col-md-5">
    				<label for="exampleFormControlSelect1">Equipo 2</label>
    				<select class="form-control" id="equipo2" name="equipo2">
      				@foreach($paises as $pais)	
      				<option value="{{$pais->id}}">{{$pais->nombre}}</option>
      				@endforeach
    				</select>
  				</div>
				</div>
				<div class="form-group">
    				<label for="equipo1">Seleccione el Estadio</label>
    				<select class="form-control" id="lugar" name="lugar">
      				@foreach($lugares as $lugar)	
      				<option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
      				@endforeach
    				</select>
    				
  				</div>
				<input type="submit" name="btn" class="btn btn-primary btn-block" value="Guardar">
				
			</form>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<table class="mt-5 table table-hover table-striped table-sm col-8 ">
			<thead>
				<th>Id</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Equipo1</th>
				<th>Equipo2</th>
				<th>Estadio</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</thead>
			<tbody>
				@if(count($consultas)>0)
				@foreach($consultas as $consulta)
				<tr>
					<td>{{$consulta->id}}</td>
					<td>{{$consulta->fecha}}</td>
					<td>{{$consulta->hora}}</td>
					<td>{{$consulta->pais1}}</td>
					<td>{{$consulta->pais2}}</td>
					<td>{{$consulta->nombre}}</td>
					<td><a href="{{action('partidoController@edit',$consulta->id)}}" class="btn btn-warning">Editar</a></td>
					<td class="text-center">
                    <form action="{{action('partidoController@destroy', $consulta->id)}}" method="post">
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