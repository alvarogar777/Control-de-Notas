
jQuery(document).on('submit','#formLg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'main_app/login.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('.botonlg').val('Validando....');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {
                  if (respuesta.tipo=='Root') {
                    location='vistas/Root/';
                  }if (respuesta.tipo=='Admin') {
                    location='vistas/Administrativa/';
                  }
                   if (respuesta.tipo=='Catedratico') {
                    location='vistas/Catedraticos/';
                  }
                   if (respuesta.tipo=='Propietario') {
                    location='vistas/Propietario/';
                  }
                }else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },2000);
                $('.botonlg').val('Iniciar Secion');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });
