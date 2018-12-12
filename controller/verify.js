function verifyDeleteAdmin(id){
    var respuesta=confirm("¿Desea eliminar el usuario?");
    if(respuesta==true)
        window.location="usermanagement.php?id=" + id;
    else
        window.location="usermanagement.php";
}

function verifyDeleteUser(id){
    var respuesta=confirm("¿Desea eliminar el usuario?");
    if(respuesta==true)
        window.location="userdash.php?id=" + id;
    else
        window.location="login.php";
}

function verifyDeleteProductVideogame(id){
    var respuesta=confirm("¿Desea eliminar el videojuego?");
    if(respuesta==true)
        window.location="videogamemanagement.php?id=" + id;
    else
        window.location="videogamemanagement.php";
}

function verifyDeleteProductMerchandising(id){
    var respuesta=confirm("¿Desea eliminar el merchandising?");
    if(respuesta==true)
        window.location="merchandisingmanagement.php?id=" + id;
    else
        window.location="merchandisingmanagement.php";
}

function verifyDeleteNewsletter(id){
    var respuesta=confirm("¿Desea eliminar el newsletter?");
    if(respuesta==true)
        window.location="newslettermanagement.php?id=" + id;
    else
        window.location="newslettermanagement.php";
}

function verifyDeleteProject(id){
    var respuesta=confirm("¿Desea eliminar el proyecto?");
    if(respuesta==true)
        window.location="projectmanagement.php?id=" + id;
    else
        window.location="projectmanagement.php";
}

function verifyDeleteComment(id){
    var respuesta=confirm("¿Desea eliminar el comentario?");
    if(respuesta==true)
        window.location="commentmanagement.php?idComment=" + id + "&validate=" + 0;
    else
        window.location="commentmanagement.php";
}

function verifyAcceptComment(id){
    var respuesta=confirm("¿Desea validar el comentario?");
    if(respuesta==true)
        window.location="commentmanagement.php?idComment=" + id + "&validate=" + 1 ;
    else
        window.location="commentmanagement.php";
}