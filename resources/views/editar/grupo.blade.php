@extends('layouts.layout')
@section('titulo','Grupo')
@section('contenido')
<div class="container-fluid">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-md-3 ">
			<form action="{{ route('grupo.update',$grupo->id) }}" method="post">
				{{csrf_field()}}
				<input name="_method" type="hidden"value="PATCH">
				<div class="form-group">
					<label for="nombre">Ingrese Nombre Del Grupo</label>
					<input class="form-control" type="text" value="{{$grupo->nombre}}" name="nombre" id="nombre">
				</div>
				<input type="submit" name="btn" class="btn btn-primary btn-block" value="Actualizar">
			</form>
		</div>
	</div>
</div>
@endsection
