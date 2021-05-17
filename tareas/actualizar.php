<?php
  require_once "conexion.php";

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];

  if($consulta = $link->query("UPDATE `aux_tareas` SET $columna = '$texto' WHERE  id = $id")){
    echo "Actualizado";
  }else{
    echo "Error al actualizar IG";
  }

?>
