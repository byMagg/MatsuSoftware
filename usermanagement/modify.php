<?php 
    require '../conexiondb/conexion.php';

    $id = $_POST['id'];
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $provincia = $_POST['provincia'];
    $municipio = $_POST['municipio'];
    $direccion = $_POST['direccion'];

    $consultanick = $mysqli->query("SELECT * FROM user WHERE nick = '".$nick."'");

    if($consultanick->num_rows == 1){ 
        echo json_encode(array('error' => true, 'tipo' => 'nick'));
        exit();
    }

    $consultaemail = $mysqli->query("SELECT * FROM user WHERE email = '".$email."'");

    if($consultaemail->num_rows == 1){ 
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }

    $consulta = "UPDATE user SET nick = '".$nick."', email = '".$email."', provincia = '".$provincia."', municipio= '".$municipio."', direccion = '".$direccion."' WHERE id = '".$id."' ";
    $resultado = $mysqli->query($consulta);

    if($resultado){
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 'general'));
    }
?>