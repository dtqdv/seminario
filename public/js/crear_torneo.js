    var i= 0;
    

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
                console.log(equipos[idx].jugadores);
                
                equipos[idx].jugadores = equipos[idx].jugadores + 1;
                $(".wrapper-jugador").eq(idx).append('<input type="text" name="jugador_'+equipos[idx].jugadores+'_nombre_equipo_'+idx+'" placeholder="Nombre"/><input type="text" name="jugador_'+equipos[idx].jugadores+'_apellido_equipo_'+idx+'" placeholder="Apellido"/>');
                
                });               
             

           
        });            
        }

        $('#agregar-equipo').click(function(ev){
            ev.preventDefault();
            equipos.push({jugadores : 0});
            var ultimoEquipo = equipos.length - 1;
            $('.wrapper-equipos').append('<div><input type="hidden" name="index_equipo_'+ultimoEquipo+'"/></div><div><input type="text" name="nombre_equipo_'+ultimoEquipo+'" placeholder="Nombre de equipo"/></div><div><input type="text" name="representantes_email_equipo_'+ultimoEquipo+'" placeholder="Email de representante"/></div><div class="row con_agregar"><div class="col-md-6"><h3><span>jugadores</span></h3></div><div class="col-md-6"><a class="agregar-jugador" href="">Agregar jugador</a></div></div><p class="mensaje-min">Podes agregar jugadores a este equipo o dejarle esta tarea al representante</p><div class="wrapper-jugador"><input type="text" name="jugador_0_nombre_equipo_'+ultimoEquipo+'" placeholder="Nombre" /><input type="text" name="jugador_0_apellido_equipo_'+ultimoEquipo+'" placeholder="Apellido" /></div>');
            asignarClicks();
        });
         asignarClicks();


});

