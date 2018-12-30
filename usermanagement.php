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
    $idSesion = $_SESSION['usuario']['idUser'];
    changerol($mysqli, $rol, $id, $idSesion);

}else if(isset($_GET['id']) && !isset($_GET['rol'])){

    $id= $_GET['id'];
    $idSesion = $_SESSION['usuario']['idUser'];
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
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="Volver"></a>
                    <img id="user" src="images/user.png" alt="Gestión de usuarios">
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
                        $resultado = $mysqli->query("SELECT idUser, email, nick, rol FROM user");
                        
                        if ($resultado->num_rows != 0) {
                            if($_SESSION['usuario']['rol'] == 2){
                                echo    '<th></th>
                                        <th></th>
                                        <th></th>
                                        </tr>';
                                while ($user = $resultado->fetch_assoc()) {
                                    $eliminar = '<td><a class="icono nohover" onclick="verifyDeleteAdmin('.$user['idUser'].')"><img src="images/eliminar.png" alt="Eliminar"></a></td>';
                                    $modificar = '<td><a class="icono nohover" href="modifyuser.php?id='.$user['idUser'].'"><img src="images/lapiz.png" alt="Modificar"></a></td>';
                                    $rolButton= '<td><a class="icono nohover" href="usermanagement.php?id='.$user['idUser'].'&rol='.$user['rol'].'"><img src="images/grupo.png" alt="Cambiar rol"></a></td>';
                                    $rolName = "Usuario";

                                    if($user["rol"] == 1){
                                        $rolName = "Administrador"; 
                                    }else if($user["rol"] == 2){
                                        $rolName = "Master"; 
                                    }

                                    if($_SESSION['usuario']['idUser'] == $user['idUser']){
                                        $rolButton = "<td></td>";
                                        $eliminar = "<td></td>";
                                    }

                                    echo '<tr>
                                                <td>'.$user["idUser"].'</td>
                                                <td>'.$user["nick"].'</td>
                                                <td>'.$user["email"].'</td>
                                                <td>'.$rolName.'
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
                                    $eliminar = '<td><a class="icono nohover" onclick="verifyDeleteAdmin('.$user['idUser'].')"><img src="images/eliminar.png" alt="Eliminar"></a></td>';
                                    $modificar = '<td><a class="icono nohover" href="modifyuser.php?id='.$user['idUser'].'"><img src="images/lapiz.png" alt="Cambiar rol"></a></td>';
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

                                    if($user['rol'] == 2 || ($user['rol'] == 1 && $user['idUser'] != $_SESSION['usuario']['idUser'])){
                                        $modificar = "<td></td>";
                                    }

                                    echo '<tr>
                                                <td>'.$user["idUser"].'</td>
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