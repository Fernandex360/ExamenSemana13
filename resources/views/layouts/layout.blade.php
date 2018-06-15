<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/estilos.css') !!}
    {!! Html::style('css/fontello.css') !!}
    {!! Html::script('js/jquery-2.1.1.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    <title>@yield('titulo')</title>
</head>
<body >

    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral">
            <nav class="menu">
                <a href="/grupo" class="tag1"><span class="icon-users"></span><h4 class="item1">Grupos</h4></a>
                <a href="/pais"><span class="icon-flag-empty"></span><h4 class="item2">Paises</h4></a>
                <a href="/lugar"><span class="icon-street-view"></span><h4 class="item3">Estadios</h4></a>
                <a href="/partido"><span class="icon-soccer-ball"></span><h4 class="item4">Partidos</h4></a>
                 <a href="/salir"></a>
                 <form method="post" name="formulario1" action="{{route('logout')}}">
                     {{csrf_field()}}
                 </form>
                 <a href="#" onclick="enviar_formulario()" ><span class="icon-logout"></span><h4 class="item4">Salir</h4></a>
            </nav>
            </div>
            <main class="col">
                @yield('contenido');
            </main>
                
        </div>  
    </div>
    <script> 
    function enviar_formulario(){ 
   document.formulario1.submit() 
    } 
</script>
</body>
</html>