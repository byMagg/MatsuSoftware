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
        <title>Proyectos Futuros - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/project.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <!--CONTENT-->
        <div class="content">
            <div class="content-inside">
                <h1>PROYECTOS FUTUROS:</h1>
                <div id="proyectos">
                    <?php
                        $resultado = getProjects($mysqli);
                        while($project = $resultado->fetch_assoc()){
                            echo "
                            <div class='item'><img src=".$project['photoLink']." alt='Foto del proyecto'><h3>".$project['title']."</h3><p>".$project['descrip']."</p><div class='linea'></div></div>
                            
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>