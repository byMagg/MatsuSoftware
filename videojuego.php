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
        <link href="css/videojuego.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="comment/addcomment.js"></script>
        <script src="comment/modifycomment.js"></script>
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <!--CONTENT-->
        <div class="content">
            <div class="content-inside">
                <div id="content">
                    <div id="cabecera">
                        <h1><?php echo $videogame['title']; ?></h1>
                        <div id="puntuacion">
                            <?php 
                                $sum = $videogame['sumRating'];
                                $total = $videogame['numComments'];

                                if($total != 0){
                                    echo '<div><h2>Puntuación</h2><div class="estrella"><h3>'.$sum/$total.'/5</h3>';
                                    $stars = $sum/$total;
                                    for($i = 0; $i < 5; $i++){
                                        if($stars >= 1){
                                            echo '<img src="images/estrella.png" alt="">';
                                            $stars = $stars - 1;
                                        }else if($stars != 0){
                                            echo '<img src="images/mediaestrella.png" alt="">';
                                            $stars = $stars - 0.5;
                                        }else{
                                            echo '<img src="images/noestrella.png" alt="">';
                                        }
                                    }
                                    echo '</div></div>';
                                }else{
                                    echo '<div><h2>Puntuación</h2><div class="estrella"><h3>0/5</h3><img src="images/noestrella.png" alt=""><img src="images/noestrella.png" alt=""><img src="images/noestrella.png" alt=""><img src="images/noestrella.png" alt=""><img src="images/noestrella.png" alt=""></div></div> ';
                                }
                            ?>
                        </div>
                    </div>
                    <div id="principal">
                        <div id="seccion">
                            <img src="<?php echo $videogame['photoLink']; ?>" alt="">
                            <h2>Precio: <?php echo $videogame['price']; ?>€</h2>
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
                                    echo '<h2 class="msgcpurchase">Debes iniciar sesión para poder comprar.</h2>';
                                }
                            ?>
                        </div>
                        <div id="descripcion">
                            <h3>Descripción</h3>
                            <p><?php echo $videogame['descrip']; ?></p>
                            <h3>Requisitos</h3>
                            <p><?php echo $videogame['requirements']; ?></p>
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
                                        <div class="error ac">
                                            <span>No podrás modificar hasta que te validen el comentario.</span>
                                        </div>
                                        <div class="error general">
                                            <span>Ha ocurrido un error, inténtalo de nuevo mas tarde.</span>
                                        </div>
                                        <div class="success">
                                            <span>El comentario se ha enviado a revisión, aparecerá una ver revisado.</span>
                                        </div>
                                        <form id="modifycomment" action="">
                                        <input type="hidden" name="idUser" value="'.$_SESSION['usuario']['idUser'].'" />
                                        <input type="hidden" name="idProduct" value="'.$_GET["id"].'" />
                                        <label>Modifica tu comentario:</label>
                                        <textarea name="opinion" maxlength="498">'.$comment['opinion'].'</textarea>
                                        <label>Modifica tu puntuación:</label>
                                        <input name ="rating" type="number" min="0" max="5" step=".5" value="'.$comment['rating'].'" />
                                        <button class="button" type="submit">Modificar</button>
                                        </form>
                                        ';   
                                }else{
                                    echo'
                                        <div class="error ac">
                                            <span>No puedes añadir mas de un comentario.</span>
                                        </div>
                                        <div class="error general">
                                            <span>Ha ocurrido un error, inténtalo de nuevo mas tarde.</span>
                                        </div>
                                        <div class="success">
                                            <span>El comentario se ha enviado a revisión, aparecerá una ver revisado.</span>
                                        </div>
                                        <form id="addcomment" action="">
                                        <input type="hidden" name="idUser" value="'.$_SESSION['usuario']['idUser'].'" />
                                        <input type="hidden" name="idProduct" value="'.$_GET["id"].'" />
                                        <label>Introduce tu comentario:</label>
                                        <textarea name="opinion" maxlength="498" ></textarea>
                                        <label>Modifica tu puntuación:</label>
                                        <input name="rating" type="number" min="0" max="5" step=".5" />
                                        <button class="button" type="submit">Añadir</button>
                                        </form>
                                        '; 
                                }
                            ?>
                        </div>
                        <?php
                            while($comment = $resultado2->fetch_assoc()){
                                $resultado4 = getUsersUsingId($mysqli, $comment['idUser']);
                                $user = $resultado4->fetch_assoc();
                                echo'
                                    <div class="item">
                                        <div class="info"><img src="images/user.png" alt=""><div><h2>'.$user['nick'].'</h2><h4>'.$comment['opinion'].'</h4></div></div>
                                        <div class="estrella">
                                    ';
                                    $stars = $comment['rating'];
                                    for($i = 0; $i < 5; $i++){
                                        if($stars >= 1){
                                            echo '<img src="images/estrella.png" alt="">';
                                            $stars = $stars - 1;
                                        }else if($stars != 0){
                                            echo '<img src="images/mediaestrella.png" alt="">';
                                            $stars = $stars - 0.5;
                                        }else{
                                            echo '<img src="images/noestrella.png" alt="">';
                                        }
                                    }
                                    echo'</div>';
                                echo'</div>';
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