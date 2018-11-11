<?php 
    require '../controller/sendfunction.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
    $enviado = sendEmailContact($name, $surname, $email, $msg);
    
    if($enviado){
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true));
    }
?>