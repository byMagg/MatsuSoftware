<?php
    require 'conexiondb/conexion.php';
    require 'controller/querysfunction.php';

    $id = $_GET['id'];
    $token = $_GET['token'];
    $datos = getUsersUsingId($id);
    $datos = $datos->fetch_assoc();

    if($datos['request'] == '1' && hash('sha256', $datos['token']) == $token){
        setRequest($mysqli, 1, $id);
        setToken($mysqli, '', $id);
    }else{
        header("Location: writeemail.php");
    }

    $mysqli->close(); 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Recuperar contraseña - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/recoverypassword.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="recovery/password2.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>         
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
            <h1>RECUPERACIÓN DE CONTRASEÑA:</h1>
                <div class="success">
                    <span>Contraseña cambiada correctamente.</span>
                </div>
                <div class="error password">
                    <span>Error, las contraseñas no coinciden, inténtelo de nuevo.</span>
                </div>
                <div class="error">
                    <span>Error, inténtelo de nuevo.</span>
                </div>
                <form id="recoverypassword" action="">
                    <input type="hidden" name="id" value= "<?php echo $id ?>" />
                    <label>Introduce tu nueva contraseña:</label>
                    <input id="password" pattern="[A-Za-z0-9_-]{4,20}" type="password" name="password" placeholder="Introduce tu contraseña" required/>
                    <label>Introduce tu nueva contraseña de nuevo:</label>
                    <input id="password2" pattern="[A-Za-z0-9_-]{4,20}" type="password" name="password2" placeholder="Introduce tu contraseña" required/>
                    <button class="button" type="submit">Recuperar contraseña</button>
                </form>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>