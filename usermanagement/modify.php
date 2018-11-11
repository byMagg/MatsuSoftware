<?php 
    require '../controller/querysfunction.php';
    require '../conexiondb/conexion.php';

    $id = $_POST['id'];
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $provincia = $_POST['provincia'];
    $municipio = $_POST['municipio'];
    $direccion = $_POST['direccion'];

    $datos = getUsersUsingNick($mysqli, $nick);
    $datos = $datos->fetch_assoc();

    if($datos != null && $nick != $datos['nick']){
        echo json_encode(array('error' => true, 'tipo' => 'nick'));
        exit();
    }

    $datos = getUsersUsingEmail($mysqli, $email);
    $datos = $datos->fetch_assoc();

    if($datos != null && $email != $datos['email']){ 
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }

    $datos = setNewInformation($mysqli, $id, $nick, $email, $provincia, $municipio, $direccion);

    if($datos){
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 'general'));
    }

    $mysqli->close();
?>