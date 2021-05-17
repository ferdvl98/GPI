<?php

  //iniciar la sesion
  session_start();

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: cerrar-sesion.php");
    exit;
  }


  require_once "conexion.php";

  $email = $password = $id_u= "";
  $email_err = $password_err = $pass = "";

  if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(empty(trim($_POST["email"]))){
      $email_err = "Por favor, ingrese el correo electrónico";
    }else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["password"]))){
      $password_err = "Por favor, ingrese una contraseña";
    }else{
        $password = trim($_POST["password"]);
    }



    //validar credenciales
    if(empty($email_err) && empty($password_err)){
      $sql = "SELECT  * FROM cuentas where usuario = ?";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        $param_email = $email;
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
        }

        if(mysqli_stmt_num_rows($stmt) == 1){
          mysqli_stmt_bind_result($stmt, $id_user, $nombre, $username, $hashed_password, $sss, $token );
          if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password )){
              //echo $username;

              //comprobar status
              $sql = "SELECT status, id_user FROM cuentas WHERE usuario = '$email'";
              $result = mysqli_query($link, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $id_u = $row["status"];
                  $pass = $row["id_user"];
                }
              }

              if($id_u == "A"){
                session_start();
                //almecnar datos en variables de sesion
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;

                $pass = base64_encode($pass);

                header("location:  2x.php?id=$pass");
              }else{
                  $_SESSION["loggedin"] = false;
                $password_err = "No puede ingresar, usted esta dado de baja";
              }


            }else{
              $password_err = "La contraseña es incorrecta";
            }
          }else{
            $email_err = "El correo electrónico es incorrecto";

          }
        }else{
          $email_err = "UPS! algo salio mal, intentalo más tarde";
        }
      }
    }

    mysqli_close($link);
  }

?>
