<!DOCTYPE html>

<html lang="es">

    <head>

        <!-- Titulo -->
        <title>Gestion Videojuegos - MatsuSoftware</title>

        <?php include("includes/head.php"); ?>

        <link href="css/gestionvideojuego.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php include("includes/header.php"); ?>

        <div class="content">
            <div class="content-inside">
            <form action="" method="post" class="añadirVideojuego">
                    <h1>Añadir Videojuego</h1>

                        <div class="cuadroTexto">
                            <input type = "text" placeholder="Titulo">
                        </div>

                        <div class="cuadroTexto">
                            <input type = "text" placeholder="Precio.">
                        </div>

                        <div class="cuadroTexto">
                            <input type = "text" placeholder="Requisitos del sistema">
                        </div>

                        <div class="cuadroTexto">
                            <input type = "text" placeholder="Link de la foto">
                        </div>

                        <div class="cuadroTexto">
                            <input type = "text" placeholder="Link de compra">
                        </div>

                        <div class="cuadroTexto">
                            <input type = "text" placeholder="Link de trailer">
                        </div>

                        <div class="cuadroTexto">
                            <input type = "text" placeholder="Descripción">
                        </div>
                    <button class="button" type="submit" class="Boton">Enviar</button>
                </form>
            </div>
        </div>

        <!-- FOOTER -->
        <?php include("includes/footer.php"); ?>

    </body>

</html>