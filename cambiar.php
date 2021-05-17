<?php
//echo "a";
require "conexion.php";
$id = $_GET["token"];
$sql = "SELECT * FROM cuentas where token = $id";
$result = $link->query($sql);
$email_err = "";

if ($result->num_rows > 0) {;
} else {
    echo "El link ya ha sido utilizado";
    header('location:index.php');
    die();
}
$d = false;
$email_err = "";
if (isset($_POST["submit"])) {

    $pass1 = $_POST["password1"];
    $pass2 = $_POST["password2"];
    if (empty($pass1) or empty($pass2)) {

        $email_err= "Debe escribir una nueva contraseña";
    } else {
        if ($pass1 != $pass2) {
            $email_err= "Las Contraseñas no coinciden";
        } else {
            //echo "s";
            $param_password = password_hash($pass1, PASSWORD_DEFAULT);

            $sql = "UPDATE cuentas SET password='$param_password' WHERE token=$id";

            if ($link->query($sql) === TRUE) {
                $sql = "UPDATE cuentas SET token=0 WHERE token=$id";

                if ($link->query($sql) === TRUE) {

                    header('location:index.php');
                    $email_err= "contraseña cambiada";

                    $d = true;
                }else{
                    $email_err = "Error al cambiar la contraseña";
                }
            } else {
                $email_err= "Error updating record: " . $link->error;
            }
        }
    }
}




?>