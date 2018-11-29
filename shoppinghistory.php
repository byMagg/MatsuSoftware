<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    session_start();
    timeLogOut();
    security(1);
    security(2);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Historial de compra- MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/shoppinghistory.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php";?>   
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="volver"></a>
                    <img id="icon2" src="images/shoppingcart.png" alt="historial">
                    <h1>HISTORIAL DE COMPRAS</h1>
                </div>
                <div id="cuadricula">
                    <select name="orden" required>
                            <option value='asc'>Orden Ascendente</option>
                            <option value='desc'>Orden Descendente</option>
                    </select>

                    <div id="tabla">
                        <table>
                            <tr>
                                <th id="title">Titulo</th>
                                <th id="price">Precio</th>
                                <th id="date">Fecha</th>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>

                            <tr>
                                <td>lorem ipsum</th>
                                <td>0.0</td>
                                <td>dd/mm/aaaa</td>
                            </tr>
                        </table>
                    </div> 
                </div>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>