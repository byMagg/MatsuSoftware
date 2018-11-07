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

if(isset($_GET['id']) && isset($_GET['rol'])){
    $id= $_GET['id'];
    $rol = $_GET['rol'];

    if($rol == 0){
        $mysqli->query("UPDATE user SET rol = '1' WHERE id = '".$id."'");
    }else if($rol == 1){
        $mysqli->query("UPDATE user SET rol = '0' WHERE id = '".$id."'");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Panel de control - MatsuSoftware</title>
        <?php include("footerheader/head.php"); ?>
        <link href="css/usermanagement.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>
                    
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <a id="cerrar" href="login/logout.php">Cerrar sesión</a>
                <a id="volver" href="admindash.php">Volver</a>
                <table id="tabla">
                    <tr>
                        <td>Nick</td>
                        <td>Email</td>
                        <td>Rol</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php
                    $resultado = $mysqli->query("SELECT id, email, nick, rol FROM user");
                    if ($resultado->num_rows != 0) {
                        while ($user = $resultado->fetch_assoc()) {
                            if($user["rol"] == 0){
                                $rol = "Usuario";
                            }else{
                                $rol = "Administrador"; 
                            }
                            echo '<tr>
                                        <td>'.$user["id"].'</td>
                                        <td>'.$user["email"].'</td>
                                        <td>'.$rol.'</td>
                                        <td><a class="button" href="usermanagement.php?id='.$user['id'].'&rol='.$user['rol'].'">Cambiar rol</a></td>
                                        <td><a class="button" href="usermanagement/modify.php?id='.$user['id'].'">Modificar</a></td>
                                        <td><a class="button" href="usermanagement/delete.php?id='.$user['id'].'">Eliminar</a></td>
                                    </tr>
                                    ';
                        }
                    }
                ?>
                </table>
            </div>
        </div>
                            
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>