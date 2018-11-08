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
        <title>Gestion de usuario - MatsuSoftware</title>
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
                <img id="user" src="images/user.png" alt="">
                <h1>GESTIÓN DE USUARIOS</h1>
            </div>
            <div id="content" class="content-inside">
            
                <table id="tabla">
                    <tr>
                        <td>#</td>
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
                        if($_SESSION['usuario']['rol'] == 2){
                            while ($user = $resultado->fetch_assoc()) {
                                $eliminar = '<td><a class="button delete" href="usermanagement.php?id='.$user['id'].'">Eliminar</a></td>';
                                $modificar = '<td><a class="button modify" href="modifyuserbyadmin.php?id='.$user['id'].'">Modificar</a></td>';
                                $rolButton= '<td><a class="button" href="usermanagement.php?id='.$user['id'].'&rol='.$user['rol'].'">Cambiar rol</a></td>';
                                $rolName = "Usuario";

                                if($user["rol"] == 1){
                                    $rolName = "Administrador"; 
                                }else if($user["rol"] == 2){
                                    $rolName = "Master"; 
                                }

                                if($_SESSION['usuario']['id'] == $user['id']){
                                    $rolButton = "<td></td>";
                                    $eliminar = "<td></td>";
                                }

                                echo '<tr>
                                            <td>'.$user["id"].'</td>
                                            <td>'.$user["nick"].'</td>
                                            <td>'.$user["email"].'</td>
                                            <td>'.$rolName.'</td>
                                            '.$rolButton.'
                                            '.$modificar.'
                                            '.$eliminar.'
                                    </tr>';
                            }
                        }else if($_SESSION['usuario']['rol'] == 1){
                            while ($user = $resultado->fetch_assoc()) {
                                $eliminar = '<td><a class="button delete" href="usermanagement.php?id='.$user['id'].'">Eliminar</a></td>';
                                $modificar = '<td><a class="button modify" href="modifyuserbyadmin.php?id='.$user['id'].'">Modificar</a></td>';
                                $rolButton= '<td></td>';
                                $rolName = "Usuario";

                                if($user["rol"] == 1){
                                    $rolName = "Administrador"; 
                                }else if($user["rol"] == 2){
                                    $rolName = "Master"; 
                                }

                                if($user['rol'] == 2 || $user['rol'] == 1){
                                    $eliminar = "<td></td>";
                                }

                                if($user['rol'] == 2 || ($user['rol'] == 1 && $user['id'] != $_SESSION['usuario']['id'])){
                                    $modificar = "<td></td>";
                                }

                                echo '<tr>
                                            <td>'.$user["id"].'</td>
                                            <td>'.$user["nick"].'</td>
                                            <td>'.$user["email"].'</td>
                                            <td>'.$rolName.'</td>
                                            '.$rolButton.'
                                            '.$modificar.'
                                            '.$eliminar.'
                                    </tr>';
                            }
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