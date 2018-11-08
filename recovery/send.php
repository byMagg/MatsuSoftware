<?php 
    require '../conexiondb/conexion.php';

    $email = $_POST['email'];

    $consultaemail = $mysqli->query("SELECT * FROM user WHERE email = '".$email."'");
    $datos = $consultaemail->fetch_assoc();
    if(!$consultaemail->num_rows == 1){
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }

    $asunto = "Recuperar contraseña de '".$datos['nick']."'";

    $hora = date('H:i');
    $token = $hora.$datos['id'];
    $encrypt = hash('sha256', $token);
    $_SERVER['encrypt'] = $encrypt;

    $mensaje = '
                <html>
                <head>
                <title>Recuperar contraseña de MatsuSoftware</title>
                </head>
                <h1>RECUPERAR CONTRASEÑA DE MATSUSOFTWARE</h1>
                <p><br>Para recuperar la contraseña, haga <a href="http://localhost/matsusoftware/recoverypassword.php?id='.$datos["id"].'&token='.$encrypt.'">click aqui.</a><br></p>
                </body>
                </html>
                ';

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    $enviado = mail($email, $asunto, $mensaje, $cabecera);
    
    if($enviado){
        $mysqli->query("UPDATE user SET request = '1' WHERE email = '".$email."'");
        $mysqli->query("UPDATE user SET token = '".$token."' WHERE email = '".$email."'");
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true));
    }
?>