<?php

    require_once "conexion.php";
    
    $id2 = $_GET["id2"];
    
    $id = $_POST["id"];
    $id_t ="";
    $pres = $pres2 = $pres3 = 0;
    
    $sql = "SELECT id_tarea, presupuesto FROM aux_tareas2 where id_a=$id2";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $id_t = $row["id_tarea"];
        $pres = $row["presupuesto"];
      }
    }
    
    $sql = "SELECT presupuesto FROM aux_concepto2 where id_tarea = $id_t";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $pres2 = $row["presupuesto"];
      }
    }
    $pres3 = $pres+$pres2;
    
    $sql = "UPDATE aux_concepto2 SET presupuesto = $pres3 WHERE id_tarea=$id_t";

    if ($link->query($sql) === TRUE) {
      
    }else{
        echo "Error al actualizar aux_concepto2";
    }
    
    $sql = "DELETE FROM aux_tareas2 WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Presupuesto eliminado";
    }else{
        echo "Error el Eliminar presupuesto";
    }
    
?>