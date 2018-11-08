<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['rol'] == 1){
            header("Location: admindash.php");
        }else if($_SESSION['usuario']['rol'] == 0){
            header("Location: userdash.php");
        }else{
            header("Location: admindash.php");
        }
    }
?>

<!DOCTYPE html>

<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Login - MatsuSoftware</title>

        <?php include("footerheader/head.php"); ?>

        <link href="css/login.css" type="text/css" rel="stylesheet">

        <script src="login/jquery-3.3.1.min.js"></script>
        <script src="login/main.js"></script>
        <script src="register/main.js"></script>
    </head>

    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>

        <!--CONTENT-->
        <div id="principal" class="content">
            <div id="content" class="content-inside">
                <div class="error inicio">
                    <span>Datos de ingreso no válidos, inténtalo de nuevo.</span>
                </div>
                <form id="iniciosesion" action="">
                    <h1>Inicio Sesión</h1>

                    <label class="etiqueta">E-mail/Nick*:<br/></label>
                    <input type="text" placeholder="Introduce tu e-mail/nick" name="email" required>

                    <label class="etiqueta">Contraseña*:<br/></label>
                    <input type="password" pattern="[A-Za-z0-9_-]{4,20}" placeholder="Introduce tu contraseña" name="pass" required>

                    <div id="boton"><button class="button" type="submit">Iniciar Sesión</button></div>
                    
                    <a id="olvidar" href="writeemail.php">¿Olvidaste la contraseña?</a>
                </form>

                <div id="separator"></div>

                <div class="error nick">
                    <span>Existe un usuario con este nick, pruebe con otro.</span>
                </div>
                <div class="error email">
                    <span>Existe un usuario con este email, pruebe con otro.</span>
                </div>
                <div class="error general">
                    <span>Ha ocurrido un error, inténtalo de nuevo mas tarde.</span>
                </div>
                <div class="success">
                    <span>Usuario registrado correctamente, inicie sesión para continuar.</span>
                </div>
                <form id="registro" action="">

                    <h1>Registro</h1>

                    <label class="etiqueta">Nick*:<br/></label>
                    <input type="text" placeholder="Introduce tu nick" name="nick" required>

                    <label class="etiqueta">E-mail*:<br/></label>
                    <input type="email" placeholder="Introduce tu e-mail" name="email" required>

                    <label class="etiqueta">Contraseña*:<br/></label>
                    <input type="password" pattern="[A-Za-z0-9_-]{4,20}" placeholder="Introduce tu contraseña" name="contrasena" required>

                    <label class="etiqueta">Provincia*:<br/></label>
                    <select name="provincia" required>
                        <option value='' disabled selected>Seleccione una provincia</option>
                        <option value='A Coruna' >A Coruña</option>
                        <option value='Alava'>Álava</option>
                        <option value='Albacete' >Albacete</option>
                        <option value='Alicante'>Alicante</option>
                        <option value='Almeria' >Almería</option>
                        <option value='Asturias' >Asturias</option>
                        <option value='Avila' >Ávila</option>
                        <option value='Badajoz' >Badajoz</option>
                        <option value='Barcelona'>Barcelona</option>
                        <option value='Burgos' >Burgos</option>
                        <option value='Caceres' >Cáceres</option>
                        <option value='Cadiz' >Cádiz</option>
                        <option value='Cantabria' >Cantabria</option>
                        <option value='Castellon' >Castellón</option>
                        <option value='Ceuta' >Ceuta</option>
                        <option value='Ciudad Real' >Ciudad Real</option>
                        <option value='Cordoba' >Córdoba</option>
                        <option value='Cuenca' >Cuenca</option>
                        <option value='Gerona' >Gerona</option>
                        <option value='Girona' >Girona</option>
                        <option value='Las Palmas' >Las Palmas</option>
                        <option value='Granada' >Granada</option>
                        <option value='Guadalajara' >Guadalajara</option>
                        <option value='Guipuzcoa' >Guipúzcoa</option>
                        <option value='Huelva' >Huelva</option>
                        <option value='Huesca' >Huesca</option>
                        <option value='Jaen' >Jaén</option>
                        <option value='La Rioja' >La Rioja</option>
                        <option value='Leon' >León</option>
                        <option value='Lleida' >Lleida</option>
                        <option value='Lugo' >Lugo</option>
                        <option value='Madrid' >Madrid</option>
                        <option value='Malaga' >Málaga</option>
                        <option value='Mallorca' >Mallorca</option>
                        <option value='Melilla' >Melilla</option>
                        <option value='Murcia' >Murcia</option>
                        <option value='Navarra' >Navarra</option>
                        <option value='Orense' >Orense</option>
                        <option value='Palencia' >Palencia</option>
                        <option value='Pontevedra'>Pontevedra</option>
                        <option value='Salamanca'>Salamanca</option>
                        <option value='Segovia' >Segovia</option>
                        <option value='Sevilla' >Sevilla</option>
                        <option value='Soria' >Soria</option>
                        <option value='Tarragona' >Tarragona</option>
                        <option value='Tenerife' >Tenerife</option>
                        <option value='Teruel' >Teruel</option>
                        <option value='Toledo' >Toledo</option>
                        <option value='Valencia' >Valencia</option>
                        <option value='Valladolid' >Valladolid</option>
                        <option value='Vizcaya' >Vizcaya</option>
                        <option value='Zamora' >Zamora</option>
                        <option value='Zaragoza'>Zaragoza</option>
                    </select>
                    
                    <label class="etiqueta">Municipio*:<br/></label>
                    <input type="text" placeholder="Introduce tu municipio" name="municipio" required>

                    <label class="etiqueta">Dirección*:<br/></label>
                    <input type="text" placeholder="Introduce tu dirección" name="direccion" required>
                
                    <button class="button" type="submit">Registrar</button>
                    <div id="tyc">
                        <p>Registrándote aceptas nuestros</p>
                        <h4><a href="tyc.php">términos y condiciones</a></h4>
                    </div>

                </form>
            </div>
        </div>
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>