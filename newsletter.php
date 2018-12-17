<?php
    require 'conexiondb/conexion.php';
    require 'controller/querysfunction.php';

    if(isset($_GET['orden'])){
        $resultado = getNewsletter($mysqli, $_GET['orden']);
    }else{
        $resultado = getNewsletter($mysqli, 'DESC');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Newsletter - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/newsletter.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <h1>NEWSLETTER:</h1>
                </div>

                <div id="cuadricula">                
                    <form id="" action="">
                        <label>Ordenación:</label>
                        <select name="orden" required>
                            <option value='DESC' <?php if(isset($_GET['orden']) && $_GET['orden'] == 'DESC') echo 'selected'; ?>>Más recientes primero</option>
                            <option value='ASC' <?php if(isset($_GET['orden']) && $_GET['orden'] == 'ASC') echo 'selected'; ?>>Más antiguo primero</option>
                        </select>
                        <input type="submit" value="Actualizar"/>
                    </form>
                
                    <div id="tabla">
                        <table>
                            <?php
                                while($news = $resultado->fetch_assoc()){
                                    echo "<tr>
                                          <td><h4 class='fecha'>".$news['publishDate']."</h4><p>".$news['comment']."</p></td>
                                          </tr>";   
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>