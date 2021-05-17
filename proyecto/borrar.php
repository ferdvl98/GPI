<?php

  require_once "conexion.php";

  $id = $_GET["id"];

  if($consulta = $link->query("DELETE FROM `aux_pres2` where a = $id")){
    echo "Registros cancelados";
  }else {
    echo "Error al cancelar";
  }

?>
