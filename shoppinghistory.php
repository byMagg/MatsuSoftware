<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/querysfunction.php';
    session_start();
    timeLogOut();
    security(1);
    security(2);

    if(isset($_GET['orden'])){
        $resultado = getShoppinghistory($mysqli, $_SESSION['usuario']['idUser'], $_GET['orden']);
    }else{
        $resultado = getShoppinghistory($mysqli, $_SESSION['usuario']['idUser'], 'DESC');
    }
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
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="Volver"></a>
                    <img id="icon2" src="images/shoppingcart.png" alt="Historial de compras">
                    <h1>HISTORIAL DE COMPRAS</h1>
                </div>
                <div id="cuadricula">
                    <form id="" action="">
                        <div>
                            <label>Ordenación:</label>
                            <select name="orden" required>
                                <option value='DESC' <?php if(isset($_GET['orden']) && $_GET['orden'] == 'DESC') echo 'selected'; ?>>Más recientes primero</option>
                                <option value='ASC' <?php if(isset($_GET['orden']) && $_GET['orden'] == 'ASC') echo 'selected'; ?>>Más antiguo primero</option>
                            </select>
                        </div>
                        <input class="button" type="submit" value="Actualizar"/>
                    </form>

                    <div id="tabla">
                        <table>
                            <tr>
                                <th id="title">Titulo</th>
                                <th id="price">Precio</th>
                                <th id="date">Fecha</th>
                            </tr>
                            <?php
                                while($info = $resultado->fetch_assoc()){
                                    echo "<tr>
                                          <td>".$info['title']."</td>
                                          <td>".$info['price']."</td>
                                          <td>".$info['purchaseDate']."</td>
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
    <?php $mysqli->close(); ?>
</html>