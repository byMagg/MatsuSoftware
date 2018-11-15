<?php
    require 'conexiondb/conexion.php';
    require 'controller/generalfunction.php';
    require 'controller/modifyfunction.php';
    
    session_start();
    timeLogOut(); 

    if(isset($_SESSION['usuario'])|| !isset($_GET['id'])){

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
        <link href="css/modifyuser.css" type="text/css" rel="stylesheet">
        <script src="controller/jquery.js"></script>
        <script src="usermanagement/modify.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php require "views/header.php"; ?>        
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <div id="cabecera">
                    <a class="nohover" href="usermanagement.php"><img id="volver"src="images/volver.png" alt=""></a>
                    <img id="user" src="images/user.png" alt="">
                    <h1>GESTIÓN DE USUARIOS</h1>
                </div>
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
                    <span>Usuario modificado correctamente.</span>
                </div>
                <div id="form">
                    <form id="modifyuserbyadmin" action="">
                    <label class="etiqueta">Nick*:<br/></label>
                        <input type="hidden" name="id" value= <?php echo '"'.$user["id"].'"'?>>

                        <input type="text" placeholder="Introduce tu nick" name="nick" value= <?php echo '"'.$user["nick"].'"'?> required>

                        <label class="etiqueta">E-mail*:<br/></label>
                        <input type="email" placeholder="Introduce tu e-mail" name="email" value= <?php echo '"'.$user["email"].'"'?> required>

                        <?php 
                        if($_SESSION['usuario']['id'] == $user["id"]){
                           echo ' <label class="etiqueta">Contraseña (Rellenar solo si se desea cambiar):<br/></label>
                                  <input type="password" pattern="[A-Za-z0-9_-]{4,20}" placeholder="Introduce tu contraseña" name="pass">
                                ';
                        }
                        ?>

                        <label class="etiqueta">Provincia*:<br/></label>
                        <select name="provincia" required>
                            <option value='A Coruna' <?php if($user["provincia"] == 'A Coruna') echo 'selected'?>>A Coruña</option>
                            <option value='Alava' <?php if($user["provincia"] == 'Alava') echo 'selected'?>>Álava</option>
                            <option value='Albacete' <?php if($user["provincia"] == 'Albacete') echo 'selected'?>>Albacete</option>
                            <option value='Alicante' <?php if($user["provincia"] == 'Alicante') echo 'selected'?>>Alicante</option>
                            <option value='Almeria' <?php if($user["provincia"] == 'Almeria') echo 'selected'?>>Almería</option>
                            <option value='Asturias' <?php if($user["provincia"] == 'Asturias') echo 'selected'?>>Asturias</option>
                            <option value='Avila' <?php if($user["provincia"] == 'Avila') echo 'selected'?>>Ávila</option>
                            <option value='Badajoz' <?php if($user["provincia"] == 'Badajoz') echo 'selected'?>>Badajoz</option>
                            <option value='Barcelona' <?php if($user["provincia"] == 'Barcelona') echo 'selected'?>>Barcelona</option>
                            <option value='Burgos' <?php if($user["provincia"] == 'Burgos') echo 'selected'?>>Burgos</option>
                            <option value='Caceres' <?php if($user["provincia"] == 'Caceres') echo 'selected'?>>Cáceres</option>
                            <option value='Cadiz' <?php if($user["provincia"] == 'Cadiz') echo 'selected'?>>Cádiz</option>
                            <option value='Cantabria' <?php if($user["provincia"] == 'Cantabria') echo 'selected'?>>Cantabria</option>
                            <option value='Castellon' <?php if($user["provincia"] == 'Castellon') echo 'selected'?>>Castellón</option>
                            <option value='Ceuta' <?php if($user["provincia"] == 'Ceuta') echo 'selected'?>>Ceuta</option>
                            <option value='Ciudad Real' <?php if($user["provincia"] == 'Ciudad Real') echo 'selected'?>>Ciudad Real</option>
                            <option value='Cordoba' <?php if($user["provincia"] == 'Cordoba') echo 'selected'?>>Córdoba</option>
                            <option value='Cuenca' <?php if($user["provincia"] == 'Cuenca') echo 'selected'?>>Cuenca</option>
                            <option value='Gerona' <?php if($user["provincia"] == 'Gerona') echo 'selected'?>>Gerona</option>
                            <option value='Girona' <?php if($user["provincia"] == 'Girona') echo 'selected'?>>Girona</option>
                            <option value='Las Palmas' <?php if($user["provincia"] == 'Las Palmas') echo 'selected'?>>Las Palmas</option>
                            <option value='Granada' <?php if($user["provincia"] == 'Granada') echo 'selected'?>>Granada</option>
                            <option value='Guadalajara' <?php if($user["provincia"] == 'Guadalajara') echo 'selected'?>>Guadalajara</option>
                            <option value='Guipuzcoa' <?php if($user["provincia"] == 'Guipuzcoa') echo 'selected'?>>Guipúzcoa</option>
                            <option value='Huelva' <?php if($user["provincia"] == 'Huelva') echo 'selected'?>>Huelva</option>
                            <option value='Huesca' <?php if($user["provincia"] == 'Huesca') echo 'selected'?>>Huesca</option>
                            <option value='Jaen' <?php if($user["provincia"] == 'Jaen') echo 'selected'?>>Jaén</option>
                            <option value='La Rioja' <?php if($user["provincia"] == 'La Rioja') echo 'selected'?>>La Rioja</option>
                            <option value='Leon' <?php if($user["provincia"] == 'Leon') echo 'selected'?>>León</option>
                            <option value='Lleida' <?php if($user["provincia"] == 'Lleida') echo 'selected'?>>Lleida</option>
                            <option value='Lugo' <?php if($user["provincia"] == 'Lugo') echo 'selected'?>>Lugo</option>
                            <option value='Madrid' <?php if($user["provincia"] == 'Madrid') echo 'selected'?>>Madrid</option>
                            <option value='Malaga' <?php if($user["provincia"] == 'Malaga') echo 'selected'?>>Málaga</option>
                            <option value='Mallorca' <?php if($user["provincia"] == 'Mallorca') echo 'selected'?>>Mallorca</option>
                            <option value='Melilla' <?php if($user["provincia"] == 'Melilla') echo 'selected'?>>Melilla</option>
                            <option value='Murcia' <?php if($user["provincia"] == 'Murcia') echo 'selected'?>>Murcia</option>
                            <option value='Navarra' <?php if($user["provincia"] == 'Navarra') echo 'selected'?>>Navarra</option>
                            <option value='Orense' <?php if($user["provincia"] == 'Orense') echo 'selected'?>>Orense</option>
                            <option value='Palencia' <?php if($user["provincia"] == 'Palencia') echo 'selected'?>>Palencia</option>
                            <option value='Pontevedra' <?php if($user["provincia"] == 'Pontevedra') echo 'selected'?>>Pontevedra</option>
                            <option value='Salamanca' <?php if($user["provincia"] == 'Salamanca') echo 'selected'?>>Salamanca</option>
                            <option value='Segovia' <?php if($user["provincia"] == 'Segovia') echo 'selected'?>>Segovia</option>
                            <option value='Sevilla' <?php if($user["provincia"] == 'Sevilla') echo 'selected'?>>Sevilla</option>
                            <option value='Soria' <?php if($user["provincia"] == 'Soria') echo 'selected'?>>Soria</option>
                            <option value='Tarragona' <?php if($user["provincia"] == 'Tarragona') echo 'selected'?>>Tarragona</option>
                            <option value='Tenerife' <?php if($user["provincia"] == 'Tenerife') echo 'selected'?>>Tenerife</option>
                            <option value='Teruel' <?php if($user["provincia"] == 'Teruel') echo 'selected'?>>Teruel</option>
                            <option value='Toledo' <?php if($user["provincia"] == 'Toledo') echo 'selected'?>>Toledo</option>
                            <option value='Valencia' <?php if($user["provincia"] == 'Valencia') echo 'selected'?>>Valencia</option>
                            <option value='Valladolid' <?php if($user["provincia"] == 'Valladolid') echo 'selected'?>>Valladolid</option>
                            <option value='Vizcaya' <?php if($user["provincia"] == 'Vizcaya') echo 'selected'?>>Vizcaya</option>
                            <option value='Zamora' <?php if($user["provincia"] == 'Zamora') echo 'selected'?>>Zamora</option>
                            <option value='Zaragoza' <?php if($user["provincia"] == 'Zaragoza') echo 'selected'?>>Zaragoza</option>
                        </select>
                        
                        <label class="etiqueta">Municipio*:<br/></label>
                        <input type="text" placeholder="Introduce tu municipio" name="municipio" value= <?php echo '"'.$user["municipio"].'"'?> required>

                        <label class="etiqueta">Dirección*:<br/></label>
                        <input type="text" placeholder="Introduce tu dirección" name="direccion" value= <?php echo '"'.$user["direccion"].'"'?> required>
                    
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