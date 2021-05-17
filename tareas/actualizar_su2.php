<?php

  require "conexion.php";

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];

  //echo "$id - $texto - $columna";
  if($columna == 'tarea'){
    $sql = "UPDATE aux_tareas3_2 SET $columna='$texto' WHERE id=$id";
  }else{
    $sql = "UPDATE aux_tareas3_2 SET $columna=$texto WHERE id=$id";
  }

    if ($link->query($sql) === TRUE) {
      echo "Dato actualizado";
    } else {
      echo "Error al actualizar: " . $link->error;
    }





?>
