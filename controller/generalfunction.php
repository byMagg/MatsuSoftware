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
        $inactivo = 600;
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
        if($_SESSION['usuario']['rol'] == 1){
            header("Location: admindash.php");
        }else if($_SESSION['usuario']['rol'] == 0){
            header("Location: userdash.php");
        }else{
            header("Location: admindash.php");
        }
    }
}
?>