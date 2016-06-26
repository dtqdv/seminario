@extends('layouts.app')
@section('content')
<div class="portada-crear"><h1>Crear Torneo</h1></div>
<main>
    <div id="pasos">
    	{{Form::open(['url' => 'crear-torneo/create' , 'method' => 'post'])}}
    	{{Form::text('nombre' , null , ['placeholder' => 'nombre de torneo'])}}
    	{{Form::text('lugar' , null , ['placeholder' => 'Direccion'])}}
    	{{Form::text('fecha_inicio' , null , ['placeholder' => 'Fecha de inicio'])}}
    	{{Form::text('min_equipos' , null , ['placeholder' => 'Minimo de equipos'])}}
    	{{Form::text('max_equipos' , null , ['placeholder' => 'Maximo de equipos'])}}
    	{{Form::text('equipo_nombre[]' , null , ['placeholder' => 'Nombre del equipo'])}}
    	{{Form::text('equipo0_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo0_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo0_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo0_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo0_representante[]' , null , ['placeholder' => 'id representante'])}}
       	{{Form::text('equipo_nombre[]' , null , ['placeholder' => 'Nombre del equipo'])}}
    	{{Form::text('equipo1_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo1_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo1_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo1_jugador[]' , null , ['placeholder' => 'Ingrese nombre de jugador'])}}
    	{{Form::text('equipo1_representante[]' , null , ['placeholder' => 'id representante'])}}
    	{{Form::submit('Crear Torneo')}}
    	{{Form::close()}}
        <!--<form action="">
        <section id="paso-1" class="text-center">
            <div class="text-center"><img src="imgs/pasonum-1.png" alt="Paso 1"></div>
            <h2 class="text-center">Nombre</h2>
            <p>Para empezar a crear tu torneo personalizado, ingresá el <strong>nombre</strong> con el que
            lo identificarán. Este va a estar disponible en el buscador</p>
            <div>
                <input type="text" name="nombre" placeholder="Ingrese nombre del torneo aqui">
            </div>
        </section>
        <section id="paso-dos">
            <div class="text-center"><img src="imgs/pasonum-2.png" alt="Paso 2"></div>
            <h2 class="text-center">Detalles</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h3><span>Sexo</span> del torneo</h3>
                        <div>
                            <input type="text" name="lugar" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3><span>Fecha</span> de inicio</h3>
                        <div>
                            <input type="text">
                        </div>
                    </div>
                    <div>
                        <select name="cancha">
                            <option disabled selected>Cancha</option>
                            <option>opcion</option>
                        </select>
                    </div>
                </div>
        </section>
        <section id="paso-tres" class="text-center">
            <div class="text-center"><img src="imgs/pasonum-3.png" alt="Paso 2"></div>
            <h2 class="text-center">Equipos</h2>
            <div>
                <h3><span>Mínimo</span> de equipos</h3>
                <div><input type="number" min="2" name="min_equipos"></div>
                <h3><span>Máximo</span> de equipos</h3>
                <div><input type="number" min="2" name="max_equipos"></div>
            </div>
            <div>
                <h3><span>Equipos</span></h3>
                <a href="">Agregar</a>
                <div><input type="search" placeholder="Nombre de equipo"></div>
                <div><input type="text" placeholder="Representante"></div>
                <h3><span>jugadores</span></h3>
                <a href="">Agregar</a>
                <ul>
                    <li>Jugador 1</li>
                    <li>Jugador 2</li>
                </ul>
            </div>
        </section>
            <section id="paso-cuatro">
                <div class="text-center"><img src="imgs/pasonum-4.png" alt="Paso 2"></div>
                <h2 class="text-center">Confirmación</h2>
                <div class="text-center">
                <p>La creación del torneo fue realizada con exito.  A continuación te mostraremos el detalle del torneo
                    creado. Tenés la posibilidad de editar el contenido apretando el botón de VOLVER.</p>
                <div><img src="imgs/confirmado.png" alt="Confirmado"></div>
                <h3>Torneo DaVinci</h3>
                <div></div>
                </div>
                <div class="row">
                    <ul class="col-md-6">
                        <li>Femenino</li>
                        <li>Sub 20</li>
                        <li>Liga</li>
                    </ul>
                    <ul class="col-md-6">
                        <li>Corrientes 2323, CABA</li>
                        <li>11</li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="col-md-6">
                        <li><h4>Equipo</h4></li>
                        <li>Equipo</li>
                        <li>Equipo</li>
                        <li>Equipo</li>
                        <li>Equipo</li>
                        <li>Equipo</li>
                        <li>Equipo</li>
                        <li>Equipo</li>
                    </ul>
                    <ul class="col-md-6">
                        <li><h4>Represante</h4></li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                        <li>Fulano</li>
                    </ul>
                </div>
            </section>
            <div class="row">
                <div class="col-md-4"><a href="#">Anterior</a></div>
                <div class="col-md-4"><a href="#">Ayuda</a> - información adicional</div>
                <div class=" "><a href="">Siguiente</a></div>
                <div class="col-md-4"><input type="submit" value="Confirmar"></div>
            </div>
        </form>-->
    </div>
</main>
@endsection