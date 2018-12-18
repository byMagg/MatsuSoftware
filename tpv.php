<?php
    require 'conexiondb/conexion.php';
    require 'controller/querysfunction.php';

    $url = $_POST['url'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $idUser = $_POST['idUser'];
    $idProduct = $_POST['idProduct'];
    $date = date("Y/m/d");

    $resultado = setShoppinghistory($mysqli, $idUser, $title, $price, $date);
    $resultado2 = setShoppingrelations($mysqli, $idUser, $idProduct);

    $mysqli->close();

    header("Location: $url");
?>