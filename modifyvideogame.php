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
        <title>Modificar videojuego - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/modify.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="videogamemanagement/modify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <div class="error general">
            <span>Ha ocurrido un error, inténtalo de nuevo mas tarde</span>
        </div>
        <div class="success">
            <span>Videojuego modificado correctamente</span>
        </div>   
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="videogamemanagement.php"><img id="volver" src="images/volver.png" alt="volver"></a>
                    <img id="user" src="images/games.png" alt="videojuego">
                    <h1>GESTIÓN DE VIDEOJUEGOS</h1>
                </div>
                <div id="form">
                    <?php
                        $resultado = getProductUsingId($mysqli, $_GET['id']);
                        $product = $resultado->fetch_assoc()
                    ?>

                    <form id="modifyvideogame" action="">
                        <input type="hidden" name="id" value= <?php echo '"'.$product["idProduct"].'"'?>>
                        <label>Título:</label>
                        <input type= "text" name="titulo" maxlength="50" title="El título debe de contener enter 1 y 50 carácteres." placeholder=" Introduce el título" value= <?php echo '"'.$product["title"].'"'?> required/>
                        <label>Precio:</label>
                        <input type= "text" pattern="[0-9.]{0,10}" title="El título debe de contener enter 0 y 10 carácteres." name="price" placeholder=" Introduce el precio" value=<?php echo '"'.$product["price"].'"'?> required/>
                        <label>Descripción:</label>
                        <textarea type="msg" name="description" maxlength="500" title="El texto debe de contener enter 1 y 500 carácteres." placeholder=" Introduce la descripcion" required><?php echo $product["descrip"]?></textarea>
                        <label>Link de compra:</label>
                        <input type= "text" name="linkpurchase" maxlength="1000" title="El link debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link" value=<?php echo '"'.$product["purchaseLink"].'"'?> required/>
                        <label>Link de la foto:</label>
                        <input type= "text" name="linkphoto" maxlength="1000" title="El link debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link" value=<?php echo '"'.$product["photoLink"].'"'?> required/>
                        <label>Link del trailer:</label>
                        <input type= "text" name="linktrailer" maxlength="1000" title="El link debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link" value=<?php echo '"'.$product["trailerLink"].'"'?> required/>
                        <label>Requisitos del sistema:</label>
                        <textarea type="msg" name="requisito" maxlength="500" title="El texto debe de contener enter 1 y 500 carácteres." placeholder=" Introduce los requisitos" required><?php echo $product["requirements"]?></textarea>
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