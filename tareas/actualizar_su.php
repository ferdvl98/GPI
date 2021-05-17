<?php

  require "conexion.php";

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];

  //echo "$id - $texto - $columna";

  if (empty($texto) || empty($columna)) {
    $sql = "DELETE FROM aux_tareas3 WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Registro elminado";
    } else {
      echo "Error al eliminar: " . $link->error;
    }

  }else{
    $sql = "UPDATE aux_tareas3 SET $columna='$texto' WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Dato actualizado";
    } else {
      echo "Error al actualizar: " . $link->error;
    }
  }




?>
