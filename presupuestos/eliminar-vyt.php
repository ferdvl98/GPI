<?php

require_once "conexion.php";

$id = $_POST["id"];

if($consulta = $link->query("DELETE FROM aux_aux WHERE id = $id")){
  echo "Registro eliminado";
}else {
  echo "Error al eliminar registro";
}

?>
