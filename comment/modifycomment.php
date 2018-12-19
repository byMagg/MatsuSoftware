<?php
require '../conexiondb/conexion.php';
require '../controller/querysfunction.php';

$opinion = $_POST['opinion'];
$rating = $_POST['rating'];
$validated = 0;
$idUser = $_POST['idUser'];
$idProduct = $_POST['idProduct'];


$resultado = isCommentedValidated($mysqli, $idUser, $idProduct);

if($resultado){
    $resultado2 = modifyComment($mysqli, $idUser, $opinion, $rating, $validated, $idProduct);

    if($resultado2){
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 2));
    }
}else{
    echo json_encode(array('error' => true, 'tipo' => 1));
}

$mysqli->close();
?>