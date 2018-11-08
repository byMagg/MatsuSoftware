<?php
require 'conexiondb/conexion.php';

session_start();  

if(isset($_SESSION['tiempo']) ) {
    $inactivo = 600;
    $vida_session = time() - $_SESSION['tiempo'];

    if($vida_session > $inactivo)
    {    
        header("Location: login/logout.php");
        exit();
    }
}
$_SESSION['tiempo'] = time();       

if(isset($_SESSION['usuario'])){
    
    if($_SESSION['usuario']['rol'] == 0){
        header("Location: userdash.php");
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        header("Location: login.php");
    }

    $consulta = "SELECT rol FROM user WHERE id = '".$id."'";
    $resultado = $mysqli->query($consulta);
    $datos = $resultado->fetch_assoc();

    if($_SESSION['usuario']['rol'] == 1 && $datos['rol'] == 1){
        if($_SESSION['usuario']['id'] != $id){
            header("Location: login.php");
        }
    }
}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Titulo -->
        <title>Panel de control - MatsuSoftware</title>
        <?php include("footerheader/head.php"); ?>
        <link href="css/modifyuserbyadmin.css" type="text/css" rel="stylesheet">
        
        <script src="login/jquery-3.3.1.min.js"></script>
        <script src="usermanagement/main.js"></script>
    </head>
    <body>
        <!--HEADER-->
        <?php include("footerheader/header.php"); ?>
                    
        <!--CONTENT-->
        <div class="content">
            <div id="content" class="content-inside">
                <a id="cerrar" href="login/logout.php">Cerrar sesión</a>
                <a id="volver" href="admindash.php">Volver</a>
                <?php
                    $resultado = $mysqli->query("SELECT id, nick, email, provincia, municipio, direccion FROM user WHERE id = ".$id);
                    if ($resultado->num_rows != 0) {
                        $user = $resultado->fetch_assoc();
                    }
                ?>
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
                <form id="modifyuserbyadmin" action="">
                <label class="etiqueta">Nick*:<br/></label>
                    <input type="hidden" name="id" value= <?php echo '"'.$user["id"].'"'?>>

                    <input type="text" placeholder="Introduce tu nick" name="nick" value= <?php echo '"'.$user["nick"].'"'?> required>

                    <label class="etiqueta">E-mail*:<br/></label>
                    <input type="email" placeholder="Introduce tu e-mail" name="email" value= <?php echo '"'.$user["email"].'"'?> required>

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
                            
        <!-- FOOTER -->
        <?php include("footerheader/footer.php"); ?>
    </body>
</html>