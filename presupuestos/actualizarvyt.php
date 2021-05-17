<?php

  require 'conexion.php';

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];
  $total = "";

  if($consulta = $link->query("UPDATE aux_vty SET $columna = '$texto' WHERE a = $id")){
    $sql = "SELECT cantidad, iu FROM aux_vty where a = $id";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $total = $row["cantidad"]*$row["iu"];
      }
      if($consulta = $link->query("UPDATE aux_vty SET ig = '$total' WHERE a = $id")){
          if($consulta = $link->query("UPDATE vyt SET total = (SELECT SUM(ig) FROM aux_vty WHERE id_vty = (SELECT id_vty FROM aux_vty WHERE a = $id)) WHERE id_vyt = (SELECT id_vty FROM aux_vty WHERE a = $id)")){

        }else{
          echo "Error al actualizar total";
        }
      }else{
        echo "Error al actualizar ig";
      }
    }
    echo "Dato modificado";
  }else {
    echo "Error al modoficar vyt";
  }

?>
