<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Recuperar contraseña - MatsuSoftware</title>
        <?php include("footerheader/head.php"); ?>
        <link href="css/writeemail.css" type="text/css" rel="stylesheet">
        <script src="login/jquery-3.3.1.min.js"></script>
        <script src="recovery/main.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>
                    
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <h1>RECUPERACIÓN DE CONTRASEÑA:</h1>
                <div class="success">
                    <span>Siga los pasos del mensaje que se ha enviado a su correo.</span>
                </div>
                <div class="error general">
                    <span>Error, inténtelo de nuevo.</span>
                </div>
                <div class="error email">
                    <span>Error, no existe una cuenta con este correo, inténtelo de nuevo.</span>
                </div>
                <form id="writeemail" action="">
                    <label>Introduce tu correo electrónico:</label>
                    <input id="email" type="email" name="email" required/>
                    <button class="button" type="submit">Recuperar contraseña</button>
                </form>
            </div>
        </div>
                            
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>