<?php

  require_once "conexion.php";
  echo "string";
  if($consulta = $link->query("DELETE FROM `aux_aux`")){
  }else {
    echo "Error al limpiar";
  }

?>
