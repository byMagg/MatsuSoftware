<?php
require '../conexiondb/conexion.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    session_start();

    $mysqli->set_charset('utf8');

    $email = $mysqli->real_escape_string($_POST['email']);
    $pass = $mysqli->real_escape_string($_POST['pass']);
    $isEmail = strpos($email, '@');

    if($isEmail){
        $consulta = $mysqli->prepare("SELECT * FROM user WHERE email = ? AND pass = ?");
    }else{     
        $consulta = $mysqli->prepare("SELECT * FROM user WHERE nick = ? AND pass = ?");
    }

    if($consulta){
        
        $pass = hash('sha256', $pass);
        
        $consulta->bind_param('ss', $email, $pass);

        $consulta->execute();

        $resultado = $consulta->get_result();

        if($resultado->num_rows == 1){ 
            $datos = $resultado->fetch_assoc();
            $_SESSION['usuario'] = $datos;
            $_SESSION['tiempo'] = time();
            echo json_encode(array('error' => false, 'tipo' => $datos['rol']));
        }else{
            echo json_encode(array('error' => true));
        }
        
        $consulta->close();
    }
    $mysqli ->close();
}
?>