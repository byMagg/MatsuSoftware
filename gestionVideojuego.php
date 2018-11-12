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
        <title>Gestion Videojuegos - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/gestionvideojuego.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>

        <div class="content">            
            <div id = "content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt=""></a>
                    <img id="user" src="images/games.png" alt="">
                    <h1>GESTIÓN DE VIDEOJUEGOS</h1>
                </div>
                
                <div id="tabla">
                    <table>
                        <tr>
                            <th id="id">#</th>
                            <th>Título</th>
                            <th>Descripción</th>
                        </tr>
                            
                        <tr>
                            <td>1</td>
                            <td id="comentario">Soleado</td>
                            <td><a class="icono nohover"><img src="images/eliminar.png"></a></td>
                            <td><a class="icono nohover"><img src="images/lapiz.png"></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>