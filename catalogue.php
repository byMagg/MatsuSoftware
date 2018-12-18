<?php
    require 'conexiondb/conexion.php';
    require 'controller/querysfunction.php';

    if(isset($_GET['kind'])){
        if($_GET['kind'] == "ALL"){
            $merch = getMerchandising($mysqli, "ALL");
        }else{
            $merch = getMerchandising($mysqli, $_GET['kind']);
        }
    }else{
        $merch = getMerchandising($mysqli, "ALL");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Catálogo - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/catalogue.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <!--CONTENT-->
        <div class="content">
            <div class="content-inside">
                <div id="content">
                    <div id="videojuegos">
                        <div id="h1apps"><h1>VIDEOJUEGOS</h1></div>
                            <?php
                                $resultado = getVideogames($mysqli);
                                while($product = $resultado->fetch_assoc()){
                                    echo "
                                    <div class='item'><a class='nohover' href='videojuego.php?id=".$product['idProduct']."'><img src='".$product['photoLink']."' alt='Foto'><div><h2>".$product['title']."</h2><h4>".$product['price']." €</h4></div></div></a>
                                    ";
                                }
                            ?>
                    </div>
                    <div id="merchandising">
                        <div id="h1merch"><h1>MERCHANDISING</h1></div>
                            <form id="kind" action="">
                                <select name="kind" required>
                                    <option value='' disabled selected>Seleccione una categoria</option>
                                    <option value="ALL">Todo</option>
                                    <?php
                                        $resultado = getCategory($mysqli);
                                        while($cat = $resultado->fetch_assoc()){
                                            echo "<option value='".$cat['kind']."'>".$cat['kind']."</option>";
                                        }
                                    ?>
                                </select>
                                <button class="button" type="submit">Actualizar</button>
                            </form>
                            <?php
                                
                                while($product = $merch->fetch_assoc()){
                                    echo "
                                    <div class='item'><a class='nohover' href='merchandising.php?id=".$product['idProduct']."'><img src='".$product['photoLink']."' alt='Foto'><div><h2>".$product['title']."</h2><h4>".$product['price']." €</h4></div></div></a>
                                    ";
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>
