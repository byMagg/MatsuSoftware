<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    session_start();
    timeLogOut();
    security(0);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Gestion de newsletter - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/usermanagement.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>   
        <!--CONTENT-->
        <div class="content">
            
            <div id="cabecera">
            <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt=""></a>
                <img id="user" src="images/newsletter.png" alt="">
                <h1>GESTIÓN DE NEWSLETTER</h1>
            </div>
            <div id="content" class="content-inside">
            
                <table id="tabla">
                    <tr>
                        <th>#</th>
                        <th>Comentario</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                    <tr>
                        <th>1</th>
                        <th colspan = "3">Comentario 1</th>
                        <th><img id="user" src="images/newsletter.png" alt=""></th>
                        <th></th>
                        <th></th>
                    </tr>

                </table>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>