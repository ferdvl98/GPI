<?php 

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$to = "ferdvl98@gmail.com";
$subjet = "Prueba";
$message = "Holaaaaaa si se pudo";

if(mail($to, $subjet, $message)){
    echo "si";

}else{
    echo "no";
}

?>