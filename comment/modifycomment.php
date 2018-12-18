<?php
require '../conexiondb/conexion.php';
require '../controller/querysfunction.php';

$opinion = $_POST['opinion'];
$rating = $_POST['rating'];
$validated = 0;
$idUser = $_POST['idUser'];
$idProduct = $_POST['idProduct'];

$resultado = modifyComment($mysqli, $idUser, $opinion, $rating, $validated, $idProduct);

if($resultado){
    echo json_encode(array('error' => false));
}else{
    echo json_encode(array('error' => true));
}

$mysqli->close();
?>