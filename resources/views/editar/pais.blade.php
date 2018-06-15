@extends('layouts.layout')
@section('titulo','Pais')
@section('contenido')
<div class="container-fluid">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-md-4 ">
			<form action="{{ route('pais.update',$pais->id) }}" method="post" enctype="multipart/form-data">
				<input name="_method" type="hidden"value="PATCH">
				<div class="form-group">
				{{csrf_field()}}
				<div class="form-group">
					<label for="nombre">Ingrese Nombre Del Pais</label>
					<input class="form-control" value="{{$pais->nombre}}" type="text" name="nombre" id="nombre">
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
				<input type="submit" name="btn" class="btn btn-primary btn-block" value="Actualizar">
			</form>
		</div>
	</div>
</div>
@endsection