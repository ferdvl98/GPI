<?php

$da = date("Y-n-j");


  require "conexion.php";

  $id = $_POST["id"];


  $sql = "SELECT * FROM aux_tareas3 where id_a = $id";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {

    if($consulta = $link->query("INSERT INTO `tareas3` (`id_tarea`, `id_cuenta`, `presupuesto`)
    SELECT `id_tarea`, `id_cuenta`, `presupuesto` FROM aux_tareas3 WHERE id_a = $id")){
      echo "Presupuesto Asignado";

      $sql = "SELECT concat_ws(' ', py.nombre,' - ', ps.nombre,' - ', t.nombre,' - ', a.nombre, ' - ',d.nombre, ' - ', ps2.concepto,': $', at3.`presupuesto`)
      as concepto, at3.`id_cuenta` as a FROM `aux_tareas3` as at3 INNER JOIN tareas2 as t2 ON t2.id = at3.`id_tarea` INNER JOIN tareas as ts
      ON ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 ON ps2.id = ts.id_pres
      INNER JOIN pres as ps ON ps.id = ps2.id_presupuesto INNER JOIN tipo as t ON t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area
      INNER JOIN disciplinas as d on d.id = ps2.id_disciplina where at3.`id_a` = $id";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $a = $row["a"];
          $c = $row["concepto"];
          $sql = "INSERT INTO `notificaciones`( `id_user`, `fecha`, `notifico`, `asunto`, `status`)
          VALUES ($a,'$da',$id,'$c','A')";

          if ($link->query($sql) === TRUE) {
          } else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }
        }

        $sql = "DELETE FROM aux_tareas3 WHERE id_a=$id";

        if ($link->query($sql) === TRUE) {
        } else {
          echo "Error: " . $link->error;
        }


      }
    }else {
      echo "Error 2 al guardar";
    }
  }else {
    echo "No hay datos para guardar";
  }


?>
