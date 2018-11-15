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
        <title>Gestion de videojuego - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/videogamemanagement.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>   
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="volver"></a>
                        <img id="icon2" src="images/games.png" alt="">
                        <h1>GESTIÓN DE VIDEOJUEGOS</h1>
                </div>
                <div id="cuadricula">
                    <div id="tabla">
                        <h1>Lista de videojuegos:</h1>
                        <table>
                            <tr>
                                <th id="id">#</th>
                                <th id="title">Título</th>
                                <th id="title">Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr>
                                <td>1</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>2</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>3</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>4</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>5</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>6</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>7</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>

                            <tr>
                                <td>8</th>
                                <td>lorem ipsum</td>
                                <td>lorem ipsum</td>
                                <td><img class="edit" src="images/lapiz.png" alt="Editar"></td>
                                <td><img class="delete" src="images/eliminar.png" alt="Eliminar"></td>
                            </tr>
                        </table>
                    </div> 
                    
                    <div id="lineavertical"></div>

                    <div id="form">
                        <h1>Añadir videojuego:</h1>
                        <form id="newslettermanagement" action="">
                            <div class="halfleft">
                                <label>Título:*</label>
                                <input type= "text" name="titulo" placeholder=" Introduce el título" />
                                <label>Precio:*</label>
                                <input type= "text" name="price" placeholder=" Introduce el precio" pattern="[0-9]"/>
                                <label>Requisitos del sistema:*</label>
                                <textarea type="msg" name="msg" placeholder=" Introduce los requisitos" required></textarea>
                                <label>Link de la foto:*</label>
                                <input type= "text" name="linkphoto" placeholder=" Introduce el link" />
                            </div>
                            <div class="halfright">
                                <label>Link de compra:*</label>
                                <input type= "text" name="linkpurchase" placeholder=" Introduce el link" />
                                <label>Link del trailer:*</label>
                                <input type= "text" name="linktrailer" placeholder=" Introduce el link" />
                                <label>Descripción:*</label>
                                <textarea type="msg" name="msg" placeholder=" Introduce la descripcion" required></textarea>
                            </div>
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