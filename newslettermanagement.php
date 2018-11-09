<?php
require 'conexiondb/conexion.php';

session_start();  

if(isset($_SESSION['tiempo']) ) {
    $inactivo = 600;
    $vida_session = time() - $_SESSION['tiempo'];

    if($vida_session > $inactivo)
    {    
        header("Location: login/logout.php");
        exit();
    }
}
$_SESSION['tiempo'] = time();       

if(isset($_SESSION['usuario'])){
    
    if($_SESSION['usuario']['rol'] == 0){
        header("Location: userdash.php");
    }

}else{
    header("Location: login.php");
}

if($_SESSION['usuario']['rol'] == 2 && isset($_GET['id'])){

    if(isset($_GET['rol']) && $_SESSION['usuario']['id'] != $_GET['id']){

        $id= $_GET['id'];
        $rol = $_GET['rol'];
    
        if($rol == 0){
            $mysqli->query("UPDATE user SET rol = '1' WHERE id = '".$id."'");
        }else if($rol == 1){
            $mysqli->query("UPDATE user SET rol = '0' WHERE id = '".$id."'");
        }
    }else if($_SESSION['usuario']['id'] != $_GET['id']){

        $id= $_GET['id'];
        $consulta = "DELETE FROM user WHERE id='".$id."'";
        $resultado = $mysqli->query($consulta);
    }

}else if($_SESSION['usuario']['rol'] == 1 && isset($_GET['id']) && !isset($_GET['rol'])){

    $id= $_GET['id'];
    $consulta = "SELECT rol FROM user WHERE id = '".$id."'";
    $resultado = $mysqli->query($consulta);
    $datos = $resultado->fetch_assoc();

    if($datos['rol'] != 2 && $datos['rol'] != 1){
        $consulta = "DELETE FROM user WHERE id='".$id."'";
        $resultado = $mysqli->query($consulta);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Gestion de newsletter - MatsuSoftware</title>
        <?php include("footerheader/head.php"); ?>
        <link href="css/usermanagement.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>
                    
        <!--CONTENT-->
        <div class="content">
            
            <div id="cabecera">
            <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt=""></a>
                <img id="user" src="images/newsletter.png" alt="">
                <h1>GESTIÓN DE NEWSLETTER</h1>
            </div>
            <div id="content" class="content-inside">
            
                <table id="tabla">
                    <tr>
                        <th>#</th>
                        <th>Comentario</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                    <tr>
                        <th>1</th>
                        <th colspan = "3">Comentario 1</th>
                        <th><img id="user" src="images/newsletter.png" alt=""></th>
                        <th></th>
                        <th></th>
                    </tr>

                </table>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>