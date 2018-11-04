<!DOCTYPE html>

<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Login - MatsuSoftware</title>

        <?php include("includes/head.php"); ?>

        <link href="css/login.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php include("includes/header.php"); ?>

        <!--CONTENT-->
        <div id="principal" class="content">
            <div id="content" class="content-inside">
                <form id="iniciosesion" action="" method="post">

                    <h1>Inicio Sesión</h1>

                    <label class="etiqueta">E-mail*:<br/></label>
                    <input type="text" name="email" required>

                    <label class="etiqueta">Contraseña*:<br/></label>
                    <input type="password" name="contraseña" required>

                    <button class="button" type="submit">Enviar</button>

                </form>

                <div id="separator"></div>

                <form id="registro" action="" method="post">

                    <h1>Registro</h1>

                    <label class="etiqueta">Nick*:<br/></label>
                    <input type="text" name="nick" required>

                    <label class="etiqueta">E-mail*:<br/></label>
                    <input type="text" name="email" required>

                    <label class="etiqueta">Contraseña*:<br/></label>
                    <input type="password" name="contraseña" required>

                    <label class="etiqueta">Dirección*:<br/></label>
                    <input type="text" name="direccion" required>

                    <label class="etiqueta">Municipio*:<br/></label>
                    <input type="text" name="municipio" required>

                    <label class="etiqueta">Provincia*:<br/></label>
                    <input type="text" name="provincia" required>


                    <button class="button" type="submit">Enviar</button>
                    <div id="tyc">
                        <p>Registrándote aceptas nuestros</p>
                        <h4><a href="tyc.php">términos y condiciones</a></h4>
                    </div>

                </form>
            </div>
        </div>

        <!-- FOOTER -->
        <?php include("includes/footer.php"); ?>

    </body>

</html>