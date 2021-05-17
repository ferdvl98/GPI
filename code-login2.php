<?php

  //iniciar la sesion
  session_start();

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: main.php");
    exit;
  }


  require_once "conexion.php";

  $email = $password = $id_u= "";
  $email_err = $password_err = "";

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
      $sql = "SELECT  * FROM usuario where email = ?";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        $param_email = $email;

        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
        }

        if(mysqli_stmt_num_rows($stmt) == 1){
          mysqli_stmt_bind_result($stmt, $id_user,  $hashed_password, $username);
          if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password )){

              //comprobar status
              $sql = "SELECT id_user FROM usuario WHERE email = '$param_email'";
              $result = mysqli_query($link, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $id_u = $row["id_user"];
                }
              }

              $sql = "SELECT id_persona FROM persona WHERE id_usuario = $id_u";
              $result = mysqli_query($link, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $id_u = $row["id_persona"];
                }
              }

              $sql = "SELECT status FROM persona WHERE id_persona = $id_u";
              $result = mysqli_query($link, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $id_u = $row["status"];
                }
              }

              if($id_u == "A"){
                session_start();
                //almecnar datos en variables de sesion
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;

                header("location:  main.php");
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
