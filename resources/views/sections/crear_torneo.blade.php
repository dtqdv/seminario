@extends('layouts.app')
@section('css')
{{Html::style('css/mi-style-crear.css')}}
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic,700italic' rel='stylesheet' type='text/css'>
@endsection
@section('js')
{{Html::script('js/crear_torneo.js')}}
@endsection
@section('content')
<!--<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal"><img src="img/close.png" alt="Cerrar ventana"></a>
                <h3>Agregar Jugador</h3>
            </div>
            <div class="modal-body">
                <div>
                    <input type="text" name="nombre_jugador" placeholder="Nombre">
                </div>
                <div>
                    <input type="text" name="apellido_jugador" placeholder="Apellido">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="volver" data-dismiss="modal">Aceptar</a>
            </div>
        </div>
    </div>
</div>-->
<div id="myModalConfirm" class="modal fade text-center" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal"><img src="img/close.png" alt="Cerrar ventana"></a>
                <h2>¡Todo creado!</h2>
            </div>
            <div class="modal-body">
                <p>El torneo fue creado correctamente y se ha enviado un mail de confirmación a los integrantes del mismo.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="volver">Volver a DETAQUITO</a>
            </div>
        </div>
    </div>
</div>
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
                    <li><a href="#">Prode</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-search buscar"></span></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle user-btn" data-toggle="dropdown" href="#">{{$user['nombre']}} <span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Contenido</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="portada-crear"><h1>Crear Torneo</h1></div>
