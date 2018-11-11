<?php 
    require '../controller/sendfunction.php';
    require '../controller/querysfunction.php';
    require '../conexiondb/conexion.php';

    $id = $_POST['id'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password != $password2){
        echo json_encode(array('error' => true, 'tipo' => 'password'));
        exit();
    }

    $password = hash('sha256', $password);

    $actualizar = setPassword($mysqli, $password, $id);

    $datos = getUsersUsingId($mysqli, $id);
    $datos = $datos->fetch_assoc();
    $email = $datos['email'];
    
    if($actualizar){ 
        sendEmailPasswordChanged($email);
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 'general'));
    }

    $mysqli->close();
?>