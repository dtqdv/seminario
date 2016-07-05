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

        //programacion agregar quitar jugadores

        $('#agregar-equipo').click(function(ev){
            ev.preventDefault();
            equipos[equipos.length] = {jugadores : 0};
            var ultimoEquipo = (equipos.length - 1); 
            $('.equipos').append('<div class="wrapper-equipo"><div><button class="eliminar-equipo" data-equipo="'+ultimoEquipo+'">Eliminar Equipo</button></div><div><input name="nombre_equipo_'+ultimoEquipo+'" type="text" placeholder="Nombre de equipo" data-equipo="'+ultimoEquipo+'"/></div><div><input type="text" name="representantes_email_equipo_'+ultimoEquipo+'" placeholder="Email de representante"/></div><button class="agregar-jugador" data-equipo="'+ultimoEquipo+'">Agregar Jugador</button><div class="jugadores"><input type="text" placeholder="Nombre" name="jugador_0_nombre_equipo_'+ultimoEquipo+'" /><input type="text" placeholder="Apellido" name="jugador_0_apellido_equipo_'+ultimoEquipo+'" /></div></div>');
            asignarClicks();
            asignarClicksEliminarEquipo();
        });

        function asignarClicks()
        {
            $('.agregar-jugador').each(function(idx){
                    $(this).unbind('click').click(function(ev){
                        ev.preventDefault();

                        var equipo = $(this).attr('data-equipo');
                        equipos[equipo].jugadores = equipos[equipo].jugadores + 1;

                        var jugador = equipos[equipo].jugadores;
                        $('.jugadores').eq(equipo).append('<input name="jugador_'+jugador+'_nombre_equipo_'+equipo+'" type="text" placeholder="Nombre" data-jugador="'+jugador+'"/><input name="jugador_'+jugador+'_apellido_equipo_'+equipo+'" type="text" placeholder="Apellido" data-jugador="'+jugador+'"/><button class="eliminar" data-jugador="'+jugador+'" data-equipo="'+equipo+'">Eliminar</button>')
                        asignarClicksEliminar();
                    });
            });
        }
        asignarClicks();

        function asignarClicksEliminar()
        {
                $('.eliminar').each(function(){
                    $(this).unbind('click').click(function(ev){
                        ev.preventDefault();
                        equipos[$(this).attr('data-equipo')].jugadores = equipos[$(this).attr('data-equipo')].jugadores - 1;
                        var jugador = $(this).attr('data-jugador');
                        $('*[data-jugador="'+jugador+'"]').remove();
                        renameInputs($(this).attr('data-equipo'));
                    });
                });
        }
        asignarClicksEliminar();
        var countNombre  = 0;
        var countApellido = 0;
        function renameInputs(equipo)
        {
            
            $('.jugadores').eq(equipo).find('input[placeholder="Nombre"]').each(function(){
                $(this).attr('name' , 'jugador_'+countNombre+'_nombre_equipo_'+equipo);
                countNombre++;
                
            });
            
            $('.jugadores').eq(equipo).find('input[placeholder="Apellido"]').each(function(){
                $(this).attr('name' , 'jugador_'+countApellido+'_apellido_equipo_'+equipo);
                countApellido++;
            });
            countNombre = 0;
            countApellido = 0;
        }
        function asignarClicksEliminarEquipo()
        {
            $('.eliminar-equipo').each(function(){
                $(this).unbind('click').click(function(){
                    $('.wrapper-equipo').eq($(this).attr('data-equipo')).remove();
                    equipos.splice($(this).attr('data-equipo') , 1);
                });
                
            });
        }

});

