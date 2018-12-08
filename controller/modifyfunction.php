<?php

function modifysecurity($mysqli, $id){
    require 'querysfunction.php';

    if($_SESSION['usuario']['rol'] == 1){

        $datos = getUsersUsingId($mysqli, $id);
        $datos = $datos->fetch_assoc();

        if(($datos['rol'] == 1  && $_SESSION['usuario']['idUser'] != $id) || $datos['rol'] == 2){
            header("Location: login.php");
        }
    }

    if($_SESSION['usuario']['rol'] == 0){

        $datos = getUsersUsingId($mysqli, $id);
        $datos = $datos->fetch_assoc();

        if(($datos['rol'] == 0  && $_SESSION['usuario']['idUser'] != $id) || $datos['rol'] == 1 || $datos['rol'] == 2){
            header("Location: login.php");
        }
    }
}
?>