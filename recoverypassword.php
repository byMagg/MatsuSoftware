<?php
    require 'conexiondb/conexion.php';

    session_start();
    $error = 1;

    if(isset($_SESSION['recuperar']) && isset($_SESSION['encrypt'])){
        if($_GET['token'] == $_SESSION['encrypt']){
            $email = $_SESSION['recuperar']['email'];
            $consulta = $mysqli->query("SELECT request FROM user WHERE email = '".$email."'");
            $resultado = $consulta->fetch_assoc();

            if($resultado['request'] == '1'){
                $mysqli->query("UPDATE user SET request = '0' WHERE email = '".$email."'");  
                $error = 0;
            }
        }
    }
    if($error !=0)header("Location: index.php");
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
                <div class="success">
                    <span>Contraseña cambiada correctamente.</span>
                </div>
                <div class="error">
                    <span>Error, inténtelo de nuevo.</span>
                </div>
                <form id="recoverypassword" action="">
                    <span>HOLIIIIIIIIIIIII</span>
                    <input type="hidden" name="email" value= "<?php echo $_SESSION['recuperar']['email'] ?>" />
                    <input id="password" pattern="[A-Za-z0-9_-]{4,20}" type="password" name="password"/>
                    <button class="button" type="submit">Recuperar contraseña</button>
                </form>
            </div>
        </div>
                            
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>

<?php 
    session_destroy();
?>