<?php 
    require '../conexiondb/conexion.php';
    require '../encrypt/encrypt.php';

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
    
    $contrasena = hash('sha256', $contrasena);
    $insert = "INSERT INTO user(nick,email,contrasena,provincia,municipio,direccion,rol,request) VALUES ('".$nick."', '".$email."', '".$contrasena."','".$provincia."','".$municipio."','".$direccion."', '".$rol."', '".$request."')";

    $asunto = "Te has registrado correctamente.";

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    $mensaje = "Ya puedes acceder a tu cuenta de MatsuSoftware.";
    if ($mysqli->query($insert)) {
        mail($email, $asunto, $mensaje, $cabecera);
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true, 'tipo' => 'insertar'));
    }
?>