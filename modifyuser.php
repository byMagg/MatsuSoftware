<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/modifyfunction.php';
    
    session_start();
    timeLogOut(); 

    if(isset($_SESSION['usuario']) && isset($_GET['id'])){

        $id=$_GET['id'];
        modifysecurity($mysqli, $id);

        $user = getUsersUsingId($mysqli, $id);
        $user = $user->fetch_assoc();
    }else{
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Modificar usuario - MatsuSoftware</title>
        <?php require "views/head.php"; ?>
        <link href="css/modify.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="usermanagement/modify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>
        <div class="error nick">
            <span>Existe un usuario con este nick, pruebe con otro</span>
        </div>
        <div class="error email">
            <span>Existe un usuario con este email, pruebe con otro</span>
        </div>
        <div class="error general">
            <span>Ha ocurrido un error, inténtalo de nuevo mas tarde</span>
        </div>
        <div class="success">
            <span>Usuario modificado correctamente</span>
        </div>
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="usermanagement.php"><img id="volver"src="images/volver.png" alt="Volver"></a>
                    <img id="user" src="images/user.png" alt="Gestión de usuarios">
                    <h1>GESTIÓN DE USUARIOS</h1>
                </div>
                <div id="form">
                    <form id="modifyuserbyadmin" action="">
                    <label class="etiqueta">Nick*:<br/></label>
                        <input type="hidden" name="id" value= <?php echo '"'.$user["idUser"].'"'?>>

                        <input type="text" name="nick" maxlength="50" title="Debe de contener enter 1 y 50 carácteres." placeholder=" Introduce tu nick"  value= <?php echo '"'.$user["nick"].'"'?> required>

                        <label class="etiqueta">E-mail*:<br/></label>
                        <input type="email" name="email" maxlength="50" title="Debe de contener enter 1 y 50 carácteres." placeholder=" Introduce tu e-mail" value= <?php echo '"'.$user["email"].'"'?> required>

                        <?php 
                        if($_SESSION['usuario']['idUser'] == $user["idUser"]){
                           echo ' <label class="etiqueta">Contraseña (Rellenar solo si se desea cambiar):<br/></label>
                                  <input type="password" pattern="[A-Za-z0-9_-]{4,20}" title="La contraseña debe de contener enter 4 y 20 carácteres, y puede contener letras mayúsculas, minúsculas, números, _ y -." placeholder=" Introduce tu contraseña" name="pass">
                                ';
                        }
                        ?>

                        <label class="etiqueta">Provincia*:<br/></label>
                        <select name="provincia" required>
                            <option value='A Coruna' <?php if($user["province"] == 'A Coruna') echo 'selected'?>>A Coruña</option>
                            <option value='Alava' <?php if($user["province"] == 'Alava') echo 'selected'?>>Álava</option>
                            <option value='Albacete' <?php if($user["province"] == 'Albacete') echo 'selected'?>>Albacete</option>
                            <option value='Alicante' <?php if($user["province"] == 'Alicante') echo 'selected'?>>Alicante</option>
                            <option value='Almeria' <?php if($user["province"] == 'Almeria') echo 'selected'?>>Almería</option>
                            <option value='Asturias' <?php if($user["province"] == 'Asturias') echo 'selected'?>>Asturias</option>
                            <option value='Avila' <?php if($user["province"] == 'Avila') echo 'selected'?>>Ávila</option>
                            <option value='Badajoz' <?php if($user["province"] == 'Badajoz') echo 'selected'?>>Badajoz</option>
                            <option value='Barcelona' <?php if($user["province"] == 'Barcelona') echo 'selected'?>>Barcelona</option>
                            <option value='Burgos' <?php if($user["province"] == 'Burgos') echo 'selected'?>>Burgos</option>
                            <option value='Caceres' <?php if($user["province"] == 'Caceres') echo 'selected'?>>Cáceres</option>
                            <option value='Cadiz' <?php if($user["province"] == 'Cadiz') echo 'selected'?>>Cádiz</option>
                            <option value='Cantabria' <?php if($user["province"] == 'Cantabria') echo 'selected'?>>Cantabria</option>
                            <option value='Castellon' <?php if($user["province"] == 'Castellon') echo 'selected'?>>Castellón</option>
                            <option value='Ceuta' <?php if($user["province"] == 'Ceuta') echo 'selected'?>>Ceuta</option>
                            <option value='Ciudad Real' <?php if($user["province"] == 'Ciudad Real') echo 'selected'?>>Ciudad Real</option>
                            <option value='Cordoba' <?php if($user["province"] == 'Cordoba') echo 'selected'?>>Córdoba</option>
                            <option value='Cuenca' <?php if($user["province"] == 'Cuenca') echo 'selected'?>>Cuenca</option>
                            <option value='Gerona' <?php if($user["province"] == 'Gerona') echo 'selected'?>>Gerona</option>
                            <option value='Girona' <?php if($user["province"] == 'Girona') echo 'selected'?>>Girona</option>
                            <option value='Las Palmas' <?php if($user["province"] == 'Las Palmas') echo 'selected'?>>Las Palmas</option>
                            <option value='Granada' <?php if($user["province"] == 'Granada') echo 'selected'?>>Granada</option>
                            <option value='Guadalajara' <?php if($user["province"] == 'Guadalajara') echo 'selected'?>>Guadalajara</option>
                            <option value='Guipuzcoa' <?php if($user["province"] == 'Guipuzcoa') echo 'selected'?>>Guipúzcoa</option>
                            <option value='Huelva' <?php if($user["province"] == 'Huelva') echo 'selected'?>>Huelva</option>
                            <option value='Huesca' <?php if($user["province"] == 'Huesca') echo 'selected'?>>Huesca</option>
                            <option value='Jaen' <?php if($user["province"] == 'Jaen') echo 'selected'?>>Jaén</option>
                            <option value='La Rioja' <?php if($user["province"] == 'La Rioja') echo 'selected'?>>La Rioja</option>
                            <option value='Leon' <?php if($user["province"] == 'Leon') echo 'selected'?>>León</option>
                            <option value='Lleida' <?php if($user["province"] == 'Lleida') echo 'selected'?>>Lleida</option>
                            <option value='Lugo' <?php if($user["province"] == 'Lugo') echo 'selected'?>>Lugo</option>
                            <option value='Madrid' <?php if($user["province"] == 'Madrid') echo 'selected'?>>Madrid</option>
                            <option value='Malaga' <?php if($user["province"] == 'Malaga') echo 'selected'?>>Málaga</option>
                            <option value='Mallorca' <?php if($user["province"] == 'Mallorca') echo 'selected'?>>Mallorca</option>
                            <option value='Melilla' <?php if($user["province"] == 'Melilla') echo 'selected'?>>Melilla</option>
                            <option value='Murcia' <?php if($user["province"] == 'Murcia') echo 'selected'?>>Murcia</option>
                            <option value='Navarra' <?php if($user["province"] == 'Navarra') echo 'selected'?>>Navarra</option>
                            <option value='Orense' <?php if($user["province"] == 'Orense') echo 'selected'?>>Orense</option>
                            <option value='Palencia' <?php if($user["province"] == 'Palencia') echo 'selected'?>>Palencia</option>
                            <option value='Pontevedra' <?php if($user["province"] == 'Pontevedra') echo 'selected'?>>Pontevedra</option>
                            <option value='Salamanca' <?php if($user["province"] == 'Salamanca') echo 'selected'?>>Salamanca</option>
                            <option value='Segovia' <?php if($user["province"] == 'Segovia') echo 'selected'?>>Segovia</option>
                            <option value='Sevilla' <?php if($user["province"] == 'Sevilla') echo 'selected'?>>Sevilla</option>
                            <option value='Soria' <?php if($user["province"] == 'Soria') echo 'selected'?>>Soria</option>
                            <option value='Tarragona' <?php if($user["province"] == 'Tarragona') echo 'selected'?>>Tarragona</option>
                            <option value='Tenerife' <?php if($user["province"] == 'Tenerife') echo 'selected'?>>Tenerife</option>
                            <option value='Teruel' <?php if($user["province"] == 'Teruel') echo 'selected'?>>Teruel</option>
                            <option value='Toledo' <?php if($user["province"] == 'Toledo') echo 'selected'?>>Toledo</option>
                            <option value='Valencia' <?php if($user["province"] == 'Valencia') echo 'selected'?>>Valencia</option>
                            <option value='Valladolid' <?php if($user["province"] == 'Valladolid') echo 'selected'?>>Valladolid</option>
                            <option value='Vizcaya' <?php if($user["province"] == 'Vizcaya') echo 'selected'?>>Vizcaya</option>
                            <option value='Zamora' <?php if($user["province"] == 'Zamora') echo 'selected'?>>Zamora</option>
                            <option value='Zaragoza' <?php if($user["province"] == 'Zaragoza') echo 'selected'?>>Zaragoza</option>
                        </select>
                        
                        <label class="etiqueta">Municipio*:<br/></label>
                        <input type="text" maxlength="50" title="Debe de contener enter 1 y 50 carácteres." placeholder=" Introduce tu municipio" name="municipio" value= <?php echo '"'.$user["city"].'"'?> required>

                        <label class="etiqueta">Dirección*:<br/></label>
                        <input type="text" maxlength="50" title="Debe de contener enter 1 y 50 carácteres." placeholder=" Introduce tu dirección" name="direccion" value= <?php echo '"'.$user["direction"].'"'?> required>
                    
                        <button class="button" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>                 
        <!-- FOOTER -->
        <?php require "views/footer.php"; ?>
    </body>
    <?php $mysqli->close(); ?>
</html>