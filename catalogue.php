<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/querysfunction.php';
    session_start();
    timeLogOut();
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
                                    <div class='item'><a class='nohover' href='videojuego.php?id='".$product['idProduct']."'><img src='".$product['photoLink']."' alt='Foto'><div><h2>".$product['title']."</h2><h4>- Precio: ".$product['price']." €</h4></div></div></a>
                                    ";
                                }
                            ?>
                    </div>
                    <div id="merchandising">
                        <div id="h1merch"><h1>MERCHANDISING</h1></div>
                            <?php
                                $resultado = getMerchandising($mysqli);
                                while($product = $resultado->fetch_assoc()){
                                    echo "
                                    <div class='item'><a class='nohover' href='merchandising.php?id='".$product['idProduct']."' alt='Foto'><div><h2>".$product['title']."</h2><h4>- Precio: ".$product['price']." €</h4></div></div></a>
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
</html>
