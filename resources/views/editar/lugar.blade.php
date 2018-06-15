@extends('layouts.layout')
@section('titulo','Lugar')
@section('contenido')
<div class="container-fluid">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-md-3 ">
			<form action="{{ route('lugar.update',$lugar->id) }}" method="post">
				{{csrf_field()}}
				<input name="_method" type="hidden"value="PATCH">
				<div class="form-group">
					<label for="nombre">Ingrese Nombre Del Estadio</label>
					<input class="form-control" value="{{$lugar->nombre}}" type="text" name="nombre" id="nombre">
				</div>
				<input type="submit" name="btn" class="btn btn-primary btn-block" value="Actualizar">
			</form>
		</div>
	</div>
</div>
@endsection
