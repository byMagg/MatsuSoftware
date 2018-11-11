jQuery(document).on('submit','#registro',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'register/gestionregistro.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            $('.success').slideDown('slow');
            setTimeout(function(){
                $('.success').slideUp('slow');
            }, 3000);
        }else{
            if(respuesta.tipo == 'nick'){
                $('.nick').slideDown('slow');
                setTimeout(function(){
                    $('.nick').slideUp('slow');
                }, 3000);
            }else if(respuesta.tipo == 'email'){
                $('.email').slideDown('slow');
                setTimeout(function(){
                    $('.email').slideUp('slow');
                }, 3000);
            }else{
                $('.general').slideDown('slow');
                setTimeout(function(){
                    $('.general').slideUp('slow');
                }, 3000);
            }
        }
    })
    .fail(function(resp){
        console.log(resp.responseText);
        $('.general').slideDown('slow');
        setTimeout(function(){
            $('.general').slideUp('slow');
        }, 3000);
    })
    .always(function(){
        console.log("Complete");
    });
});