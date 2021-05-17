<?php

  require_once "conexion.php";

  $id = $_POST["id"];

  if($consulta = $link->query("DELETE FROM `asig_priv` WHERE id = $id")){
    echo "Privilegio retirado";
  }else{
    echo "Error al quitar privilegio";
    exit();
  }


?>
