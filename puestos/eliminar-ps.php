<?php

  require_once "conexion.php";

  $id = $_POST["id"];
  $ab = "";


  $sql = "SELECT status FROM as_puesto where id = $id";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $ab = $row["status"];
    }
  }

  if($ab == 'A'){
    if($consulta = $link->query("UPDATE as_puesto SET status = 'B' WHERE `id` = $id")){
      echo "Dato actualizado";
    }else{
      echo "Error al actualizar los datos ";
      exit();
    }
  }
  if($ab == 'B'){
    if($consulta = $link->query("UPDATE as_puesto SET status = 'A' WHERE `id` = $id")){
      echo "Dato actualizado";
    }else{
      echo "Error al actualizar los datos ";
      exit();
    }
  }



?>