<?php

  require_once "conexion.php";

  $empleado = $_POST["empleado"];
  $puesto = $_POST["puesto"];

  if($empleado!="s"){
    if($puesto!="s"){
      $sql = "SELECT * FROM as_puesto WHERE id_persona = $empleado AND id_puesto = $puesto";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo "El puesto ya está asignado";
      }else{
        if($consulta = $link->query("INSERT INTO as_puesto (id_persona, id_puesto, status) VALUES ($empleado, $puesto, 'A')")){
          echo "Puesto asignado";
        }else {
          echo "Error al asignar puesto";
        }
      }
    }else{
      echo "Seleccione un puesto";
    }
  }else{
    echo "Seleccione a un empleado";
  }

?>
