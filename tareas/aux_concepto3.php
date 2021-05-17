<?php

  require "conexion.php";

  $id = $_POST["id"];
  $presupuesto = $pres = 0;
//echo "$id";
  if($id != 's'){
    $sql = "SELECT * FROM aux_concepto3 WHERE id_tarea = $id";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      //echo "si";
      while($row = $result->fetch_assoc()) {
        $presupuesto =  $row["presupuesto"];
      }
      echo $presupuesto;
    }else{
      //echo "no";
      $sql = "SELECT presupuesto FROM tareas2 WHERE id = $id";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $pres =  $row["presupuesto"];
        }
      }
      $sql = "INSERT INTO aux_concepto3 (id_tarea, presupuesto)
      VALUES ($id, $pres)";
      if ($link->query($sql) === TRUE) {
        $sql = "SELECT presupuesto FROM aux_concepto3 WHERE id_tarea = $id";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $presupuesto =  $row["presupuesto"];
          }
        }
        echo $presupuesto;
      } else {
        echo "Error: " . $sql . "<br>" . $link->error;
      }
    }

  }

?>
