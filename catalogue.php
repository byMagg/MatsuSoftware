<?php
    require 'conexiondb/conexion.php';
    require 'controller/querysfunction.php';

    if(isset($_GET['pagMerchandising'])){
        $pagM = $_GET['pagMerchandising'];
    }else{
        $pagM = 1;
    }

    if(isset($_GET['kind'])){
        if($_GET['kind'] == "ALL"){
            $merch = getMerchandisingPag($mysqli, "ALL", $pagM);
        }else{
            $merch = getMerchandisingPag($mysqli, $_GET['kind'], $pagM);
        }
        $kind = $_GET['kind'];
    }else{
        $merch = getMerchandisingPag($mysqli, "ALL", $pagM);
        $kind = 'ALL';
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
                        <div class="separator"></div>
                            <?php
                                if(isset($_GET['pagVideojuego'])){
                                    $pagV = $_GET['pagVideojuego'];
                                }else{
                                    $pagV = 1;
                                }

                                $resultado = getVideogamesPag($mysqli, $pagV);

                                while($product = $resultado->fetch_assoc()){
                                    echo "
                                    <div class='item'><a class='nohover' href='videojuego.php?id=".$product['idProduct']."'><img src='".$product['photoLink']."' alt='Foto del videojuego'><div class='info'><h2>".$product['title']."</h2><h4>".$product['price']." €</h4></div></div></a>
                                    ";
                                }
                                
                                $maxV = getVideogamesTotal($mysqli);

                                echo "<div class='paginacion'>";
                                
                                if($pagV - 1 > 0){
                                ?>
                                    <a class="nohover button" href="catalogue.php?pagVideojuego=<?php echo $pagV-1 ?>"><</a>
                                <?php
                                }else{
                                    echo "<a class='hidden button nohover'></a>";
                                }

                                echo $pagV;

                                if($pagV*6 < $maxV){
                                ?>
                                    <a class="nohover button" href="catalogue.php?pagVideojuego=<?php echo $pagV+1 ?>">></a>     
                                <?php
                                }else{
                                    echo "<a class='hidden button nohover'></a>";
                                }

                                echo "</div>";
                            ?>  
                    </div>
                    <div id="linea"></div>
                    <div id="merchandising">
                        <div id="h1merch"><h1>MERCHANDISING</h1></div>
                            <form id="kind" class="separator" action="">
                                <select name="kind" required>
                                    <option value='' disabled selected>Seleccione una categoria</option>
                                    <option value="ALL">Todo</option>
                                    <?php
                                        $resultado = getCategory($mysqli);
                                        while($cat = $resultado->fetch_assoc()){
                                            if(isset($_GET['kind']) && $cat['kind'] == $_GET['kind']){
                                                echo "<option value='".$cat['kind']."' selected>".$cat['kind']."</option>";
                                            }else{
                                                echo "<option value='".$cat['kind']."'>".$cat['kind']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                                <button class="button" type="submit">Actualizar</button>
                            </form>
                            <?php
                                while($product = $merch->fetch_assoc()){
                                    echo "
                                    <div class='item'><a class='nohover' href='merchandising.php?id=".$product['idProduct']."'><img src='".$product['photoLink']."' alt='Foto del merchandising'><div class='info'><h2>".$product['title']."</h2><h4>".$product['price']." €</h4></div></div></a>
                                    ";
                                }

                                $maxM = getMerchandisingTotal($mysqli, $kind);

                                echo "<div class='paginacion'>";
                                
                                if($pagM - 1 > 0){
                                ?>
                                    <a class="nohover button" href="catalogue.php?pagMerchandising=<?php echo $pagM-1 ?>&kind=<?php echo $kind ?>"><</a>
                                <?php
                                }else{
                                    echo "<a class='hidden button nohover'></a>";
                                }

                                echo $pagM;

                                if($pagM*6 < $maxM){
                                ?>
                                    <a class="nohover button" href="catalogue.php?pagMerchandising=<?php echo $pagM+1 ?>&kind=<?php echo $kind ?>">></a>     
                                <?php
                                }else{
                                    echo "<a class='hidden button nohover'></a>";
                                }

                                echo "</div>";
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