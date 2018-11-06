<!DOCTYPE html>

<html lang="es">

    <head>

        <!-- Titulo -->
        <title>Gestion Videojuegos - MatsuSoftware</title>

        <?php include("footerheader/head.php"); ?>

        <link href="css/gestionvideojuego.css" type="text/css" rel="stylesheet">

        <style>
            th{
                border: 1px solid black;
                border-collapse: collapse;
                padding: 0.15%;
                text-align: center;
            }
            td{
                padding: 0.15%;
                text-align: center;
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>

    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>

        
        
        <div class="content">
            <div class="content-inside">


            <table class = "listadoVideojuegos">

                <tr>

                    <th>Hoy</th>

                    <th>Mañana</th>

                    <th>Martes</th>
                    <th></th>
                    <th></th>
                </tr>

                <tr>

                    <td colspan = "3">Soleado</td>

                </tr>

                <tr>

                    <td>19°C</td>

                    <td>17°C</td>

                    <td>12°C</td>

                </tr>

                <tr>

                    <td>E 13 km/h</td>

                    <td>E 11 km/h</td>

                    <td>S 16 km/h</td>

                </tr>

            </table>


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
        <?php include("footerheader/footer.php"); ?>

    </body>

</html>