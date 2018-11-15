<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Videojuego - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/videojuego.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <!--CONTENT-->
        <div class="content">
            <div class="content-inside">
                <div id="content">
                    <div id="cabecera">
                        <h1>TITULO</h1>
                        <div id="puntuacion">
                                <div><h2>Puntuación</h2><h3>5/5</h3></div>
                                <div class="estrella"><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""></div>
                        </div>
                    </div>
                    <div id="principal">
                        <div><img src="images/paisaje.jpg" alt=""><h2>Precio:</h2><a class="button" href="#">Realizar compra</a></div>
                        <div id="descripcion">
                            <h3>Descripción</h3>
                            <p>Donec velit lectus, venenatis sed consequat sodales, tincidunt vel nunc. Aliquam et molestie lectus. Nulla non libero nulla. Integer eget lacinia nisl.</p>
                            <h3>Requisitos</h3>
                            <p>Donec velit lectus, venenatis sed consequat sodales, tincidunt vel nunc. Aliquam et molestie lectus. Nulla non libero nulla. Integer eget lacinia nisl.</p>
                        </div>
                    </div>
                    
                    <iframe width="800" height="315" src="https://www.youtube.com/embed/GM7_we-jpfc?rel=0&autoplay=1&mute=1&loop=1&playlist=GM7_we-jpfc"></iframe>
                    </div>
                <div id="linea"></div>
                <div id="comentarios">
                        <div id="h1comentario"><h1>COMENTARIOS</h1></div>
                        <div class="item">
                            <div class="info"><img src="images/paisaje.jpg" alt=""><div><h2>USUARIO</h2><h4>Opinión</h4></div></div>
                            <div class="estrella"><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""></div>
                        </div>
                        <div class="item">
                            <div class="info"><img src="images/paisaje.jpg" alt=""><div><h2>USUARIO</h2><h4>Opinión</h4></div></div>
                            <div class="estrella"><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""></div>
                        </div>
                        <div class="item">
                            <div class="info"><img src="images/paisaje.jpg" alt=""><div><h2>USUARIO</h2><h4>Opinión</h4></div></div>
                            <div class="estrella"><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""></div>
                        </div>
                        <div class="item">
                            <div class="info"><img src="images/paisaje.jpg" alt=""><div><h2>USUARIO</h2><h4>Opinión</h4></div></div>
                            <div class="estrella"><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""><img src="images/estrella.png" alt=""></div>
                        </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>