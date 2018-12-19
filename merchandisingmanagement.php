<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/querysfunction.php';
    session_start();
    timeLogOut();
    security(0);

    if(isset($_GET['id']) && ($_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2)){

        $id= $_GET['id'];
    
        deleteProduct($mysqli, $id);
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Gestion de merchandising - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/merchandisingmanagement.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="merchandisingmanagement/addmerch.js"></script>
        <script src="controller/verify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <div class="error general">
            <span>Ha ocurrido un error, inténtalo de nuevo mas tarde.</span>
        </div>
        
        <div class="success">
            <span>Merchandising registrado correctamente.</span>
        </div>
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

                            <?php
                                $resultado = getProduct($mysqli);
                                while($product = $resultado->fetch_assoc()){
                                    if($product['category'] == 'merchandising'){
                                        echo "<tr>
                                            <td>".$product['idProduct']."</td>
                                            <td>".$product['title']."</td>
                                            <td>".$product['price']."</td>
                                            <td><a class='icono nohover' href='modifymerchandising.php?id=".$product['idProduct']."'><img src='images/lapiz.png' alt='Modificar'></a></td>
                                            <td><a class='icono nohover' onclick='verifyDeleteProductMerchandising(".$product['idProduct'].")'><img class='delete' src='images/eliminar.png' alt='Eliminar'></a></td>
                                            </tr>";
                                        }
                                }
                            ?>  
                        </table>
                    </div> 
                    
                    <div id="lineavertical"></div>

                    <div id="form">
                        <h1>Añadir merchandising:</h1>
                        <form id="merchandisingmanagement" action="">
                            <label>Título:</label>
                            <input type="text" name="titulo" maxlength="50" title="El título debe de contener enter 1 y 50 carácteres." placeholder=" Introduce el titulo" required>

                            <label>Precio:</label>
                            <input type="text" pattern="[0-9.]{0,10}" title="El título debe de contener enter 0 y 10 carácteres." name="price" placeholder=" Introduce el precio" required>

                            <label>Descripción:</label>
                            <textarea name="description" maxlength="500" title="El texto debe de contener enter 1 y 500 carácteres." placeholder=" Introduce la descripción" required></textarea>

                            <label>Link de compra:</label>
                            <input type= "text" name="linkpurchase" maxlength="1000" title="El link debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link de compra" required/>

                            <label>Link de foto:</label>
                            <input type="text" name="linkphoto" maxlength="1000" title="El link debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link de la imagen" required>

                            <label class="etiqueta">Categoria:<br/></label>
                            <select name="kind" required>
                                <option value='' disabled selected>Seleccione una categoria</option>
                                <?php
                                    $resultado = getCategory($mysqli);
                                    while($cat = $resultado->fetch_assoc()){
                                        echo "<option value='".$cat['kind']."'>".$cat['kind']."</option>";
                                    }
                                ?>
                            </select>

                            <button class="button" type="submit">Añadir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>