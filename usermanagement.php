<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/userfunction.php';
    session_start();
    timeLogOut();
    security(0);

if($_SESSION['usuario']['rol'] == 2 && isset($_GET['id']) && isset($_GET['rol'])){

    $id= $_GET['id'];
    $rol= $_GET['rol'];
    $idSesion = $_SESSION['usuario']['id'];
    changerol($mysqli, $rol, $id, $idSesion);

}else if(isset($_GET['id']) && !isset($_GET['rol'])){

    $id= $_GET['id'];
    $idSesion = $_SESSION['usuario']['id'];
    $rol = $_SESSION['usuario']['rol'];

    deleteUser($mysqli, $rol, $id, $idSesion);

}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Gestion de usuario - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/usermanagement.css" type="text/css" rel="stylesheet">
        <script src="controller/verify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>        
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt=""></a>
                    <img id="user" src="images/user.png" alt="">
                    <h1>GESTIÓN DE USUARIOS</h1>
                </div>
                <div id="tabla">
                    <table>
                        <tr>
                            <th id="id">#</th>
                            <th>Nick</th>
                            <th>Email</th>
                            <th id="rol">Rol</th>
                    <?php
                        $resultado = $mysqli->query("SELECT id, email, nick, rol FROM user");
                        if ($resultado->num_rows != 0) {
                            if($_SESSION['usuario']['rol'] == 2){
                                echo    '<th></th>
                                        <th></th>
                                        <th></th>
                                        </tr>';
                                while ($user = $resultado->fetch_assoc()) {
                                    $eliminar = '<td><a class="icono nohover" onclick="verifyDeleteAdmin('.$user['id'].')"><img src="images/eliminar.png"></a></td>';
                                    $modificar = '<td><a class="icono nohover" href="modifyuser.php?id='.$user['id'].'"><img src="images/lapiz.png"></a></td>';
                                    $rolButton= '<td><a class="icono nohover" href="usermanagement.php?id='.$user['id'].'&rol='.$user['rol'].'"><img src="images/grupo.png"></a></td>';
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
                                echo '<th></th>
                                        <th></th>
                                        </tr>';
                                while ($user = $resultado->fetch_assoc()) {
                                    $eliminar = '<td><a class="icono nohover" onclick="verifyDeleteAdmin('.$user['id'].')"><img src="images/eliminar.png"></a></td>';
                                    $modificar = '<td><a class="icono nohover" href="modifyuser.php?id='.$user['id'].'"><img src="images/lapiz.png"></a></td>';
                                    $rolButton= '';
                                    $rolName = "Usuario";

                                    if($user["rol"] == 1){
                                        $rolName = "Administrador"; 
                                    }else if($user["rol"] == 2){
                                        continue;
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
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>