<?php

function sendEmailPasswordRecover($email, $encrypt, $datos){ 
    $asunto = "Recuperar contraseña de '".$datos['nick']."'";

    $mensaje = '
                <html>
                <head>
                <title>Recuperar contraseña de MatsuSoftware</title>
                </head>
                <h1>RECUPERAR CONTRASEÑA DE MATSUSOFTWARE</h1>
                <p><br>Para recuperar la contraseña, haga <a href="localhost/matsusoftware/recoverypassword.php?id='.$datos["idUser"].'&token='.$encrypt.'">click aqui.</a><br></p>
                </body>
                </html>
                ';

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    return array('resultado' => mail($email, $asunto, $mensaje, $cabecera));
}

function sendEmailPasswordChanged($email){
    $asunto = "Contraseña actualizada correctamente.";

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    $mensaje = "La contraseña se ha actualizado exitosamente.";

    return array('resultado' => mail($email, $asunto, $mensaje, $cabecera));
}

function sendEmailSignin($email){
    $asunto = "Te has registrado correctamente.";

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    $mensaje = "Ya puedes acceder a tu cuenta de MatsuSoftware.";

    return array('resultado' => mail($email, $asunto, $mensaje, $cabecera));
}

function sendEmailContact($name, $surname, $email, $msg){
    $para='alexgarohotmailcom@gmail.com';

    $asunto = 'Mensaje de '.$name.' '.$surname;

    $mensaje = '
                <html>
                <head>
                <title>Mensaje de MatsuSoftware</title>
                </head>
                <body>
                <p>¡Un usuario le ha dejado un mensaje a traves de MatsuSoftware!<br><br></p>
                <p>Nombre: <br>'.$name.' '.$surname.'<br></p>
                <p>Correo: <br>'.$email.'<br></p>
                <p>Mensaje: <br>'.$msg.'<br></p>
                </body>
                </html>
                ';

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    return array('resultado' => mail($para, $asunto, $mensaje, $cabecera));
}

function sendEmailNews($email, $news){ 
    $asunto = "Nuevo newsletter de MatsuSoftware";

    $mensaje = '
                <html>
                <head>
                <title>Nuevo newsletter de MatsuSoftware</title>
                </head>
                <h1>Nuevo newsletter de MatsuSoftware</h1>
                <p><br>'.$news.'<br></p>
                </body>
                </html>
                ';

    $cabecera  = 'MIME-Version: 1.0' . "\r\n";
    $cabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabecera .= 'From: MatsuSoftware <not-reply@matsusoftware.tk>' . "\r\n";

    return array('resultado' => mail($email, $asunto, $mensaje, $cabecera));
}
?>