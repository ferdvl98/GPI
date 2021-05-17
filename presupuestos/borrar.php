<?php

  require_once "conexion.php";

  if($consulta = $link->query("DELETE FROM `aux_aux`")){
    echo "Registros cancelados";
  }else {
    echo "Error al cancelar";
  }

?>
