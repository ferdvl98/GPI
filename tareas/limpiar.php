<?php

  require "conexion.php";
  
  
    $id_pres = $concepto = $presupuesto = $nombre = [];
     $total = "";
  $total2 = $cont = 0;
  
    $sql = "SELECT tipo, concepto, presupuesto, id, id_pres FROM `aux_tareas`";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id_pres[$cont] = $row["tipo"];
        $concepto[$cont] = $row["concepto"];
        $presupuesto[$cont] = $row["presupuesto"];
        $nombre[$cont]  = $row["id_pres"];
        $cont = $cont +1;
        
        
      }
      for ($i = 0; $i <= $cont; $i++) {
        
        $sql2 = "SELECT total FROM `aux_concepto` where tipo = '$id_pres[$i]' and concepto = '$concepto[$i]' and id_pres = '$nombre[$i]'";
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
        
        if($consulta = $link->query("UPDATE  `aux_concepto` SET total = $total2 WHERE tipo = '$id_pres[$i]' and concepto = '$concepto[$i]' and id_pres = '$nombre[$i]'")){
            //echo "  sii";
          }else{
            echo "Error al actualizar";
          }
    }
       if($consulta = $link->query("DELETE FROM `aux_tareas`")){
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