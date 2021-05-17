<?php

  require_once "conexion.php";

  $tipo = filter_input(INPUT_POST, 'tipo');
  $id_p = filter_input(INPUT_POST, 'id_proy');
  $nom_pres = filter_input(INPUT_POST, 'nom_pres');

    $dec = 1;
  //echo $tipo;
  //echo $id_p;

  if($tipo == "VyT"){

    $consulta = "SELECT  v.total from vyt as v INNER JOIN presupuestos as p ON v.id_vyt = p.vyt WHERE p.id_proyecto = $id_p AND p.vyt = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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

  }else if($tipo == "CO"){
    $consulta = "SELECT v.nombre, v.total, v.id_co from co as v INNER JOIN presupuestos as p ON v.id_co = p.co WHERE p.id_proyecto = $id_p  AND p.co = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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

  }else if($tipo == "seguros"){
    $consulta = "SELECT v.nombre, v.total, v.id_seg from seguros as v INNER JOIN presupuestos as p ON v.id_seg = p.seg WHERE p.id_proyecto = $id_p  AND p.seg = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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
  }else if($tipo == "instalaciones"){
    $consulta = "SELECT v.nombre, v.total, v.id_ins from instalaciones as v INNER JOIN presupuestos as p ON v.id_ins = p.ins WHERE p.id_proyecto = $id_p  AND p.ins = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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
  }else if($tipo == "equipos"){
    $consulta = "SELECT v.nombre, v.total, v.id_eq from equipos as v INNER JOIN presupuestos as p ON v.id_eq = p.eq WHERE p.id_proyecto = $id_p  AND p.eq = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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
  }else if($tipo == "admin"){
    $consulta = "SELECT v.nombre, v.total, v.id_admin from admin as v INNER JOIN presupuestos as p ON v.id_admin = p.admin WHERE p.id_proyecto = $id_p  AND p.admin = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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
  }else if($tipo == "fya"){
    $consulta = "SELECT v.nombre, v.total, v.id_fya from fya as v INNER JOIN presupuestos as p ON v.id_fya = p.fya WHERE p.id_proyecto = $id_p  AND p.fya = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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
  }else if($tipo == "hyc"){
    $consulta = "SELECT v.nombre, v.total, v.id_hyc from hyc as v INNER JOIN presupuestos as p ON v.id_hyc = p.hyc WHERE p.id_proyecto = $id_p  AND p.hyc = $nom_pres";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["total"];
        //echo $total;
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

  ?>
