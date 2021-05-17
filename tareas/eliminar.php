<?php

    require_once "conexion.php";

    $id = $_POST["id"];
    $a = $_POST["a"];
    $id_proy = $_POST["id_proy"];
    //$presupuesto = $_POST["presupuesto"];
    $pres = $total = $name = $tipo2 = $nombre ="";
    $total2 = 0;


    $sql = "SELECT presupuesto FROM `aux_tareas` where id = $id";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $pres =  $row["presupuesto"];
      }
    }
    //echo $pres;
    $sql = "SELECT total FROM `aux_concepto` where `id_proyecto` = $id_proy and `id_pres` = $a";
    $result = $link->query($sql);

    //echo "proyecto: ".$id_proy." tipo: ".$tipo2." pres: ".$id_pres." area: ".$id_area." dis:".$dis." concepto: ".$name." a: ".$a;

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $total =  $row["total"];
      }
    }

    //echo $total;
    $pres = floatval($pres);
    $total = floatval($total);

    $total2 = $pres+$total;
    //echo $total2;

    if($consulta = $link->query("UPDATE `aux_concepto` SET  total = $total2 where `id_proyecto` = $id_proy and `id_pres` = $a")){

    }else {
      echo "Error al actualizar total";
    }

    if($consulta = $link->query("DELETE FROM `aux_tareas` WHERE id = $id")){
      echo "Tarea eliminada";
    }else {
      echo "Error al eliminar Tarea";
    }

?>
