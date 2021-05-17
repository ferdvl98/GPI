<?php

  require_once "conexion.php";

  $id_pres = filter_input(INPUT_POST, 'id_pres'); //id del presupuesto
  $conc = filter_input(INPUT_POST, 'conc'); //concepto
  //echo $conc;
  $id_proy = filter_input(INPUT_POST, 'id_proy'); //id del proyecto
  $tipo = filter_input(INPUT_POST, 't_pres'); //nombre de presupuesto
  $id_area = filter_input(INPUT_POST, 'id_area2'); //tipo del area
    $id_dis = filter_input(INPUT_POST, 'dis'); //tipo del area
    $concepto = 0;
//echo "$conc";
    $sql = "SELECT ig FROM presupuestos2 where id=$conc";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $concepto =  $row["ig"];
      }
    }


    $sql ="SELECT * FROM `aux_concepto` WHERE `id_proyecto` = $id_proy and`id_pres` = $conc";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $sql = "SELECT total FROM `aux_concepto` WHERE `id_proyecto` = $id_proy  AND `id_pres` = $conc ";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $ig = $row["total"];
          }
          echo $ig;
        }

    }else{
        $sql = "INSERT INTO `aux_concepto`(`id_proyecto`, `id_pres`, `total`) VALUES ($id_proy, $conc, $concepto)";

        if ($link->query($sql) === TRUE) {

            $sql = "SELECT total FROM `aux_concepto` WHERE `id_proyecto` = $id_proy  AND `id_pres`  = $conc";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $ig = $row["total"];
              }
              echo $ig;
            }



        } else {
          echo "Error: " . $sql . "<br>" . $link->error;
        }
    }


?>
