<?php

  require_once "conexion.php";

  $status = $_POST["presupuesto"];

  echo $id = $_POST["vty"];
  $id2 = $_GET["id"];
  $nombre = $_POST["nombre"];
  $idp = "";
  if(!empty(trim($nombre))){
    $sql = "SELECT * FROM proyecto WHERE nombre = '$nombre'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $idp = $row["id_proyecto"];
      }
      $sql = "SELECT * FROM aux_proyecto WHERE id_presupuesto = $id";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        echo "El presupuesto ya está agregado al proyecto: $nombre";
      }else{
        if($consulta = $link->query("INSERT INTO aux_pres2 (id_presupuesto, a) VALUES ($id, $id2)")){
          echo "Presupuesto agregado";
        }else {
          echo "Error al agregar Presupuesto";
        }
      }
    }else{
      $sql = "SELECT * FROM aux_pres2 WHERE id_presupuesto = $id";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo "El Presupuesto que intenta agregar, ya esta registrado";
      }else{
        if($consulta = $link->query("INSERT INTO aux_pres2 (id_presupuesto, a) VALUES ($id, $id2)")){
          echo "Presupuesto agregado";
        }else {
          echo "Error al agregar Presupuesto";
        }

      }
    }
  }

  //if($status == "VyT"){
    

?>
