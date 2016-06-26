<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    {{Html::style('css/style.css')}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    <title>
        @if (isset($section) && $section != null)
        {{$section}}
        @else
        De Taquito
        @endif
    </title>
</head>
<body>
    <header>
    <nav id="botonera">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">De taquito</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Torneos</a></li>
                    <li><a href="#">Contacto</a></li>
                    @if (isset($user) && $user != null)
                    <li><a href="#">Prode</a></li>
                    @endif
                    <li><a href="#"><span class="glyphicon glyphicon-search buscar"></span></a></li>
                    @if (isset($user) && $user != null)
                    <li class="dropdown">
                        <a class="dropdown-toggle user-btn" data-toggle="dropdown" href="#">{{$user['nombre']}} <span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Contenido</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    </header>
    @yield('content')
</body>
</html>
