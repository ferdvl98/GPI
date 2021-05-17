<?php

  require_once "conexion.php";

  $id = $_GET["id"];

  $nombre = $_POST["nombre"];
  if(empty(trim($nombre))){
    echo "Debe escrbir un nombre para el Proyecto";
  }else{
    $sql = "SELECT * FROM proyecto WHERE nombre = '$nombre'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
      if($consulta = $link->query("INSERT INTO `aux_proyecto` (`id_proyecto`, `id_presupuesto`) SELECT  p.id_proyecto, ap.id_presupuesto from proyecto as p
        inner JOIN aux_pres2 as ap WHERE p.nombre = '$nombre' and ap.a=$id")){
          if($consulta = $link->query("DELETE FROM `aux_pres2` where a = $id")){
            echo "Presupuestos Agregados a $nombre";
          }else {
            echo "Error al borrar datos de aux_pres2";
          }

        }else{
          echo "Error el registrar presupuestos";
        }
    }else{
      if($consulta = $link->query("INSERT INTO proyecto (nombre, presupuesto)
      VALUES ('$nombre', (SELECT SUM(p.presupuesto) as total FROM pres as p INNER JOIN `aux_pres2` as ap ON p.id = ap.`id_presupuesto` WHERE a = $id))")){
        if($consulta = $link->query("INSERT INTO `aux_proyecto` (`id_proyecto`, `id_presupuesto`) SELECT  p.id_proyecto, ap.id_presupuesto from proyecto as p
        inner JOIN aux_pres2 as ap WHERE p.nombre = '$nombre' and ap.a=$id")){
          if($consulta = $link->query("DELETE FROM `aux_pres2` where a = $id")){
            echo "Proyecto creado";
          }else {
            echo "Error al borrar datos de aux_pres2";
          }

        }else{
          echo "Error el registrar presupuestos";
        }
    }else{
      echo "Error al crear proyecto";
    }
  }
}

?>
