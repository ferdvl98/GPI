<?php

  require "conexion.php";

  $em = $_POST["em"];
  $hh = $_POST["hh1"];
  $id_e = $_POST["pres"];

  if (empty($em)) {
    echo "Debe Agregar Equipo Mayor";
  }else{
    $sql = "INSERT INTO equipo_m (id_equipo, em, hh)
    VALUES ($id_e, '$em', $hh)";

    if ($link->query($sql) === TRUE) {
      echo "Equipo Mayor agregado";
    } else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
  }






?>
