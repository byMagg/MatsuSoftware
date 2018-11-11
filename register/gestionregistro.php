<?php 
    require '../controller/sendfunction.php';
    require '../controller/querysfunction.php';
    require '../conexiondb/conexion.php';

    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $provincia = $_POST['provincia'];
    $municipio = $_POST['municipio'];
    $direccion = $_POST['direccion'];
    $rol = 0;
    $request = 0;

    $datos = getUsersUsingNick($mysqli, $nick);
    $datos = $datos->fetch_assoc();

    if($datos != null){ 
        echo json_encode(array('error' => true, 'tipo' => 'nick'));
        exit();
    }

    $datos = getUsersUsingEmail($mysqli, $email);
    $datos = $datos->fetch_assoc();

    if($datos != null){ 
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }
    
    $contrasena = hash('sha256', $contrasena);
    $insert = insertToUsers($mysqli, $nick, $email, $contrasena, $provincia, $municipio, $direccion, $rol, $request);

    if($insert) {
        sendEmailSignin($email);
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true, 'tipo' => 'insertar'));
    }

    $mysqli->close();
?>