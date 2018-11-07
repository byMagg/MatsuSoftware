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
                    $resultado = $mysqli->query("SELECT id, nick, email, contrasena, provincia, municipio, direccion FROM user WHERE id = ".$id);
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