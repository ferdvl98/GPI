<?php
    //echo "sii";

    require_once "conexion.php";
    
    $id2 = $_GET["id2"];
    
    $id_pres = $concepto = $presupuesto = $nombre = [];
    $total = "";
    $total2 = $cont = 0;
  
    $sql = "SELECT id_tarea, presupuesto from `aux_tareas2` where id_a = $id2";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $presupuesto[$cont] = $row["presupuesto"];
        $id_pres[$cont]  = $row["id_tarea"];
        $cont = $cont +1;
        
        
      }
      for ($i = 0; $i < $cont; $i++) {
        
        $sql2 = "SELECT presupuesto FROM `aux_concepto2` where id_tarea = $id_pres[$i]";
        $result = $link->query($sql2);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $total = $row["presupuesto"];
          }
        }
        $total = floatval($total);
        //echo "  total: ".$total;
        $presupuesto[$i] = floatval($presupuesto[$i]);
        $total2 = $total+$presupuesto[$i];
        //echo "  total2: ".$total2;
        
        if($consulta = $link->query("UPDATE  `aux_concepto2` SET presupuesto = $total2 WHERE id_tarea = $id_pres[$i]")){
            //echo "  sii";
          }else{
            echo "Error al actualizar";
          }
    }
       if($consulta = $link->query("DELETE FROM `aux_tareas2`")){
        echo "Tareas canceladas";
        if($consulta = $link->query("DELETE FROM `aux_noti`")){
      }else{
        echo "Error al borrar aux_noti";
      }
      }else{
        echo "Error al Cancelar";
      }
      
    }else{
        //echo "  no";
    }
  


?>