@extends('layouts.app')
@section('css')
{{Html::style('css/styles.css')}}
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic,300italic,300' rel='stylesheet' type='text/css'>
@endsection
@section('content')
<div class="row row-solapa">
    <div class='solapa-rol'>
        <span>dt</span>
    </div>
</div>
<div class="row row-form">
    <form action="" class="col-xs-10 col-sm-10 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1">
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center wrapper-message'>
                <span>Hola Campeon!</span>
            </div>
            <h1 class="col-md-12 text-center">Logueate</h1>
            <figure class="text-center col-xs-12">
                <img src="img/logo.png" alt="DeTaquito Logo">
            </figure>
            <div class='col-md-12 container-input'>
                <input type="text" placeholder='Usuario' class='input-default'>
            </div>
            <div class='col-md-12 container-input'>
                <input type="text" placeholder='Contraseña' class='input-default'>
            </div>
            <div class='col-md-12 container-input'>
                <input type="submit" value='Iniciar Sesión' class='btn-send'>
            </div>
            <div class="col-md-12 text-center"><a href="">Olvidé mi contraseña</a></div>
        </div>
    </form>
</div>
<div class="row footer-form form-footer-log">
    <div class='col-xs-12 col-md-6 col-md-offset-3 text-center'>
        <span>-No tengo cuenta en DeTaquito</span>
    </div>
    <div class='col-xs-12 col-md-6 col-md-offset-3 text-center'>
        <span><a href="" class='bold'>-REGISTRATE</a></span>
    </div>
    <div class='col-xs-12 col-md-6 col-md-offset-3 text-center'>
        <span><a href="">Ayuda</a></span>
    </div>
</div>
@endsection