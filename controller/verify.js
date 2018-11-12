function verifyDeleteAdmin(id){
    var respuesta=confirm("¿Desea eliminar el usuario?");
    if(respuesta==true)
        window.location="usermanagement.php?id=" + id;
    else
        window.location="login.php";
}

function verifyDeleteUser(id){
    var respuesta=confirm("¿Desea eliminar el usuario?");
    if(respuesta==true)
        window.location="userdash.php?id=" + id;
    else
        window.location="login.php";
}