<?php

    $proy = $_POST["id_proy"];

    $pres = $pres2 = "";

    require_once "conexion.php";

    if($proy != 's'){

        $sql = "SELECT presupuesto FROM tareas where id = $proy";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $pres =  $row["presupuesto"];
          }
        }

        $sql = "SELECT * FROM aux_concepto2 where id_tarea = $proy";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {//Si

            $sql = "SELECT presupuesto FROM aux_concepto2 where id_tarea = $proy";
            $result = $link->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $pres2 =  $row["presupuesto"];
              }
              echo $pres2;
            }

        }else{//No
            $sql = "INSERT INTO aux_concepto2 (id_tarea, presupuesto) VALUES ($proy, $pres)";

            if (mysqli_query($link, $sql)) {
                $sql = "SELECT presupuesto FROM aux_concepto2 where id_tarea = $proy";
                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $pres2 =  $row["presupuesto"];
                  }
                  echo $pres2;
                }

            }else{
                echo "Error al guardar aux_concepto2";
            }



        }
    }



?>
