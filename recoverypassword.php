<?php
    require 'conexiondb/conexion.php';

    $id = $_GET['id'];
    $token = $_GET['token'];
    $consulta = $mysqli->query("SELECT request, token FROM user WHERE id = '".$id."'");
    $resultado = $consulta->fetch_assoc();

    if($resultado['request'] == '1' && hash('sha256', $resultado['token']) == $token){
        $mysqli->query("UPDATE user SET request = '0' WHERE id = '".$id."'");
        $mysqli->query("UPDATE user SET token = '' WHERE id = '".$id."'");
    }else{
        header("Location: writeemail.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Recuperar contraseña - MatsuSoftware</title>
        <?php include("footerheader/head.php"); ?>
        <link href="css/recoverypassword.css" type="text/css" rel="stylesheet">
        <script src="login/jquery-3.3.1.min.js"></script>
        <script src="recovery/main2.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>
                    
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
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>