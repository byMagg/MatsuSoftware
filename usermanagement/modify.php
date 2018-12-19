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

    if($datos != null && $id != $datos['idUser']){
        echo json_encode(array('error' => true, 'tipo' => 'nick'));
        exit();
    }

    $datos = getUsersUsingEmail($mysqli, $email);
    $datos = $datos->fetch_assoc();

    if($datos != null && $id != $datos['idUser']){ 
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }

    if(isset($_POST['pass']) && $_POST['pass'] != ''){
        $datos = setNewInformationWithPassword($mysqli, $id, $nick, $email, hash('sha256', $_POST['pass']), $provincia, $municipio, $direccion);  
    }else{
        $datos = setNewInformation($mysqli, $id, $nick, $email, $provincia, $municipio, $direccion);
    }

    if($datos){
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 'general'));
    }

    $mysqli->close();
?>