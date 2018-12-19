<?php
    require 'controller/generalfunction.php';
    session_start();
    timeLogOut();
    security(0);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Panel de control - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/admindash.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>             
        <!--CONTENT-->
        <div id="principal" class="content">
            <div id="content" class="content-inside">
                <a id="cerrar" class="nohover" href="login/logout.php"><img src="images/logout.png" alt=""></a><h4>Bienvenido, <?php echo $_SESSION['usuario']['nick']?></h4>
                <div id="1" class="item"><a class="nohover" href="usermanagement.php"><img src="images/user.png" alt="Gestión de Usuarios"></a><a href="usermanagement.php" class="button">Gestión de Usuarios</a></div>
                <div id="2" class="item"><a class="nohover" href="newslettermanagement.php"><img src="images/newsletter.png" alt="Gestion de NewsLetter"></a><a href="newslettermanagement.php" class="button">Gestión de Newsletter</a></div>
                <div id="3" class="item"><a class="nohover" href="projectmanagement.php"><img src="images/stats.png" alt="Gestión de Proyectos"></a><a href="projectmanagement.php" class="button">Gestión de Proyectos</a></div>
                <div id="4" class="item"><a class="nohover" href="videogamemanagement.php"><img src="images/games.png" alt="Gestión de Videojuegos"></a><a href="videogamemanagement.php" class="button">Gestión de Videojuegos</a></div>
                <div id="5" class="item"><a class="nohover" href="merchandisingmanagement.php"><img src="images/merchan.png" alt="Gestión de Merchandising"></a><a href="merchandisingmanagement.php" class="button">Gestión de Merchandising</a></div>
                <div id="6" class="item"><a class="nohover" href="commentmanagement.php"><img src="images/comment.png" alt="Gestión de Comentarios"></a><a href="commentmanagement.php" class="button">Gestión de Comentarios</a></div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>