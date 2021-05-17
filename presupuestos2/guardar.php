<?php

require "conexion.php";

$id = $_GET["id"];
$tipo = $_POST["tipo"];
$nombre = $_POST["nombre"];
$sql = $result = "";

if (empty(trim($nombre))) {
  echo "Debe escribir un nombre para el presupuesto";
} else {

  $sql = "SELECT * FROM aux_presupuestos2 WHERE a = $id and tipo = $tipo";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    $sql = "SELECT * FROM pres WHERE nombre = '$nombre' and id_tipo = $tipo";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "Ya existe un presupuesto con ese nombre, intente con otro";
    } else {
      $sql = "INSERT INTO pres (nombre, id_tipo, presupuesto)
        VALUES ('$nombre', $tipo, (SELECT SUM(ig) from aux_presupuestos2 WHERE tipo = $tipo and a = $id))";
      if ($link->query($sql) === TRUE) {
        $n = "";
        $sql = "SELECT id FROM pres where nombre = '$nombre'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $n =  $row["id"];
          }
        }

        $sql = "SELECT @@identity AS id";
        $result = $link->query($sql);
        $ul= "";
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
          echo  $ul = $row["id"];
          }
        }

        if ($link->query("INSERT INTO `presupuestos2`(`id_presupuesto`, `id_area`, `id_disciplina`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`)
          SELECT p.`id`, ax.`id_area`, ax.`id_disciplina`, ax.`concepto`, ax.`unidad`, ax.`cantidad`, ax.`iu`, ax.`ig` FROM aux_presupuestos2 as ax, 
          pres as p WHERE (ax.`a` = $id and ax.`tipo` = $tipo) and p.`id` = $ul and p.`id_tipo` = ax.`tipo`") == TRUE) {

          $sql2 = "DELETE FROM aux_presupuestos2";
          if ($link->query($sql2) === TRUE) {
            echo "Presupuesto Guardado";
            mysqli_close($link);
          } else {
            echo "Error deleting record: " . $link->error;
          }
        } else {
          echo "¡Ups!\nOcurrio un error al guardar el presupuesto" . $sql . "<br>" . $link->error;
        }
      } else {
        echo "Error: " . $sql . "<br>" . $link->error;
      }
    }
  } else {
    echo "No hay presupuestos que guardar";
  }
}

  //mysqli_close($link);
