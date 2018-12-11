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

<<<<<<< HEAD
function verifyDeleteNewsletter(id){
    var respuesta=confirm("¿Desea eliminar el newsletter?");
    if(respuesta==true)
        window.location="newslettermanagement.php?id=" + id;
    else
        window.location="newslettermanagement.php";
=======
function verifyDeleteProject(id){
    var respuesta=confirm("¿Desea eliminar el proyecto?");
    if(respuesta==true)
        window.location="projectmanagement.php?id=" + id;
    else
        window.location="projectmanagement.php";
>>>>>>> 1007da96567e0c0d66d1cebc9402528fdb83103c
}