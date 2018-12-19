<?php
require '../conexiondb/conexion.php';
require '../controller/querysfunction.php';

$idUser = $_POST['idUser'];
$idProduct = $_POST['idProduct'];

$resultado = isCommentedValidated($mysqli, $idUser, $idProduct);

if(!$resultado){
    $resultadofinal = deleteComment($mysqli, $idUser, $idProduct);
}else{
    
    $comment = getComment($mysqli, $idUser, $idProduct);
    $product = getProductUsingId($mysqli, $idProduct); 
    $comment = $comment->fetch_assoc();
    $product = $product->fetch_assoc();

    $sumRating = $product['sumRating'] - $comment['rating'];
    $numComments = $product['numComments'] - 1;

    setNewRatingInformationToProduct($mysqli, $idProduct, $numComments, $sumRating);
    
    $resultadofinal = deleteComment($mysqli, $idUser, $idProduct);
}

if($resultadofinal){
    echo json_encode(array('error' => false));
}else{
    echo json_encode(array('error' => true));
}

$mysqli->close();
?>