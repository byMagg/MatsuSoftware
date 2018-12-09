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
        <title>Gestion de merchandising - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/merchandisingmanagement.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>   
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="volver"></a>
                    <img id="icon2" src="images/merchan.png" alt="merch">
                    <h1>GESTIÓN DE MERCHANDISING</h1>
                </div>
                <div id="cuadricula">
                    <div id="tabla">
                        <h1>Lista de merchandising:</h1>
                        <table>
                            <tr>
                                <th id="id">#</th>
                                <th id="title">Titulo</th>
                                <th id="price">Precio</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr>
                                <td>1</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>2</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>3</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>4</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>5</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>6</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>7</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>8</th>
                                <td>lorem ipsum</td>
                                <td>0.0</td>
                                <td><a class="icono nohover" href=""><img src="images/lapiz.png" alt="Modificar"></a></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>
                        </table>
                    </div> 
                    
                    <div id="lineavertical"></div>

                    <div id="form">
                        <h1>Añadir merchandising:</h1>
                        <form id="merchandisingmanagement" action="">
                            <label>Título:</label>
                            <input type="text" name="tit" placeholder=" Introduce el titulo" required>

                            <label>Link de la imagen:</label>
                            <input type="text" name="link" placeholder=" Introduce el link de la imagen" required>

                            <label>Link de compra:</label>
                            <input type= "text" name="linkpurchase" placeholder=" Introduce el link de compra" />

                            <label>Descripción:</label>
                            <textarea name="desc" placeholder=" Introduce la descripción" required></textarea>

                            <label>Precio:</label>
                            <input type="text" pattern="[0-9]" name="price" placeholder=" Introduce el precio" required>

                            <button class="button" type="submit">Añadir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>