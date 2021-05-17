<?php

  require_once "conexion.php";

  $id_pres = filter_input(INPUT_POST, 'id_pres'); //id del presupuesto
  $id_proy = filter_input(INPUT_POST, 'id_proy'); //id del proyecto
  $tipo = filter_input(INPUT_POST, 't_pres'); //tipo de presupuesto
  $id_area = filter_input(INPUT_POST, 'id_area2'); //tipo del area
  $id_dis = filter_input(INPUT_POST, 'id_dis'); //tipo del area
  $ig = "";


  //if($tipo == "VyT"){
    $sql = "SELECT p2.id, p2.concepto from aux_proyecto as ap INNER JOIN proyecto as py ON py.id_proyecto = ap.id_proyecto INNER JOIN pres as ps ON ps.id = ap.id_presupuesto
    INNER JOIN presupuestos2 as p2 on p2.id_presupuesto = ps.id WHERE py.id_proyecto = $id_proy and ps.id_tipo = $tipo and ps.id = $id_pres and p2.id_area = $id_area
     and p2.id_disciplina = $id_dis";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
  ?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['concepto']?></option>
  <?php endforeach; ?>

  <?php

/*}else if($tipo == "CO"){
  $sql = "SELECT a.`concepto`, a.`a` FROM `aux_co` as a INNER JOIN presupuestos as p on p.co = a.`id_co` WHERE p.id_proyecto = $id_proy AND a.`id_co` = $id_pres AND a.`id_area` = $id_area AND a.`id_dis` = $id_dis ";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['a'] ?>"><?= $op['concepto']?></option>
  <?php endforeach; ?>

<?php

}if($tipo == "seguros"){
    $sql = "SELECT a.`concepto`, a.`a` FROM `aux_seg` as a INNER JOIN presupuestos as p on p.seg = a.`id_seg` WHERE p.id_proyecto = $id_proy AND a.`id_seg` = $id_pres AND a.`id_area` = $id_area AND a.`id_dis` = $id_dis ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
  ?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['a'] ?>"><?= $op['concepto']?></option>
    <?php endforeach; ?>

  <?php

}if($tipo == "instalaciones"){
    $sql = "SELECT a.`concepto`, a.`a` FROM `aux_ins` as a INNER JOIN presupuestos as p on p.ins = a.`id_ins` WHERE p.id_proyecto = $id_proy AND a.`id_ins` = $id_pres AND a.`id_area` = $id_area AND a.`id_dis` = $id_dis ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
  ?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['a'] ?>"><?= $op['concepto']?></option>
    <?php endforeach; ?>

  <?php

}if($tipo == "equipos"){
    $sql = "SELECT a.`concepto`, a.`a` FROM `aux_eq` as a INNER JOIN presupuestos as p on p.eq = a.`id_eq` WHERE p.id_proyecto = $id_proy AND a.`id_eq` = $id_pres AND a.`id_area` = $id_area AND a.`id_dis` = $id_dis ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
  ?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['a'] ?>"><?= $op['concepto']?></option>
    <?php endforeach; ?>

  <?php

}if($tipo == "admin"){
    $sql = "SELECT a.`concepto`, a.`a` FROM `aux_admin` as a INNER JOIN presupuestos as p on p.admin = a.`id_admin` WHERE p.id_proyecto = $id_proy AND a.`id_admin` = $id_pres AND a.`id_area` = $id_area AND a.`id_dis` = $id_dis ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
  ?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['a'] ?>"><?= $op['concepto']?></option>
    <?php endforeach; ?>

  <?php

}if($tipo == "fya"){
    $sql = "SELECT a.`concepto`, a.`a` FROM `aux_fya` as a INNER JOIN presupuestos as p on p.fya = a.`id_fya` WHERE p.id_proyecto = $id_proy AND a.`id_fya` = $id_pres AND a.`id_area` = $id_area AND a.`id_dis` = $id_dis ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
  ?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['a'] ?>"><?= $op['concepto']?></option>
    <?php endforeach; ?>

  <?php

}if($tipo == "hyc"){
    $sql = "SELECT a.`concepto`, a.`a` FROM `aux_hyc` as a INNER JOIN presupuestos as p on p.hyc = a.`id_hyc` WHERE p.id_proyecto = $id_proy AND a.`id_hyc` = $id_pres AND a.`id_area` = $id_area AND a.`id_dis` = $id_dis ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
  ?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['a'] ?>"><?= $op['concepto']?></option>
    <?php endforeach; ?>

  <?php

}*/

?>
