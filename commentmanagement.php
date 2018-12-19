<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/querysfunction.php';
    session_start();
    timeLogOut();
    security(0);

    if(isset($_GET['idComment']) && isset($_GET['validate']) && ($_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2)){

        $id= $_GET['idComment'];
        $validate= $_GET['validate'];

        if($validate == 0){
            rejectComment($mysqli, $id);
        }else{
            validateComment($mysqli, $id);
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Gestion de comentarios - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/commentmanagement.css" type="text/css" rel="stylesheet">
        <script src="controller/verify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>   
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="Volver"></a>
                    <img id="icon2" src="images/comment.png" alt="Gestión de comentarios">
                    <h1>GESTIÓN DE COMENTARIOS</h1>
                </div>
                <div id="cuadricula">
                    <div id="tabla">
                        <h1>Lista de comentarios:</h1>
                        <table>
                            <tr>
                                <th id="id">#</th>
                                <th id="comment">Comentario</th>
                                <th id="product">Producto</th>
                                <th id="user">Usuario</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <?php
                                $resultado = getCommentsNotValidated($mysqli);
                                while($comment = $resultado->fetch_assoc()){
                                    $resultado1 = getUserOfComment($mysqli, $comment['idComment']);
                                    $user = $resultado1->fetch_assoc();
                                    $resultado2 = getProductOfComment($mysqli, $comment['idComment']);
                                    $product = $resultado2->fetch_assoc();
                                    echo "<tr>
                                        <td>".$comment['idComment']."</td>
                                        <td>".$comment['opinion']."</td>
                                        <td>".$product['title']."</td>
                                        <td>".$user['nick']."</td>
                                        <td><a class='icono nohover' onclick='verifyAcceptComment(".$comment['idComment'].")'><img class='validate' src='images/validate.png' alt='Validar'></a></td>
                                        <td><a class='icono nohover' onclick='verifyDeleteComment(".$comment['idComment'].")'><img class='delete' src='images/eliminar.png' alt='Eliminar'></a></td>
                                        </tr>";
                                }
                            ?>
                        </table>
                    </div> 
                    
                </div>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>