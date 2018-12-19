<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/querysfunction.php';
    
    session_start();
    timeLogOut(); 
    security(0);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Modificar merchandising - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/modify.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="merchandisingmanagement/modify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>        
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="merchandisingmanagement.php"><img id="volver"src="images/volver.png" alt="volver"></a>
                    <img id="user" src="images/merchan.png" alt="merch">
                    <h1>GESTIÓN DE MERCHANDISING</h1>
                </div>
                <div class="error general">
                    <span>Ha ocurrido un error, inténtalo de nuevo mas tarde.</span>
                </div>
                <div class="success">
                    <span>Merchandising modificado correctamente.</span>
                </div>
                <div id="form">
                    <?php
                        $resultado = getProductUsingId($mysqli, $_GET['id']);
                        $product = $resultado->fetch_assoc()
                    ?>

                    <form id="modifymerchandising" action="">
                        <input type="hidden" name="id" value= <?php echo '"'.$product["idProduct"].'"'?>>

                        <label>Título:</label>
                        <input type="text" name="titulo" maxlength="50" title="El título debe de contener enter 1 y 50 carácteres." placeholder=" Introduce el titulo" value= <?php echo '"'.$product["title"].'"'?> required>

                        <label>Precio:</label>
                        <input type="text" pattern="[0-9.]{0,10}" title="El título debe de contener enter 0 y 10 carácteres." name="price" placeholder=" Introduce el precio" value= <?php echo '"'.$product["price"].'"'?> required>

                        <label>Descripción:</label>
                        <textarea name="description" maxlength="500" title="El texto debe de contener enter 1 y 500 carácteres." placeholder=" Introduce la descripción" required><?php echo $product["descrip"]?></textarea>

                        <label>Link de compra:</label>
                        <input type= "text" name="linkpurchase" maxlength="1000" title="El link debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link de compra"  value= <?php echo '"'.$product["purchaseLink"].'"'?> required/>

                        <label>Link de foto:</label>
                        <input type="text" name="linkphoto" maxlength="1000" title="El link debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link de la imagen" value= <?php echo '"'.$product["photoLink"].'"'?> required>

                        <label class="etiqueta">Categoria:<br/></label>
                        <select name="kind" required>
                            <?php
                                $resultado = getCategory($mysqli);
                                while($cat = $resultado->fetch_assoc()){
                                    if($cat['kind'] == $product["kind"]){
                                        echo "<option value='".$cat['kind']."' selected>".$cat['kind']."</option>";
                                    }else{
                                        echo "<option value='".$cat['kind']."'>".$cat['kind']."</option>";
                                    }
                                }
                            ?>
                        </select>
            
                        <button class="button" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>                 
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>