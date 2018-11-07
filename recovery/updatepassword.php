<?php 
    require '../conexiondb/conexion.php';

    $id = $_POST['id'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password != $password2){
        echo json_encode(array('error' => true, 'tipo' => 'password'));
        exit();
    }

    $password = hash('sha256', $password);
    $actualizar = $mysqli->query("UPDATE user SET contrasena = '".$password."' WHERE id = '".$id."'");
    $consultaemail = $mysqli->query("SELECT email FROM user WHERE id= '".$id."'");
    $resultado = $consultaemail->fetch_assoc();

    $email = $resultado['email']; 
    $asunto = "Contraseña actualizada correctamente.";

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    $mensaje = "La contraseña se ha actualizado exitosamente.";

    if($actualizar){ 
        mail($email, $asunto, $mensaje, $cabecera);
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 'general'));
    }
?>