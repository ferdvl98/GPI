<?php

  require_once "conexion.php";
  if($consulta = $link->query("DELETE FROM `aux_aux_pre`")){
    if($consulta = $link->query("DELETE FROM `aux_pre`")){
    }else{
        echo "Error al limpiar 2";
    }
  }else {
    echo "Error al limpiar";
  }

?>
