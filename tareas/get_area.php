<?php

  require_once "conexion.php";

  $id_pres = filter_input(INPUT_POST, 'id_pres'); //id del presupuesto
  $id_proy = filter_input(INPUT_POST, 'id_proy'); //id del proyecto
  $tipo = filter_input(INPUT_POST, 't_pres'); //tipo de presupuesto

  //if($tipo == "VyT"){
    $sql = "SELECT DISTINCT a.nombre, a.id FROM aux_proyecto as ap INNER JOIN proyecto as py ON py.id_proyecto = ap.id_proyecto INNER JOIN pres as ps ON ap.id_presupuesto = ps.id
    INNER JOIN presupuestos2 as p2 ON p2.id_presupuesto = ps.id INNER JOIN area as a ON p2.id_area = a.id WHERE py.id_proyecto = $id_proy and ps.id_tipo = $tipo and ps.id = $id_pres order by a.id";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
    <?php endforeach; ?>

<?php
/*}else if($tipo == "CO"){
  $sql = "SELECT a.nombre, a.id FROM `area` as a INNER JOIN aux_co as ay ON ay.id_area = a.`id` INNER JOIN presupuestos as p ON p.co = ay.id_co WHERE p.id_proyecto = $id_proy and ay.id_co = $id_pres GROUP BY a.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php
}else if($tipo == "seguros"){
  $sql = "SELECT a.nombre, a.id FROM `area` as a INNER JOIN aux_seg as ay ON ay.id_area = a.`id` INNER JOIN presupuestos as p ON p.seg = ay.id_seg WHERE p.id_proyecto = $id_proy and ay.id_seg = $id_pres GROUP BY a.nombre ";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php
}else if($tipo == "instalaciones"){
  $sql = "SELECT a.nombre, a.id FROM `area` as a INNER JOIN aux_ins as ay ON ay.id_area = a.`id` INNER JOIN presupuestos as p ON p.ins = ay.id_ins WHERE p.id_proyecto = $id_proy and ay.id_ins = $id_pres GROUP BY a.nombre ";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php
}else if($tipo == "equipos"){
  $sql = "SELECT a.nombre, a.id FROM `area` as a INNER JOIN aux_eq as ay ON ay.id_area = a.`id` INNER JOIN presupuestos as p ON p.eq = ay.id_eq WHERE p.id_proyecto = $id_proy and ay.id_eq = $id_pres GROUP BY a.nombre ";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php
}else if($tipo == "admin"){
  $sql = "SELECT a.nombre, a.id FROM `area` as a INNER JOIN aux_admin as ay ON ay.id_area = a.`id` INNER JOIN presupuestos as p ON p.admin = ay.id_admin WHERE p.id_proyecto = $id_proy and ay.id_admin = $id_pres GROUP BY a.nombre ";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php
}else if($tipo == "fya"){
  $sql = "SELECT a.nombre, a.id FROM `area` as a INNER JOIN aux_fya as ay ON ay.id_area = a.`id` INNER JOIN presupuestos as p ON p.fya = ay.id_fya WHERE p.id_proyecto = $id_proy and ay.id_fya = $id_pres GROUP BY a.nombre ";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php
}else if($tipo == "hyc"){
  $sql = "SELECT a.nombre, a.id FROM `area` as a INNER JOIN aux_hyc as ay ON ay.id_area = a.`id` INNER JOIN presupuestos as p ON p.hyc = ay.id_hyc WHERE p.id_proyecto = $id_proy and ay.id_hyc = $id_pres GROUP BY a.nombre ";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php
}*/

?>
