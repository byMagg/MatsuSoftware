<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/querysfunction.php';
    session_start();
    timeLogOut();
    security(0);

    if(isset($_GET['id']) && ($_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2)){

        $id= $_GET['id'];
    
        deleteProject($mysqli, $id);
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Gestion de proyectos - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/projectmanagement.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="projectmanagement/addproject.js"></script>
        <script src="controller/verify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <div class="error general">
            <span>Ha ocurrido un error, inténtalo de nuevo mas tarde.</span>
        </div>
        
        <div class="success">
            <span>Proyecto registrado correctamente.</span>
        </div> 
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="admindash.php"><img id="volver"src="images/volver.png" alt="volver"></a>
                    <img id="icon2" src="images/stats.png" alt="project">
                    <h1>GESTIÓN DE PROYECTOS</h1>
                </div>
                <div id="cuadricula">
                    <div id="tabla">
                        <h1>Lista de proyectos:</h1>
                        <table>
                            <tr>
                                <th id="id">#</th>
                                <th id="title">Titulo</th>
                                <th></th>
                            </tr>

                            <?php
                                $resultado = getProjects($mysqli);
                                while($product = $resultado->fetch_assoc()){
                                    echo "<tr>
                                        <td>".$product['idProject']."</td>
                                        <td>".$product['title']."</td>
                                        <td><a class='icono nohover' onclick='verifyDeleteProject(".$product['idProject'].")'><img class='delete' src='images/eliminar.png' alt='Eliminar'></a></td>
                                        </tr>";
                                }
                            ?>
                        </table>
                    </div> 
                    
                    <div id="lineavertical"></div>

<<<<<<< HEAD
                    <div class="error general">
                        <span>Ha ocurrido un error, inténtalo de nuevo mas tarde</span>
                    </div>
                    
                    <div class="success">
                        <span>Proyecto registrado correctamente</span>
                    </div>

=======
>>>>>>> 92dfcc83c0d277469ce4e292ab8285d6abb99939
                    <div id="form">
                        <h1>Añadir proyecto:</h1>
                        <form id="projectmanagement" action="">
                            <label>Título*:</label>
                            <input type="text" name="title" maxlength="50" title="Debe de contener enter 1 y 50 carácteres." placeholder=" Introduce el título." required/>
                            <label>Link de la foto*:</label>
                            <input type="text" name="photoLink" maxlength="1000" title="Debe de contener enter 1 y 1000 carácteres." placeholder=" Introduce el link de la foto." required/>
                            <label>Descripción*:</label>
                            <textarea type="msg" name="descrip" maxlength="500" title="Debe de contener enter 1 y 500 carácteres." placeholder=" Introduce una descripcion." required></textarea>
                            <button class="button" type="submit">Añadir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>