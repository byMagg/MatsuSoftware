jQuery(document).on('submit','#addcomment',function(event){
    event.preventDefault();

        jQuery.ajax({
            url: 'comment/addcomment.php',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function(){
            }
        })
        .done(function(respuesta){
            console.log(respuesta);
            if(!respuesta.error){
                $('.send').slideDown('slow');
                setTimeout(function(){
                    if((respuesta.category).localeCompare("game") == 0)
                        location.href ="videojuego.php?id=" + respuesta.id;
                    else
                        location.href ="merchandising.php?id=" + respuesta.id;
                }, 3000);
            }else if(respuesta.tipo == 1){
                $('.ac').slideDown('slow');
                setTimeout(function(){
                    $('.ac').slideUp('slow');
                }, 3000);
            }else{
                $('.general').slideDown('slow');
                setTimeout(function(){
                    $('.general').slideUp('slow');
                }, 3000);
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