<?php 
    require '../conexiondb/conexion.php';

    $id = $_POST['id'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password != $password2){
        echo json_encode(array('error' => true, 'tipo' => 'password'));
        exit();
    }

    $consultaemail = $mysqli->query("UPDATE user SET contrasena = '".$password."' WHERE id = '".$id."'");

    if($consultaemail){ 
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 'general'));
    }
?>