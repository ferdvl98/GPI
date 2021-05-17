<?php

  require "conexion.php";
  $id2 = $_GET["id2"];

  $id = $_POST["id"];
  $user = $_POST["user"];
  //echo $id;
 // echo $user;
 $da = date("Y-n-j");
  $datos = $id_p = "";
  $asunto = "";
  $user2 = "";

  $sql = "SELECT * FROM `aux_tareas` WHERE id_a = $id2";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $user2 =  $row["id_cuenta"];
      $sql = "SELECT concat_ws('', p.nombre,' - ', ps.nombre,' - ', t.nombre,' - ', a.nombre,' - ', d.nombre,' - ', p2.concepto,': $', AT.presupuesto) as asunto
      FROM `aux_tareas` AS AT INNER JOIN proyecto AS p ON p.id_proyecto = AT.`id_proyecto` INNER JOIN presupuestos2 AS p2 ON p2.id = AT.`id_pres`
      INNER JOIN pres AS ps ON ps.id = p2.id_presupuesto INNER JOIN tipo AS t ON t.id = ps.id_tipo INNER JOIN area AS a ON a.id = p2.id_area
      INNER JOIN disciplinas AS d ON d.id = p2.id_disciplina WHERE AT.id_a = $id2";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $asunto =  $row["asunto"];
          //echo $asunto;
          if($consulta = $link->query("INSERT INTO `notificaciones`(`id_user`, `fecha`, `notifico`, `asunto`, `status`)
          VALUES ($user2, '$da', $id2, '$asunto', 'A')")){
          }else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }
        }
      }
    }
  }

  $sql = "SELECT * FROM aux_tareas where id_a = $id2";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    if($consulta = $link->query("INSERT INTO `tareas`(`id_proyecto`,`id_pres`,`id_cuenta`, `presupuesto`)
    SELECT `id_proyecto`,`id_pres`,`id_cuenta`, `presupuesto` FROM `aux_tareas` where id_a = $id2")){
      echo "Tareas Asignadas";
      $sql = "DELETE FROM aux_tareas WHERE id_a=$id2";
      if ($link->query($sql) === TRUE) {
      } else {
        echo "Error deleting record: " . $link->error;
      }



    }else {
      echo "Error al asignar tareas";
    }

  }else{
    echo "No hay datos para guardar";
  }

 ?>
