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
        <link href="css/newslettermanagement.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>   
        <!--CONTENT-->
        <div class="content">
            
            
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt=""></a>
                        <img id="user" src="images/newsletter.png" alt="">
                        <h1>GESTIÓN DE NEWSLETTER</h1>
                </div>

                <div id="tabla">
                    <table>
                        <tr>
                            <th id="id">#</th>
                            <th>Comentario</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                        <tr>
                            <td>1</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>

                        <tr>
                            <td>2</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>

                        <tr>
                            <td>3</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>

                        <tr>
                            <td>4</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>

                        <tr>
                            <td>5</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>

                        <tr>
                            <td>6</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>

                        <tr>
                            <td>7</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>

                        <tr>
                            <td>8</th>
                            <td id="comentario">Tu pta madre manu</td>
                            <td><img id="user" src="images/newsletter.png" alt=""></td>
                        </tr>
                    </table>
                </div>    
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>