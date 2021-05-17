<?php

  require_once "conexion.php";


/*
  if($consulta = $link->query("UPDATE trabajador SET Nombre = '$texto' WHERE `id` = $id")){
    echo "Dato actualizado";
  }else{
    echo "Error al actualizar los datos ";
    //exit();
  }else{
    if($consulta = $link->query("UPDATE trabajador SET Apellido_Paterno = '$texto' WHERE `id` = $id"){
      echo "Dato actualizado";
    }else{
      echo "Error al actualizar los datos ";
      exit();
    }
  }
*/
  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];

  //echo "$id - $texto - $columna";

  if (empty($texto) || empty($columna)) {
    $sql = "DELETE FROM trabajador WHERE id=$id";
    echo "$id - $texto - $columna";

    if ($link->query($sql) === TRUE) {
      echo "Registro elminado";
    } else {
      echo "Error al eliminar: " . $link->error;
    }

  }else{
    $sql = "UPDATE trabajador SET $columna='$texto' WHERE id=$id";

    if ($link->query($sql) === TRUE) {
      echo "Dato actualizado";
    } else {
      echo "Error al actualizar: " . $link->error;
    }
  }


 ?>
