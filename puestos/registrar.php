<?php

  require_once "conexion.php";

  $dis = $_POST["puesto"];

  if(empty(trim($dis))){
    echo "Debe escribir el nombre del Puesto";
  }else{
    $sql = "SELECT * FROM puesto WHERE puesto = '$dis'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "El puesto que intanta registrar ya existe, intente con otro nombre";
    }else {
      if($consulta = $link->query("INSERT INTO puesto (puesto, status) VALUES ('$dis','A')")){
        echo "Puesto registrado";
      }else {
        echo "Error al registrar Puesto";
      }
    }
  }



?>
