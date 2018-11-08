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
                <a href="login/logout.php">Cerrar sesión</a>
            </div>
        </div>
                            
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>