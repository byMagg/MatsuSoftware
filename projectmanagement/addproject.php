<?php 
    require '../controller/querysfunction.php';
    require '../conexiondb/conexion.php';

    $titulo = $_POST['title'];
    $linkphoto = $_POST['photoLink'];
    $descrip = $_POST['descrip'];

    $insert = insertToProject($mysqli, $titulo, $descrip, $linkphoto);

    if($insert) {
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true));
    }

    $mysqli->close();
?>