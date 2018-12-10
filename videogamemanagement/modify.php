<?php 
   require '../controller/querysfunction.php';
   require '../conexiondb/conexion.php';

   $id = $_POST['id'];
   $titulo = $_POST['titulo'];
   $price = $_POST['price'];
   $requisito = $_POST['requisito'];
   $linkphoto = $_POST['linkphoto'];
   $linkpurchase = $_POST['linkpurchase'];
   $linktrailer = $_POST['linktrailer'];
   $description = $_POST['description'];

   $update = setNewInformationToProduct($mysqli, $id, $titulo, $description, $price, $linkphoto, $linkpurchase, $linktrailer, $requisito, NULL);

   if($update) {
       echo json_encode(array('error' => false));
   } else {
       echo json_encode(array('error' => true));
   }

   $mysqli->close();
?>