<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/querysfunction.php';
    session_start();
    timeLogOut();
    security(0);

    if(isset($_GET['id']) && ($_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2)){

        $id= $_GET['id'];
    
        deleteNewsletter($mysqli, $id);
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Gestion de newsletter - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/newslettermanagement.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="newslettermanagement/addnewsletter.js"></script>
        <script src="controller/verify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <div class="error general">
            <span>Ha ocurrido un error, inténtalo de nuevo mas tarde</span>
        </div>
        <div class="success">
            <span>Newsletter registrado correctamente</span>
        </div> 
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="volver"></a>
                    <img id="icon2" src="images/newsletter.png" alt="newsletter">
                    <h1>GESTIÓN DE NEWSLETTER</h1>
                </div>
                <div id="cuadricula">
                    <div id="tabla">
                        <h1>Lista de newsletter:</h1>
                        <table>
                            <tr>
                                <th id="id">#</th>
                                <th id="comment">Comentario</th>
                                <th></th>
                            </tr>

                            <?php
                                $resultado = getNewsletter($mysqli, "DESC");
                                while($news = $resultado->fetch_assoc()){
                                    echo "<tr>
                                          <td>".$news['idNewsletter']."</td>
                                          <td>".$news['comment']."</td>
                                          <td><a class='icono nohover' onclick='verifyDeleteNewsletter(".$news['idNewsletter'].")'><img class='delete' src='images/eliminar.png' alt='Eliminar'></a></td>
                                          </tr>";   
                                }
                            ?>  
                        </table>
                    </div> 
                    
                    <div id="lineavertical"></div>

                    <div id="form">
                        <h1>Añadir newsletter:</h1>
                        <form id="newslettermanagement" action="">
                            <label>Introduce el nuevo comentario:</label>
                            <textarea type="msg" name="msg" max-length="500" title="Máximo: 50 caracteres" placeholder=" Introduce el comentario." required></textarea>
                            <label><input type="checkbox" name="send" value="Yes">Enviár a través de correo a todos los usuarios</label>
                            <button class="button" type="submit">Añadir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>