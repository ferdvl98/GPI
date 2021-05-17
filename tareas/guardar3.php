<?php

  require 'conexion.php';

  $id2 = $_GET["id"];

  $pres = $_POST["pres"];
  //$id2 = $_POST["super"];
  $datos = $hh = $em  ="";

  $sql = "SELECT id FROM `aux_tareas3` where id_tarea = $pres and id_res = $id2";
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
    $sql = "SELECT sum(hh)as hh, sum(em) as em FROM aux_tareas3 where id_tarea = $pres and id_res = $id2";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $hh =  $row["hh"];
        $em =  $row["em"];
      }
    }

    $sql = "INSERT INTO tareas3 (`id_tarea`, `id_res`, `hh`,  `em`)
    VALUES ($pres, $id2, $hh, $em)";

    if ($link->query($sql) === TRUE) {
      $sql2 = "SELECT id FROM tareas3 where id_tarea = $pres and id_res = $id2 and hh = $hh and em = $em";
      $result = $link->query($sql2);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $id =  $row["id"];
        }
      }

      if($consulta = $link->query("INSERT INTO `aux_tareas3_2` (`id_tarea`, `id_res`, `id_je`, `inicio`, `fin`, `id_trabajador`, `id_categoria`, `hh`, `em_t`, `em`, `tarea`, `presupuesto`)
      SELECT `id_tarea`, `id_res`, `id_je`, `inicio`, `fin`, `id_trabajador`, `id_categoria`, `hh`, `em_t`, `em`, `tarea`, `presupuesto` FROM `aux_tareas3`")){
        echo "Tareas Asignadas";
        //$sql = "UPDATE `aux_tareas3_2` SET id_t=$id WHERE id_tarea = $pres and id_res = $id2";

        //if ($link->query($sql) === TRUE) {
          $sql = "DELETE FROM aux_tareas3 WHERE id_tarea = $pres and id_res = $id2";

            if ($link->query($sql) === TRUE) {
              //echo "Record deleted successfully";
              $date = date("Y") . "-" . date("m") . "-" . date("d");
              if($consulta = $link->query("INSERT INTO `notificaciones`(`id_user`, `fecha`, `notifico`, `asunto`, `status`) VALUES ($id2,'$date' ,$id2, 'Equipos de Trabajo Asignados', 'A')")){
              }else {
                echo 'Error al agregar notificaciones';
              }
            }else{
                echo "Error al limpiar";
            }
        /*} else {
          echo "Error: " . $link->error;
        }*/





      }else {
        echo "Error al asignar tareas";
      }


    } else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
  }
?>
