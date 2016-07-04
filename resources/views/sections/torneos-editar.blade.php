@extends('layouts.dashboard')
@section('css')
{{Html::style('css/mi-style-crear.css')}}
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic,700italic' rel='stylesheet' type='text/css'>
@endsection
@section('js')
{{Html::script('js/crear_torneo.js')}}
@endsection
@section('content')
<main>
@if(Session::has('exito'))
<div>
    TORNEO EDITADO CON EXITO <!--mensaje de exito --> 
</div>
@endif
@if(Session::has('error_integridad'))
<div>
    ESTE TORNEO NO TE PERTENECE
</div>
@endif
@if(Session::has('error_torneo'))
<div>
    ESTE TORNEO NO EXISTE MAS.
</div>
@endif
@if(Session::has('error_consulta'))
<div>
    HUBO UN PROBLEMA INTENTE MAS TARDE
</div>
@endif
<div class="portada-editar roboto"><h1 class="roboto">Panel de Control</h1></div>
    <div id="pasos">
    {{Form::open(['url' => 'actualizar-torneo' , 'method' => 'post'])}}
    {{Form::hidden('id_torneo' , $torneo['id'])}}
        <div class="slider">
        <section id="paso-uno" class="text-center container">
            <div class="text-center"><img src="img/pasonum-1.png" alt="Paso 1"></div>
            <h2 class="text-center">Nombre</h2>
            <p>Para empezar a crear tu torneo personalizado, ingresá el <strong>nombre</strong> con el que
            lo identificarán. Este va a estar disponible en el buscador</p>
            <div>
                {{Form::text('nombre' , $torneo['nombre'] , ['placeholder' => 'Nombre de torneo'])}}
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
                        {{Form::text('precio_inscripcion' , $torneo['precio_inscripcion'] , ['placeholder' => 'Precio de inscripcion'])}}
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
                        {{Form::text('lugar' , $torneo['lugar'] , ['placeholder' => 'Direccion'])}}
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
                            {{Form::text('fecha_inicio' , $torneo['fecha_inicio'] , ['placeholder' => 'Fecha de inicio'])}}
                        </div>
                        @if($errors->has('fecha_inicio'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fecha_inicio') }}</strong>
                        </span>
                        @endif
                        <div>
                        {{Form::text('cancha' , $torneo['num_cancha'] , ['placeholder' => 'Tipo de cancha'])}}
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
                {{Form::text('min_equipos' , $torneo['min_equipos'])}}
                </div>
                        @if($errors->has('min_equipos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('min_equipos') }}</strong>
                        </span>
                        @endif
                <p class="mensaje-min">Se requiere un minimo obligatorio de equipos para la creación de un torneo.</p>
                <h3><span>Máximo</span> de equipos</h3>
                <div>
                {{Form::text('max_equipos' , $torneo['max_equipos'])}}
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
                    <a href="" id='agregar-equipo'>Agregar Equipo</a>
                    </div>
                </div>
                <!-- -->
                @if (Session::has('equipos'))
                {{--*/ $cantidad = Session::get('equipos') /*--}}
                
                @for($i = 0;$i < count($cantidad);$i++)
                <div class='wrapper-equipos'>
                    <div>
                    {{Form::text('nombre_equipo_'.$i , null , ['placeholder' => 'Nombre de equipo'])}}
                    </div>
                    @if($errors->has('nombre_equipo_'.$i))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre_equipo_'.$i) }}</strong>
                        </span>
                    <div>
                    @endif
                    {{Form::text('representantes_email_equipo_'.$i , null , ['placeholder' => 'Email de representante'])}}
                    @if($errors->has('representantes_email_equipo_'.$i))
                        <span class="help-block">
                            <strong>{{ $errors->first('representantes_email_equipo_'.$i) }}</strong>
                        </span>
                    @endif
                    <div>
                    </div>
                <div class="row con_agregar">
                    <div class="col-md-6">
                        <h3><span>jugadores</span></h3>
                    </div>
                    <div class="col-md-6">
                        <a class='agregar-jugador' href="">Agregar Jugador</a>
                    </div>
                </div>
                <p class="mensaje-min">Podés agregar jugadores a este equipo o dejarle esta tarea al representante</p>
                <div>
                <div class='wrapper-jugador'>
                    @for($c = 0;$c < ( $cantidad[$i]['jugadores'] + 1);$c++)
                    
                        {{Form::text('jugador_'.$c.'_nombre_equipo_'.$i , null , ['placeholder' => 'Nombre'])}}
                        @if($errors->has('jugador_'.$c.'_nombre_equipo_'.$i))
                        <span class="help-block">
                            <strong>{{ $errors->first('jugador_'.$c.'_nombre_equipo_'.$i) }}</strong>
                        </span>
                       
                        @endif
                        {{Form::text('jugador_'.$c.'_apellido_equipo_'.$i , null , ['placeholder' => 'Apellido'])}}
                        
                        @if($errors->has('jugador_'.$c.'_apellido_equipo_'.$i))
                        <span class="help-block">
                            <strong>{{ $errors->first('jugador_'.$c.'_apellido_equipo_'.$i) }}</strong>
                        </span>
                        @endif                   
                    @endfor
                </div>                    
                </div>
                </div>                   
                @endfor
               
                @else
                	<div class='wrapper-equipos'>
                	@for($i = 0;$i < count($equipos); $i++)
                    
                    <div>
                    {{Form::text('nombre_equipo_'.$i , $equipos[$i]['nombre'] , ['placeholder' => 'Nombre de equipo'])}}
                    </div>


                    <div>
                    {{Form::text('representantes_email_equipo_'.$i , $equipos[$i]['integrantes'][0]['email'] , ['placeholder' => 'Email de representante'])}}

                    </div>
                	<div class="row con_agregar">
                    <div class="col-md-6">
                        <h3><span>jugadores</span></h3>
                    	</div>
                    	<div class="col-md-6">
                        	<a class='agregar-jugador' href="">Agregar Jugador</a>
                    	</div>
                	</div>
                		<p class="mensaje-min">Podés agregar jugadores a este equipo o dejarle esta tarea al representante</p>
                		<div class='wrapper-jugador'>
                    @for($c = 0;$c < count($equipos[$i]['integrantes']); $c++)
						
                        	{{Form::text('jugador_'.$c.'_nombre_equipo_'.$i , $equipos[$i]['integrantes'][$c]['nombre'] , ['placeholder' => 'Nombre'])}}
                        	{{Form::text('jugador_'.$c.'_apellido_equipo_'.$i , $equipos[$i]['integrantes'][$c]['apellido'] , ['placeholder' => 'Apellido'])}}
                    	
             
                    @endfor
                    </div>

                
                	@endfor
                	</div> 
                @endif
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
    @if(Session::has('equipos'))
        var equipos = <?=json_encode(Session::get('equipos'))?>
    @else 
    var equipos = <?=json_encode($countEquipos)?>
    @endif

    console.log(equipos);
</script>
@endsection