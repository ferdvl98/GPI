<?php

  require_once "conexion.php";
  $status = $_POST["presupuesto"];
  $id = $_POST["vty"];


    if(empty(trim($status)) || empty(trim($id))){

    }else{
      if($status != 's' && $id != 's'){
  //if($status == "VyT"){
      $consulta = $link->query("SELECT p.id, a.nombre as area, d.nombre as disciplina, p.`concepto`, p.`unidad`, p.`cantidad`, p.`iu`, p.`ig` FROM `presupuestos2`
        as p INNER JOIN area as a ON a.id = p.`id_area` INNER JOIN disciplinas as d ON d.id = p.`id_disciplina` INNER JOIN pres as pr ON
        pr.id = p.`id_presupuesto` where pr.id_tipo = $status and pr.id = $id");
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
          <td id ='area' data-id_area = '".$registro['id']."'>".$registro['area']."</td>
          <td id ='disciplina' data-id_disciplina = '".$registro['id']."'>".$registro['disciplina']."</td>
          <td id ='concepto' data-id_concepto = '".$registro['id']."'>".$registro['concepto']."</td>
          <td id ='unidad' data-id_unidad = '".$registro['id']."'>".$registro['unidad']."</td>
          <td id ='cantidad' data-id_cantidad = '".$registro['id']."'>".number_format($registro['cantidad'])."</td>
          <td id ='iu' data-id_iu = '".$registro['id']."'>".number_format($registro['iu'])."</td>
          <td id ='ig' data-id_ig = '".$registro['id']."'>".number_format($registro['ig'])."</td>
        </tr>";
    }

      $consulta = "SELECT presupuesto FROM `pres` where id = $id";
      $resultado = mysqli_query($link, $consulta);
      if($resultado){
        while ($row = $resultado->fetch_array()) {
          $total = $row["presupuesto"];
          ?>
          <div class="as">
            <p>
              <b>Total: </b>
              <b name="total"> <?php echo "$ ", number_format($total); ?></b>
            </p>

          </div>
          <?php
        }
      }
    }
    }

  /*}else if($status == "CO"){
    $consulta = $link->query("SELECT  a.id_co, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_co` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id  WHERE id_co = $id");
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
        <td id ='area' data-id_area = '".$registro['id_co']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id_co']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id_co']."'>".$registro['concepto']."</td>
        <td id ='unidad' data-id_unidad = '".$registro['id_co']."'>".$registro['unidad']."</td>
        <td id ='cantidad' data-id_cantidad = '".$registro['id_co']."'>".number_format($registro['cantidad'])."</td>
        <td id ='iu' data-id_iu = '".$registro['id_co']."'>".number_format($registro['iu'])."</td>
        <td id ='ig' data-id_ig = '".$registro['id_co']."'>".number_format($registro['ig'])."</td>
      </tr>";
    }

    $consulta = "SELECT total FROM `co` where id_co = $id";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else if($status == "seguros"){
    $consulta = $link->query("SELECT  a.id_seg, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_seg` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id  WHERE id_seg = $id");
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
        <td id ='area' data-id_area = '".$registro['id_seg']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id_seg']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id_seg']."'>".$registro['concepto']."</td>
        <td id ='unidad' data-id_unidad = '".$registro['id_seg']."'>".$registro['unidad']."</td>
        <td id ='cantidad' data-id_cantidad = '".$registro['id_seg']."'>".number_format($registro['cantidad'])."</td>
        <td id ='iu' data-id_iu = '".$registro['id_seg']."'>".number_format($registro['iu'])."</td>
        <td id ='ig' data-id_ig = '".$registro['id_seg']."'>".number_format($registro['ig'])."</td>
      </tr>";
    }

    $consulta = "SELECT total FROM `seguros` where id_seg = $id";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else if($status == "instalaciones"){
    $consulta = $link->query("SELECT  a.id_ins, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_ins` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id  WHERE id_ins = $id");
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
        <td id ='area' data-id_area = '".$registro['id_ins']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id_ins']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id_ins']."'>".$registro['concepto']."</td>
        <td id ='unidad' data-id_unidad = '".$registro['id_ins']."'>".$registro['unidad']."</td>
        <td id ='cantidad' data-id_cantidad = '".$registro['id_ins']."'>".number_format($registro['cantidad'])."</td>
        <td id ='iu' data-id_iu = '".$registro['id_ins']."'>".number_format($registro['iu'])."</td>
        <td id ='ig' data-id_ig = '".$registro['id_ins']."'>".number_format($registro['ig'])."</td>
      </tr>";
    }

    $consulta = "SELECT total FROM `instalaciones` where id_ins = $id";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else if($status == "equipos"){
    $consulta = $link->query("SELECT  a.id_eq, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_eq` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id  WHERE id_eq = $id");
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
        <td id ='area' data-id_area = '".$registro['id_eq']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id_eq']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id_eq']."'>".$registro['concepto']."</td>
        <td id ='unidad' data-id_unidad = '".$registro['id_eq']."'>".$registro['unidad']."</td>
        <td id ='cantidad' data-id_cantidad = '".$registro['id_eq']."'>".number_format($registro['cantidad'])."</td>
        <td id ='iu' data-id_iu = '".$registro['id_eq']."'>".number_format($registro['iu'])."</td>
        <td id ='ig' data-id_ig = '".$registro['id_eq']."'>".number_format($registro['ig'])."</td>
      </tr>";
    }

    $consulta = "SELECT total FROM `equipos` where id_eq = $id";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else if($status == "admin"){
    $consulta = $link->query("SELECT  a.id_admin, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_admin` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id  WHERE id_admin = $id");
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
        <td id ='area' data-id_area = '".$registro['id_admin']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id_admin']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id_admin']."'>".$registro['concepto']."</td>
        <td id ='unidad' data-id_unidad = '".$registro['id_admin']."'>".$registro['unidad']."</td>
        <td id ='cantidad' data-id_cantidad = '".$registro['id_admin']."'>".number_format($registro['cantidad'])."</td>
        <td id ='iu' data-id_iu = '".$registro['id_admin']."'>".number_format($registro['iu'])."</td>
        <td id ='ig' data-id_ig = '".$registro['id_admin']."'>".number_format($registro['ig'])."</td>
      </tr>";
    }

    $consulta = "SELECT total FROM `admin` where id_admin = $id";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else if($status == "fya"){
    $consulta = $link->query("SELECT  a.id_fya, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_fya` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id  WHERE id_fya = $id");
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
        <td id ='area' data-id_area = '".$registro['id_fya']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id_fya']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id_fya']."'>".$registro['concepto']."</td>
        <td id ='unidad' data-id_unidad = '".$registro['id_fya']."'>".$registro['unidad']."</td>
        <td id ='cantidad' data-id_cantidad = '".$registro['id_fya']."'>".number_format($registro['cantidad'])."</td>
        <td id ='iu' data-id_iu = '".$registro['id_fya']."'>".number_format($registro['iu'])."</td>
        <td id ='ig' data-id_ig = '".$registro['id_fya']."'>".number_format($registro['ig'])."</td>
      </tr>";
    }

    $consulta = "SELECT total FROM `fya` where id_fya = $id";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else if($status == "hyc"){
    $consulta = $link->query("SELECT  a.id_hyc, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_hyc` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id  WHERE id_hyc = $id");
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
        <td id ='area' data-id_area = '".$registro['id_hyc']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id_hyc']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id_hyc']."'>".$registro['concepto']."</td>
        <td id ='unidad' data-id_unidad = '".$registro['id_hyc']."'>".$registro['unidad']."</td>
        <td id ='cantidad' data-id_cantidad = '".$registro['id_hyc']."'>".number_format($registro['cantidad'])."</td>
        <td id ='iu' data-id_iu = '".$registro['id_hyc']."'>".number_format($registro['iu'])."</td>
        <td id ='ig' data-id_ig = '".$registro['id_hyc']."'>".number_format($registro['ig'])."</td>
      </tr>";
    }

    $consulta = "SELECT total FROM `hyc` where id_hyc = $id";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

  }else{
    ?>
    <div class="asi">
      <p>
        <b name="total">Debe seleccionar un Presupuesto</b>
      </p>

    </div>
    <?php
  }*/


?>
