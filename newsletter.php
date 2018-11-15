<!DOCTYPE html>

<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Newsletter - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/newsletter.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <h1>NEWSLETTER:</h1>
                </div>

                <div id="cuadricula">                
                    <select name="orden" required>
                        <option disabled selected>Ordenación</option>
                        <option value='asc'>Orden Ascendente</option>
                        <option value='desc'>Orden Descendente</option>
                    </select>
                </div>
                
                <div id="tabla">
                    <table>
                        <tr>
                            <td><img class="icono" src="images/paisaje.jpg" alt="Usuario"></td>
                            <td><h4 class="fecha">18/11/2018</h4><p>Vestibulum commodo sed sem non pellentesque. In arcu metus, efficitur eu velit vel, imperdiet interdum magna. Praesent mollis arcu felis. Integer scelerisque tortor eu vulputate convallis. Morbi vestibulum viverra neque, a pulvinar elit dictum vel. Etiam elementum augue ac lacinia blandit. Donec sollicitudin tellus lacus, at ullamcorper tellus tempor vel. Nullam feugiat suscipit condimentum.</p></td>
                        </tr>

                        <tr>
                            <td><img class="icono" src="images/paisaje.jpg" alt="Usuario"></td>
                            <td><h4 class="fecha">18/11/2018</h4><p>Vestibulum commodo sed sem non pellentesque. In arcu metus, efficitur eu velit vel, imperdiet interdum magna. Praesent mollis arcu felis. Integer scelerisque tortor eu vulputate convallis. Morbi vestibulum viverra neque, a pulvinar elit dictum vel. Etiam elementum augue ac lacinia blandit. Donec sollicitudin tellus lacus, at ullamcorper tellus tempor vel. Nullam feugiat suscipit condimentum.</p></td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>