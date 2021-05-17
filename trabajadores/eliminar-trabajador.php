<?php

  require_once "conexion.php";

  $id = $_POST["id"];
  $ab = "";


  $sql = "SELECT Movimiento FROM trabajador where id = $id";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $ab = $row["Movimiento"];
    }
  }

  if($ab == 'Alta'){
    if($consulta = $link->query("UPDATE trabajador SET Movimiento = 'Baja' WHERE `id` = $id")){
      echo "Dato actualizado";
    }else{
      echo "Error al actualizar los datos ";
      exit();
    }
  }
  if($ab == 'Baja'){
    if($consulta = $link->query("UPDATE trabajador SET Movimiento = 'Alta' WHERE `id` = $id")){
      echo "Dato actualizado";
    }else{
      echo "Error al actualizar los datos ";
      exit();
    }
  }



?>
