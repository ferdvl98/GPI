<?php

  require "conexion.php";

  $em = $_POST["tareas"];
  $hh = $_POST["hh2"];
  $id_e = $_POST["pres"];

  if (empty($em)) {
    echo "Debe asignar tareas";
  }else{
    $sql = "INSERT INTO tareas4 (id_equipo, tarea, hh)
    VALUES ($id_e, '$em', $hh)";

    if ($link->query($sql) === TRUE) {
      echo "Tarea asignada";
    } else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
  }


?>
