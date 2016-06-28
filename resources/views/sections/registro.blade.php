@extends('layouts.app')
@section('css')
{{Html::style('css/styles.css')}}
@endsection
@section('content')
<div class="row row-solapa">
		<div class='solapa-rol'>
			<span>dt</span>
		</div>
	</div>
	<div class="row row-form">
		<form action="" class='col-xs-10 col-sm-10 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1'>
			<div class="row">
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center wrapper-message'>
					<span>¿Listo para crear tus propios torneos?</span>
				</div>
					<h1 class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'>Registrate Gratis</h1>
				<figure class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'>
					<img src="img/img-login.png" alt="logueate">
				</figure>
				<div class='col-xs-12 col-sm-5 col-md-5 col-lg-5 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 container-input'>
					<input type="text" placeholder='Nombre' class='input-default'>
				</div>
				<div class='col-xs-12 col-sm-5 col-md-5 col-lg-5  container-input'>
					<input type="text" placeholder='Apellido' class='input-default'>
				</div>
				<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
					<input type="text" placeholder='Correo' class='input-default'>
					<div class='input-description'>
						<span>Se te enviara un mail al correo solicitado para confirmar la cuenta.</span>
					</div>
				</div>
				<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
					<input type="text" placeholder='Contraseña' class='input-default'>
					<div class='input-description'>
						<span>Combinacion de hasta 6 numeros , letras y simbolos</span>
					</div>
				</div>
				<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
					<input type="text" placeholder='Repetir Contraseña' class='input-default'>
				</div>
				<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1'>
					<p class='input-description'>Al hacer click aceptas las Condiciones y confirmas que has leido
						nuestra Politica de datos , incluido el Uso de cookies</p>
				</div>
				<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
					<input type="submit" value='Registrarse' class='btn-send'>
				</div>
			</div>
		</form>		
	</div>
	<div class="row footer-form">
		<div class='col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center'>
			<span>-Ya tengo cuenta en DeTaquito</span>
		</div>
		<div class='col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center'>
			<strong class='text-uppercase'>-Loguea</strong>
		</div>
	</div>
	<div class="row footer-form">
		<div class='col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center'>
			<span>¿<strong>Por Que</strong> me piden esta informacion?</span>
		</div>
		
	</div>

@endsection