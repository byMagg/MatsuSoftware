<?php 
    require '../controller/querysfunction.php';
    require '../conexiondb/conexion.php';

    $titulo = $_POST['titulo'];
    $price = $_POST['price'];
    $linkphoto = $_POST['linkphoto'];
    $linkpurchase = $_POST['linkpurchase'];
    $description = $_POST['description'];

    $insert = insertToProduct($mysqli, $titulo, $description, $price, 0, 0, $linkphoto, $linkpurchase, NULL, NULL, "merchandising");

    if($insert) {
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true));
    }

    $mysqli->close();
?>