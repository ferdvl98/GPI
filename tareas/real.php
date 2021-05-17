<?php

  require_once "conexion.php";

  $tarea = $_POST["pres"];
  $responsable = $_POST["super"];
  $jefe = $_POST["je"];
  $hh = $rhh = $em = $rem = "";

  if($tarea !='s' && $responsable !='s' && $jefe=='s') {
    $sql2 = "SELECT SUM(`hh`) as hh, sum(real_hh) as real_hh, sum(em) as em, sum(real_em) as real_em FROM `aux_tareas3_2`
    WHERE `id_tarea` = $tarea and id_res = $responsable";
    $result = $link->query($sql2);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $hh =  $row["hh"];
        $rhh =  $row["real_hh"];
        $em =  $row["em"];
        $rem =  $row["real_em"];?>

        <div class="as2">
          <p>
            <b name="total"> <?php echo "HH: $hh  Real: $rhh - EM: $em  Real: $rem" ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else if($tarea !='s' && $responsable !='s' && $jefe !='s'){
    $sql2 = "SELECT SUM(`hh`) as hh, sum(real_hh) as real_hh, sum(em) as em, sum(real_em) as real_em FROM `aux_tareas3_2`
    WHERE `id_tarea` = $tarea and id_res = $responsable and id_je= $jefe";
    $result = $link->query($sql2);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $hh =  $row["hh"];
        $rhh =  $row["real_hh"];
        $em =  $row["em"];
        $rem =  $row["real_em"];?>

        <div class="as2" >
          <p>
            <b name="total"> <?php echo "HH: $hh  Real: $rhh - EM: $em  Real: $rem" ?></b>
          </p>

        </div>
        <?php
      }
    }
  }


?>
