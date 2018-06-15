<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Principal</title>
</head>
<body>
<div class="container-fluid">
	<ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" onclick="imprimir()" href="">Imprimir</a>
      </li>
  		<li class="nav-item">
    		<a class="nav-link active" href="/login">Admin</a>
  		</li>
      
      
	</ul>
</div>	
<div class="container ">
	<div id="historial" class="row mt-5">
		@foreach($consultas as $consulta)
			<div class="card border-primary mr-5 mb-3" style="max-width: 18rem;">
  				<div class="card-header">
  					<h6 class="text-center">Grupo  {{$consulta->grupo}}</h6>
  					<h6 class="text-center">Estadio  {{$consulta->nombre}}</h6>
  				</div>
  				<div class="card-body text-primary">
    			<div class="col">
				<div class="partido">
					<h3 class="text-left">
						<img class="col-md-4 rounded" src="img/{{$consulta->img1}}">
						<span class="local">{{$consulta->pais1}}</span>
					</h3>
				</div>
				<h4 class="text-center">Vs</h4>
				<div class="partido">
					<h3 class="text-left" >
						<img class="col-sm-4 rounded" src="img/{{$consulta->img2}}">
						<span class="local">{{$consulta->pais2}}</span>
					</h3 >
				</div>
				</div>
			
  			</div>
  			<div class="card-header">
  				<h6 class="text-center">Fecha del Partido</h6>
  				<h6 class="text-center">
  				{{date_format(date_create($consulta->fecha), 'd/m/Y')}}</h6>
  				<h6 class="text-center">
  				{{date_format(date_create($consulta->hora),'G:i A')}}</h6>
  			</div>
			</div>
		@endforeach
	</div>
</div>
<script type="text/javascript">
  function imprimir(historial){
  if(window.print())window.print()
}
</script>
</body>
