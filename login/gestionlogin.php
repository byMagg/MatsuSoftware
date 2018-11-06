<?php
require '../conexiondb/conexion.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

$usuario = $mysqli->query("SELECT * FROM user WHERE email = '".$email."' AND contrasena = '".$pass."'");

if($usuario->num_rows == 1){
    $datos = $usuario->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['rol']));
}else{
    echo json_encode(array('error' => true));
}

$mysqli ->close();
?>