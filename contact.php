<!DOCTYPE html>

<html lang="es">

    <head>
        <!-- Titulo -->
        <title>Contacto - MatsuSoftware</title>
        <?php include("includes/head.php"); ?>
        <link href="css/contact.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <?php include("includes/header.php"); ?>

        <!--CONTENT-->
        <div id="principal" class="content">
            <div id="content" class="content-inside">
                <form id="formulario" action="includes/send.php" method="post">
                    <label>Nombre*:<br/></label>
                    <input type="text" name="name" placeholder=" Introduce tu nombre" required/>

                    <label>Apellidos*:<br/></label>
                    <input type="text" name="surname" placeholder=" Introduce tus apellidos" required/>

                    <label>Correo electrónico*:<br/></label>
                    <input type="email" name="email" placeholder=" Introduce tu e-mail" required/>
                    
                    <label>Mensaje*:<br/></label>
                    <textarea type="msg" name="msg" placeholder=" Introduce tu mensaje" required></textarea>
                    
                    <button class="button" type="submit">Enviar</button>

                    <?php
                        if(isset($_GET["sent"])){
                            $sent = $_GET["sent"];
                                if($sent == 1){
                                    echo "
                                    <div id='sent'>
                                        <label>Mensaje enviado correctamente!</label>
                                    </div>";
                                }
                        }
                    ?>
                </form>

                <div id="lineavertical"></div>

                <div id="parrafo">
                    <h3>Información:</h3>    
                    <p><img src="images/avatar.png"> MatsuSoftware</p>
                    <p><img src="images/correo.png"> matsusoftware@gmail.com</p>
                    <p><img src="images/tef.png"> +666666666</p>
                    <p><img src="images/direccion.png"> Sillicon Valley</p>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <?php include("includes/footer.php"); ?>
    </body>
</html>