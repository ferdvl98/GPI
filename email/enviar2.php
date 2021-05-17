<?php
require "./conexion.php";
$email_err = "";
$a = true;
$rand =  rand(1, 500);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST["submit"])) {

    if (empty($_POST["email"])) {
        header('location:./recuperar.php');
        die();
    }
    $emailTo = $_POST["email"];
    $sql = "SELECT * FROM cuentas WHERE usuario = '$emailTo' OR status = 'B'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {

    } else {
        header('location:./recuperar.php');
        die();
    }

    while ($a == true) {
        $sql = "SELECT * FROM cuentas where token = $rand";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            $a = true;
            $rand =  rand(1, 500);
            //echo "true";
        } else {
            $a = false;
            //echo "false";
        }
    }
    $emailTo = $_POST["email"];

    $sql = "UPDATE cuentas SET token=$rand WHERE usuario='$emailTo'";

    if ($link->query($sql) === TRUE) {
    } else {
        echo "Error: " . $link->error;
        $email_err = "Error: " . $link->error;
        die();
    }


    date_default_timezone_set('Etc/UTC');

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer();

    $mail->isSMTP();

    $mail->SMTPDebug = 0;

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'gpi.recuperar.pass@gmail.com';
    $mail->Password = 'gpi123456789';
    $mail->setFrom('gpi.recuperar.pass@gmail.com', 'GPI');
    $mail->addAddress($_POST["email"]);
    $mail->Subject = 'Recueperar contraseña';
    $mail->Body = "De click o copie y pegue el siguiente link en su navegador: http://34.94.83.20//gpi/new_pass.php?token=" . $rand;

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
        header('location:./listo.php');
    }
} else {
}



/*include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/SMTP.php";
include "PHPMailer/src/Exception.php";*/
//use PHPMailer\PHPMailer\PHPMailer;  

    //use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;

/*
use PHPMailer\PHPMailer\PHPMailer;
try{
    $emailTo = "";
    $rand =  rand(1, 500);
    $asunto = "Recueperar contraseña";
    $mensaje = "De click o copie y pegue el siguiente link en su navegador: http://localhost/gpi/new_pass.php?token=".$rand;
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $emailTo = trim($_POST["email"]);
    }
    $fromemail = "gpi.recuperar.pass@gmail.com";
    $fromname = "GPI";
    $host = "smtp.gmail.com";
       //$port = "587";
    $port = "587";
    $SMTPAuth = "login";
    $SMTPSecure = "tls";
    $Password = "gpi123456789";

    include "PHPMailer/src/PHPMailer.php";
    include "PHPMailer/src/SMTP.php";
    include "PHPMailer/src/Exception.php";

    $email = new PHPMailer;

    $email -> isSMTP();

    $email -> SMTPDebug = 2;
    
    $email -> Host = $host;
    $email -> Port = $port;
    $email -> SMTPAuth = $SMTPAuth;
    $email -> SMTPSecure = $SMTPSecure;

    $email -> setFrom($fromemail, $fromname);

    $email -> addAddress($emailTo);

    $email -> isHTML(true);
    $email -> Subject = $asunto;
    $email -> Body = $mensaje;

    if($email->send()){
        error_log("MAILER: No se pudo enviar el correo electronico");
    
}


}catch(Exception $e){

}
*/

/*if(isset($_POST['email'])){
    echo $email = $_POST['email'];
}*/
