<?php

  require_once "conexion.php";

  $id = $_POST["id"];
  $ab = "";


  $sql = "SELECT status FROM estado where id_estado = $id";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $ab = $row["status"];
    }
  }

  if($ab == 'A'){
    if($consulta = $link->query("UPDATE estado SET status = 'B' WHERE `id_estado` = $id")){
      echo "Dato actualizado";
    }else{
      echo "Error al actualizar los datos ";
      exit();
    }
  }
  if($ab == 'B'){
    if($consulta = $link->query("UPDATE estado SET status = 'A' WHERE `id_estado` = $id")){
      echo "Dato actualizado";
    }else{
      echo "Error al actualizar los datos ";
      exit();
    }
  }



?>
