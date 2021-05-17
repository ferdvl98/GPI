<?php

  require 'conexion.php';

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];
  $total = "";

  if($consulta = $link->query("UPDATE aux_eq SET $columna = '$texto' WHERE a = $id")){
    $sql = "SELECT cantidad, iu FROM aux_eq where a = $id";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $total = $row["cantidad"]*$row["iu"];
      }
      if($consulta = $link->query("UPDATE aux_eq SET ig = '$total' WHERE a = $id")){
          if($consulta = $link->query("UPDATE equipos SET total = (SELECT SUM(ig) FROM aux_eq WHERE id_eq = (SELECT id_eq FROM aux_eq WHERE a = $id)) WHERE id_eq = (SELECT id_eq FROM aux_eq WHERE a = $id)")){

        }else{
          echo "Error al actualizar ig";
        }
      }else{
        echo "Error al actualizar ig";
      }
    }
    echo "Dato modificado";
  }else {
    echo "Error al modoficar eq";
  }

?>
