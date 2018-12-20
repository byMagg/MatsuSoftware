<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Recuperar contraseña - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/recoverypassword.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="recovery/password.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <div class="popup">
            <div class="success">
            <span>Siga los pasos del mensaje que se ha enviado a su correo</span>
            </div>
            <div class="error general">
                <span>Error, inténtelo de nuevo</span>
            </div>
            <div class="error email">
                <span>Error, no existe una cuenta con este correo, inténtelo de nuevo</span>
            </div>  
        </div>
             
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <h1>RECUPERACIÓN DE CONTRASEÑA:</h1>
               
                <form id="writeemail" action="">
                    <label>Introduce tu correo electrónico:</label>
                    <input id="email" type="email" name="email" placeholder="Introduce tu correo" required/>
                    <button class="button" type="submit">Recuperar contraseña</button>
                </form>
            </div>
        </div>                 
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
</html>