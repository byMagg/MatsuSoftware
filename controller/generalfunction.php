<?php

function security($rol){   
      
    if(isset($_SESSION['usuario'])){
        
        if($_SESSION['usuario']['rol'] == $rol){
            header("Location: login.php");
        }

    }else{
        header("Location: login.php");
    }
}

function timeLogOut(){

    if(isset($_SESSION['tiempo']) ) {
        $inactivo = 900;
        $vida_session = time() - $_SESSION['tiempo'];

        if($vida_session > $inactivo)
        {    
            header("Location: login/logout.php");
            exit();
        }
    }
    $_SESSION['tiempo'] = time();    
}

function login(){

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2){
            header("Location: admindash.php");
        }else{
            header("Location: userdash.php");
        }
    }
}
?>