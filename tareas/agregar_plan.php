<?php

  require "conexion.php";

  $id_e = $_POST["pres"];
  $id_tra = $_POST["tra"];
  $id_cat = $_POST["cat"];
  $hh = $_POST["horas1"];


  $sql = "SELECT * FROM planilla WHERE id_trabajador = $id_tra";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    echo "El trabajador ya esta asignado";
  }else{
    $sql = "INSERT INTO planilla (id_equipo, id_trabajador, id_categoria, hh)
    VALUES ($id_e, $id_tra, $id_cat, $hh)";

    if ($link->query($sql) === TRUE) {
      echo "Trabajador agregado al equipo";
    } else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
  }



?>
