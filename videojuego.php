<?php
    require 'conexiondb/conexion.php';
    require 'controller/querysfunction.php';
    require 'controller/generalfunction.php';

    session_start();
    timeLogOut();

    if(isset($_GET['id'])){
        $resultado = getProductUsingId($mysqli, $_GET['id']);
        $resultado2 = getCommentsByProduct($mysqli, $_GET['id']);

        $videogame = $resultado->fetch_assoc();
    }else{
        header("Location: catalogue.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Videojuego - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/videogame.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="comment/addcomment.js"></script>
        <script src="comment/modifycomment.js"></script>
        <script src="comment/deletecomment.js"></script>
        <script src="showmore/showmore.js"></script>
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <!--ARREGLAR-->
        <div class="popup">
            <div class="error general">
                <span>Ha ocurrido un error, inténtalo de nuevo mas tarde</span>
            </div>
            <div class="success send">
                <span>El comentario se ha enviado a revisión, aparecerá una ver revisado</span>
            </div>
            <div class="error ac">
                <span>No puedes añadir mas de un comentario</span>
            </div>
            <div class="success delete">
                <span>El comentario ha sido eliminado correctamente</span>
            </div>
        </div>
        
        <!--CONTENT-->
        <div class="content">
            <div class="content-inside">
                <div id="content">
                    <div id="cabecera">
                        <h1><?php echo $videogame['title']; ?></h1>
                    </div>
                    <div id="principal">
                        <div id="seccion">
                            <img id="foto" src="<?php echo $videogame['photoLink']; ?>" alt="Foto del videojuego">
                            <h2>Precio: <?php echo $videogame['price']; ?>€</h2>
                            <div id="puntuacion">
                                <?php 
                                    $sum = $videogame['sumRating'];
                                    $total = $videogame['numComments'];

                                    if($total != 0){
                                        echo '<h2>Puntuación</h2><div class="estrella"><h3>'.round($sum/$total,1).'/5</h3>';
                                        $stars = $sum/$total;
                                        for($i = 0; $i < 5; $i++){
                                            if($stars >= 1){
                                                echo '<img src="images/estrella.png" alt="Estrella completa">';
                                                $stars = $stars - 1;
                                            }else if($stars != 0 && $stars >= 0.5){
                                                echo '<img src="images/mediaestrella.png" alt="Media estrella">';
                                                $stars = $stars - 0.5;
                                            }else{
                                                echo '<img src="images/noestrella.png" alt="No estrella">';
                                            }
                                        }
                                        echo '</div>';
                                    }else{
                                        echo '<h2>Puntuación</h2><div class="estrella"><h3>0/5</h3><img src="images/noestrella.png" alt="No estrella"><img src="images/noestrella.png" alt="No estrella"><img src="images/noestrella.png" alt="No estrella"><img src="images/noestrella.png" alt="No estrella"><img src="images/noestrella.png" alt="No estrella"></div> ';
                                    }
                                ?>
                            </div>
                            <?php
                                if(isset($_SESSION['usuario'])){
                                    echo'
                                        <form action="tpv.php" method="POST">
                                        <input type="hidden" name="url" value="'.$videogame["purchaseLink"].'" />
                                        <input type="hidden" name="price" value="'.$videogame["price"].'" />
                                        <input type="hidden" name="title" value="'.$videogame["title"].'" />
                                        <input type="hidden" name="idUser" value="'.$_SESSION['usuario']['idUser'].'" />
                                        <input type="hidden" name="idProduct" value="'.$_GET["id"].'" />
                                        <button class="button" type="submit">Realizar compra</button>
                                        </form>
                                        ';
                                }else{
                                    echo '<h3 class="msgcpurchase">Debes iniciar sesión para poder comprar.</h3>';
                                }
                            ?>
                        </div>
                        <div id="descripcion">
                            
                            <h3>Descripción</h3>
                            <p id="descrip"><?php echo $videogame['descrip']; ?></p>
                            <a class="subrayado" onclick="showmore('descrip','150px')">Ver más</a>
                            
                            <h3>Requisitos</h3>
                            <p id="requisitos"><?php echo $videogame['requirements']; ?></p>
                            <a class="subrayado" onclick="showmore('requisitos','100px')">Ver más</a>

                        </div>
                    </div id="video">
                        <iframe src="https://youtube.com/embed/<?php echo $videogame['trailerLink']; ?>"></iframe>
                    </div>
                <div id="linea"></div>
                <div id="comentarios">
                    <div id="h1comentario"><h1>COMENTARIOS</h1></div>
                        <div id="divcomment">
                            <?php
                                if(!isset($_SESSION['usuario'])){
                                    echo '<h2 class="msgcomment">Debes iniciar sesión para poder comentar.</h2>';
                                }else if(!isBought($mysqli, $_SESSION['usuario']['idUser'], $_GET['id'])){
                                    echo '<h2 class="msgcomment">Debes haber comprado el producto para poder comentar.</h2>';
                                }else if(isCommented($mysqli, $_SESSION['usuario']['idUser'], $_GET['id'])){
                                    $resultado3 = getComment($mysqli, $_SESSION['usuario']['idUser'], $_GET['id']);
                                    $comment = $resultado3->fetch_assoc();
                                    echo'
                                        <form id="modifycomment" action="">
                                            <input type="hidden" name="idUser" value="'.$_SESSION['usuario']['idUser'].'" />
                                            <input type="hidden" name="idProduct" value="'.$_GET["id"].'" />
                                            <div><label>Modifica tu comentario:</label>
                                            <textarea name="opinion" max-length="500" title="Máximo: 500 caracteres.">'.$comment['opinion'].'</textarea></div>
                                           
                                            <div><label>Modifica tu puntuación:</label>
                                            <input name ="rating" type="number" min="0" max="5" step=".5" value="'.$comment['rating'].'" /></div>
                                        </form>

                                        <form id="deletecomment" action="">
                                            <input type="hidden" name="idUser" value="'.$_SESSION['usuario']['idUser'].'" />
                                            <input type="hidden" name="idProduct" value="'.$_GET["id"].'" />     
                                        </form>

                                        <div id="botonesform">
                                            <button class="button" type="submit" form="modifycomment">Modificar</button>
                                            <button class="button" type="submit" form="deletecomment">Eliminar</button>
                                        </div>
                                        ';   
                                }else{
                                    echo'
                                        <form id="addcomment" action="">
                                            <input type="hidden" name="idUser" value="'.$_SESSION['usuario']['idUser'].'" />
                                            <input type="hidden" name="idProduct" value="'.$_GET["id"].'" />
                                            <div>
                                                <label>Introduce tu comentario:</label>
                                                <textarea name="opinion" max-length="500" title="Máximo: 500 caracteres." ></textarea>
                                            </div>
                                            <div>
                                                <label>Modifica tu puntuación:</label>
                                                <input name="rating" type="number" min="0" max="5" step=".5" />
                                            </div>
                                        </form>
                                        <button class="button" type="submit" form="addcomment">Añadir</button>
                                        '; 
                                }
                            ?>
                        </div>
                        <?php
                            while($comment = $resultado2->fetch_assoc()){
                                $resultado4 = getUsersUsingId($mysqli, $comment['idUser']);
                                $user = $resultado4->fetch_assoc();
                                echo'
                                    <div class="item"><div class="info"><img src="images/user.png" alt="Foto de perfil">
                                    <h2>'.$user['nick'].'</h2>
                                    <div class="estrella">
                                    ';
                                    $stars = $comment['rating'];
                                    for($i = 0; $i < 5; $i++){
                                        if($stars >= 1){
                                            echo '<img src="images/estrella.png" alt="Estrella completa">';
                                            $stars = $stars - 1;
                                        }else if($stars != 0){
                                            echo '<img src="images/mediaestrella.png" alt="Media estrella">';
                                            $stars = $stars - 0.5;
                                        }else{
                                            echo '<img src="images/noestrella.png" alt="No estrella">';
                                        }
                                    }
                                    echo
                                    "</div></div>
                                    <div class='comment'><h4 id=".$comment['idComment'].">".$comment['opinion']."</h4>
                                    <a class='subrayado' onclick=showmore(".$comment['idComment'].",'120px')>Ver más</a>
                                    </div>
                                    </div>";
                            }
                        ?>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>