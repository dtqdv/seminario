@extends('layouts.dashboard')
@section('css')
{{Html::style('css/torneos-user.css')}}
@endsection
@section('content')

    <div id="form-editar" class="container-fluid">
        <div class="container">
            <h2 class="roboto">Mis torneos</h2>
            @if (isset($torneos) && $torneos != null)
            <table class="table table-fill roboto">
                <thead >
                <tr class="color-thead">
                    <th class="text-left primer">NOMBRE</th>
                    <th class="text-left ultima">OPCIONES</th>
                </tr>
                </thead>
                <tbody class="table-hover">
                @for ($i = 0;$i < count($torneos);$i++)
                    <tr>
                        <td class='text-left primer'>
                            {{$torneos[$i]['nombre']}} <!--fijarme despues lo de la inyeccion de scripts-->
                        </td>
                        <td class='iconos text-left ultima'>
                            {{link_to_route('torneo' , 'editar' , ['id' => $torneos[$i]['id']] , [])}}

                            <!--<a href="#"><img class="editar" src="img/editar.png" alt="Editar"></a><a href="#"><img class="borrar" src="img/borrar.png" alt="Borrar"></a>-->
                        </td>
                    </tr>
                @endfor
                <!--<tr>
                    <td class="text-left primer">Supertazon Isotopos</td>
                    <td class="iconos text-left ultima"><a href="#"><img class="editar" src="img/editar.png" alt="Editar"></a><a href="#"><img class="borrar" src="img/borrar.png" alt="Borrar"></a></td>
                </tr>
                <tr>
                    <td class="text-left primer">Torneo Lanus</td>
                    <td class="iconos text-left ultima"><a href="#"><img class="editar" src="img/editar.png" alt="Editar"></a><a href="#"><img class="borrar" src="img/borrar.png" alt="Borrar"></a></td>
                </tr>
                <tr>
                    <td class="text-left primer">Caca con choclo</td>
                    <td class="iconos text-left ultima"><a href="#"><img class="editar" src="img/editar.png" alt="Editar"></a><a href="#"><img class="borrar" src="img/borrar.png" alt="Borrar"></a></td>
                </tr>
                <tr>
                    <td class="text-left primer">Torneo de peques</td>
                    <td class="iconos text-left ultima"><a href="#"><img class="editar" src="img/editar.png" alt="Editar"></a><a href="#"><img class="borrar" src="img/borrar.png" alt="Borrar"></a></td>
                </tr>-->
                </tbody>
            </table>
            @else
                <div>No creaste ningun torneo</div>
            @endif
            {{link_to_route('crear-torneo' , 'Crear Torneo')}}
            <!--<input type="button" value="Crear Torneo" class="btn btn-block btn-torneo">-->
        </div>
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
@endsection