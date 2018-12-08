<?php

function getUsersUsingEmail($mysqli, $email){
    $resultado = $mysqli->query("SELECT * FROM user WHERE email = '".$email."'");
    return $resultado;
}

function getUsersUsingId($mysqli, $id){
    $resultado = $mysqli->query("SELECT * FROM user WHERE idUser= '".$id."'");
    return $resultado;
}

function getUsersUsingNick($mysqli, $nick){
    $resultado = $mysqli->query("SELECT * FROM user WHERE nick = '".$nick."'");
    return $resultado;
}

function setRequest($mysqli, $request, $id){
    $resultado = $mysqli->query("UPDATE user SET request = ".$request." WHERE idUser = '".$id."'");
    return $resultado;
}

function setToken($mysqli, $token, $id){
    $resultado = $mysqli->query("UPDATE user SET token = '".$token."' WHERE idUser = '".$id."'");
    return $resultado;
}

function setPassword($mysqli, $password, $id){
    $resultado = $mysqli->query("UPDATE user SET pass = '".$password."' WHERE idUser = '".$id."'");
    return $resultado;
}

function setRol($mysqli, $rol, $id){
    $resultado = $mysqli->query("UPDATE user SET rol = '".$rol."' WHERE idUser = '".$id."'");
    return $resultado;
}

function setNewInformation($mysqli, $id, $nick, $email, $provincia, $municipio, $direccion){
    $resultado = $mysqli->query("UPDATE user SET nick = '".$nick."', email = '".$email."', province = '".$provincia."', city= '".$municipio."', direction = '".$direccion."' WHERE idUser = '".$id."' ");
    return $resultado;
}

function setNewInformationWithPassword($mysqli, $id, $nick, $email, $pass, $provincia, $municipio, $direccion){
    $resultado = $mysqli->query("UPDATE user SET nick = '".$nick."', email = '".$email."', pass = '".$pass."', province = '".$provincia."', city= '".$municipio."', direction = '".$direccion."' WHERE idUser = '".$id."' ");
    return $resultado;
}

function insertToUsers($mysqli, $nick, $email, $contrasena, $provincia, $municipio, $direccion, $rol, $request){
    $resultado = $mysqli->query("INSERT INTO user(nick,email,pass,province,city,direction,rol,request) VALUES ('".$nick."', '".$email."', '".$contrasena."','".$provincia."','".$municipio."','".$direccion."', '".$rol."', '".$request."')");
    return $resultado;
}

function deleteUsers($mysqli, $id){
    $resultado = $mysqli->query("DELETE FROM user WHERE idUser='".$id."'");
    return $resultado;
}
?>