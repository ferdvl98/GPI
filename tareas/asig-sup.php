<?php

  require 'conexion.php';

  $pres = $_POST["pres"];
  $super = $_POST["sup"];
  $hh = $_POST["hh"];
  $id = $_POST["id"];
$pres2 = $pres3 = 0;
  if(empty($pres) || $pres == 's') {
    echo "Debe seleccinar un presupuesto";
  }else{
    if(empty($super)) {
      echo "Debe seleccinar a un Supervisor";
    }else{
      /*if(empty($hh)) {
        echo "No hay presupuesto para asignar";
      }else{*/

        $sql = "SELECT presupuesto FROM aux_concepto3 where id_tarea = $pres";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $pres2 =  $row["presupuesto"];
          }
        }

        if($hh>$pres2){
          echo "El presupuesto deseado excede la cantidad asignada ";
        }else if($hh<=0){
          echo "Ingrese un presupuesto valido";
        }else{
          $pres3 = $pres2 - $hh;
          $sql = "INSERT INTO aux_tareas3 (id_tarea, id_cuenta, presupuesto, id_a)
          VALUES ($pres, $super, $hh, $id)";
          if ($link->query($sql) === TRUE) {
            echo "Presupuesto Asignado";
            $sql = "UPDATE aux_concepto3 SET presupuesto=$pres3 WHERE id_tarea = $pres";

            if ($link->query($sql) === TRUE) {
              //echo "Record updated successfully";
            }else{
              echo "Error";
            }
          } else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }

        }


        /*else{
          $sql = "SELECT * FROM horas where id_pres = $pres and id_super = $super";
          $result = $link->query($sql);

          if ($result->num_rows > 0) {
            echo "El Supervisor ya tiene presupuesto asignado del presupuesto seleccionado";
          }else{
            $sql = "INSERT INTO horas (id_pres, id_super, horas, a)
            VALUES ($pres, $super, $hh, $id)";

            if ($link->query($sql) === TRUE) {
              echo "Presupuesto Asignado";
            } else {
              echo "Error: " . $sql . "<br>" . $link->error;
            }
          }
        }*/


      //}
    }

  }



?>
