<?php

  require_once "conexion.php";

  $dis = $_POST["area"];
  $cod = $_POST["codigo"];

  if(empty(trim($dis)) || empty(trim($cod))){
    echo "Debe llenar todos los campos";
  }else{
    $sql = "SELECT * FROM tipo WHERE nombre = '$dis' OR codigo = '$cod'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "El tipo ya está registrado";
    }else {
      if($consulta = $link->query("INSERT INTO tipo (nombre,codigo, status) VALUES ('$dis','$cod','A')")){
        echo "Tipo registrado";
      }else {
        echo "Error al registrar tipo";
      }
    }
  }







?>
