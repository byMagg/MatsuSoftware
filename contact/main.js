jQuery(document).on('submit','#formulario',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'contact/send.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            $('.sucess').slideDown('slow');
            setTimeout(function(){
                $('.sucess').slideUp('slow');
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