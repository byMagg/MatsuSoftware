<?php
session_start();  

if(isset($_SESSION['tiempo']) ) {
    $inactivo = 600;
    $vida_session = time() - $_SESSION['tiempo'];

    if($vida_session > $inactivo)
    {    
        header("Location: login/logout.php");
        exit();
    }
}
$_SESSION['tiempo'] = time();       

if(isset($_SESSION['usuario'])){

    if($_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2){
        header("Location: admindash.php");
    }

}else{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Panel de control - MatsuSoftware</title>
        <?php include("footerheader/head.php"); ?>
        <link href="css/userdash.css" type="text/css" rel="stylesheet">
    </head>
                    
        <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>
                    
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <a id="cerrar" class="nohover" href="login/logout.php"><img src="images/logout.png" alt=""></a>
                <div class="item">
                    <a class="nohover" href="#"><img src="images/shoppingcart.png" alt="Historial de compras"></a>
                    <a href="#" class="button">Historial de compras</a>
                </div>
                <div class="item">
                    <a class="nohover" href="#"><img src="images/confuser.png" alt="Modificar perfil"></a>
                    <a href="#" class="button">Modificar perfil</a>
                </div>
                <div class="item">
                    <a class="nohover" href="#"><img src="images/deleteuser.png" alt="Eliminar perfil"></a>
                    <a href="#" class="button">Eliminar perfil</a>
                </div>
            </div>
        </div>
                            
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>