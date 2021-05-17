<?php

  require_once "conexion.php";

  $dis = $_POST["puesto"];

  if(empty(trim($dis))){
    echo "Debe escribir el nombre del Estado";
  }else{
    $sql = "SELECT * FROM estado WHERE estado = '$dis'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "El estado que intanta registrar ya existe, intente con otro nombre";
    }else {
      if($consulta = $link->query("INSERT INTO estado (estado) VALUES ('$dis')")){
        echo "Estado registrado";
      }else {
        echo "Error al registrar Estado";
      }
    }
  }



?>
