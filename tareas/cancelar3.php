<?php

  require_once "conexion.php";

  $pres = $_POST["pres"];
  $super = $_GET["id"];

  $sql = "DELETE FROM aux_tareas3 where id_tarea = $pres and id_res = $super";

  if ($link->query($sql) === TRUE) {
    echo "Equipos cancelados con exito";
  } else {
    echo "Error al cancelar: " . $link->error;
  }

?>
