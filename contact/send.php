<?php 

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
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

    $enviado = mail($para, $asunto, $mensaje, $cabecera);
    
    if($enviado){
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true));
    }
?>