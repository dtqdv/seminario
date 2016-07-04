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
    {{Form::open(['route' => 'login_action' , 'method' => 'post' , 'class' => 'col-xs-10 col-sm-10 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1'])}}
    <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center wrapper-message'>
            <span>Hola Campeon!</span>
        </div>
        <h1 class="col-md-12 text-center">Logueate</h1>
        <figure class="text-center col-xs-12">
            <img src="img/logo.png" alt="DeTaquito Logo">
        </figure>
        <div class='col-md-12 container-input'>
        {{Form::text('email' , null , ['placeholder' => 'Email' , 'class' => 'input-default'])}}
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class='col-md-12 container-input'>
        {{Form::password('password' , ['class' => 'input-default' , 'placeholder' => 'Contraseña'])}}
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        {{Form::submit('Iniciar Sesion' , ['class' => 'btn-send'])}}
        {{Form::close()}}   
    </div>
    
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
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
