<?php

  require "conexion.php";

  $id = $_POST["id"];
  $n = $_POST["n"];

  if($n == '1'){
    $sql = "DELETE FROM planilla WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Registro eliminado";
    } else {
      echo "Error deleting record: " . $link->error;
    }
  }else if($n == '2'){
    $sql = "DELETE FROM equipo_m WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Registro eliminado";
    } else {
      echo "Error deleting record: " . $link->error;
    }
  }else if($n == '3'){
    $sql = "DELETE FROM tareas4 WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Registro eliminado";
    } else {
      echo "Error deleting record: " . $link->error;
    }
  }

?>
