<?php
    $mysqli = new mysqli("localhost", "prueba", "1234", "id7369555_matsusoftware");
	
	if($mysqli->connect_errno){
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $user = $_POST["email"];
    $pswd = $_POST["pass"];
    $redireccionar = 1;

    $sql = "SELECT * FROM user";
    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["email"] == $user && $row["contrasena"] == $pswd){
                if($row["admin"] == 1){
?>
                    <!DOCTYPE html>
                    <html lang="es">
                        <head>
                            <!-- Titulo -->
                            <title>Panel de control - MatsuSoftware</title>
                            <?php include("includes/head.php"); ?>
                            <link href="css/admin.css" type="text/css" rel="stylesheet">
                        </head>
                    
                        <body>
                            <!--HEADER-->
                            <?php include("includes/header.php"); ?>
                    
                            <!--CONTENT-->
                            <div class="content">
                                <div id="content" class="content-inside">
                                    <div id="1" class="item"><img src="images/user.png" alt=""><a href="" class="button">Gestión de Usuarios</a></div>
                                    <div id="2" class="item"><img src="images/newsletter.png" alt=""><a href="" class="button">Gestión de Newsletter</a></div>
                                    <div id="3" class="item"><img src="images/stats.png" alt=""><a href="" class="button">Gestión de Proyectos</a></div>
                                    <div id="4" class="item"><img src="images/games.png" alt=""><a href="gestionVideojuego.php" class="button">Gestión de Videojuegos</a></div>
                                    <div id="5" class="item"><img src="images/merchan.png" alt=""><a href="" class="button">Gestión de Merchandising</a></div>
                                </div>
                            </div>
                            
                            <!-- FOOTER -->
                            <?php include("includes/footer.php"); ?>
                        </body>
                    </html>
<?php
                    $redireccionar = 0;
                    break;
                }else if($row["admin"] == 0){
?>

<?php
                    $redireccionar = 0;
                    break;
                }
            }
        }
    }
    if($redireccionar == 1) header("Location: /matsusoftware/login.php?errorlogin=1");
?>

