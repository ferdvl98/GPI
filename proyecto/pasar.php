<?php

  require_once "conexion.php";
  $nombre = $_POST["nombre"];
  $id = "";
  //echo $nombre;

  $sql = "SELECT id_proyecto FROM proyecto where nombre = '$nombre'";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $id = $row["id_proyecto"];
    }
    if($consulta = $link->query("INSERT mostrar_p (`id`, `id_pre`, `nombre`, `total`, `pres`) SELECT `id`, `id_pre`, `nombre`, `total`, `pres` from aux_aux_pre")){
      if($consulta = $link->query("UPDATE `mostrar_p` SET `id_proyecto`=$id WHERE `id_proyecto` is null")){
        //echo "Creado";
      }else{
        echo "eeeerrroor";
      }
    }else{
      echo "Error al llenar tabla";
    }


  }else{
    echo "error";
  }




?>
