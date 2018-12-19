<!DOCTYPE html>
<html lang="es">

    <head>
        <!-- Titulo -->
        <title>Contacto - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/contact.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="contact/send.js"></script>
    </head>

    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <div class="success">
            <span>Mensaje enviado correctamente.</span>
        </div>
        <div class="error">
            <span>Error, el mensaje no se ha podido enviar, inténtalo de nuevo.</span>
        </div>
        <!--CONTENT-->
        <div id="principal" class="content">
            <div id="content" class="content-inside">
                <form id="formulario" action="">
                    <h1>CONTACTO:</h1>
                    <label>Nombre*:<br/></label>
                    <input type="text" name="name" placeholder=" Introduce tu nombre" required/>

                    <label>Apellidos*:<br/></label>
                    <input type="text" name="surname" placeholder=" Introduce tus apellidos" required/>

                    <label>Correo electrónico*:<br/></label>
                    <input type="email" name="email" placeholder=" Introduce tu e-mail" required/>
                    
                    <label>Mensaje*:<br/></label>
                    <textarea type="msg" name="msg" placeholder=" Introduce tu mensaje" required></textarea>
                    
                    <button class="button" type="submit">Enviar</button>
                </form>

                <div id="lineavertical"></div>

                <div id="parrafo">
                    <h3>Información:</h3>    
                    <p><img src="images/avatar.png" alt="nombre"> MatsuSoftware</p>
                    <p><img src="images/correo.png" alt="correo"> matsusoftware@gmail.com</p>
                    <p><img src="images/tef.png" alt="telefono"> +666666666</p>
                    <p><img src="images/direccion.png" alt="direccion"> Sillicon Valley</p>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>