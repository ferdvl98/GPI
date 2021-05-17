<?php

require_once "conexion.php";

$id = $_POST["id"];
$texto = $_POST["texto"];



if($consulta = $link->query("UPDATE puesto SET puesto = '$texto' WHERE `id_puesto` = $id")){
  echo "Dato actualizado";
}else{
  echo "Error al actualizar los datos ";
  exit();
}

?>
