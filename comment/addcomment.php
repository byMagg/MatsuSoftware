<?php
require '../conexiondb/conexion.php';
require '../controller/querysfunction.php';

$opinion = $_POST['opinion'];
$rating = $_POST['rating'];
$validated = 0;
$idUser = $_POST['idUser'];
$idProduct = $_POST['idProduct'];

$product = getProductUsingId($mysqli, $idProduct); 
$product = $product->fetch_assoc();

$resultado = isCommented($mysqli, $idUser, $idProduct);

if(!$resultado){
    $resultado2 = addComment($mysqli, $idUser, $opinion, $rating, $validated, $idProduct);

    if($resultado2){
        echo json_encode(array('error' => false, 'id' => $idProduct, 'category' => $product['category']));
    }else{
        echo json_encode(array('error' => true, 'tipo' => 2));
    }
}else{
    echo json_encode(array('error' => true, 'tipo' => 1));
}

$mysqli->close();
?>