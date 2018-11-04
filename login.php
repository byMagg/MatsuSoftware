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

                    <label class="etiqueta">Provincia*:<br/></label>
                    <select name="provincia">
                        <option value='selecciona'>Selecciona</option>
                        <option value='A Coruña' >A Coruña</option>
                        <option value='álava'>álava</option>
                        <option value='Albacete' >Albacete</option>
                        <option value='Alicante'>Alicante</option>
                        <option value='Almería' >Almería</option>
                        <option value='Asturias' >Asturias</option>
                        <option value='ávila' >Ávila</option>
                        <option value='Badajoz' >Badajoz</option>
                        <option value='Barcelona'>Barcelona</option>
                        <option value='Burgos' >Burgos</option>
                        <option value='Cáceres' >Cáceres</option>
                        <option value='Cádiz' >Cádiz</option>
                        <option value='Cantabria' >Cantabria</option>
                        <option value='Castellón' >Castellón</option>
                        <option value='Ceuta' >Ceuta</option>
                        <option value='Ciudad Real' >Ciudad Real</option>
                        <option value='Córdoba' >Córdoba</option>
                        <option value='Cuenca' >Cuenca</option>
                        <option value='Gerona' >Gerona</option>
                        <option value='Girona' >Girona</option>
                        <option value='Las Palmas' >Las Palmas</option>
                        <option value='Granada' >Granada</option>
                        <option value='Guadalajara' >Guadalajara</option>
                        <option value='Guipúzcoa' >Guipúzcoa</option>
                        <option value='Huelva' >Huelva</option>
                        <option value='Huesca' >Huesca</option>
                        <option value='Jaén' >Jaén</option>
                        <option value='La Rioja' >La Rioja</option>
                        <option value='León' >León</option>
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
                    <input type="text" name="municipio" required>

                    <label class="etiqueta">Dirección*:<br/></label>
                    <input type="text" name="direccion" required>
                
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