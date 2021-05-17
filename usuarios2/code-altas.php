<?php

  require_once "conexion.php";

  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  //echo $nombre, " ", $email, " ", $pass;

  if(empty(trim($nombre))){
    echo "¡Debe escribir un nombre!";
  }else{
    if(empty(trim($email))){
      echo "¡Debe escribir un correo electrónico!";
    }else{
      if(empty(trim($pass))){
        echo "¡Debe escribir una contraseña!";
      }else{
        $sql = "SELECT * FROM cuentas where usuario = '$email'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
          echo "¡El correo electrónico que intenta registrar ya existe, intente con otro!";
        }else{
          $param_password = password_hash($pass, PASSWORD_DEFAULT);
          $param_email = $email;
          $sql = "INSERT INTO cuentas (nombre, usuario, password, status) VALUES ('$nombre','$param_email', '$param_password','A')";
          if(mysqli_query($link, $sql)){
            echo "Usuario Registrado";
          }else{
            echo "Error al registrar usuario";
          }

        }
      }
    }
  }

?>
