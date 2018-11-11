<?php
require 'querysfunction.php';

function deleteUser($mysqli, $rol, $idBorrar, $idSesion){

    $datos = getUsersUsingId($mysqli, $idBorrar);
    $datos = $datos->fetch_assoc();

    if($datos['rol'] != 2 && $datos['rol'] != 1){
        if($rol == 0 && ($idBorrar != $idSesion)){
            header("Location: login.php");
        }else{
            deleteUsers($mysqli, $idBorrar);
            if($rol == 0){
                session_destroy();
                header("Location: login.php");
            }else{
                header("Location: usermanagement.php");
            }
        }
    }else{
        header("Location: login.php");
    }
}

function changeRol($mysqli, $rol, $idCambiar, $idSesion){
    if($idSesion != $idCambiar){
        if($rol == 0){
            setRol($mysqli, 1, $idCambiar);
        }else if($rol == 1){
            setRol($mysqli, 0, $idCambiar);
        }
    }else{
        header("Location: login.php");
    }
}
?>