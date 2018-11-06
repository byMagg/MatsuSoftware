<?php 
    require '../conexiondb/conexion.php';

    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $provincia = $_POST['provincia'];
    $municipio = $_POST['municipio'];
    $direccion = $_POST['direccion'];
    $rol = 0;
    $request = 0;

    $consultanick = $mysqli->query("SELECT * FROM user WHERE nick = '".$nick."'");

    if($consultanick->num_rows == 1){ 
        $datos = $consultanick->fetch_assoc();
        $_SESSION['usuario'] = $datos;
        echo json_encode(array('error' => true, 'tipo' => 'nick'));
        exit();
    }

    $consultaemail = $mysqli->query("SELECT * FROM user WHERE email = '".$email."'");

    if($consultaemail->num_rows == 1){ 
        $datos = $consultaemail->fetch_assoc();
        $_SESSION['usuario'] = $datos;
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }
    
    $insert = "INSERT INTO user(nick,email,contrasena,provincia,municipio,direccion,rol,request) VALUES ('".$nick."', '".$email."', '".$contrasena."','".$provincia."','".$municipio."','".$direccion."', '".$rol."', '".$request."')";

    if ($mysqli->query($insert)) {
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true, 'tipo' => 'insertar'));
    }
?>