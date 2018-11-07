jQuery(document).on('submit','#recoverypassword',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'recovery/updatepassword.php',
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
        }else if(respuesta.tipo == 'password'){
            $('.password').slideDown('slow');
            setTimeout(function(){
                $('.password').slideUp('slow');
            }, 3000);
        }else{
            $('.error').slideDown('slow');
            setTimeout(function(){
                $('.error').slideUp('slow');
            }, 3000);
        }
    })
    .fail(function(resp){
        console.log(resp.responseText);
        $('.error').slideDown('slow');
        setTimeout(function(){
            $('.error').slideUp('slow');
        }, 3000);
    })
    .always(function(){
        console.log("Complete");
    });
});