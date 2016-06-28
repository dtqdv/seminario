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
        {{Form::open(['url' => '/register' , 'method' => 'post' , 'class' => 'col-xs-10 col-sm-10 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1'])}}
            <div class="row">
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center wrapper-message'>
                    <span>¿Listo para crear tus propios torneos?</span>
                </div>
                    <h1 class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'>Registrate Gratis</h1>
                <figure class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'>
                    <img src="img/img-login.png" alt="logueate">
                </figure>
                <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 container-input'>
                    {{Form::text('nombre' , null , ['placeholder' => 'Nombre' , 'class' => 'input-default'])}}
                        @if($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                        @endif
                </div>
                <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5  container-input'>
                    {{Form::text('apellido' , null , ['placeholder' => 'Apellido' , 'class' => 'input-default'])}}
                        @if($errors->has('apellido'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellido') }}</strong>
                        </span>
                        @endif
                </div>
                <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
                    {{Form::text('email' , null , ['placeholder' => 'Email' , 'class' => 'input-default'])}}
                        @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    <div class='input-description'>
                        <span>Se te enviara un mail al correo solicitado para confirmar la cuenta.</span>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
                    {{Form::password('password' , ['placeholder' => 'Contraseña' , 'class' => 'input-default'])}}
                        @if($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    <div class='input-description'>
                        <span>Combinacion de hasta 6 numeros , letras y simbolos</span>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
                    {{Form::password('password_confirmation' ,  ['placeholder' => 'Repetir contraseña' , 'class' => 'input-default'])}}
                        @if($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                </div>
                <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1'>
                    <p class='input-description'>Al hacer click aceptas las Condiciones y confirmas que has leido
                        nuestra Politica de datos , incluido el Uso de cookies</p>
                </div>
                <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 container-input'>
                    {{Form::submit('Registrarse' , ['class' => 'btn-send'])}}
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
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