</header>
<main>
    <div id="pasos">
    {{Form::open(['url' => 'crear-torneo' , 'method' => 'post'])}}
        <div class="slider">
        <section id="paso-uno" class="text-center container">
            <div class="text-center"><img src="img/pasonum-1.png" alt="Paso 1"></div>
            <h2 class="text-center">Nombre</h2>
            <p>Para empezar a crear tu torneo personalizado, ingresá el <strong>nombre</strong> con el que
            lo identificarán. Este va a estar disponible en el buscador</p>
            <div>
                {{Form::text('nombre' , null , ['placeholder' => 'Nombre de torneo'])}}
            </div>
                        @if($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                        @endif
        </section>
        <section id="paso-dos" class="container">
            <div class="text-center"><img src="img/pasonum-2.png" alt="Paso 2"></div>
            <h2 class="text-center">Detalles</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h3><span>Sexo</span> del torneo</h3>
                        <div>
                            {{Form::radio('sexo', 'F' , null , ['id' => 'femenino'])}}
                            <label for="femenino"><span class="radio"></span>Femenino</label>
                            <div class="masc">
                                {{Form::radio('sexo' , 'M' , null , ['id' => 'masculino'])}}
                                <label for="masculino"><span class="radio empujar_izquierda"></span>Masculino</label>
                            </div>
                        @if($errors->has('sexo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sexo') }}</strong>
                        </span>
                        @endif
                        </div>
                        <div>
                        {{Form::text('precio_inscripcion' , null , ['placeholder' => 'Precio de inscripcion'])}}
                        @if($errors->has('precio_inscripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('precio_inscripcion') }}</strong>
                        </span>
                        @endif
                        </div>
                        <div>
                        {{Form::select('categoria', array('+18' => '+18', '+30' => '+30' , 'libre' => 'value' , 'sub-18' => 'sub-18'))}}
                        </div>
                        @if($errors->has('categoria'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categoria') }}</strong>
                        </span>
                        @endif
                        <div>
                        {{Form::text('lugar' , null , ['placeholder' => 'Direccion'])}}
                        </div>
                        @if($errors->has('lugar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lugar') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h3><span>Fecha</span> de inicio</h3>
                        <div>
                            {{Form::text('fecha_inicio' , null , ['placeholder' => 'Fecha de inicio'])}}
                        </div>
                        @if($errors->has('fecha_inicio'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fecha_inicio') }}</strong>
                        </span>
                        @endif
                        <div>
                        {{Form::text('cancha' , null , ['placeholder' => 'Tipo de cancha'])}}
                        </div>
                        @if($errors->has('cancha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cancha') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
        </section>
        <section id="paso-tres" class="text-center container">
            <div class="text-center"><img src="img/pasonum-3.png" alt="Paso 2"></div>
            <h2 class="text-center">Equipos</h2>
            <div>
                <h3><span>Mínimo</span> de equipos</h3>
                <div>
                {{Form::text('min_equipos')}}
                </div>
                        @if($errors->has('min_equipos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('min_equipos') }}</strong>
                        </span>
                        @endif
                <p class="mensaje-min">Se requiere un minimo obligatorio de equipos para la creación de un torneo.</p>
                <h3><span>Máximo</span> de equipos</h3>
                <div>
                {{Form::text('max_equipos')}}
                        @if($errors->has('max_equipos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('max_equipos') }}</strong>
                        </span>
                        @endif
                </div>
            </div>
            <div>
                <div class="row con_agregar">
                    <div class="col-md-6">
                        <h3><span>Equipos</span></h3>
                    </div>
                    <div class="col-md-6">
                    <a href="">Guardar</a>
                    </div>
                </div>
                    <div>
                    {{Form::text('nombre_equipo[]' , null , ['placeholder' => 'Nombre de equipo'])}}
                    </div>
                    <div>
                    {{Form::text('representantes_email[]' , null , ['placeholder' => 'Email de representante'])}}
                    </div>
                <div class="row con_agregar">
                    <div class="col-md-6">
                        <h3><span>jugadores</span></h3>
                    </div>
                    <div class="col-md-6">
                        <button type="button" data-toggle="modal" data-target="#myModal">Agregar</button>
                    </div>
                </div>
                <p class="mensaje-min">Podés agregar jugadores a este equipo o dejarle esta tarea al representante</p>
                    <div>
                        {{Form::text('jugador_nombre_equipo0[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo0[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_nombre_equipo0[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo0[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_nombre_equipo0[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo0[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_nombre_equipo0[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo0[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
            </div>
            <div>
                <div class="row con_agregar">
                    <div class="col-md-6">
                        <h3><span>Equipos</span></h3>
                    </div>
                    <div class="col-md-6">
                    <a href="">Guardar</a>
                    </div>
                </div>
                    <div>
                    {{Form::text('nombre_equipo[]' , null , ['placeholder' => 'Nombre de equipo'])}}
                    </div>
                    <div>
                    {{Form::text('representantes_email[]' , null , ['placeholder' => 'Email de representante'])}}
                    </div>
                <div class="row con_agregar">
                    <div class="col-md-6">
                        <h3><span>jugadores</span></h3>
                    </div>
                    <div class="col-md-6">
                        <button type="button" data-toggle="modal" data-target="#myModal">Agregar</button>
                    </div>
                </div>
                <p class="mensaje-min">Podés agregar jugadores a este equipo o dejarle esta tarea al representante</p>
                    <div>
                        {{Form::text('jugador_nombre_equipo1[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo1[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_nombre_equipo1[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo1[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_nombre_equipo1[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo1[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_nombre_equipo1[]' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_apellido_equipo1[]' , null , ['placeholder' => 'Apellido'])}}
                    </div>
            </div>
        </section>
            <section id="paso-cuatro" class="container">
                <div class="text-center"><img src="img/pasonum-4.png" alt="Paso 2"></div>
                <h2 class="text-center">Confirmación</h2>
                <div class="text-center">
                <p>La creación del torneo fue realizada con exito.  A continuación te mostraremos el detalle del torneo
                    creado. Tenés la posibilidad de editar el contenido apretando el botón de VOLVER.</p>
                <div><img src="img/confirmado.png" alt="Confirmado"></div>
                <h3>Torneo DaVinci</h3>
                <div></div>
                </div>
                <div id="listas" class="row">
                    <ul class="col-md-6">
                        <li><img src="img/sexo.png" alt="sexo">Femenino</li>
                        <li><img src="img/categoria.png" alt="categoria">Sub 20</li>
                        <li><img src="img/tipo.png" alt="tipo de torneo">Liga</li>
                    </ul>
                    <ul class="col-md-6">
                        <li><img src="img/direccion.png" alt="direccion">Corrientes 2323, CABA</li>
                        <li><img src="img/cancha.png" alt="cancha">11</li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="col-md-6">
                        <li><h4>Equipo</h4></li>
                        <li>1. Equipo</li>
                        <li>2. Equipo</li>
                        <li>3. Equipo</li>
                        <li>4. Equipo</li>
                        <li>5. Equipo</li>
                        <li>6. Equipo</li>
                    </ul>
                    <ul class="col-md-6">
                        <li><h4>Represante</h4></li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                    </ul>
                </div>
            </section>
            </div>
            <div class="botonera-final">
                <div class="row">
                    <div class="col-md-4"><a href="#" id="anterior_btn">Anterior</a></div>
                    <div class="col-md-4"><a href="#">Ayuda</a> - información adicional</div>
                    <div class="col-md-4"><a href="#" id="siguiente_btn">Siguiente</a></div>
                    <div class="col-md-4">
                    {{Form::submit('Confirmar' ,['id' => 'confirmar_btn'])}}
                        <!--<input id="confirmar_btn" type="submit" value="Confirmar">-->
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<footer class="container-fluid crear">
    <div class="container">
        <div class="row">
            <div class="hidden-sm hidden-xs">
                <div class="col-md-3 text-center">
                    <img src="img/detaquito-footer.png" alt="DeTaquito">
                </div>
                <div class="col-md-3">
                    <h3>Ayuda</h3>
                    <ul>
                        <li><a href="">¿Qué ofrecemos?</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Registrarse</a></li>
                        <li><a href="">Privacidad</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3>Mapa</h3>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Torneos</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Log In</a></li>
                        <li><a href="#">Registrate</a></li>
                    </ul>
                </div>
                <div class="col-md-4 redes text-left">
                    <h3>Seguinos</h3>
                    <ul>
                        <li><a href="#"><img src="img/fb.png" alt="facebook"></a></li>
                        <li><a href="#"><img src="img/tw.png" alt="twitter"></a></li>
                        <li><a href="#"><img src="img/ig.png" alt="instagram"></a></li>
                        <li><a href="#"><img src="img/yt.png" alt="youtube"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-mobile">
            <p>2016 DETAQUITO. TODOS LOS DERECHOS RESERVADOS.</p>
        </div>
    </div>
</footer>
<script>


</script>
@endsection