<?php

  require_once "conexion.php";

  $dis = $_POST["categoria"];
  $cod = $_POST["codigo"];

  if(empty(trim($dis)) || empty(trim($cod))){
    echo "Debe llenar todos los campos";
  }else{
    $sql = "SELECT * FROM categoria WHERE nombre = '$dis' OR codigo = '$cod'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "La categoria ya está registrada";
    }else {
      if($consulta = $link->query("INSERT INTO categoria (nombre,codigo, status) VALUES ('$dis','$cod','A')")){
        echo "Categoria registrada";
      }else {
        echo "Error al registrar categoria";
      }
    }
  }







?>
