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
    
    if($_SESSION['usuario']['rol'] == 0){
        header("Location: userdash.php");
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
        <link href="css/admindash.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>
                    
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <a id="cerrar" href="login/logout.php"><img src="images/logout.png" alt="">Cerrar sesión</a>
                <div id="1" class="item"><a class="nohover" href="usermanagement.php"><img src="images/user.png" alt="Gestión de Usuarios"></a><a href="usermanagement.php" class="button">Gestión de Usuarios</a></div>
                <div id="2" class="item"><a class="nohover" href=""><img src="images/newsletter.png" alt=""></a><a href="Gestión de Newsletter" class="button">Gestión de Newsletter</a></div>
                <div id="3" class="item"><a class="nohover" href=""><img src="images/stats.png" alt="Gestión de Proyectos"></a><a href="" class="button">Gestión de Proyectos</a></div>
                <div id="4" class="item"><a class="nohover" href=""><img src="images/games.png" alt="Gestión de Videojuegos"></a><a href="gestionVideojuego.php" class="button">Gestión de Videojuegos</a></div>
                <div id="5" class="item"><a class="nohover" href=""><img src="images/merchan.png" alt="Gestión de Merchandising"></a><a href="" class="button">Gestión de Merchandising</a></div>
            </div>
        </div>
                            
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>