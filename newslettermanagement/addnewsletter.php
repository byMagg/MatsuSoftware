<?php 
    require '../controller/querysfunction.php';
    require '../controller/sendfunction.php';
    require '../conexiondb/conexion.php';

    $msg = $_POST['msg'];

    if (isset($_POST['send']) && $_POST['send'] == 'Yes') 
    {
        $send = 1;
        $user = getEmails($mysqli);
    }
    else
    {
        $send = 0;
    }

    $date = date("Y/m/d");

    $insert = insertToNewsletter($mysqli, $msg, $date);

    if($insert) {
        if($send == 1){
            while($data = $user->fetch_assoc()){
                sendEmailNews($data['email'], $msg);
            }
        }

        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true));
    }

    $mysqli->close();
?>