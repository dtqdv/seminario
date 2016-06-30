@extends('layouts.app')
@section('css')
{{Html::style('css/fonts/fonts.css')}}
{{Html::style('css/home.css')}}
 <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic,700italic' rel='stylesheet' type='text/css'>
@endsection
@section('content')
<header class="container-fluid">
    <div class="container">
        <nav>
            <ul class="row margen-abajo">
                <li class="col-md-2">
                {{link_to_route('home' , 'Inicio')}}
                </li>
                <li class="col-md-2">
                    <a href="#">Torneos</a>
                </li>
                <li class="col-md-2">
                    <a href="#">Contacto</a>
                </li>
                <li class="col-md-2">
                    {{link_to_route('login' , 'Login')}}
                </li>
                <li class="col-md-2">
                    {{link_to_route('registro' , 'Registro')}}
                </li>
                <li class="col-md-2">
                    <a href="#"><img src="img/buscar.png" alt="Buscar"></a>
                </li>
            </ul>
        </nav>
    </div>
    <figure class="text-center">
        <img src="img/logoHome.png" alt="DeTaquito Logo">
    </figure>
    <h1 class="text-center">DE<strong>TAQUITO</strong></h1>
    <p class="text-center">Divertite, Jugá, Creá, Apostá, Competí.</p>
</header>
<div class="gradientes"></div>
<main>
    <section class="que-es container-fluid">
        <div class="container text-center">
            <h2>¿Qué es?</h2>
            <p>
                deTaquito es un sistema web creado para generar competencia sana. Con él podes crear torneos de fútbol
                de la manera más sencilla e invitar a tus amigos y equipos para que participen y realicen un seguimiento
                del mismo.
            </p>
            <p>
                Cuenta con detalles de torneos, equipos, jugadores, perfiles personalizados, noticias, prode online,
                y muchas más opciones interactivas para entretenerte.
            </p>
        </div>
    </section>
    <section class="pasos container-fluid text-center">
        <div class="container-fluid">
            <div class="row">
                <h2>Muy facil de utilizar</h2>
                <p class="text-center col-md-4 pasosp">Implementamos un sistema sencillo para que cualquier usario pueda utilizarlo y que a la hora de jugar solo haya diversión.</p>
                <input type="button" value="Crear Torneo" class="btn btn-torneo mover-derecha-2">
                <div class="col-md-offset-2 col-md-8">
                    <div class="col-md-4">
                        <figure>
                            <img src="img/registrate.png" alt="Creá un torneo">
                        </figure>
                        <h3>Registrate</h3>
                        <p>Solamente utilizando tu mail ya podes ingresar y organizar tu propio torneo.</p>
                    </div>
                    <div class="col-md-4">
                        <figure>
                            <img src="img/crea.png" alt="Registráte">
                        </figure>
                        <h3>Creá</h3>
                        <p>Completá los datos acorde al tipo de torneo y los equipos que van a participar.</p>
                    </div>
                    <div class="col-md-4">
                        <figure>
                            <img src="img/invita.png" alt="Invitá a tu torneo">
                        </figure>
                        <h3>Invitá</h3>
                        <p>¡Listo! Confirmá e invitá a los equipos a jugar y agregá los detalles a gusto</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid tabla">
        <div class="container text-center">
            <div class="col-md-6 float-left text-left">
                <div class="degradeText"><h2>Torneos</h2></div>
                <p class="texto-pers">Hacemos posible tus ganas de encontrar otros torneos ajenos al tuyo.
                    Contamos con listados de todos los torneos creados hasta la fecha para
                    que puedas participar de ellos de diferentes formas.</p>
                <input type="button" value="Ver Torneos" class="btn btn-block btn-torneo ver">
            </div>
            <div class="col-md-6 pull-right">
                <img src="img/tablet.png" alt="Tabla en tablet">
            </div>
        </div>
        <div class="container text-center margen-abajo-1">
            <div class="col-md-4 float-left text-left">
                <img src="img/pc.png" alt="Pc perzonaliza">
            </div>
            <div class="col-md-6 text-right pull-right">
                <div class="degradeTextDos"><h2>Personalizá</h2></div>
                <p>Con nuestro sistema de edición de equipo,
                    podes darle pasión a tu perfil y
                    cambiarle los colores que vos màs prefieras para
                    que esten a tono con tu equipo.</p>
            </div>
        </div>
    </section>
    <section class="container-fluid detalles">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-offset-3 text-center detalles-texto">
                    <h2>Más Detalles</h2>
                    <p class="col-lg-offset-1">Trabajamos para que puedas ver cada detalle de los partidos en cada torneo. Goles, amonestaciones,
                        tarjetas, estadisticas, cambios, nombres y posiciones de cada jugador e integrante del torneo.</p>
                </div>
                <div class="amarilla pull-left"></div>
                <div class="roja pull-right"></div>
            </div>
        </div>
    </section>

    <!-- Prode -->

    <!-- section class="prode container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h2><em>Prode</em></h2>
                    <p>Si te querés divertir, podés ingresar en la sección prode para realizar tus apuestas
                        y ganarte premios en cada torneo</p>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <img src="img/prode.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section -->

    <!-- Personalizacion -->

    <!-- section class="personalizacion container-fluid">
        <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="img/camiseta.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2><em>Personalización</em></h2>
                        <p>Con nuestro sistema de edición de equipo, podés darle pasión a tu perfil y cambiarle
                        los colores que prefieras</p>
                    </div>
                </div>
        </div>
    </section -->
    <section class="sponsors container-fluid">
        <div class="row text-center">
            <h2 class="texto-sponsors">Trabajamos con</h2>
            <ul>
                <li class="col-md-3 text-right"><a href="#"><img src="img/gatorade.png" alt="Gatorade"></a></li>
                <li class="col-md-2"><a href="#"><img src="img/adidas.png" alt="Adidas"></a></li>
                <li class="col-md-2"><a href="#"><img src="img/paty.png" alt="Paty"></a></li>
                <li class="col-md-2"><a href="#"><img src="img/manaos.png" alt="Manaos"></a></li>
                <li class="col-md-3 text-left"><a href="#"><img src="img/redbull.png" alt="Red bull"></a></li>
            </ul>
        </div>
    </section>
</main>
<footer class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="hidden-sm hidden-xs text-left">
                <h3 class="text-center">Hoy creá tu torneo</h3>
                <div class="btn-block mover-derecha-1">
                    <input type="button" value="Crear Torneo" class="btn btn-torneo">
                </div>
                <div class="col-md-3 mover-derecha mover-abajo">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="">¿Qué ofrecemos?</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Registrarse</a></li>
                        <li><a href="">Privacidad</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mover-abajo">
                    <h4>Mapa</h4>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Torneos</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Log In</a></li>
                        <li><a href="#">Registrate</a></li>
                    </ul>
                </div>
                <div class="col-md-4 redes text-left mover-abajo">
                    <h4>Seguinos</h4>
                    <ul>
                        <li><a href="#"><img src="img/fbh.png" alt="facebook"></a></li>
                        <li><a href="#"><img src="img/twh.png" alt="twitter"></a></li>
                        <li><a href="#"><img src="img/igh.png" alt="instagram"></a></li>
                        <li><a href="#"><img src="img/yth.png" alt="youtube"></a></li>
                    </ul>
                </div>
            </div>
            <!-- div class="hidden-lg hidden-md footer-mobile">
                <p>Contenido del footer mobile</p>
            </div -->
        </div>
    </div>
</footer>
@endsection
