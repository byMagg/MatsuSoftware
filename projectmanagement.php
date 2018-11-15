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
        <link href="css/projectmanagement.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>   
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt=""></a>
                        <img id="icon2" src="images/newsletter.png" alt="">
                        <h1>GESTIÓN DE NEWSLETTER</h1>
                </div>
                <div id="cuadricula">
                    <div id="tabla">
                        <h1>Lista de newsletter:</h1>
                        <table>
                            <tr>
                                <th id="id">#</th>
                                <th id="comment">Comentario</th>
                                <th></th>
                            </tr>

                            <tr>
                                <td>1</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>2</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>3</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>4</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>5</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>6</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>7</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>8</th>
                                <td class="comentario">lorem ipsum</td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>
                        </table>
                    </div> 
                    
                    <div id="lineavertical"></div>

                    <div id="form">
                        <h1>Añadir newsletter:</h1>
                        <form id="newslettermanagement" action="">
                            <label>Introduce el nuevo comentario:</label>
                            <textarea type="msg" name="msg" placeholder=" Introduce el comentario" required></textarea>
                            <button class="button" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>