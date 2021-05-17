<?php

  require "conexion.php";

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];
  $pres = $id_t = $pres2 = $pres3 =  "";

  if(empty($texto) && empty($columna)) {
    $sql = "SELECT id_tarea, presupuesto FROM aux_tareas3 where id = $id";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id_t = $row["id_tarea"];
        $pres = $row["presupuesto"];
        $sql = "SELECT presupuesto FROM aux_concepto3 WHERE id_tarea = $id_t";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $pres2 = $row["presupuesto"];
          }
        }
      }
    }

    $pres3 = $pres+$pres2;
    $sql = "UPDATE aux_concepto3 SET presupuesto=$pres3 WHERE id_tarea=$id_t";
    if ($link->query($sql) === TRUE) {
    } else {
      echo "Error al actualizar datos: " . $link->error;
    }

    $sql = "DELETE FROM `aux_tareas3`  WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Registro eliminado";
    } else {
      echo "Error al eliminar registro: " . $link->error;
    }
  }else{
    $sql = "UPDATE horas SET $columna=$texto WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Dato Actualizado";
    } else {
      echo "Error al actualizar datos: " . $link->error;
    }
  }



?>
