<?php

  require_once "conexion.php";

  $pro = $_POST["pro"];
  $ac = $_POST["accion"];
  $cont = 0;
  $cont2 = $cont3 =  $cont4 = $cont5 = 0;
  $vyt = array();
  $co = $ins =  $eq = $admin = array();

//echo "--";
//echo $pro;
//echo "--";
  if($pro!="s"){
    if($ac=="pres"){
      $sql = "SELECT `vyt` FROM `presupuestos` WHERE `id_proyecto`=$pro";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["vyt"]){
            //echo "cont: ".$cont. "dato: ".$row["vyt"];
            $vyt[$cont]=$row["vyt"];
            $cont += 1;
          }

        }
      //  echo $cont;
      } else {
        echo "0 results";
      }
      $sql = "SELECT `co` FROM `presupuestos` WHERE `id_proyecto`=$pro";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["co"]){
            //echo "cont: ".$cont. "dato: ".$row["vyt"];
            $co[$cont2]=$row["co"];
            $cont2 += 1;
          }

        }
      //  echo $cont;
      } else {
        echo "0 results";
      }

      $sql = "SELECT `ins` FROM `presupuestos` WHERE `id_proyecto`=$pro";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["ins"]){
            //echo "cont: ".$cont. "dato: ".$row["vyt"];
            $ins[$cont3]=$row["ins"];
            $cont3 += 1;
          }

        }
      //  echo $cont;
      } else {
        echo "0 results";
      }

      $sql = "SELECT `eq` FROM `presupuestos` WHERE `id_proyecto`=$pro";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["eq"]){
            //echo "cont: ".$cont. "dato: ".$row["vyt"];
            $eq[$cont4]=$row["eq"];
            $cont4 += 1;
          }

        }
      //  echo $cont;
      } else {
        echo "0 results";
      }

      $sql = "SELECT `admin` FROM `presupuestos` WHERE `id_proyecto`=$pro";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["admin"]){
            //echo "cont: ".$cont. "dato: ".$row["vyt"];
            $admin[$cont5]=$row["admin"];
            $cont5 += 1;
          }

        }
      //  echo $cont;
      } else {
        echo "0 results";
      }
      $consulta = "SELECT presupuesto as total FROM `proyecto` WHERE id_proyecto = $pro";
      $resultado = mysqli_query($link, $consulta);
      if($resultado){
        while ($row = $resultado->fetch_array()) {
          $total = $row["total"];
          ?>
          <div class="as">
            <p>
              <b>Total: </b>
              <b name="total"> <?php echo "$ ", $total; ?></b>
            </p>

          </div>
          <?php
          // code...
        }
      }

    for ($i=0; $i < $cont; $i++) {

      $consulta = $link->query("SELECT a.nombre as area, d.nombre as disc, i.concepto, i.unidad, i.cantidad, i.iu, i.ig FROM `aux_vty` as i INNER JOIN area as a ON i.`id_area` = a.id INNER JOIN disciplinas as d ON i.`id_dis` = d.id where i.`id_vty` = $vyt[$i]");
      echo "<table border = '1px' align ='center'>
            <tr>
              <th>Area</th>
              <th>Disciplina</th>
              <th>Concepto</th>
              <th>Unidad</th>
              <th>Cantidad</th>
              <th>Importe Unitario</th>
              <th>Importe general</th>
            </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {
        echo "
        <tr>
          <td>".$registro['area']."</td>
          <td>".$registro['disc']."</td>
          <td>".$registro['concepto']."</td>
          <td>".$registro['unidad']."</td>
          <td>".$registro['cantidad']."</td>
          <td>".$registro['iu']."</td>
          <td>".$registro['ig']."</td>
        </tr>";
      }
      //echo $vyt[$i];
      // code...
    }

    for ($j=0; $j < $cont2; $j++) {

      $consulta = $link->query("SELECT a.nombre as area, d.nombre as disc, i.concepto, i.unidad, i.cantidad, i.iu, i.ig FROM `aux_co` as i INNER JOIN area as a ON i.`id_area` = a.id INNER JOIN disciplinas as d ON i.`id_dis` = d.id where i.`id_co` = $co[$j]");
      echo "<table border = '1px' align ='center'>
            <tr>
              <th>Area</th>
              <th>Disciplina</th>
              <th>Concepto</th>
              <th>Unidad</th>
              <th>Cantidad</th>
              <th>Importe Unitario</th>
              <th>Importe general</th>
            </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {
        echo "
        <tr>
          <td>".$registro['area']."</td>
          <td>".$registro['disc']."</td>
          <td>".$registro['concepto']."</td>
          <td>".$registro['unidad']."</td>
          <td>".$registro['cantidad']."</td>
          <td>".$registro['iu']."</td>
          <td>".$registro['ig']."</td>
        </tr>";
      }
      //echo $vyt[$i];
      // code...
    }

    for ($k=0; $k < $cont3; $k++) {

      $consulta = $link->query("SELECT a.nombre as area, d.nombre as disc, i.concepto, i.unidad, i.cantidad, i.iu, i.ig FROM `aux_ins` as i INNER JOIN area as a ON i.`id_area` = a.id INNER JOIN disciplinas as d ON i.`id_dis` = d.id where i.`id_ins` = $ins[$k]");
      echo "<table border = '1px' align ='center'>
            <tr>
              <th>Area</th>
              <th>Disciplina</th>
              <th>Concepto</th>
              <th>Unidad</th>
              <th>Cantidad</th>
              <th>Importe Unitario</th>
              <th>Importe general</th>
            </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {
        echo "
        <tr>
          <td>".$registro['area']."</td>
          <td>".$registro['disc']."</td>
          <td>".$registro['concepto']."</td>
          <td>".$registro['unidad']."</td>
          <td>".$registro['cantidad']."</td>
          <td>".$registro['iu']."</td>
          <td>".$registro['ig']."</td>
        </tr>";
      }
      //echo $vyt[$i];
      // code...
    }

    for ($l=0; $l < $cont4; $l++) {

      $consulta = $link->query("SELECT a.nombre as area, d.nombre as disc, i.concepto, i.unidad, i.cantidad, i.iu, i.ig FROM `aux_eq` as i INNER JOIN area as a ON i.`id_area` = a.id INNER JOIN disciplinas as d ON i.`id_dis` = d.id where i.`id_eq` = $eq[$l]");
      echo "<table border = '1px' align ='center'>
            <tr>
              <th>Area</th>
              <th>Disciplina</th>
              <th>Concepto</th>
              <th>Unidad</th>
              <th>Cantidad</th>
              <th>Importe Unitario</th>
              <th>Importe general</th>
            </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {
        echo "
        <tr>
          <td>".$registro['area']."</td>
          <td>".$registro['disc']."</td>
          <td>".$registro['concepto']."</td>
          <td>".$registro['unidad']."</td>
          <td>".$registro['cantidad']."</td>
          <td>".$registro['iu']."</td>
          <td>".$registro['ig']."</td>
        </tr>";
      }
      //echo $vyt[$i];
      // code...
    }

    for ($n=0; $n < $cont5; $n++) {

      $consulta = $link->query("SELECT a.nombre as area, d.nombre as disc, i.concepto, i.unidad, i.cantidad, i.iu, i.ig FROM `aux_admin` as i INNER JOIN area as a ON i.`id_area` = a.id INNER JOIN disciplinas as d ON i.`id_dis` = d.id where i.`id_admin` = $admin[$n]");
      echo "<table border = '1px' align ='center'>
            <tr>
              <th>Area</th>
              <th>Disciplina</th>
              <th>Concepto</th>
              <th>Unidad</th>
              <th>Cantidad</th>
              <th>Importe Unitario</th>
              <th>Importe general</th>
            </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {
        echo "
        <tr>
          <td>".$registro['area']."</td>
          <td>".$registro['disc']."</td>
          <td>".$registro['concepto']."</td>
          <td>".$registro['unidad']."</td>
          <td>".$registro['cantidad']."</td>
          <td>".$registro['iu']."</td>
          <td>".$registro['ig']."</td>
        </tr>";
      }
      //echo $vyt[$i];
      // code...
    }






    }else if($ac=="s"){
      echo "¿Qué desea ver?";
    }
  }else{
    echo "Seleccione un Proyecto";
  }

 ?>
