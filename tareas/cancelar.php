<?php

  require "conexion.php";


    $id_pres = $concepto = $presupuesto = $nombre = [];
     $total = "";
  $total2 = $cont = 0;
  $id = $_GET["id"];

    $sql = "SELECT id_proyecto, presupuesto, id_pres FROM `aux_tareas` WHERE id_a = $id";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id_pres[$cont] = $row["id_pres"];
        $presupuesto[$cont] = $row["presupuesto"];
        $id_proy[$cont]  = $row["id_proyecto"];
        $cont = $cont +1;


      }
      for ($i = 0; $i < $cont; $i++) {

        $sql2 = "SELECT total FROM `aux_concepto` where id_pres = $id_pres[$i] and id_proyecto = $id_proy[$i]";
        $result = $link->query($sql2);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $total = $row["total"];
          }
        }
        $total = floatval($total);
        //echo "  total: ".$total;
        $presupuesto[$i] = floatval($presupuesto[$i]);
        $total2 = $total+$presupuesto[$i];
        //echo "  total2: ".$total2;

        if($consulta = $link->query("UPDATE  `aux_concepto` SET total = $total2 where id_pres = $id_pres[$i] and id_proyecto = $id_proy[$i]")){
            //echo "  sii";
          }else{
            echo "Error al actualizar";
          }
    }
       if($consulta = $link->query("DELETE FROM `aux_tareas` where id_a = $id")){
        echo "Tareas canceladas";

      }else{
        echo "Error al Cancelar";
      }

    }else{
        //echo "  no";
    }




?>
