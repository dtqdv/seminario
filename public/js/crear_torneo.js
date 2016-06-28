    
    $('document').ready(function(){
    	var i= 0;
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
        });