<?php
    require "conexiondb/conexion.php";
    require 'controller/generalfunction.php';
    session_start();
    timeLogOut();
    security(1);
    security(2);

if($_SESSION['usuario']['rol'] == 0 && isset($_GET['id'])){

    $id= $_GET['id'];
    $consulta = "SELECT rol FROM user WHERE id = '".$id."'";
    $resultado = $mysqli->query($consulta);
    $datos = $resultado->fetch_assoc();

    if($datos['rol'] != 2 && $datos['rol'] != 1 && $id=$_SESSION['usuario']['id']){
        $consulta = "DELETE FROM user WHERE id='".$id."'";
        $resultado = $mysqli->query($consulta);
        session_destroy();
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Panel de control - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/userdash.css" type="text/css" rel="stylesheet">
    </head>            
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>                
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <a id="cerrar" class="nohover" href="login/logout.php"><img src="images/logout.png" alt=""></a>
                <div class="item">
                    <a class="nohover" href="#"><img src="images/shoppingcart.png" alt="Historial de compras"></a>
                    <a href="#" class="button">Historial de compras</a>
                </div>
                <div class="item">
                    <a class="nohover" href="modifyuser.php?id=<?php echo $_SESSION['usuario']['id'] ?>"><img src="images/confuser.png" alt="Modificar perfil"></a>
                    <a href="modifyuser.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="button">Modificar perfil</a>
                </div>
                <div class="item">
                    <a class="nohover" href="userdash.php?id=<?php echo $_SESSION['usuario']['id'] ?>"><img src="images/deleteuser.png" alt="Eliminar perfil"></a>
                    <a href="userdash.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="button">Eliminar perfil</a>
                </div>
            </div>
        </div>    
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>