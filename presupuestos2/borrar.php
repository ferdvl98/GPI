<?php

  require_once "conexion.php";
  $id = $_GET["id"];
  $tipo = $_POST["tipo"];
  $nombre = "";

  $sql = "SELECT nombre FROM tipo where id = $tipo";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
    }
  }

  if($consulta = $link->query("DELETE FROM `aux_presupuestos2` WHERE tipo = '$nombre' and a = $id")){
    echo "Registros cancelados";
  }else {
    echo "Error al cancelar";
  }

?>
