<?php

  require "conexion.php";

  $id2 = $_GET["id2"];
   $da = date("Y-n-j");

  //$id = $_POST["id"];
  //$user = $_POST["user"];
  //echo $id;
 // echo $user;

  $datos = $id_p = "";

  $sql = "SELECT id FROM `aux_tareas2` where id_a = $id2";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $datos = $row["id"];
    }
  }

  if(empty(trim($datos))){
    echo "¡No hay tareas para Asignar!";
  }else{
    $sql = "SELECT * FROM `aux_tareas2` WHERE id_a = $id2";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user2 =  $row["id_cuenta"];
        $sql = "SELECT concat_ws('',   py.nombre,' - ', ps.nombre,' - ', t.nombre,' - ', a.nombre,' - ', d.nombre,' - ', ps2.concepto,': $', t2.`presupuesto`) as asunto
        FROM `aux_tareas2` AS t2 INNER JOIN tareas AS ts ON ts.id = t2.`id_tarea` INNER JOIN presupuestos2 AS ps2 ON ps2.id = ts.id_pres INNER JOIN pres AS ps
        ON ps.id = ps2.id_presupuesto INNER JOIN proyecto AS py ON py.id_proyecto = ts.id_proyecto INNER JOIN tipo AS t ON t.id = ps.id_tipo INNER JOIN area AS a ON
        a.id = ps2.id_area INNER JOIN disciplinas AS d ON d.id = ps2.id_disciplina WHERE t2.`id_a` = 2";
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


    if($consulta = $link->query("INSERT INTO `tareas2`(`id_tarea`, `id_cuenta`, `presupuesto`) SELECT `id_tarea`, `id_cuenta`,`presupuesto` FROM `aux_tareas2`")){
      echo "Tareas Asignadas";
      $sql = "DELETE FROM aux_tareas2 WHERE id_a = $id2";

        if ($link->query($sql) === TRUE) {
          //echo "Record deleted successfully";
        }else{
            echo "Error al limpiar";
        }


    }else {
      echo "Error al asignar tareas";
    }
  }

 ?>
