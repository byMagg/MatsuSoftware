<?php
    $mysqli = new mysqli("localhost", "root", "", "id7369555_matsusoftware");
    if($mysqli->connect_errno){
        echo "Error al conectar con MySQL debido al error ".$mysqli->connect_error;
    }
?>