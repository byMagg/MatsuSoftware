<?php 
    require '../conexiondb/conexion.php';

    session_start();

    $email = $_POST['email'];

    $consultaemail = $mysqli->query("SELECT * FROM user WHERE email = '".$email."'");

    if($consultaemail->num_rows == 1){ 
        $datos = $consultaemail->fetch_assoc();
        $_SESSION['recuperar'] = $datos;
    }else{
        echo json_encode(array('error' => true, 'tipo' => 'email'));
        exit();
    }

    $asunto = "Recuperar contraseña de '".$datos['nick']."'";

    $hora = date('H:i');
    $token = $hora.$datos['id'];
    $encrypt = hash('sha256', $token);
    $_SESSION['encrypt'] = $encrypt;

    $mensaje = '
                <html>
                <head>
                <title>Recuperar contraseña de MatsuSoftware</title>
                </head>
                <body>
                <p>Para recuperar la contraseña, haga <a href="recoverypassword.php?token="'.$encrypt.'">click aqui</a> en el siguiente enlace:<br><br></p>
                </body>
                </html>
                ';

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    $enviado = mail($email, $asunto, $mensaje, $cabecera);
    
    if($enviado){
        $mysqli->query("UPDATE user SET request = '1' WHERE email = '".$email."'");
        echo json_encode(array('error' => false, 'token' => $encrypt));
    }else{
        echo json_encode(array('error' => true));
    }
?>