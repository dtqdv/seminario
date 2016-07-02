    var i= 0;
    var countEquipos = 0;
    var jugadores = [0];
    $('document').ready(function(){
        seteaButtons();
        function seteaButtons(){
            if(i == 0){
                $('#anterior_btn').hide();
            }else{
                $('#anterior_btn').show();
            }
            if(i == 3){
                $('#siguiente_btn').hide();
                $('#confirmar_btn').show();
            }else{
                $('#siguiente_btn').show();
                $('#confirmar_btn').hide();
            }
        }
        $('#siguiente_btn').click(function(e){
            var currentId= $('.slider section').eq(i+1).attr('id');
            var ruta= '#'+currentId;
            $('#siguiente_btn').attr('href',ruta);
            i++;
            $('.slider section').hide();
            $('.slider section').eq(i).fadeIn('slow','swing');
            seteaButtons();
        });
        $('#anterior_btn').click(function(e){
            var currentId= $('.slider section').eq(i-1).attr('id');
            var ruta= '#'+currentId;
            $('#anterior_btn').attr('href',ruta);
            i--;
            $('.slider section').hide();
            $('.slider section').eq(i).fadeIn('slow','swing');
            seteaButtons();
        });

        //programacion agregar jugadores dinamicos
        function asignarClicks()
        {

        $('.agregar-jugador').each(function(idx){
           
            $(this).unbind('click').click(function(ev){

                ev.preventDefault();
                var idx = $('.agregar-jugador').index($(this));
                jugadores[idx] = jugadores[idx] + 1;
                $(".wrapper-jugador").eq(idx).append('<input type="text" name="jugador_'+jugadores[idx]+'_nombre_equipo_'+idx+'" placeholder="Nombre"/><input type="text" name="jugador_'+jugadores[idx]+'_apellido_equipo_'+idx+'" placeholder="Apellido"/>');
                });                
             

           
        });            
        }

        $('#agregar-equipo').click(function(ev){
            ev.preventDefault();
            countEquipos++;
            jugadores.push(0);
            $('.wrapper-equipos').append('<div><input type="text" name="nombre_equipo_'+countEquipos+'" placeholder="Nombre de equipo"/></div><div><input type="text" name="representantes_email_equipo_'+countEquipos+'" placeholder="Email de representante"/></div><div class="row con_agregar"><div class="col-md-6"><h3><span>jugadores</span></h3></div><div class="col-md-6"><a class="agregar-jugador" href="">Agregar jugador</a></div></div><p class="mensaje-min">Podes agregar jugadores a este equipo o dejarle esta tarea al representante</p><div class="wrapper-jugador"><input type="text" name="jugador_0_nombre_equipo_'+countEquipos+'" placeholder="Nombre" /><input type="text" name="jugador_0_apellido_equipo_'+countEquipos+'" placeholder="Apellido" /></div>');
            asignarClicks();
        });
         asignarClicks();


});


    /*


                    <div>
                    {{Form::text('nombre_equipo_0' , null , ['placeholder' => 'Nombre de equipo'])}}
                    </div>
                    <div>
                    {{Form::text('representantes_email_equipo_0' , null , ['placeholder' => 'Email de representante'])}}
                    </div>
                <div class="row con_agregar">
                    <div class="col-md-6">
                        <h3><span>jugadores</span></h3>
                    </div>
                    <div class="col-md-6">
                        <button type="button" data-toggle="modal" data-target="#myModal" id='agregar-jugador'>Agregar Jugador</button>
                    </div>
                </div>
                <p class="mensaje-min">Podés agregar jugadores a este equipo o dejarle esta tarea al representante</p>
                    <div>
                        {{Form::text('jugador_0_nombre_equipo_0' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_0_apellido_equipo_0' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_1_nombre_equipo_0' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_1_apellido_equipo_0' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_2_nombre_equipo_0' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_2_apellido_equipo_0' , null , ['placeholder' => 'Apellido'])}}
                    </div>
                    <div>
                        {{Form::text('jugador_3_nombre_equipo_0' , null , ['placeholder' => 'Nombre'])}}
                        {{Form::text('jugador_3_apellido_equipo_0' , null , ['placeholder' => 'Apellido'])}}
                    </div>
    */