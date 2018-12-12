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

function getEmails($mysqli){
    $resultado = $mysqli->query("SELECT email FROM user");
    return $resultado;
}

function insertToProduct($mysqli, $title, $descrip, $price, $sumRating, $numComments, $photoLink, $purchaseLink, $trailerLink, $requirements, $category, $kind){
    $resultado = $mysqli->query("INSERT INTO product(title,descrip,price,sumRating,numComments,photoLink,purchaseLink,trailerLink,requirements,category,kind) VALUES ('".$title."', '".$descrip."', '".$price."','".$sumRating."','".$numComments."','".$photoLink."', '".$purchaseLink."', '".$trailerLink."', '".$requirements."', '".$category."', '".$kind."')");
    return $resultado;
}

function insertToProject($mysqli, $title, $descrip, $photoLink){
    $resultado = $mysqli->query("INSERT INTO project(title,photoLink,descrip) VALUES ('".$title."', '".$photoLink."', '".$descrip."')");
    return $resultado;
}

function deleteProduct($mysqli, $id){
    $resultado = $mysqli->query("DELETE FROM product WHERE idProduct='".$id."'");
    return $resultado;
}

function deleteProject($mysqli, $id){
    $resultado = $mysqli->query("DELETE FROM project WHERE idProject='".$id."'");
    return $resultado;
}

function setNewInformationToProduct($mysqli, $id, $title, $descrip, $price, $photoLink, $purchaseLink, $trailerLink, $requirements, $kind){
    $resultado = $mysqli->query("UPDATE product SET title = '".$title."', descrip = '".$descrip."', price = '".$price."', photoLink= '".$photoLink."', purchaseLink = '".$purchaseLink."', trailerLink = '".$trailerLink."', requirements = '".$requirements."', kind = '".$kind."' WHERE idProduct = '".$id."' ");
    return $resultado;
}

function getProduct($mysqli){
    $resultado = $mysqli->query("SELECT * FROM product");
    return $resultado;
}

function getProjects($mysqli){
    $resultado = $mysqli->query("SELECT * FROM project");
    return $resultado;
}

function getProductUsingId($mysqli, $id){
    $resultado = $mysqli->query("SELECT * FROM product WHERE idProduct = $id");
    return $resultado;
}

function getCategory($mysqli){
    $resultado = $mysqli->query("SELECT * FROM category");
    return $resultado;
}

function insertToNewsletter($mysqli, $comment, $publishDate){
    $resultado = $mysqli->query("INSERT INTO newsletter(comment, publishDate) VALUES ('".$comment."', '".$publishDate."')");
    return $resultado;
}

function getNewsletter($mysqli){
    $resultado = $mysqli->query("SELECT * FROM newsletter");
    return $resultado;
}

function deleteNewsletter($mysqli, $id){
    $resultado = $mysqli->query("DELETE FROM newsletter WHERE idNewsletter = $id");
    return $resultado;
}

function getShoppinghistory($mysqli, $id, $orden){
    $resultado = $mysqli->query("SELECT * FROM shoppinghistory WHERE idUser = $id ORDER BY purchaseDate $orden");
    return $resultado;
}

?>