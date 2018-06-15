@extends('layouts.app')
@section('contenido')
	<div class="row mt-5 d-flex justify-content-center">
		<div class="card" style="width: 25rem;">
  			<div class="card-body">
    			<h5 class="card-title text-center">Sesion Para Administradores</h5>
    			<form method="post" action="{{route('login')}}">
    				{{csrf_field()}}
                <div class="form-group {{ $errors->has('email') ? 'has-error':''}}" name="f1" >
                    <label for="email">Usuario o Correo</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}" id="email"  >
                    {!! $errors->first('email','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" >
                    {!! $errors->first('password','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group">
                    <input type="submit" value="Registrar" class="btn btn-primary btn-block" >
                </div>
                	
                </form>
  			</div>
		</div>
	</div>
@endsection
