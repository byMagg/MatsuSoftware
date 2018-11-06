<?php 
    require '../conexiondb/conexion.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $consultaemail = $mysqli->query("UPDATE user SET contrasena = '".$password."' WHERE email = '".$email."'");

    if($consultaemail){ 
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'email' => $email, 'password'=>$password));
    }
?>