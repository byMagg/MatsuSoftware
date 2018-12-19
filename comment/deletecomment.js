jQuery(document).on('submit','#deletecomment',function(event){
    event.preventDefault();

    var respuesta=confirm("¿Desea eliminar el comentario?");
    if(respuesta==true){
        jQuery.ajax({
            url: 'comment/deletecomment.php',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function(){
            }
        })
        .done(function(respuesta){
            console.log(respuesta);
            if(!respuesta.error){
                $('.delete').slideDown('slow');
                setTimeout(function(){
                    if((respuesta.category).localeCompare("game") == 0)
                        location.href ="videojuego.php?id=" + respuesta.id;
                    else
                        location.href ="merchandising.php?id=" + respuesta.id;
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
    }else{

    }
});