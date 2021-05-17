<?php
    require "./conexion.php";
    $email_err = "";
    $a=true;
    $rand =  rand(1, 500);
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $emailTo = trim($_POST["email"]);
        
        

        $sql = "SELECT * FROM cuentas WHERE usuario = '$emailTo' and `status` = 'A'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            while($a == true){
                $sql = "SELECT * FROM cuentas where token = $rand";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    $a = true;
                    $rand =  rand(1, 500);
                    //echo "true";
                }else{
                    $a = false;
                    //echo "false";
                }
            }
            $sql = "UPDATE cuentas SET token=$rand WHERE usuario='$emailTo'";

            if ($link->query($sql) === TRUE) {

            } else {
            echo "Error: " . $link->error;
            $email_err = "Error: " . $link->error;
            die();
            }
            header('location:./new_pass.php?mail='.$emailTo.'&token='.$rand);
        }
        } else {
            $email_err = "El correo electrónico no esta registrado o se encuentra dado de baja";

        }
    }else{
        //$email_err = "Error";
    }

    /*
    $emailTo = $_POST["email"];
    $rand =  rand(1, 500);
    $a = true;
    $email_err = "";

    if(empty($emailTo)){
        header('location:../recuperar.php');
        die();
    }
    while($a == true){
        $sql = "SELECT * FROM cuentas where token = $rand";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            $a = true;
            $rand =  rand(1, 500);
            //echo "true";
        }else{
            $a = false;
            //echo "false";
        }
    }

    $sql = "UPDATE cuentas SET token=$rand WHERE usuario='$emailTo'";

    if ($link->query($sql) === TRUE) {

    } else {
    echo "Error: " . $link->error;
    $email_err = "Error: " . $link->error;
    die();
    }

    $asunto = "Recueperar contraseña";
    $mensaje = "De click o copie y pegue el siguiente link en su navegador: http://localhost/gpi/new_pass.php?token=".$rand;


    use PHPMailer\PHPMailer\PHPMailer;
    /*use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;*/
    /*
    try{
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
        //nclude "mailer/PHPMailerAutoload.php";
        /*include "mailer/class.phpmailer.php";
        include "mailer/class.smtp.php";*/
        
        
        /*
        $mail = new PHPMailer;
        
        $mail -> isSMTP();
        

        $mail -> SMTPDebug = 2;
        $mail -> Host = $host;
        $mail -> Port = $port;
        $mail -> SMTPAuth = $SMTPAuth;
        
        //$mail -> SMTPAuth = true;
        $mail -> SMTPSecure = $SMTPSecure;
        $mail -> Username = $fromemail;
        $mail -> Password = $Password;
        

        $mail -> setFrom($fromemail, $fromname);

        $mail -> addAddress($emailTo);
        /*-------*/ /*
        $mail -> addReplyTo($fromemail, $fromname);
        
        

        $mail -> isHTML(true);
        $mail -> Subject = $asunto;
        $mail -> Body = $mensaje;
        

        if(!$mail -> send()){
            echo "Error ";
            $email_err = "¡Ups! Ocurrio un error al enivar el correo electrónico";
            die();
        }
        
        
        //echo "sii";
        header('location:../listo.php');
        return true;
        //echo "si";
        //die();

        
    } catch (Exception $e){
        //echo $e;
        $email_err = $e;
    }*/


?>