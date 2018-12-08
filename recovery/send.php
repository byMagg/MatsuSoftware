<?php 
    require '../controller/sendfunction.php';
    require '../controller/querysfunction.php';
    require '../conexiondb/conexion.php';

    $email = $_POST['email'];

    $consulta = getUsersUsingEmail($mysqli, $email);
    $datos = $consulta->fetch_assoc();
    
    if($datos == null){
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }

    $hora = date('H:i');
    $token = $hora.$datos['idUser'];
    $encrypt = hash('sha256', $token);

    $salida = sendEmailPasswordRecover($email, $encrypt, $datos);
    $enviado = $salida['resultado'];
    
    if($enviado){
        setRequest($mysqli, 1, $datos['idUser']);
        setToken($mysqli, $token, $datos['idUser']);
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true));
    }

    $mysqli->close();
?>