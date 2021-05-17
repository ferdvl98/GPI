<?php

  require_once "conexion.php";
  $id2 = $_GET["id2"];

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];
  $id_dic = $id_dic2 = $sql = $result = $consulta = $ig = "";

  if($consulta = $link->query("UPDATE aux_presupuestos2 SET $columna = '$texto' WHERE  id = $id and a = $id2")){

    $sql = "SELECT cantidad FROM aux_presupuestos2 WHERE  id = $id and a = $id2 ";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $id_dic = $row["cantidad"];
      }
    }else{
      echo "error";
    }
    $sql = "SELECT iu FROM aux_presupuestos2 WHERE  id = $id and a = $id2";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $id_dic2 = $row["iu"];
      }
    }else{
      echo "error2";
    }
    $ig =intval($id_dic)*intval($id_dic2);
    if($consulta = $link->query("UPDATE aux_presupuestos2 SET ig = $ig WHERE  id = $id and a = $id2")){

    }else{
      echo "Error al actualizar IG";
    }

    echo "Actualizado";
  }else {
    echo "Error al actualizar";
  }
?>
