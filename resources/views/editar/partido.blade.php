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
					<input type="date" class="form-control" value="{{$partido->fecha}}" id="fecha" name="fecha">
				</div>	
				<div class="form-group">
					<label for="nombre">Ingrese Hora Del Encuentro</label>
					<input type="time" class="form-control" value="{{$partido->hora}}" id="hora" name="hora">
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
				<input type="submit" name="btn" class="btn btn-primary btn-block" value="Actualizar">
				
			</form>
		</div>
	</div>
</div>
@endsection