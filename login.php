<!DOCTYPE html>

<html lang="es">

    <head>

        <!-- Titulo -->

        <title>Iniciar sesión</title>

        

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
                    <input type="text" placeholder="E-mail *" name="email" required>

                    <label class="etiqueta">Contraseña*:<br/></label>
                    <input type="password" placeholder="Contraseña *" name="contraseña" required>

                    <button class="button" type="submit">Enviar</button>

                </form>


                <div id="separator"></div>


                <form id="registro" action="" method="post">

                    <h1>Registro</h1>

                    <label class="etiqueta">Nick*:<br/></label>
                    <input type="text" placeholder="Nick *" name="nick" required>

                    <label class="etiqueta">E-mail*:<br/></label>
                    <input type="text" placeholder="E-mail *" name="email" required>

                    <label class="etiqueta">Contraseña*:<br/></label>
                    <input type="password" placeholder="Contraseña *" name="contraseña" required>

                    <label class="etiqueta">Dirección:<br/></label>
                    <input type="text" placeholder="Dirección" name="direccion">

                    <label class="etiqueta">Municipio:<br/></label>
                    <input type="text" placeholder="Municipio" name="municipio">

                    <label class="etiqueta">Provincia:<br/></label>
                    <input type="text" placeholder="Provincia" name="provincia">


                    <button class="button" type="submit">Enviar</button>
                    <h4><a class="nohover" href="tyc.php">Registrándote aceptas nuestros términos y condiciones</a></h4>



                </form>

            </div>

        </div>



        <!-- FOOTER -->

        <?php include("includes/footer.php"); ?>

    </body>

</html>