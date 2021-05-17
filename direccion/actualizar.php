<?php

require_once "conexion.php";

$id = $_POST["id"];
$texto = $_POST["texto"];



if($consulta = $link->query("UPDATE estado SET estado = '$texto' WHERE `id_estado` = $id")){
  echo "Dato actualizado";
}else{
  echo "Error al actualizar los datos ";
  exit();
}

?>
