jQuery(document).on('submit','#modifyvideogame',function(event){
    event.preventDefault();

    var respuesta=confirm("¿Desea modificar el videojuego?");
    if(respuesta==true){
        jQuery.ajax({
            url: 'videogamemanagement/modify.php',
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
        window.location="login.php";
    }
});