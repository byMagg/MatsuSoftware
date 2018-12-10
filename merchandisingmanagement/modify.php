<?php 
   require '../controller/querysfunction.php';
   require '../conexiondb/conexion.php';

   $id = $_POST['id'];
   $titulo = $_POST['titulo'];
   $price = $_POST['price'];
   $linkphoto = $_POST['linkphoto'];
   $linkpurchase = $_POST['linkpurchase'];
   $description = $_POST['description'];
   $kind = $_POST['kind'];

   $update = setNewInformationToProduct($mysqli, $id, $titulo, $description, $price, $linkphoto, $linkpurchase, NULL, NULL, $kind);

   if($update) {
       echo json_encode(array('error' => false));
   } else {
       echo json_encode(array('error' => true));
   }

   $mysqli->close();
?>